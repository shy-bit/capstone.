<?php
session_start();
require_once __DIR__ . '/../db.php';
require_once __DIR__ . '/../mail_helper.php';

if (empty($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit;
}

$id = intval($_GET['id'] ?? 0);
if ($id <= 0) {
    header('Location: admin.php');
    exit;
}

$stmt = $conn->prepare('SELECT first_name, last_name, email FROM appointments WHERE id = ? LIMIT 1');
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();
$customer = $result->fetch_assoc();

if (!$customer) {
    header('Location: admin.php');
    exit;
}

// Get customer_id from customers table
$customerStmt = $conn->prepare('SELECT id FROM customers WHERE email = ? LIMIT 1');
$customerStmt->bind_param('s', $customer['email']);
$customerStmt->execute();
$customerResult = $customerStmt->get_result();
$customerData = $customerResult->fetch_assoc();
$customerId = $customerData ? $customerData['id'] : 0;
$customerStmt->close();

$message = '';
$messageType = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $subject = trim($_POST['subject'] ?? '');
    $messageBody = trim($_POST['messageBody'] ?? '');
    $to = $customer['email']; // force send to customer email directly

    if ($subject === '' || $messageBody === '') {
        $message = 'Please fill in all fields.';
        $messageType = 'danger';
    } else {
        // Send email using mail helper
        $htmlMessage = "
        <html>
            <body>
                <div style='font-family: Arial, sans-serif; color: #333;'>
                    <div style='background-color: #2d7560; color: white; padding: 20px; text-align: center; border-radius: 5px;'>
                        <h2>TOOTH IMPRESSION Dau Branch</h2>
                    </div>
                    <div style='padding: 30px;'>
                        <p>Dear " . htmlspecialchars($customer['first_name'], ENT_QUOTES, 'UTF-8') . ",</p>
                        <div style='background-color: #f5f5f5; padding: 20px; border-left: 4px solid #2d7560; margin: 20px 0;'>
                            " . nl2br(htmlspecialchars($messageBody, ENT_QUOTES, 'UTF-8')) . "
                        </div>
                        <p>Best regards,<br><strong>TOOTH IMPRESSION Dau Branch Team</strong></p>
                        <p style='color: #999; font-size: 12px; margin-top: 30px;'>
                            Phone: (+63) 917 123 4567<br>
                            Located: Dau, Mabalacat, Pampanga, Philippines
                        </p>
                    </div>
                </div>
            </body>
        </html>";

        $result = sendEmail($to, $subject, $htmlMessage);

        if (is_array($result) && !empty($result['success'])) {
            $message = 'Email successfully sent and added to customer inbox.';
            $messageType = 'success';

            // Record the sent message in admin_replies so customer can see it in their inbox
            $status = 'unread';
            $insertMsg = $conn->prepare('INSERT INTO admin_replies (customer_id, customer_name, customer_email, subject, reply_message, status) VALUES (?, ?, ?, ?, ?, ?)');
            $customerName = $customer['first_name'] . ' ' . $customer['last_name'];
            $insertMsg->bind_param('isssss', $customerId, $customerName, $customer['email'], $subject, $messageBody, $status);
            $insertMsg->execute();
            $insertMsg->close();
        } else {
            $message = is_array($result) ? $result['message'] : 'Failed to send email to customer inbox.';
            $messageType = 'danger';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Contact Customer - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-custom sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="../homes.php">
                <img src="../image/logo.png" alt="TOOTH IMPRESSION Dau Branch" class="me-2" style="height: 50px;">
                <div>
                    <span class="fw-bold text-success">TOOTH IMPRESSION Dau Branch</span><br>
                    <small class="text-white-50" style="font-size: 0.8rem;"><i class="fas fa-user-shield text-success"></i> Admin Panel</small>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="admin.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-sm">
                    <div class="card-header" style="background-color: #2d7560; color: white;">
                        <h4 class="mb-0"><i class="fas fa-envelope"></i> Email Contact Customer</h4>
                    </div>
                    <div class="card-body">
        <div class="alert alert-info mb-4">
                            <strong>Customer Email:</strong> <a href="mailto:<?= htmlspecialchars($customer['email'], ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars($customer['email'], ENT_QUOTES, 'UTF-8') ?></a>
                        </div>

                        <?php if ($message): ?>
                            <div class="alert alert-<?= htmlspecialchars($messageType, ENT_QUOTES, 'UTF-8') ?>" role="alert">
                                <?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8') ?>
                            </div>
                        <?php endif; ?>

                        <form action="contact_customer.php?id=<?= $id ?>" method="post">
                            <div class="mb-3">
                                <label for="to" class="form-label">Send To (customer Gmail)</label>
                                <input type="email" id="to" class="form-control" value="<?= htmlspecialchars($customer['email'], ENT_QUOTES, 'UTF-8') ?>" readonly>
                                <input type="hidden" name="to" value="<?= htmlspecialchars($customer['email'], ENT_QUOTES, 'UTF-8') ?>">
                                <small class="text-muted">Email is fixed to customer address.</small>
                            </div>
                            <div class="mb-3">
                                <label for="subject" class="form-label">Subject</label>
                                <input type="text" id="subject" name="subject" class="form-control" placeholder="Email subject" required>
                            </div>

                            <div class="mb-3">
                                <label for="messageBody" class="form-label">Message</label>
                                <textarea id="messageBody" name="messageBody" class="form-control" rows="8" placeholder="Write your message here..." required></textarea>
                                <small class="text-muted">HTML formatting not supported. Use plain text.</small>
                            </div>

                            <div class="mb-3">
                                <button type="button" class="btn btn-outline-info btn-sm" onclick="togglePreview()">
                                    <i class="fas fa-eye"></i> Preview Email
                                </button>
                            </div>

                            <!-- Email Preview Section -->
                            <div id="emailPreview" class="card mb-3" style="display: none; border: 2px solid #2d7560;">
                                <div class="card-header" style="background-color: #e8f4f0;">
                                    <h6 class="mb-0"><strong>Email Preview</strong></h6>
                                </div>
                                <div class="card-body">
                                    <p><strong>To:</strong> <span id="previewTo"><?= htmlspecialchars($customer['email'], ENT_QUOTES, 'UTF-8') ?></span></p>
                                    <p><strong>Subject:</strong> <span id="previewSubject" style="font-style: italic; color: #666;"></span></p>
                                    <hr>
                                    <div style="font-family: Arial, sans-serif; color: #333; padding: 20px; background-color: #f9f9f9; border-radius: 5px;">
                                        <div style="background-color: #2d7560; color: white; padding: 15px; text-align: center; border-radius: 5px; margin-bottom: 20px;">
                                            <h5>TOOTH IMPRESSION Dau Branch</h5>
                                        </div>
                                        <p>Dear <strong>Customer</strong>,</p>
                                        <div style="background-color: #f5f5f5; padding: 15px; border-left: 4px solid #2d7560; margin: 20px 0;">
                                            <p id="previewMessage" style="margin: 0; white-space: pre-wrap;"></p>
                                        </div>
                                        <p>Best regards,<br><strong>TOOTH IMPRESSION Dau Branch Team</strong></p>
                                        <p style="color: #999; font-size: 12px; margin-top: 20px;">
                                            Phone: (+63) 917 123 4567<br>
                                            Located: Dau, Mabalacat, Pampanga, Philippines
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-paper-plane"></i> Send Email
                                </button>
                                <a href="admin.php" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left"></i> Back to Dashboard
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
                
                <div class="card mt-4">
                    <div class="card-header" style="background-color: #f5f5f5;">
                        <h5 class="mb-0">Quick Templates</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <small class="text-muted">Click to insert template:</small><br>
                            <button type="button" class="btn btn-outline-secondary btn-sm mt-2" onclick="insertAppointmentReminder()">Appointment Reminder</button>
                            <button type="button" class="btn btn-outline-secondary btn-sm mt-2" onclick="insertFollowUp()">Follow-up Message</button>
                            <button type="button" class="btn btn-outline-secondary btn-sm mt-2" onclick="insertThankYou()">Thank You</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle preview visibility
        function togglePreview() {
            const preview = document.getElementById('emailPreview');
            const subject = document.getElementById('subject').value;
            const message = document.getElementById('messageBody').value;

            if (!subject || !message) {
                alert('Please fill in both subject and message to preview.');
                return;
            }

            // Update preview content
            document.getElementById('previewSubject').textContent = subject;
            document.getElementById('previewMessage').textContent = message;

            // Toggle visibility
            if (preview.style.display === 'none') {
                preview.style.display = 'block';
            } else {
                preview.style.display = 'none';
            }
        }

        // Auto-update preview as user types (when preview is visible)
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('subject').addEventListener('input', function() {
                if (document.getElementById('emailPreview').style.display !== 'none') {
                    document.getElementById('previewSubject').textContent = this.value;
                }
            });

            document.getElementById('messageBody').addEventListener('input', function() {
                if (document.getElementById('emailPreview').style.display !== 'none') {
                    document.getElementById('previewMessage').textContent = this.value;
                }
            });
        });

        function insertAppointmentReminder() {
            document.getElementById('subject').value = 'Appointment Reminder';
            document.getElementById('messageBody').value = 'Dear valued patient,\n\nThis is a friendly reminder about your upcoming appointment with TOOTH IMPRESSION Dau Branch.\n\nPlease make sure to arrive 5-10 minutes early. If you need to reschedule, please contact us as soon as possible at (+63) 917 123 4567.\n\nWe look forward to seeing you!\n\nBest regards,\nTOOTH IMPRESSION Team';
        }

        function insertFollowUp() {
            document.getElementById('subject').value = 'Follow-up: Your Recent Visit';
            document.getElementById('messageBody').value = 'Dear valued patient,\n\nThank you for visiting TOOTH IMPRESSION Dau Branch. We hope your experience was positive.\n\nIf you have any questions or concerns about your treatment, please do not hesitate to contact us. We are here to help!\n\nFor any future appointments or inquiries, please call us at (+63) 917 123 4567.\n\nBest regards,\nTOOTH IMPRESSION Team';
        }

        function insertThankYou() {
            document.getElementById('subject').value = 'Thank You for Choosing Us';
            document.getElementById('messageBody').value = 'Dear valued patient,\n\nThank you for trusting TOOTH IMPRESSION Dau Branch with your dental care. We truly appreciate your confidence in our services.\n\nIf you have any feedback or suggestions, we would love to hear from you.\n\nFor your next appointment or any inquiries, contact us at (+63) 917 123 4567.\n\nWarm regards,\nTOOTH IMPRESSION Team';
        }
    </script>
</body>
</html>

