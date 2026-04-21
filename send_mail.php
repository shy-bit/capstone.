<?php
// send_mail.php
// PHPMailer helper for TOOTH IMPRESSION Dental Clinic

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// ============= LOAD PHPMailer =============
if (is_file(__DIR__.'/vendor/autoload.php')) {
    // Composer install
    require __DIR__.'/vendor/autoload.php';
} else {
    // Manual include
    require __DIR__.'/phpmailer/src/Exception.php';
    require __DIR__.'/phpmailer/src/PHPMailer.php';
    require __DIR__.'/phpmailer/src/SMTP.php';
}

// ============= LOAD SMTP CONFIG =============
$mailConfig = require 'mail_config.php';

// Local logo file
const LOGO_PATH   = __DIR__.'/image/logo.png';

/**
 * Simple welcome email for TOOTH IMPRESSION
 */
function sendWelcomeEmail(string $toEmail, string $toName = ''): array
{
    global $mailConfig;
    
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = $mailConfig['host'];
        $mail->SMTPAuth   = true;
        $mail->Username   = $mailConfig['username'];
        $mail->Password   = $mailConfig['password'];
        $mail->SMTPSecure = $mailConfig['port'] === 465 ? PHPMailer::ENCRYPTION_SMTPS : PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = $mailConfig['port'];
        $mail->CharSet    = 'UTF-8';

        $mail->setFrom($mailConfig['from_email'], $mailConfig['from_name']);
        $mail->clearAllRecipients();
        $mail->addAddress($toEmail, $toName);

        $logoHtml = '';
        if (is_file(LOGO_PATH)) {
            $mail->addEmbeddedImage(LOGO_PATH, 'tooth_logo', basename(LOGO_PATH));
            $logoHtml = '<img src="cid:tooth_logo" alt="TOOTH IMPRESSION" width="80" height="80" style="display:block;margin:0 auto 12px;border-radius:8px;">';
        }

        $safeName = htmlspecialchars($toName ?: $toEmail, ENT_QUOTES, 'UTF-8');

        $mail->isHTML(true);
        $mail->Subject = 'Welcome to TOOTH IMPRESSION Dental Clinic';
        $mail->Body = '
        <div style="background:#f8f9fa;color:#333;padding:24px;font-family:Arial,Helvetica,sans-serif;">
          <div style="max-width:560px;margin:0 auto;background:#ffffff;border:1px solid #dee2e6;border-radius:12px;padding:24px;text-align:center;">
            '.$logoHtml.'
            <h2 style="color:#2d7560;margin:0 0 8px;font-weight:700;">Welcome to TOOTH IMPRESSION!</h2>
            <p style="margin:0 0 12px;font-size:15px;color:#666;">You\'ve successfully logged in, '.$safeName.'.</p>
            <hr style="border:none;border-top:1px solid #e9ecef;margin:16px 0;">
            <p style="margin:0;font-size:13px;color:#999;">© TOOTH IMPRESSION Dau Branch | Your smile, our priority.</p>
          </div>
        </div>';

        $mail->AltBody = "Welcome to TOOTH IMPRESSION Dental Clinic!\nYou've successfully logged in, $safeName.\n";

        $ok = $mail->send();
        return ['ok' => $ok, 'error' => $ok ? null : $mail->ErrorInfo];
    } catch (Exception $e) {
        return ['ok' => false, 'error' => $mail->ErrorInfo ?: $e->getMessage()];
    }
}

/**
 * Appointment receipt email for TOOTH IMPRESSION
 *
 * @param string $toEmail
 * @param string $toName
 * @param array  $receipt  keys:
 *   full_name, appointment_date, appointment_time, treatment,
 *   amount, method, paid_at, notes
 *
 * @return array ['ok' => bool, 'error' => string|null]
 */
function sendAppointmentReceiptEmail(string $toEmail, string $toName, array $receipt): array
{
    global $mailConfig;
    
    $mail = new PHPMailer(true);

    try {
        // --- SMTP ---
        $mail->isSMTP();
        $mail->Host       = $mailConfig['host'];
        $mail->SMTPAuth   = true;
        $mail->Username   = $mailConfig['username'];
        $mail->Password   = $mailConfig['password'];
        $mail->SMTPSecure = $mailConfig['port'] === 465 ? PHPMailer::ENCRYPTION_SMTPS : PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = $mailConfig['port'];
        $mail->CharSet    = 'UTF-8';

        // --- From / To ---
        $mail->setFrom($mailConfig['from_email'], $mailConfig['from_name']);
        $mail->clearAllRecipients();
        $mail->addAddress($toEmail, $toName);

        // --- Optional embedded logo ---
        $logoHtml = '';
        if (is_file(LOGO_PATH)) {
            $mail->addEmbeddedImage(LOGO_PATH, 'tooth_logo', basename(LOGO_PATH));
            $logoHtml = '<img src="cid:tooth_logo" alt="TOOTH IMPRESSION" width="80" height="80" style="display:block;margin:0 auto 12px;border-radius:8px;">';
        }

        // Prepare values
        $fn   = htmlspecialchars($receipt['full_name']        ?? '', ENT_QUOTES, 'UTF-8');
        $date = htmlspecialchars($receipt['appointment_date'] ?? '', ENT_QUOTES, 'UTF-8');
        $time = htmlspecialchars($receipt['appointment_time'] ?? '', ENT_QUOTES, 'UTF-8');
        $treatment = htmlspecialchars($receipt['treatment']   ?? '', ENT_QUOTES, 'UTF-8');
        $amt  = number_format((float)($receipt['amount'] ?? 0), 2);
        $meth = htmlspecialchars($receipt['method']           ?? '', ENT_QUOTES, 'UTF-8');
        $paid = htmlspecialchars($receipt['paid_at']          ?? '', ENT_QUOTES, 'UTF-8');
        $notes = htmlspecialchars($receipt['notes']           ?? '', ENT_QUOTES, 'UTF-8');

        $mail->isHTML(true);
        $mail->Subject = 'TOOTH IMPRESSION Appointment Receipt';

        $mail->Body = '
        <div style="background:#f8f9fa;color:#333;padding:24px;font-family:Arial,Helvetica,sans-serif;">
          <div style="max-width:560px;margin:0 auto;background:#ffffff;border:1px solid #dee2e6;border-radius:12px;padding:24px;">
            <div style="text-align:center;">
              ' . $logoHtml . '
              <h2 style="color:#2d7560;margin:0 0 8px;font-weight:700;">Appointment Receipt</h2>
              <p style="margin:0 0 12px;font-size:14px;color:#666;">Thank you for your appointment, ' . $fn . '.</p>
            </div>

            <hr style="border:none;border-top:1px solid #e9ecef;margin:16px 0;">

            <table style="width:100%;font-size:13px;color:#333;">
              <tr><td style="padding:4px 0;color:#666;">Full Name</td><td style="padding:4px 0;text-align:right;">' . $fn . '</td></tr>
              <tr><td style="padding:4px 0;color:#666;">Appointment Date</td><td style="padding:4px 0;text-align:right;">' . $date . '</td></tr>
              <tr><td style="padding:4px 0;color:#666;">Appointment Time</td><td style="padding:4px 0;text-align:right;">' . $time . '</td></tr>
              <tr><td style="padding:4px 0;color:#666;">Treatment</td><td style="padding:4px 0;text-align:right;">' . $treatment . '</td></tr>
              <tr><td style="padding:4px 0;color:#666;">Amount</td><td style="padding:4px 0;text-align:right;">₱' . $amt . '</td></tr>
              <tr><td style="padding:4px 0;color:#666;">Payment Method</td><td style="padding:4px 0;text-align:right;">' . $meth . '</td></tr>
              <tr><td style="padding:4px 0;color:#666;">Paid At</td><td style="padding:4px 0;text-align:right;">' . $paid . '</td></tr>
              ' . ($notes ? '<tr><td style="padding:4px 0;color:#666;">Notes</td><td style="padding:4px 0;text-align:right;">' . $notes . '</td></tr>' : '') . '
            </table>

            <hr style="border:none;border-top:1px solid #e9ecef;margin:16px 0;">

            <p style="margin:0;font-size:12px;color:#999;text-align:center;">
              If you did not authorize this payment, please contact TOOTH IMPRESSION immediately.<br>
              This is an automated email, please do not reply.
            </p>
          </div>
        </div>';

        $mail->AltBody =
"TOOTH IMPRESSION Appointment Receipt

Full Name: $fn
Appointment Date: $date
Appointment Time: $time
Treatment: $treatment
Amount: ₱$amt
Payment Method: $meth
Paid At: $paid
" . ($notes ? "Notes: $notes\n" : "");

        $ok = $mail->send();
        return ['ok' => $ok, 'error' => $ok ? null : $mail->ErrorInfo];

    } catch (Exception $e) {
        return ['ok' => false, 'error' => $mail->ErrorInfo ?: $e->getMessage()];
    }
}

/**
 * Send a simple login notification email.
 */
function sendLoginNoticeEmail(string $toEmail, string $toName, ?string $ip = null): array
{
    global $mailConfig;
    
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = $mailConfig['host'];
        $mail->SMTPAuth   = true;
        $mail->Username   = $mailConfig['username'];
        $mail->Password   = $mailConfig['password'];
        $mail->SMTPSecure = $mailConfig['port'] === 465 ? PHPMailer::ENCRYPTION_SMTPS : PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = $mailConfig['port'];
        $mail->CharSet    = 'UTF-8';

        $mail->setFrom($mailConfig['from_email'], $mailConfig['from_name']);
        $mail->clearAllRecipients();
        $mail->addAddress($toEmail, $toName);

        $time   = date('Y-m-d H:i:s');
        $ipText = $ip ? "IP Address: {$ip}" : 'IP Address: (not available)';

        $mail->isHTML(true);
        $mail->Subject = 'TOOTH IMPRESSION Login Notification';

        $mail->Body = '
          <div style="background:#f8f9fa;color:#333;padding:24px;font-family:Arial,Helvetica,sans-serif;">
            <div style="max-width:520px;margin:0 auto;background:#ffffff;border:1px solid #dee2e6;border-radius:12px;padding:20px;">
              <h2 style="color:#2d7560;margin:0 0 10px;font-weight:700;">Login Alert</h2>
              <p style="font-size:14px;margin:0 0 12px;">
                Hi '.htmlspecialchars($toName,ENT_QUOTES,'UTF-8').',<br>
                Someone just logged in to your TOOTH IMPRESSION account.
              </p>

              <table style="width:100%;font-size:13px;color:#333;">
                <tr><td style="padding:4px 0;color:#666;">Time</td><td style="padding:4px 0;text-align:right;">'.$time.'</td></tr>
                <tr><td style="padding:4px 0;color:#666;">'.$ipText.'</td><td></td></tr>
              </table>

              <p style="margin:14px 0 0;font-size:12px;color:#999;">
                If this wasn\'t you, please contact TOOTH IMPRESSION staff immediately.
              </p>
            </div>
          </div>';

        $mail->AltBody =
"TOOTH IMPRESSION Login Notification

Hi {$toName},

Someone just logged in to your TOOTH IMPRESSION account.

Time: {$time}
{$ipText}

If this wasnâ€™t you, please contact TOOTH IMPRESSION staff immediately.";

        $ok = $mail->send();
        return ['ok' => $ok, 'error' => $ok ? null : $mail->ErrorInfo];

    } catch (Exception $e) {
        return ['ok' => false, 'error' => $mail->ErrorInfo ?: $e->getMessage()];
    }
}


/**
 * Send registration payment instructions after user signs up.
 *
 * @param string      $toEmail
 * @param string      $toName
 * @param string      $idNumber
 * @param string|null $deadlineText  e.g. "Nov 23, 2025 9:48am"
 *
 * @return array ['ok' => bool, 'error' => string|null]
 */
function sendRegistrationFeeEmail($toEmail, $toName, $idNumber, $deadlineText = null)
{
    global $mailConfig;
    
    $mail = new PHPMailer(true);

    try {
        // --- SMTP setup (same as your other mail functions) ---
        $mail->isSMTP();
        $mail->Host       = $mailConfig['host'];
        $mail->SMTPAuth   = true;
        $mail->Username   = $mailConfig['username'];
        $mail->Password   = $mailConfig['password'];
        $mail->SMTPSecure = $mailConfig['port'] === 465 ? PHPMailer::ENCRYPTION_SMTPS : PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = $mailConfig['port'];
        $mail->CharSet    = 'UTF-8';

        $mail->setFrom($mailConfig['from_email'], $mailConfig['from_name']);
        $mail->clearAllRecipients();
        $mail->addAddress($toEmail, $toName);

        // Optional embedded logo
        $logoHtml = '';
        if (defined('LOGO_PATH') && is_file(LOGO_PATH)) {
            $mail->addEmbeddedImage(LOGO_PATH, 'tooth_logo_reg', basename(LOGO_PATH));
            $logoHtml = '<img src="cid:tooth_logo_reg" alt="TOOTH IMPRESSION" width="80" height="80" style="display:block;margin:0 auto 12px;border-radius:8px;">';
        }

        $escName     = htmlspecialchars($toName, ENT_QUOTES, 'UTF-8');
        $escId       = htmlspecialchars($idNumber, ENT_QUOTES, 'UTF-8');
        $escDeadline = htmlspecialchars($deadlineText ?: 'within 48 hours from registration', ENT_QUOTES, 'UTF-8');

        $mail->isHTML(true);
        $mail->Subject = 'TOOTH IMPRESSION Registration – Complete Your Payment';

        // HTML body (with 48-hour countdown text + membership options)
        $mail->Body = '
        <div style="background:#0b0b0b;color:#f1f1f1;padding:24px;font-family:Arial,Helvetica,sans-serif;">
          <div style="max-width:560px;margin:0 auto;background:#141414;border:1px solid #262626;border-radius:12px;padding:24px;">
            <div style="text-align:center;">
              ' . $logoHtml . '
              <h2 style="color:#2d7560;margin:0 0 8px;font-weight:700;">Welcome to TOOTH IMPRESSION</h2>
              <p style="margin:0 0 10px;font-size:14px;color:#e5e5e5;">
                Hi ' . $escName . ', thank you for registering.
              </p>
              <p style="margin:0 0 10px;font-size:13px;color:#cccccc;">
                Your ID Number: <strong>' . $escId . '</strong><br>
                A <strong>48-hour countdown</strong> has started from the moment you registered.<br>
                Please settle your registration / membership payment within 48 hours
                (deadline: <strong>' . $escDeadline . '</strong>).
              </p>
              <p style="margin:0 0 12px;font-size:12px;color:#ffb3b3;">
                If payment is not settled within 48 hours, your registration may be cancelled.
              </p>
            </div>

            <hr style="border:none;border-top:1px solid #2a2a2a;margin:16px 0;">

            <h3 style="font-size:15px;color:#ff6b6b;margin:0 0 8px;">Available Membership Options</h3>

            <div style="font-size:13px;line-height:1.5;color:#f1f1f1;">
              <p style="margin:6px 0 4px;"><strong>Bodybuilding</strong></p>
              <ul style="margin:0 0 8px 18px;padding:0;">
                <li>1 Month Pass Â· â‚±550.00 Â· 1 month (without trainer)</li>
                <li>1 Month Pass Â· â‚±3,000.00 Â· 1 month (with trainer)</li>
              </ul>

              <p style="margin:6px 0 4px;"><strong>Zumba</strong></p>
              <ul style="margin:0 0 8px 18px;padding:0;">
                <li>1 Month Pass Â· â‚±1,000.00 Â· 1 month</li>
              </ul>

              <p style="margin:6px 0 4px;"><strong>Boxing</strong></p>
              <ul style="margin:0 0 8px 18px;padding:0;">
                <li>1 Month Pass Â· â‚±850.00 Â· 1 month (all access)</li>
                <li>1 Month Pass Â· â‚±2,000.00 Â· 1 month (10 sessions with personal trainer)</li>
                <li>1 Month Pass Â· â‚±2,850.00 Â· 1 month (all access + 10 sessions with personal trainer)</li>
              </ul>

              <p style="margin:6px 0 4px;"><strong>Muay Thai</strong></p>
              <ul style="margin:0 0 8px 18px;padding:0;">
                <li>1 Month Pass Â· â‚±850.00 Â· 1 month (all access)</li>
                <li>1 Month Pass Â· â‚±2,000.00 Â· 1 month (10 sessions with personal trainer)</li>
                <li>1 Month Pass Â· â‚±2,850.00 Â· 1 month (all access + 10 sessions with personal trainer)</li>
              </ul>
            </div>

            <hr style="border:none;border-top:1px solid #2a2a2a;margin:16px 0;">

            <p style="margin:0 0 4px;font-size:12px;color:#aaaaaa;">
              Please visit the RJL Fitness front desk or staff to pay and activate your membership.
            </p>
            <p style="margin:0;font-size:11px;color:#777777;">
              This is an automated email. If you did not register this account, please contact RJL Fitness immediately.
            </p>
          </div>
        </div>';

        // Plain text version
        $mail->AltBody =
"RJL Fitness Registration â€“ Complete Your Payment

Hi {$toName},

Thank you for registering.
ID Number: {$idNumber}

A 48-hour countdown has started from the moment you registered.
Please settle your registration / membership payment within 48 hours
(deadline: {$escDeadline}).

Available membership options:

Bodybuilding
- 1 Month Pass Â· â‚±550.00 Â· 1 month (without trainer)
- 1 Month Pass Â· â‚±3,000.00 Â· 1 month (with trainer)

Zumba
- 1 Month Pass Â· â‚±1,000.00 Â· 1 month

Boxing
- 1 Month Pass Â· â‚±850.00 Â· 1 month (all access)
- 1 Month Pass Â· â‚±2,000.00 Â· 1 month (10 sessions with personal trainer)
- 1 Month Pass Â· â‚±2,850.00 Â· 1 month (all access + 10 sessions with personal trainer)

Muay Thai
- 1 Month Pass Â· â‚±850.00 Â· 1 month (all access)
- 1 Month Pass Â· â‚±2,000.00 Â· 1 month (10 sessions with personal trainer)
- 1 Month Pass Â· â‚±2,850.00 Â· 1 month (all access + 10 sessions with personal trainer)

If payment is not settled within 48 hours, your registration may be cancelled.

Please contact RJL Fitness staff for any questions.";

        $ok = $mail->send();
        return ['ok' => $ok, 'error' => $ok ? null : $mail->ErrorInfo];

    } catch (Exception $e) {
        return ['ok' => false, 'error' => $mail->ErrorInfo ?: $e->getMessage()];
    }
}
/**
 * Send wallet load receipt email.
 *
 * @param string $toEmail
 * @param string $toName
 * @param array  $receipt keys:
 *   full_name, id_number, role, staff_name,
 *   amount, old_balance, new_balance, loaded_at
 *
 * @return array ['ok' => bool, 'error' => string|null]
 */
function sendWalletLoadReceiptEmail(string $toEmail, string $toName, array $receipt): array
{
    $mail = new PHPMailer(true);

    try {
        // --- SMTP ---
        $mail->isSMTP();
        $mail->Host       = SMTP_HOST;
        $mail->SMTPAuth   = true;
        $mail->Username   = SMTP_USER;
        $mail->Password   = SMTP_PASS;
        $mail->SMTPSecure = SMTP_SECURE;
        $mail->Port       = SMTP_PORT;
        $mail->CharSet    = 'UTF-8';

        // --- From / To ---
        $mail->setFrom(FROM_EMAIL, FROM_NAME);
        $mail->clearAllRecipients();
        $mail->addAddress($toEmail, $toName);

        // --- Optional embedded logo ---
        $logoHtml = '';
        if (is_file(LOGO_PATH)) {
            $mail->addEmbeddedImage(LOGO_PATH, 'rjl_logo', basename(LOGO_PATH));
            $logoHtml = '<img src="cid:rjl_logo" alt="RJL Fitness" width="80" height="80" style="display:block;margin:0 auto 12px;border-radius:8px;">';
        }

        // Prepare values
        $fn   = htmlspecialchars($receipt['full_name']   ?? '', ENT_QUOTES, 'UTF-8');
        $idn  = htmlspecialchars($receipt['id_number']   ?? '', ENT_QUOTES, 'UTF-8');
        $role = htmlspecialchars($receipt['role']        ?? '', ENT_QUOTES, 'UTF-8');
        $staff= htmlspecialchars($receipt['staff_name']  ?? '', ENT_QUOTES, 'UTF-8');
        $amt  = number_format((float)($receipt['amount'] ?? 0), 2);
        $oldb = number_format((float)($receipt['old_balance'] ?? 0), 2);
        $newb = number_format((float)($receipt['new_balance'] ?? 0), 2);
        $time = htmlspecialchars($receipt['loaded_at']   ?? '', ENT_QUOTES, 'UTF-8');

        $mail->isHTML(true);
        $mail->Subject = 'RJL Fitness Wallet Load Receipt';

        $mail->Body = '
        <div style="background:#0b0b0b;color:#f1f1f1;padding:24px;font-family:Arial,Helvetica,sans-serif;">
          <div style="max-width:560px;margin:0 auto;background:#141414;border:1px solid #262626;border-radius:12px;padding:24px;">
            <div style="text-align:center;">
              ' . $logoHtml . '
              <h2 style="color:#ff6b6b;margin:0 0 8px;font-weight:700;">Wallet Load Receipt</h2>
              <p style="margin:0 0 12px;font-size:14px;color:#e5e5e5;">Your wallet has been loaded, ' . $fn . '.</p>
            </div>

            <hr style="border:none;border-top:1px solid #2a2a2a;margin:16px 0;">

            <table style="width:100%;font-size:13px;color:#f1f1f1;">
              <tr><td style="padding:4px 0;color:#aaaaaa;">Full Name</td><td style="padding:4px 0;text-align:right;">' . $fn . '</td></tr>
              <tr><td style="padding:4px 0;color:#aaaaaa;">ID Number</td><td style="padding:4px 0;text-align:right;">' . $idn . '</td></tr>
              <tr><td style="padding:4px 0;color:#aaaaaa;">Role</td><td style="padding:4px 0;text-align:right;">' . $role . '</td></tr>
              <tr><td style="padding:4px 0;color:#aaaaaa;">Staff</td><td style="padding:4px 0;text-align:right;">' . $staff . '</td></tr>
              <tr><td style="padding:4px 0;color:#aaaaaa;">Amount Loaded</td><td style="padding:4px 0;text-align:right;">â‚±' . $amt . '</td></tr>
              <tr><td style="padding:4px 0;color:#aaaaaa;">Old Wallet Balance</td><td style="padding:4px 0;text-align:right;">â‚±' . $oldb . '</td></tr>
              <tr><td style="padding:4px 0;color:#aaaaaa;">New Wallet Balance</td><td style="padding:4px 0;text-align:right;">â‚±' . $newb . '</td></tr>
              <tr><td style="padding:4px 0;color:#aaaaaa;">Loaded At</td><td style="padding:4px 0;text-align:right;">' . $time . '</td></tr>
            </table>

            <hr style="border:none;border-top:1px solid #2a2a2a;margin:16px 0;">

            <p style="margin:0;font-size:12px;color:#aaaaaa;text-align:center;">
              If you did not authorize this wallet load, please contact the RJL Fitness administrator immediately.<br>
              This is an automated email, please do not reply.
            </p>
          </div>
        </div>';

        $mail->AltBody =
"RJL Fitness Wallet Load Receipt

Full Name: $fn
ID Number: $idn
Role: $role
Staff: $staff
Amount Loaded: â‚±$amt
Old Wallet Balance: â‚±$oldb
New Wallet Balance: â‚±$newb
Loaded At: $time
";

        $ok = $mail->send();
        return ['ok' => $ok, 'error' => $ok ? null : $mail->ErrorInfo];

    } catch (Exception $e) {
        return ['ok' => false, 'error' => $mail->ErrorInfo ?: $e->getMessage()];
    }
}

/**
 * âœ… NEW: Email when staff approve a registration in pending_users.php
 */
function sendRegistrationApprovedEmail(string $toEmail, string $toName, string $idNumber): array
{
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = SMTP_HOST;
        $mail->SMTPAuth   = true;
        $mail->Username   = SMTP_USER;
        $mail->Password   = SMTP_PASS;
        $mail->SMTPSecure = SMTP_SECURE;
        $mail->Port       = SMTP_PORT;
        $mail->CharSet    = 'UTF-8';

        $mail->setFrom(FROM_EMAIL, FROM_NAME);
        $mail->clearAllRecipients();
        $mail->addAddress($toEmail, $toName);

        $logoHtml = '';
        if (is_file(LOGO_PATH)) {
            $mail->addEmbeddedImage(LOGO_PATH, 'rjl_logo_reg_ok', basename(LOGO_PATH));
            $logoHtml = '<img src="cid:rjl_logo_reg_ok" alt="RJL Fitness" width="80" height="80" style="display:block;margin:0 auto 12px;border-radius:8px;">';
        }

        $escName = htmlspecialchars($toName, ENT_QUOTES, 'UTF-8');
        $escId   = htmlspecialchars($idNumber, ENT_QUOTES, 'UTF-8');

        $mail->isHTML(true);
        $mail->Subject = 'RJL Fitness Registration Approved';

        $mail->Body = '
        <div style="background:#0b0b0b;color:#f1f1f1;padding:24px;font-family:Arial,Helvetica,sans-serif;">
          <div style="max-width:560px;margin:0 auto;background:#141414;border:1px solid #262626;border-radius:12px;padding:24px;text-align:center;">
            ' . $logoHtml . '
            <h2 style="color:#4ade80;margin:0 0 8px;font-weight:700;">Registration Approved</h2>
            <p style="margin:0 0 10px;font-size:14px;color:#e5e5e5;">
              Hi ' . $escName . ', your registration has been <strong>approved</strong>.
            </p>
            <p style="margin:0 0 10px;font-size:13px;color:#cccccc;">
              Your ID Number: <strong>' . $escId . '</strong><br>
              You can now log in using your account and start using RJL Fitness services.
            </p>
            <p style="margin:0 0 12px;font-size:13px;color:#f97316;">
              Thank you for joining RJL Fitness. See you at the gym!
            </p>
          </div>
        </div>';

        $mail->AltBody = "RJL Fitness Registration Approved

Hi {$toName},

Your registration has been approved.
ID Number: {$idNumber}

You can now log in and use your RJL Fitness account.
Thank you for joining RJL Fitness.";

        $ok = $mail->send();
        return ['ok' => $ok, 'error' => $ok ? null : $mail->ErrorInfo];

    } catch (Exception $e) {
        return ['ok' => false, 'error' => $mail->ErrorInfo ?: $e->getMessage()];
    }
}


/**
 * âœ… NEW: Email when staff approve a VALID ID image.
 */
function sendValidIdApprovedEmail(string $toEmail, string $toName, string $idNumber): array
{
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = SMTP_HOST;
        $mail->SMTPAuth   = true;
        $mail->Username   = SMTP_USER;
        $mail->Password   = SMTP_PASS;
        $mail->SMTPSecure = SMTP_SECURE;
        $mail->Port       = SMTP_PORT;
        $mail->CharSet    = 'UTF-8';

        $mail->setFrom(FROM_EMAIL, FROM_NAME);
        $mail->clearAllRecipients();
        $mail->addAddress($toEmail, $toName);

        $logoHtml = '';
        if (is_file(LOGO_PATH)) {
            $mail->addEmbeddedImage(LOGO_PATH, 'rjl_logo_id_ok', basename(LOGO_PATH));
            $logoHtml = '<img src="cid:rjl_logo_id_ok" alt="RJL Fitness" width="80" height="80" style="display:block;margin:0 auto 12px;border-radius:8px;">';
        }

        $escName = htmlspecialchars($toName, ENT_QUOTES, 'UTF-8');
        $escId   = htmlspecialchars($idNumber, ENT_QUOTES, 'UTF-8');

        $mail->isHTML(true);
        $mail->Subject = 'RJL Fitness â€“ Valid ID Approved';

        $mail->Body = '
        <div style="background:#0b0b0b;color:#f1f1f1;padding:24px;font-family:Arial,Helvetica,sans-serif;">
          <div style="max-width:560px;margin:0 auto;background:#141414;border:1px solid #262626;border-radius:12px;padding:24px;text-align:center;">
            ' . $logoHtml . '
            <h2 style="color:#4ade80;margin:0 0 8px;font-weight:700;">Valid ID Approved</h2>
            <p style="margin:0 0 10px;font-size:14px;color:#e5e5e5;">
              Hi ' . $escName . ', your submitted valid ID has been <strong>approved</strong>.
            </p>
            <p style="margin:0 0 10px;font-size:13px;color:#cccccc;">
              ID Number: <strong>' . $escId . '</strong><br>
              Your account verification is now complete.
            </p>
            <p style="margin:0 0 12px;font-size:13px;color:#f97316;">
              You can now fully use your RJL Fitness membership and features that require a verified ID.
            </p>
          </div>
        </div>';

        $mail->AltBody = "RJL Fitness â€“ Valid ID Approved

Hi {$toName},

Your valid ID has been approved.
ID Number: {$idNumber}

Your account verification is now complete and you can fully use the system.";

        $ok = $mail->send();
        return ['ok' => $ok, 'error' => $ok ? null : $mail->ErrorInfo];

    } catch (Exception $e) {
        return ['ok' => false, 'error' => $mail->ErrorInfo ?: $e->getMessage()];
    }
}
