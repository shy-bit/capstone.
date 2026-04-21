<?php
/**
 * Email Log Viewer - Check all email sending activities
 */

define('EMAIL_LOG_FILE', __DIR__ . '/logs/email_log.txt');

// Check if logs directory exists
if (!is_dir(__DIR__ . '/logs')) {
    die("Email log directory not found. No emails have been sent yet.");
}

// Read the log file
$logContent = '';
$logExists = false;

if (file_exists(EMAIL_LOG_FILE)) {
    $logExists = true;
    $logContent = file_get_contents(EMAIL_LOG_FILE);
} else {
    $logContent = "No email logs found yet. Emails will be logged here.";
}

// Parse log entries
$logEntries = array_filter(array_reverse(explode("\n", $logContent)));
$successCount = 0;
$failedCount = 0;

foreach ($logEntries as $entry) {
    if (strpos($entry, 'SUCCESS') !== false) {
        $successCount++;
    } elseif (strpos($entry, 'FAILED') !== false) {
        $failedCount++;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Log Viewer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .log-container {
            background: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .log-entry {
            padding: 12px;
            margin: 8px 0;
            border-left: 4px solid #dee2e6;
            border-radius: 4px;
            font-family: 'Courier New', monospace;
            font-size: 12px;
            background-color: #f8f9fa;
        }
        .log-entry.success {
            border-left-color: #28a745;
            background-color: #f0f9f6;
        }
        .log-entry.failed {
            border-left-color: #dc3545;
            background-color: #fdf5f5;
        }
        .stats {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-bottom: 20px;
        }
        .stat-card {
            background: white;
            padding: 20px;
            border-radius: 8px;
            border-left: 4px solid #2d7560;
            text-align: center;
        }
        .stat-card h3 {
            color: #2d7560;
            font-size: 28px;
            margin: 10px 0;
        }
        .stat-card p {
            color: #666;
            margin: 0;
        }
        .stat-card.failed {
            border-left-color: #dc3545;
        }
        .stat-card.failed h3 {
            color: #dc3545;
        }
    </style>
</head>
<body>
    <div class="container mt-5 mb-5">
        <div class="row mb-4">
            <div class="col-md-12">
                <h1 class="mb-2"><i class="fas fa-envelope"></i> Email Log Viewer</h1>
                <p class="text-muted">Track all appointment confirmation and rejection emails sent by the system</p>
            </div>
        </div>

        <!-- Statistics -->
        <div class="stats">
            <div class="stat-card">
                <p>Emails Sent</p>
                <h3><?php echo $successCount; ?></h3>
            </div>
            <div class="stat-card failed">
                <p>Emails Failed</p>
                <h3><?php echo $failedCount; ?></h3>
            </div>
        </div>

        <!-- Log Content -->
        <div class="log-container">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="mb-0"><i class="fas fa-list"></i> Email Activity Log</h5>
                <button class="btn btn-sm btn-secondary" onclick="location.reload()">
                    <i class="fas fa-sync"></i> Refresh
                </button>
            </div>

            <hr>

            <?php if (empty($logEntries) || ($logExists === false)): ?>
                <div class="alert alert-info" role="alert">
                    <i class="fas fa-info-circle"></i> No email logs available yet. The log will populate when emails are sent.
                </div>
            <?php else: ?>
                <?php foreach ($logEntries as $entry): ?>
                    <?php
                    $isSuccess = strpos($entry, 'SUCCESS') !== false;
                    $classType = $isSuccess ? 'success' : 'failed';
                    $icon = $isSuccess ? 'fa-check-circle' : 'fa-exclamation-circle';
                    $iconClass = $isSuccess ? 'text-success' : 'text-danger';
                    ?>
                    <div class="log-entry <?php echo $classType; ?>">
                        <i class="fas <?php echo $icon; ?> <?php echo $iconClass; ?>"></i>
                        <?php echo htmlspecialchars($entry, ENT_QUOTES, 'UTF-8'); ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <!-- Debug Info -->
        <div class="mt-4">
            <div class="alert alert-secondary" role="alert">
                <h6><i class="fas fa-tools"></i> Debug Information</h6>
                <p class="mb-2"><strong>Log File Path:</strong> <code><?php echo EMAIL_LOG_FILE; ?></code></p>
                <p class="mb-0"><strong>Status:</strong> 
                    <?php if (file_exists(EMAIL_LOG_FILE)): ?>
                        <span class="badge bg-success">Active</span>
                    <?php else: ?>
                        <span class="badge bg-warning">Waiting for emails</span>
                    <?php endif; ?>
                </p>
            </div>
        </div>

        <!-- Back Button -->
        <div class="mt-4">
            <a href="admin.php" class="btn btn-primary">
                <i class="fas fa-arrow-left"></i> Back to Admin Dashboard
            </a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>