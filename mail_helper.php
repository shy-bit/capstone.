<?php
/**
 * Email Sender - Using SMTP with Logging
 */

define('EMAIL_LOG_FILE', __DIR__ . '/logs/email_log.txt');

// Create logs directory if it doesn't exist
if (!is_dir(__DIR__ . '/logs')) {
    @mkdir(__DIR__ . '/logs', 0755, true);
}

function logEmailActivity($to, $subject, $success, $message = '') {
    $timestamp = date('Y-m-d H:i:s');
    $logEntry = "[{$timestamp}] To: {$to} | Subject: {$subject} | Status: " . ($success ? 'SUCCESS' : 'FAILED') . " | {$message}\n";
    @file_put_contents(EMAIL_LOG_FILE, $logEntry, FILE_APPEND | LOCK_EX);
}

function sendEmail($to, $subject, $htmlMessage) {
    $mailConfig = require 'mail_config.php';

    // Check if credentials are configured
    if (empty($mailConfig['username']) || empty($mailConfig['password'])) {
        $msg = 'Email not configured. Please set credentials in mail_config.php';
        logEmailActivity($to, $subject, false, $msg);
        return [
            'success' => false,
            'message' => $msg
        ];
    }

    try {
        // Use SMTP directly for reliability
        return sendViaSMTP($to, $subject, $htmlMessage, $mailConfig);

    } catch (Exception $e) {
        $msg = 'Error: ' . $e->getMessage();
        logEmailActivity($to, $subject, false, $msg);
        return [
            'success' => false,
            'message' => $msg
        ];
    }
}

function sendViaSMTP($to, $subject, $htmlMessage, $mailConfig) {
    try {
        // Create SSL context
        $context = stream_context_create([
            'ssl' => [
                'allow_self_signed' => true,
                'verify_peer' => false,
                'verify_peer_name' => false
            ]
        ]);

        // Determine protocol based on port
        $protocol = ($mailConfig['port'] === 465) ? 'ssl' : 'tcp';

        // Connect to SMTP server
        $socket = @stream_socket_client(
            "$protocol://{$mailConfig['host']}:{$mailConfig['port']}",
            $errno,
            $errstr,
            30,
            STREAM_CLIENT_CONNECT,
            $context
        );

        if (!$socket) {
            $msg = "Connection failed: $errstr";
            logEmailActivity($to, $subject, false, $msg);
            return [
                'success' => false,
                'message' => "Failed to connect to mail server: $errstr"
            ];
        }

        // Get initial response
        $response = fgets($socket, 512);
        if (strpos($response, '220') === false) {
            fclose($socket);
            logEmailActivity($to, $subject, false, "Server error: " . trim($response));
            return ['success' => false, 'message' => 'Server error'];
        }

        // EHLO
        fwrite($socket, "EHLO localhost\r\n");
        fgets($socket, 512);

        // STARTTLS for port 587
        if ($mailConfig['port'] === 587) {
            fwrite($socket, "STARTTLS\r\n");
            fgets($socket, 512);
            stream_socket_enable_crypto($socket, true, STREAM_CRYPTO_METHOD_TLS_CLIENT);
            fwrite($socket, "EHLO localhost\r\n");
            fgets($socket, 512);
        }

        // AUTH LOGIN
        fwrite($socket, "AUTH LOGIN\r\n");
        fgets($socket, 512);

        // Send username (base64 encoded)
        fwrite($socket, base64_encode($mailConfig['username']) . "\r\n");
        fgets($socket, 512);

        // Send password (base64 encoded)
        fwrite($socket, base64_encode($mailConfig['password']) . "\r\n");
        $authResponse = fgets($socket, 512);

        if (strpos($authResponse, '235') === false && strpos($authResponse, '250') === false) {
            fclose($socket);
            logEmailActivity($to, $subject, false, 'Authentication failed');
            return ['success' => false, 'message' => 'Authentication failed. Check credentials.'];
        }

        // MAIL FROM
        fwrite($socket, "MAIL FROM: <{$mailConfig['username']}>\r\n");
        fgets($socket, 512);

        // RCPT TO
        fwrite($socket, "RCPT TO: <$to>\r\n");
        fgets($socket, 512);

        // DATA
        fwrite($socket, "DATA\r\n");
        fgets($socket, 512);

        // Build complete email
        $emailHeaders = "From: {$mailConfig['from_name']} <{$mailConfig['username']}>\r\n";
        $emailHeaders .= "To: $to\r\n";
        $emailHeaders .= "Subject: $subject\r\n";
        $emailHeaders .= "Content-Type: text/html; charset=UTF-8\r\n";
        $emailHeaders .= "MIME-Version: 1.0\r\n\r\n";

        $fullMessage = $emailHeaders . $htmlMessage;

        // Send message
        fwrite($socket, $fullMessage . "\r\n.\r\n");
        $finalResponse = fgets($socket, 512);

        // QUIT
        fwrite($socket, "QUIT\r\n");
        fclose($socket);

        if (strpos($finalResponse, '250') !== false) {
            logEmailActivity($to, $subject, true, "Sent successfully");
            return [
                'success' => true,
                'message' => "Email sent successfully to $to"
            ];
        } else {
            logEmailActivity($to, $subject, false, "Server rejected: " .trim($finalResponse));
            return [
                'success' => false,
                'message' => 'Server rejected email'
            ];
        }

    } catch (Exception $e) {
        $msg = 'SMTP Error: ' . $e->getMessage();
        logEmailActivity($to, $subject, false, $msg);
        return [
            'success' => false,
            'message' => $msg
        ];
    }
}

