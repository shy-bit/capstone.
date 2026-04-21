<?php
require_once __DIR__ . '/../auth.php';
require_once __DIR__ . '/../db.php';
require_once __DIR__ . '/../mail_helper.php';

if (!$adminLoggedIn) {
    header('Location: login.php');
    exit;
}

$feedbackMessage = '';

if (isset($_GET['mark_read'])) {
    $msgId = intval($_GET['mark_read']);
    $update = $conn->prepare("UPDATE admin_messages SET status = 'read' WHERE id = ?");
    $update->bind_param('i', $msgId);
    $update->execute();
    header('Location: admin_messages.php');
    exit;
}

if (isset($_GET['delete'])) {
    $msgId = intval($_GET['delete']);
    $delete = $conn->prepare("DELETE FROM admin_messages WHERE id = ?");
    $delete->bind_param('i', $msgId);
    $delete->execute();
    header('Location: admin_messages.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['reply_id'], $_POST['reply_text'])) {
    $replyId = intval($_POST['reply_id']);
    $replyText = trim($_POST['reply_text']);
    $replyTo = filter_var($_POST['reply_to'], FILTER_VALIDATE_EMAIL);
    $replySubject = trim($_POST['reply_subject']);

    if ($replyTo && $replyText !== '') {
        $subject = 'Re: ' . $replySubject;
        $htmlMessage = nl2br(htmlspecialchars($replyText, ENT_QUOTES, 'UTF-8'));

        $sendResult = sendEmail($replyTo, $subject, $htmlMessage);

        if (is_array($sendResult) && !empty($sendResult['success'])) {
            $feedbackMessage = 'Reply sent successfully to ' . htmlspecialchars($replyTo, ENT_QUOTES, 'UTF-8');
            $markRead = $conn->prepare("UPDATE admin_messages SET status = 'read' WHERE id = ?");
            $markRead->bind_param('i', $replyId);
            $markRead->execute();
            $markRead->close();

            // Add reply record for customer notification
            $originalMsgStmt = $conn->prepare('SELECT customer_id, customer_name, customer_email FROM admin_messages WHERE id = ? LIMIT 1');
            $originalMsgStmt->bind_param('i', $replyId);
            $originalMsgStmt->execute();
            $originalMsg = $originalMsgStmt->get_result()->fetch_assoc();
            $originalMsgStmt->close();

            if ($originalMsg) {
                $replyInsert = $conn->prepare('INSERT INTO admin_replies (customer_id, customer_name, customer_email, subject, reply_message, status) VALUES (?, ?, ?, ?, ?, ?)');
                $status = 'unread';
                $replyInsert->bind_param('isssss', $originalMsg['customer_id'], $originalMsg['customer_name'], $originalMsg['customer_email'], $subject, $replyText, $status);
                $replyInsert->execute();
                $replyInsert->close();
            }

        } else {
            $errorMessage = is_array($sendResult) ? $sendResult['message'] : 'Unknown error';
            $feedbackMessage = 'Failed to send reply: ' . htmlspecialchars($errorMessage, ENT_QUOTES, 'UTF-8');
        }
    } else {
        $feedbackMessage = 'Please provide valid reply content and recipient email.';
    }
}

$messages = [];
$stmt = $conn->query("SELECT * FROM admin_messages ORDER BY created_at DESC");
if ($stmt) {
    while ($row = $stmt->fetch_assoc()) {
        $messages[] = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Messages - TOOTH IMPRESSION</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="container py-4">
        <h1>Customer Messages</h1>
        <p><a href="admin.php">Back to Dashboard</a></p>

        <?php if (!empty($feedbackMessage)): ?>
            <div class="alert alert-info"><?= htmlspecialchars($feedbackMessage, ENT_QUOTES, 'UTF-8') ?></div>
        <?php endif; ?>

        <?php if (empty($messages)): ?>
            <div class="alert alert-info">No messages yet.</div>
        <?php else: ?>
            <div class="list-group">
                <?php foreach ($messages as $msg): ?>
                    <div class="list-group-item <?php echo $msg['status'] === 'unread' ? 'list-group-item-warning' : ''; ?>">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <strong><?= htmlspecialchars($msg['customer_name'], ENT_QUOTES, 'UTF-8') ?></strong> (<a href="mailto:<?= htmlspecialchars($msg['customer_email'], ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars($msg['customer_email'], ENT_QUOTES, 'UTF-8') ?></a>)
                                <span class="badge bg-<?= $msg['status'] === 'unread' ? 'danger' : 'secondary' ?> ms-2"><?= htmlspecialchars($msg['status'], ENT_QUOTES, 'UTF-8') ?></span>
                            </div>
                            <small><?= date('M d, Y H:i', strtotime($msg['created_at'])) ?></small>
                        </div>
                        <h5 class="mt-2"><?= htmlspecialchars($msg['subject'], ENT_QUOTES, 'UTF-8') ?></h5>
                        <p><?= nl2br(htmlspecialchars($msg['message'], ENT_QUOTES, 'UTF-8')) ?></p>
                        <div class="mt-2">
                            <a class="btn btn-sm btn-primary me-2" data-bs-toggle="collapse" href="#replyForm<?= $msg['id'] ?>" role="button" aria-expanded="false" aria-controls="replyForm<?= $msg['id'] ?>">
                                <i class="fas fa-reply"></i> Reply
                            </a>
                            <?php if ($msg['status'] === 'unread'): ?>
                                <a href="admin_messages.php?mark_read=<?= $msg['id'] ?>" class="btn btn-sm btn-success me-2">Mark as Read</a>
                            <?php endif; ?>
                            <a href="admin_messages.php?delete=<?= $msg['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this message?')">Delete</a>
                        </div>

                        <div class="collapse mt-3" id="replyForm<?= $msg['id'] ?>">
                            <div class="card card-body">
                                <form method="POST" action="admin_messages.php">
                                    <input type="hidden" name="reply_id" value="<?= $msg['id'] ?>">
                                    <input type="hidden" name="reply_to" value="<?= htmlspecialchars($msg['customer_email'], ENT_QUOTES, 'UTF-8') ?>">
                                    <input type="hidden" name="reply_subject" value="<?= htmlspecialchars($msg['subject'], ENT_QUOTES, 'UTF-8') ?>">

                                    <div class="mb-2">
                                        <label class="form-label">To</label>
                                        <input class="form-control" type="text" value="<?= htmlspecialchars($msg['customer_email'], ENT_QUOTES, 'UTF-8') ?>" disabled>
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label">Subject</label>
                                        <input class="form-control" type="text" value="Re: <?= htmlspecialchars($msg['subject'], ENT_QUOTES, 'UTF-8') ?>" disabled>
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label">Message</label>
                                        <textarea name="reply_text" class="form-control" rows="4" required></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-success">Send Reply</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
