<?php
require_once 'customer_auth.php';
require_once 'db.php';
require_once 'mail_helper.php';

$messageFeedback = '';

if (!$customerLoggedIn) {
    header('Location: customer_login.php');
    exit;
}

if (isset($_GET['mark_reply_read'])) {
    $msgId = intval($_GET['mark_reply_read']);
    $update = $conn->prepare("UPDATE admin_replies SET status = 'read' WHERE id = ? AND customer_email = ?");
    $update->bind_param('is', $msgId, $customerEmail);
    $update->execute();
    header('Location: customer_dashboard.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['reply_submit'])) {
    $replyId = intval($_POST['reply_id']);
    $replySubject = trim($_POST['reply_subject']);
    $replyMessage = trim($_POST['reply_message']);

    if ($replyMessage === '') {
        $messageFeedback = 'Please enter your reply message.';
    } else {
        $mailConfig = require 'mail_config.php';
        $adminEmail = $mailConfig['username'] ?? '';
        if (empty($adminEmail)) {
            $messageFeedback = 'Admin contact email is not configured yet.';
        } else {
            $customerName = $customer['first_name'] . ' ' . $customer['last_name'];
            $emailHtml = "<h2>Reply from Customer: " . htmlspecialchars($replySubject, ENT_QUOTES, 'UTF-8') . "</h2>" .
                         "<p><strong>From:</strong> " . htmlspecialchars($customerName, ENT_QUOTES, 'UTF-8') . " (" . htmlspecialchars($customer['email'], ENT_QUOTES, 'UTF-8') . ")</p>" .
                         "<p><strong>Message:</strong></p><p>" . nl2br(htmlspecialchars($replyMessage, ENT_QUOTES, 'UTF-8')) . "</p>";

            $sendResult = sendEmail($adminEmail, "[Customer Reply] " . $replySubject, $emailHtml);
            if (is_array($sendResult) && !empty($sendResult['success'])) {
                $messageFeedback = 'Reply sent successfully to admin.';
                // Mark the original message as read
                $update = $conn->prepare("UPDATE admin_replies SET status = 'read' WHERE id = ? AND customer_email = ?");
                $update->bind_param('is', $replyId, $customerEmail);
                $update->execute();
            } else {
                $messageFeedback = 'Failed to send reply: ' . (is_array($sendResult) ? $sendResult['message'] : 'Unknown error');
            }
        }
    }
    header('Location: customer_dashboard.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cancel_appointment'])) {
    $appointmentId = intval($_POST['appointment_id']);
    $cancelStmt = $conn->prepare('DELETE FROM appointments WHERE id = ? AND email = ?');
    $cancelStmt->bind_param('is', $appointmentId, $customerEmail);
    if ($cancelStmt->execute()) {
        $messageFeedback = 'Appointment cancelled successfully.';
    } else {
        $messageFeedback = 'Failed to cancel appointment. Please try again.';
    }
    $cancelStmt->close();
    header('Location: customer_dashboard.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['contact_admin_submit'])) {
    $subject = trim($_POST['contact_subject'] ?? 'Customer Support Request');
    $body = trim($_POST['contact_message'] ?? '');

    if ($body === '') {
        $messageFeedback = 'Please enter your message for the admin.';
    } else {
        $mailConfig = require 'mail_config.php';
        $adminEmail = $mailConfig['username'] ?? '';
        if (empty($adminEmail)) {
            $messageFeedback = 'Admin contact email is not configured yet.';
        } else {
            $customerName = trim($_POST['customer_name'] ?? ($customerName ?? ''));
            $customerEmailAddress = trim($_POST['customer_email'] ?? ($customer['email'] ?? ''));
            $emailHtml = "<h2>New Message from Customer Portal</h2>" .
                         "<p><strong>Name:</strong> " . htmlspecialchars($customerName, ENT_QUOTES, 'UTF-8') . "</p>" .
                         "<p><strong>Email:</strong> " . htmlspecialchars($customerEmailAddress, ENT_QUOTES, 'UTF-8') . "</p>" .
                         "<p><strong>Subject:</strong> " . htmlspecialchars($subject, ENT_QUOTES, 'UTF-8') . "</p>" .
                         "<p><strong>Message:</strong></p><p>" . nl2br(htmlspecialchars($body, ENT_QUOTES, 'UTF-8')) . "</p>";

            // save message in admin_messages for admin-side notifications
            $customerId = $customer['id'] ?? null;
            $insertMsg = $conn->prepare('INSERT INTO admin_messages (customer_id, customer_name, customer_email, subject, message, status) VALUES (?, ?, ?, ?, ?, ? )');
            $status = 'unread';
            $insertMsg->bind_param('isssss', $customerId, $customerName, $customerEmailAddress, $subject, $body, $status);
            $insertMsg->execute();

            $sendResult = sendEmail($adminEmail, "[Customer Message] " . $subject, $emailHtml);
            $messageFeedback = $sendResult['message'];
        }
    }
}

// Get customer details
$stmt = $conn->prepare('SELECT id, first_name, last_name, email, phone, created_at FROM customers WHERE email = ? LIMIT 1');
$stmt->bind_param('s', $customerEmail);
$stmt->execute();
$result = $stmt->get_result();
$customer = $result->fetch_assoc();

// Get appointments
$appointments = [];
$aptStmt = $conn->prepare('SELECT id, treatment, appointment_date, appointment_time, message, created_at FROM appointments WHERE email = ? ORDER BY appointment_date DESC');
$aptStmt->bind_param('s', $customerEmail);
$aptStmt->execute();
$aptResult = $aptStmt->get_result();

while ($row = $aptResult->fetch_assoc()) {
    $appointments[] = $row;
}

// Get inbox messages from admin_replies (admin messages to customer)
$inboxMessages = [];
$unreadInboxCount = 0;
$inboxStmt = $conn->prepare('SELECT id, subject, reply_message AS message, status, created_at FROM admin_replies WHERE customer_email = ? ORDER BY created_at DESC');
$inboxStmt->bind_param('s', $customerEmail);
$inboxStmt->execute();
$inboxResult = $inboxStmt->get_result();
while ($row = $inboxResult->fetch_assoc()) {
    $inboxMessages[] = $row;
    if ($row['status'] === 'unread') {
        $unreadInboxCount++;
    }
}
$inboxStmt->close();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account - TOOTH IMPRESSION</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
        }

        .navbar-custom {
            background-color: #2d7560 !important;
            border-radius: 0 0 30px 30px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            padding: 1rem 0;
        }

        .navbar-custom .navbar-brand {
            color: white !important;
        }

        .navbar-custom .nav-link {
            color: white !important;
            font-weight: 600;
            margin: 0 10px;
        }

        .navbar-custom .nav-link:hover {
            color: #d4e5e1 !important;
        }

        .dashboard-header {
            background: linear-gradient(135deg, #2d7560 0%, #245249 100%);
            color: white;
            padding: 40px 20px;
            margin-bottom: 30px;
            border-radius: 0 0 30px 30px;
        }

        .dashboard-header h1 {
            font-size: 2rem;
            font-weight: 700;
            margin: 0;
        }

        .dashboard-header p {
            margin: 10px 0 0 0;
            opacity: 0.9;
        }

        .profile-card {
            background: white;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        .profile-info {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .info-item {
            padding: 15px;
            background-color: #f9f9f9;
            border-radius: 6px;
            border-left: 3px solid #2d7560;
        }

        .info-item strong {
            color: #2d7560;
            display: block;
            margin-bottom: 5px;
        }

        .info-item span {
            color: #666;
        }

        .appointments-section {
            margin-bottom: 30px;
        }

        .section-title {
            color: #2d7560;
            font-weight: 700;
            font-size: 1.3rem;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .appointment-card {
            background: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin-bottom: 15px;
            border-left: 4px solid #2d7560;
            transition: all 0.3s ease;
        }

        .appointment-card:hover {
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            transform: translateY(-2px);
        }

        .appointment-card h5 {
            color: #2d7560;
            margin: 0 0 15px 0;
            font-weight: 700;
        }

        .appointment-details {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 15px;
            margin-bottom: 15px;
        }

        .detail-item {
            padding: 10px;
            background-color: #f9f9f9;
            border-radius: 4px;
            font-size: 0.9rem;
        }

        .detail-item strong {
            color: #2d7560;
            display: block;
            margin-bottom: 3px;
            font-size: 0.85rem;
        }

        .btn-custom {
            background: linear-gradient(135deg, #2d7560 0%, #245249 100%);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .btn-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(45, 117, 96, 0.3);
            color: white;
            text-decoration: none;
        }

        .btn-logout {
            background: #c84444;
        }

        .btn-logout:hover {
            box-shadow: 0 4px 12px rgba(200, 68, 68, 0.3);
        }

        .empty-state {
            background: white;
            border-radius: 8px;
            padding: 40px;
            text-align: center;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .empty-state i {
            font-size: 3rem;
            color: #ddd;
            margin-bottom: 15px;
        }

        @keyframes pulse {
            0%, 100% {
                opacity: 1;
            }
            50% {
                opacity: 0.7;
            }
        }

        .unread-message {
            background: linear-gradient(135deg, #fff3e0 0%, #ffe0b2 100%) !important;
            border-left: 4px solid #ff9800 !important;
            border-right: 1px solid #ffcc80;
            box-shadow: 0 2px 8px rgba(255, 152, 0, 0.2);
        }

        .unread-message::before {
            content: "â— NEW";
            display: inline-block;
            background: #ff9800;
            color: white;
            padding: 2px 8px;
            border-radius: 12px;
            font-size: 0.75rem;
            font-weight: bold;
            margin-right: 8px;
        }

        @media (max-width: 768px) {
            .profile-info {
                grid-template-columns: 1fr;
            }

            .appointment-details {
                grid-template-columns: 1fr;
            }

            .dashboard-header h1 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-custom sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="homes.php">
                <img src="image/logo.png" alt="TOOTH IMPRESSION" class="me-2" style="height: 50px;">
                <span class="fw-bold">TOOTH IMPRESSION</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" style="color: #2d7560 !important;" href="homes.php">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color: #2d7560 !important;" href="booking.php">BOOK APPOINTMENT</a>
                    </li>
                    <li class="nav-item">
                        <span class="badge bg-success ms-2" style="padding: 11px 11px; display: inline-block; font-size: 15px;" >
                            <i class="fas fa-user-circle"></i> <?= htmlspecialchars(substr($customerName, 0, 20), ENT_QUOTES, 'UTF-8') ?>
                        </span>
                    </li>
                    <?php if ($unreadInboxCount > 0): ?>
                        <li class="nav-item">
                            <a href="#inbox-section" class="badge bg-danger ms-2" style="padding: 0.5rem 0.8rem; display: inline-block; font-size: 0.85rem; cursor: pointer; text-decoration: none;">
                                <i class="fas fa-envelope"></i> <?= $unreadInboxCount ?> New Message<?= $unreadInboxCount > 1 ? 's' : '' ?>
                            </a>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <a class="nav-link btn-logout ms-2 px-3" href="customer_logout.php" style="background-color: #c84444; color: white; border-radius: 8px;">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Dashboard Header -->
    <div class="dashboard-header">
        <div class="container-lg">
            <h1><i class="fas fa-user-circle"></i> My Account</h1>
            <p>Welcome, <?= htmlspecialchars($customerName, ENT_QUOTES, 'UTF-8') ?>!</p>
        </div>
    </div>

    <!-- Notification Alert for Unread Messages -->
    <?php if ($unreadInboxCount > 0): ?>
        <div class="container-lg mt-3">
            <div class="alert alert-info alert-dismissible fade show" role="alert" style="background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%); border: 2px solid #2196F3;">
                <i class="fas fa-bell" style="color: #1976d2; font-size: 1.2rem; margin-right: 10px;"></i>
                <strong>You have <?= $unreadInboxCount ?> unread message<?= $unreadInboxCount > 1 ? 's' : '' ?> from admin!</strong>
                <span style="display: block; font-size: 0.9rem; margin-top: 5px;">Check your <a href="#inbox-section" style="color: #1976d2; font-weight: bold;">email inbox</a> for new replies.</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    <?php endif; ?>

    <!-- Main Content -->
    <div class="container-lg py-4">
        <!-- Profile Section -->
        <div class="profile-card">
            <h3 style="color: #2d7560; margin-bottom: 20px;">
                <i class="fas fa-id-card"></i> Profile Information
            </h3>
            <div class="profile-info">
                <div class="info-item">
                    <strong>Full Name</strong>
                    <span><?= htmlspecialchars($customer['first_name'] . ' ' . $customer['last_name'], ENT_QUOTES, 'UTF-8') ?></span>
                </div>
                <div class="info-item">
                    <strong>Email</strong>
                    <span><?= htmlspecialchars($customer['email'], ENT_QUOTES, 'UTF-8') ?></span>
                </div>
                <div class="info-item">
                    <strong>Phone</strong>
                    <span><?= !empty($customer['phone']) ? htmlspecialchars($customer['phone'], ENT_QUOTES, 'UTF-8') : 'Not provided' ?></span>
                </div>
                <div class="info-item">
                    <strong>Account Created</strong>
                    <span><?= date('M d, Y', strtotime($customer['created_at'])) ?></span>
                </div>
            </div>
        </div>


        <div class="profile-card">
            <h3 style="color: #2d7560; margin-bottom: 20px;" id="inbox-section"><i class="fas fa-inbox"></i> Email Inbox from Admin
                <?php if ($unreadInboxCount > 0): ?>
                    <span class="badge bg-danger ms-2" style="font-size: 0.9rem; padding: 0.5rem 0.7rem; animation: pulse 1.5s infinite;">
                        <i class="fas fa-bell"></i> <?= $unreadInboxCount ?> unread
                    </span>
                <?php else: ?>
                    <span class="badge bg-secondary ms-2" style="font-size: 0.9rem; padding: 0.5rem 0.7rem;">All read</span>
                <?php endif; ?>
            </h3>

            <?php if (!empty($inboxMessages)): ?>
                <div class="list-group">
                    <?php foreach ($inboxMessages as $msg): ?>
                        <div class="list-group-item <?= $msg['status'] === 'unread' ? 'unread-message' : '' ?>" style="padding: 15px;">
                            <div class="d-flex justify-content-between align-items-start">
                                <div style="flex-grow: 1;">
                                    <strong><?= htmlspecialchars($msg['subject'], ENT_QUOTES, 'UTF-8') ?></strong>
                                    <?php if ($msg['status'] === 'unread'): ?>
                                        <span class="badge bg-danger ms-2" style="font-size: 0.75rem;">Unread</span>
                                    <?php endif; ?>
                                    <br>
                                    <small class="text-muted"><i class="fas fa-clock"></i> <?= date('M d, Y H:i', strtotime($msg['created_at'])) ?></small>
                                </div>
                                <div style="margin-left: 10px;">
                                    <a class="btn btn-sm btn-primary me-2" data-bs-toggle="collapse" href="#replyForm<?= $msg['id'] ?>" role="button" aria-expanded="false" aria-controls="replyForm<?= $msg['id'] ?>">
                                        <i class="fas fa-reply"></i> Reply
                                    </a>
                                    <?php if ($msg['status'] === 'unread'): ?>
                                        <a href="customer_dashboard.php?mark_reply_read=<?= $msg['id'] ?>" class="btn btn-sm btn-success">Mark as Read</a>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <p class="mt-2 mb-0"><?= nl2br(htmlspecialchars($msg['message'], ENT_QUOTES, 'UTF-8')) ?></p>

                            <div class="collapse mt-3" id="replyForm<?= $msg['id'] ?>">
                                <div class="card card-body">
                                    <form method="POST" action="customer_dashboard.php">
                                        <input type="hidden" name="reply_id" value="<?= $msg['id'] ?>">
                                        <input type="hidden" name="reply_subject" value="<?= htmlspecialchars($msg['subject'], ENT_QUOTES, 'UTF-8') ?>">

                                        <div class="mb-2">
                                            <label class="form-label">To</label>
                                            <input class="form-control" type="text" value="Admin" disabled>
                                        </div>
                                        <div class="mb-2">
                                            <label class="form-label">Subject</label>
                                            <input class="form-control" type="text" value="Re: <?= htmlspecialchars($msg['subject'], ENT_QUOTES, 'UTF-8') ?>" disabled>
                                        </div>
                                        <div class="mb-2">
                                            <label class="form-label">Your Reply</label>
                                            <textarea name="reply_message" class="form-control" rows="4" required></textarea>
                                        </div>
                                        <button type="submit" name="reply_submit" class="btn btn-success">Send Reply</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <div class="alert alert-info mb-0">No admin messages yet.</div>
            <?php endif; ?>
        </div>

        <div class="profile-card">
            <h3 style="color: #2d7560; margin-bottom: 20px;"><i class="fas fa-paper-plane"></i> Send Message to Admin</h3>
            <?php if ($messageFeedback): ?>
                <div class="alert alert-info" role="alert"><?= htmlspecialchars($messageFeedback, ENT_QUOTES, 'UTF-8') ?></div>
            <?php endif; ?>
            <form method="POST" action="customer_dashboard.php">
                <div class="mb-3">
                    <label for="contact_subject" class="form-label"><strong>Subject</strong></label>
                    <input type="text" id="contact_subject" name="contact_subject" class="form-control" value="Support Request" required>
                </div>
                <div class="mb-3">
                    <label for="contact_message" class="form-label"><strong>Message</strong></label>
                    <textarea id="contact_message" name="contact_message" class="form-control" rows="5" placeholder="Write your message to the admin" required></textarea>
                </div>
                <input type="hidden" name="customer_name" value="<?= htmlspecialchars($customer['first_name'] . ' ' . $customer['last_name'], ENT_QUOTES, 'UTF-8') ?>">
                <input type="hidden" name="customer_email" value="<?= htmlspecialchars($customer['email'], ENT_QUOTES, 'UTF-8') ?>">
                <button type="submit" class="btn-custom" name="contact_admin_submit"><i class="fas fa-paper-plane"></i> Send Message</button>
            </form>
        </div>

        <!-- Appointments Section -->
        <div class="appointments-section">
            <h3 class="section-title">
                <i class="fas fa-calendar-check"></i> My Appointments (<?= count($appointments) ?>)
            </h3>

            <?php if (!empty($appointments)): ?>
                <?php foreach ($appointments as $apt): ?>
                    <div class="appointment-card">
                        <h5>
                            <i class="fas fa-tooth"></i> 
                            <?= htmlspecialchars($apt['treatment'], ENT_QUOTES, 'UTF-8') ?>
                        </h5>
                        
                        <div class="appointment-details">
                            <div class="detail-item">
                                <strong>Date</strong>
                                <span><?= date('M d, Y', strtotime($apt['appointment_date'])) ?></span>
                            </div>
                            <div class="detail-item">
                                <strong>Time</strong>
                                <span><?= htmlspecialchars($apt['appointment_time'], ENT_QUOTES, 'UTF-8') ?></span>
                            </div>
                            <div class="detail-item">
                                <strong>Booked On</strong>
                                <span><?= date('M d, Y', strtotime($apt['created_at'])) ?></span>
                            </div>
                        </div>

                        <?php if (!empty($apt['message'])): ?>
                            <div style="background-color: #f5f5f5; padding: 12px; border-radius: 4px; border-left: 3px solid #c84444;">
                                <strong style="color: #333; font-size: 0.9rem;">Your Notes:</strong>
                                <p style="margin: 5px 0 0 0; color: #666; font-size: 0.9rem;">
                                    <?= htmlspecialchars($apt['message'], ENT_QUOTES, 'UTF-8') ?>
                                </p>
                            </div>
                        <?php endif; ?>

                        <form method="POST" action="customer_dashboard.php" class="mt-3">
                            <input type="hidden" name="appointment_id" value="<?= intval($apt['id']) ?>">
                            <button type="submit" name="cancel_appointment" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure you want to cancel this appointment?');">
                                <i class="fas fa-times-circle"></i> Cancel Appointment
                            </button>
                        </form>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="empty-state">
                    <i class="fas fa-calendar-plus"></i>
                    <h5>No Appointments Yet</h5>
                    <p>You don't have any appointments scheduled. Book your first appointment now!</p>
                    <a href="booking.php" class="btn-custom">
                        <i class="fas fa-plus"></i> Book Appointment
                    </a>
                </div>
            <?php endif; ?>
        </div>

        <!-- Quick Actions -->
        <div class="profile-card">
            <h3 style="color: #2d7560; margin-bottom: 20px;"><i class="fas fa-cube"></i> Quick Actions</h3>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
                <a href="booking.php" class="btn-custom">
                    <i class="fas fa-calendar-plus"></i> Book New Appointment
                </a>
                <a href="customer_logout.php" class="btn-custom btn-logout">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-4 mt-5">
        <div class="container">
            <p class="mb-2">&copy; 2025 TOOTH IMPRESSION Dau Branch. All Rights Reserved.</p>
            <p class="text-muted small">Phone: (+63) 917 123 4567 | Email: info@toothimpression.com</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

