<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - TOOTH IMPRESSION Dau Branch</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
    <style>
        .navbar-custom.scrolled {
            background-color: rgba(45, 117, 96, 0.95) !important;
            box-shadow: 0 2px 20px rgba(0,0,0,0.1) !important;
        }
        .admin-card {
            border: 1px solid #dee2e6;
            border-radius: 12px;
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        }
        .admin-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }

        /* Print Styles */
        @media print {
            body {
                background: white;
            }
            .navbar, .hero-section, .admin-card, .row:has(.btn-primary), .row:has(.btn-secondary), .row:has(.btn-info), .row:has(.btn-success), .row:has(.btn-danger), .col-md-2:has(.btn), .col-md-1:has(.btn), .col-md-0:has(.btn) {
                display: none !important;
            }
            .table-responsive {
                margin-top: 20px;
            }
            table {
                width: 100%;
                border-collapse: collapse;
                font-size: 11px;
            }
            table, th, td {
                border: 1px solid #ddd;
            }
            th {
                background-color: #2d7560 !important;
                color: white !important;
                font-weight: bold;
            }
            td {
                padding: 8px;
            }
            tr:nth-child(even) {
                background-color: #f9f9f9;
            }
            .badge {
                padding: 4px 8px;
                font-size: 10px;
            }
            .page-break {
                page-break-after: always;
            }
            h1, h2, h3 {
                margin-top: 0;
            }
            .print-header {
                text-align: center;
                margin-bottom: 20px;
                border-bottom: 2px solid #2d7560;
                padding-bottom: 10px;
            }
            .print-header h2 {
                color: #2d7560;
                margin-bottom: 5px;
            }
            .print-header p {
                margin: 0;
                color: #666;
                font-size: 12px;
            }
        }
    </style>
</head>
<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/../auth.php';
require_once __DIR__ . '/../db.php';
require_once __DIR__ . '/../mail_helper.php';

if (!$adminLoggedIn) {
    header('Location: login.php');
    exit;
}

// Unread admin messages count for notification
$unreadCount = 0;
$unreadStmt = $conn->prepare("SELECT COUNT(*) AS cnt FROM admin_messages WHERE status = 'unread'");
if ($unreadStmt) {
    $unreadStmt->execute();
    $unreadResult = $unreadStmt->get_result();
    if ($unreadRow = $unreadResult->fetch_assoc()) {
        $unreadCount = intval($unreadRow['cnt']);
    }
    $unreadStmt->close();
}

$searchQuery = trim($_GET['search'] ?? '');
$appointmentDate = trim($_GET['appointment_date'] ?? '');
$appointmentTime = trim($_GET['appointment_time'] ?? '');

// Handle decline with reason
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['decline_appointment'])) {
    $appointmentId = intval($_POST['appointment_id'] ?? 0);
    $rejectionReason = trim($_POST['rejection_reason'] ?? '');
    
    // Fetch appointment details for email
    $appointmentStmt = $conn->prepare('SELECT first_name, email, appointment_date, appointment_time, treatment FROM appointments WHERE id = ?');
    $appointmentStmt->bind_param('i', $appointmentId);
    $appointmentStmt->execute();
    $appointmentData = $appointmentStmt->get_result()->fetch_assoc();
    $appointmentStmt->close();
    
    if ($appointmentData) {
        // Update appointment status with rejection reason
        $newStatus = 'declined';
        $statusStmt = $conn->prepare('UPDATE appointments SET status = ?, rejection_reason = ? WHERE id = ?');
        $statusStmt->bind_param('ssi', $newStatus, $rejectionReason, $appointmentId);
        $statusStmt->execute();
        $statusStmt->close();
        
        // Save rejection as automatic comment
        $commentType = 'rejection';
        $commentText = "Appointment rejected. Reason: " . (!empty($rejectionReason) ? $rejectionReason : "No reason provided");
        $commentStmt = $conn->prepare('INSERT INTO appointment_comments (appointment_id, comment_type, comment_text) VALUES (?, ?, ?)');
        $commentStmt->bind_param('iss', $appointmentId, $commentType, $commentText);
        $commentStmt->execute();
        $commentStmt->close();
        
        // Send rejection email
        $to = $appointmentData['email'];
        $subject = 'Appointment Request - Status Update';
        $reasonText = !empty($rejectionReason) ? "Reason: " . htmlspecialchars($rejectionReason, ENT_QUOTES, 'UTF-8') : "Unfortunately, we are unable to accommodate your appointment at this time.";
        
        $htmlMessage = "
        <html>
            <body>
                <div style='font-family: Arial, sans-serif; color: #333;'>
                    <div style='background-color: #2d7560; color: white; padding: 20px; text-align: center; border-radius: 5px;'>
                        <h2>TOOTH IMPRESSION Dau Branch</h2>
                    </div>
                    <div style='padding: 30px;'>
                        <p>Dear " . htmlspecialchars($appointmentData['first_name'], ENT_QUOTES, 'UTF-8') . ",</p>
                        <div style='background-color: #fff3cd; padding: 20px; border-left: 4px solid #dc3545; margin: 20px 0;'>
                            <h3 style='color: #dc3545; margin-top: 0;'>Appointment Request Update</h3>
                            <p style='margin: 0;'>" . $reasonText . "</p>
                        </div>
                        
                        <p><strong>Original Appointment Request:</strong></p>
                        <ul style='list-style: none; padding: 0;'>
                            <li>ðŸ“… <strong>Date:</strong> " . htmlspecialchars($appointmentData['appointment_date'], ENT_QUOTES, 'UTF-8') . "</li>
                            <li>ðŸ• <strong>Time:</strong> " . htmlspecialchars($appointmentData['appointment_time'], ENT_QUOTES, 'UTF-8') . "</li>
                            <li>ðŸ¦· <strong>Treatment:</strong> " . htmlspecialchars($appointmentData['treatment'], ENT_QUOTES, 'UTF-8') . "</li>
                        </ul>
                        
                        <p style='margin-top: 20px;'><strong>What to do next:</strong></p>
                        <p>We'd like to help you find an available time. Please contact us to reschedule:</p>
                        <p style='color: #2d7560; font-weight: bold;'>Phone: (+63) 917 123 4567</p>
                        
                        <p>You can also book a new appointment online on our website.</p>
                        
                        <p>Sorry for any inconvenience!</p>
                        <p>Best regards,<br><strong>TOOTH IMPRESSION Dau Branch Team</strong></p>
                        
                        <p style='color: #999; font-size: 12px; margin-top: 30px; border-top: 1px solid #ddd; padding-top: 20px;'>
                            Location: Dau, Mabalacat, Pampanga, Philippines
                        </p>
                    </div>
                </div>
            </body>
        </html>";
        
        $emailResult = sendEmail($to, $subject, $htmlMessage);
        
        // Check if email was sent successfully
        if (!$emailResult['success']) {
            // Email failed, but still update the appointment status
            error_log("Failed to send appointment rejection email to {$to}: " . $emailResult['message']);
            $_SESSION['email_warning'] = "Appointment rejected but email notification failed to send.";
        }
        
        $_SESSION['appointment_declined'] = true;
        header('Location: admin.php?status=declined');
        exit;
    }
}

$searchSql = '';
$whereClauses = [];

if ($searchQuery !== '') {
    $like = '%' . $conn->real_escape_string($searchQuery) . '%';
    $whereClauses[] = "(first_name LIKE '$like' OR last_name LIKE '$like' OR email LIKE '$like' OR treatment LIKE '$like')";
}

if ($appointmentDate !== '') {
    $safeDate = $conn->real_escape_string($appointmentDate);
    $whereClauses[] = "appointment_date = '$safeDate'";
}

if ($appointmentTime !== '') {
    $safeTime = $conn->real_escape_string($appointmentTime);
    $whereClauses[] = "appointment_time = '$safeTime'";
}

if (!empty($whereClauses)) {
    $searchSql = 'WHERE ' . implode(' AND ', $whereClauses);
}

if (isset($_GET['action'], $_GET['id'])) {
    $appointmentId = intval($_GET['id']);
    $action = $_GET['action'];
    
    // Fetch appointment details for email
    $appointmentStmt = $conn->prepare('SELECT first_name, email, appointment_date, appointment_time, treatment FROM appointments WHERE id = ?');
    $appointmentStmt->bind_param('i', $appointmentId);
    $appointmentStmt->execute();
    $appointmentData = $appointmentStmt->get_result()->fetch_assoc();
    $appointmentStmt->close();
    
    if ($appointmentData) {
        if ($action === 'accept') {
            $newStatus = 'accepted';
            $statusStmt = $conn->prepare('UPDATE appointments SET status = ? WHERE id = ?');
            $statusStmt->bind_param('si', $newStatus, $appointmentId);
            $statusStmt->execute();
            $statusStmt->close();
            
            // Save acceptance as automatic comment
            $commentType = 'acceptance';
            $commentText = 'Appointment approved and confirmation email sent to customer.';
            $commentStmt = $conn->prepare('INSERT INTO appointment_comments (appointment_id, comment_type, comment_text) VALUES (?, ?, ?)');
            $commentStmt->bind_param('iss', $appointmentId, $commentType, $commentText);
            $commentStmt->execute();
            $commentStmt->close();
            
            // Send acceptance email
            $to = $appointmentData['email'];
            $subject = 'Appointment Confirmed - TOOTH IMPRESSION';
            $htmlMessage = "
            <html>
                <body>
                    <div style='font-family: Arial, sans-serif; color: #333;'>
                        <div style='background-color: #2d7560; color: white; padding: 20px; text-align: center; border-radius: 5px;'>
                            <h2>TOOTH IMPRESSION Dau Branch</h2>
                        </div>
                        <div style='padding: 30px;'>
                            <p>Dear " . htmlspecialchars($appointmentData['first_name'], ENT_QUOTES, 'UTF-8') . ",</p>
                            <div style='background-color: #f0f8f5; padding: 20px; border-left: 4px solid #28a745; margin: 20px 0;'>
                                <h3 style='color: #28a745; margin-top: 0;'>âœ“ Appointment Confirmed</h3>
                                <p><strong>Your appointment has been approved!</strong></p>
                                
                                <p><strong>Appointment Details:</strong></p>
                                <ul style='list-style: none; padding: 0;'>
                                    <li>ðŸ“… <strong>Date:</strong> " . htmlspecialchars($appointmentData['appointment_date'], ENT_QUOTES, 'UTF-8') . "</li>
                                    <li>ðŸ• <strong>Time:</strong> " . htmlspecialchars($appointmentData['appointment_time'], ENT_QUOTES, 'UTF-8') . "</li>
                                    <li>ðŸ¦· <strong>Treatment:</strong> " . htmlspecialchars($appointmentData['treatment'], ENT_QUOTES, 'UTF-8') . "</li>
                                </ul>
                                
                                <p style='margin-top: 20px;'><strong>Important:</strong> Please arrive 10 minutes early. Bring a valid ID and any relevant medical documents.</p>
                            </div>
                            
                            <p>If you need to reschedule or have any questions, please contact us:</p>
                            <p style='color: #2d7560; font-weight: bold;'>Phone: (+63) 917 123 4567</p>
                            
                            <p>We look forward to seeing you!</p>
                            <p>Best regards,<br><strong>TOOTH IMPRESSION Dau Branch Team</strong></p>
                            
                            <p style='color: #999; font-size: 12px; margin-top: 30px; border-top: 1px solid #ddd; padding-top: 20px;'>
                                Location: Dau, Mabalacat, Pampanga, Philippines
                            </p>
                        </div>
                    </div>
                </body>
            </html>";
            
            $emailResult = sendEmail($to, $subject, $htmlMessage);
            
            // Check if email was sent successfully
            if (!$emailResult['success']) {
                // Email failed, but still update the appointment status
                // Log the error for debugging
                error_log("Failed to send appointment acceptance email to {$to}: " . $emailResult['message']);
                // You could also store this in session to show a warning to admin
                $_SESSION['email_warning'] = "Appointment accepted but email notification failed to send.";
            }
            
            // Add notification to customer's inbox
            $customerStmt = $conn->prepare('SELECT id FROM customers WHERE email = ? LIMIT 1');
            $customerStmt->bind_param('s', $appointmentData['email']);
            $customerStmt->execute();
            $customerResult = $customerStmt->get_result();
            $customerData = $customerResult->fetch_assoc();
            $customerStmt->close();
            
            if ($customerData) {
                $notificationSubject = 'Appointment Confirmed';
                $notificationMessage = "Your appointment for " . htmlspecialchars($appointmentData['treatment'], ENT_QUOTES, 'UTF-8') . " on " . htmlspecialchars($appointmentData['appointment_date'], ENT_QUOTES, 'UTF-8') . " at " . htmlspecialchars($appointmentData['appointment_time'], ENT_QUOTES, 'UTF-8') . " has been confirmed. Please arrive 10 minutes early and bring a valid ID.";
                $insertNotification = $conn->prepare('INSERT INTO admin_replies (customer_id, customer_name, customer_email, subject, reply_message, status) VALUES (?, ?, ?, ?, ?, ?)');
                $status = 'unread';
                $insertNotification->bind_param('isssss', $customerData['id'], $appointmentData['first_name'], $appointmentData['email'], $notificationSubject, $notificationMessage, $status);
                $insertNotification->execute();
                $insertNotification->close();
            }
            
            $_SESSION['accepted_customer'] = $appointmentData['first_name'] . ' ' . $appointmentData['last_name'];
            header('Location: admin.php?status=accepted');
            
        } elseif ($action === 'decline') {
            // For decline, we'll handle it with a form submission (not here)
            // Just redirect to prevent direct decline
            header('Location: admin.php');
        }
        exit;
    }
}

$appointments = [];
$appointmentsResult = $conn->query("SELECT a.*, d.name as doctor_name, d.specialization as doctor_specialization FROM appointments a LEFT JOIN doctors d ON a.doctor_id = d.id $searchSql ORDER BY a.created_at DESC");
if ($appointmentsResult) {
    while ($row = $appointmentsResult->fetch_assoc()) {
        $appointments[] = $row;
    }
} else {
    $appointments = [];
}
?>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-custom sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="admin.php">
                <img src="../image/logo.png" alt="TOOTH IMPRESSION Dau Branch" class="me-2" style="height: 50px;">
                <div>
                    <span class="fw-bold text-success">TOOTH IMPRESSION Dau Branch</span><br>
                    <small class="text-white-50" style="font-size: 0.8rem;"><i class="fas fa-user-shield text-success"></i> Admin Panel</small>
                </div>
                <?php if (!empty($adminLoggedIn)): ?>
                    <span class="badge bg-warning text-dark ms-2">Logged in as <?= htmlspecialchars($adminUsername, ENT_QUOTES, 'UTF-8') ?></span>
                <?php endif; ?>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="customers.php"><i class="fas fa-users"></i> CUSTOMERS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="doctors.php"><i class="fas fa-user-md"></i> DOCTORS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="services.php"><i class="fas fa-cog"></i> SERVICES</a>
                    </li>
                    <li class="nav-item position-relative">
                        <a class="nav-link" href="admin_messages.php">
                            <i class="fas fa-envelope"></i> MESSAGES
                            <?php if ($unreadCount > 0): ?>
                                <span class="badge bg-danger" style="position:absolute; top:5px; right:0;"><?= $unreadCount ?></span>
                            <?php endif; ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">CONTACT</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="hero-section" style="background-image:url('../image/admin-bg.jpg'); background-size:cover; background-position:center; min-height:70vh;">
        <div class="hero-overlay" style="background: rgba(0,0,0,0.45); min-height:70vh;"></div>
        <div class="container h-100">
            <div class="row align-items-center h-100">
                <div class="col-lg-8 text-white">
                    <h1 class="display-4 fw-bold">Admin Dashboard</h1>
                    <p class="lead">Manage website content, appointments, and service updates in one place.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5" style="background-color:#f8f9fa;">
        <div class="container">
            <div class="row mb-3">
                <div class="col-md-8">
                    <h3 class="fw-bold" style="color:#2d7560;">Appointment Management</h3>
                    <p class="small text-muted">Create, search, accept, and decline patient appointment requests.</p>
                </div>
                <div class="col-md-4 text-md-end">
                    <a href="email_logs.php" class="btn btn-info btn-sm me-2"><i class="fas fa-envelope"></i> Email Logs</a>
                    <a href="logout.php" class="btn btn-warning btn-sm">Logout (<?= htmlspecialchars($_SESSION['admin_username'] ?? 'Admin', ENT_QUOTES, 'UTF-8') ?>)</a>
                </div>
            </div>

            <?php if (isset($_GET['status']) && $_GET['status'] === 'accepted'): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle"></i> 
                    Appointment for <strong><?php echo htmlspecialchars($_SESSION['accepted_customer'] ?? 'Customer', ENT_QUOTES, 'UTF-8'); ?></strong> accepted successfully! 
                    Confirmation email sent and notification added to customer's inbox.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php unset($_SESSION['accepted_customer']); ?>
            <?php elseif (isset($_GET['status']) && $_GET['status'] === 'declined'): ?>
                <div class="alert alert-danger" role="alert">Appointment declined successfully.</div>
            <?php endif; ?>

            <?php if (isset($_SESSION['email_warning'])): ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-triangle"></i> 
                    <?php echo htmlspecialchars($_SESSION['email_warning'], ENT_QUOTES, 'UTF-8'); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php unset($_SESSION['email_warning']); ?>
            <?php endif; ?>

            <form class="row g-3 mb-4" method="GET" action="admin.php">
                <div class="col-md-3">
                    <input type="text" name="search" class="form-control" placeholder="Search patient by name, email, or treatment" value="<?= htmlspecialchars($searchQuery, ENT_QUOTES, 'UTF-8') ?>">
                </div>
                <div class="col-md-2">
                    <input type="date" name="appointment_date" class="form-control" value="<?= htmlspecialchars($appointmentDate, ENT_QUOTES, 'UTF-8') ?>" title="Filter by date">
                </div>
                <div class="col-md-2">
                    <select name="appointment_time" class="form-control" title="Filter by time">
                        <option value="">Select Time</option>
                        <option value="09:00" <?= $appointmentTime === '09:00' ? 'selected' : '' ?>>9:00 AM</option>
                        <option value="10:00" <?= $appointmentTime === '10:00' ? 'selected' : '' ?>>10:00 AM</option>
                        <option value="11:00" <?= $appointmentTime === '11:00' ? 'selected' : '' ?>>11:00 AM</option>
                        <option value="14:00" <?= $appointmentTime === '14:00' ? 'selected' : '' ?>>2:00 PM</option>
                        <option value="15:00" <?= $appointmentTime === '15:00' ? 'selected' : '' ?>>3:00 PM</option>
                        <option value="16:00" <?= $appointmentTime === '16:00' ? 'selected' : '' ?>>4:00 PM</option>
                        <option value="17:00" <?= $appointmentTime === '17:00' ? 'selected' : '' ?>>5:00 PM</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-success w-100"><i class="fas fa-search"></i> Search</button>
                </div>
                <div class="col-md-2">
                    <a href="admin.php" class="btn btn-secondary w-100"><i class="fas fa-sync-alt"></i> Reset</a>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-primary w-100" onclick="printRecords()"><i class="fas fa-print"></i> Print</button>
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-striped table-bordered align-middle" id="appointmentsTable">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Treatment</th>
                            <th>Doctor</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Message</th>
                            <th>Record</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($appointments)): ?>
                            <tr><td colspan="13" class="text-center">No appointments found.</td></tr>
                        <?php else: ?>
                            <?php foreach ($appointments as $row): ?>
                                <tr>
                                    <td><?= htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8') ?></td>
                                    <td><?= htmlspecialchars($row['first_name'], ENT_QUOTES, 'UTF-8') ?></td>
                                    <td><?= htmlspecialchars($row['last_name'], ENT_QUOTES, 'UTF-8') ?></td>
                                    <td><?= htmlspecialchars($row['email'], ENT_QUOTES, 'UTF-8') ?></td>
                                    <td><?= htmlspecialchars($row['treatment'], ENT_QUOTES, 'UTF-8') ?></td>
                                    <td>
                                        <?php if (!empty($row['doctor_name'])): ?>
                                            <?= htmlspecialchars($row['doctor_name'], ENT_QUOTES, 'UTF-8') ?>
                                            <?php if (!empty($row['doctor_specialization'])): ?>
                                                <br><small class="text-muted"><?= htmlspecialchars($row['doctor_specialization'], ENT_QUOTES, 'UTF-8') ?></small>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <span class="text-muted">Not specified</span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?= htmlspecialchars($row['appointment_date'], ENT_QUOTES, 'UTF-8') ?></td>
                                    <td><?= htmlspecialchars($row['appointment_time'], ENT_QUOTES, 'UTF-8') ?></td>
                                    <td><?= htmlspecialchars(substr($row['message'], 0, 50), ENT_QUOTES, 'UTF-8') ?>...</td>
                                    <td>
                                        <?php if (!empty($row['record_image']) && file_exists(__DIR__.'/uploads/'.$row['record_image'])): ?>
                                            <a href="uploads/<?= htmlspecialchars($row['record_image'], ENT_QUOTES, 'UTF-8') ?>" target="_blank">View</a>
                                        <?php else: ?>
                                            -
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if ($row['status'] === 'accepted'): ?>
                                            <span class="badge bg-success">Accepted</span>
                                        <?php elseif ($row['status'] === 'declined'): ?>
                                            <span class="badge bg-danger">Declined</span>
                                        <?php else: ?>
                                            <span class="badge bg-warning text-dark">Pending</span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?= htmlspecialchars($row['created_at'], ENT_QUOTES, 'UTF-8') ?></td>
                                    <td>
                                        <?php if ($row['status'] !== 'accepted'): ?>
                                            <a href="admin.php?action=accept&id=<?= intval($row['id']) ?>" class="btn btn-sm btn-success"><i class="fas fa-check"></i> Accept</a>
                                        <?php endif; ?>
                                        <?php if ($row['status'] !== 'declined'): ?>
                                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#declineModal" onclick="setDeclineAppointmentId(<?= intval($row['id']) ?>, '<?= htmlspecialchars($row['first_name'], ENT_QUOTES, 'UTF-8') ?>')"><i class="fas fa-times"></i> Decline</button>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <div class="row g-4 mt-4">
                <div class="col-lg-4 col-md-6">
                    <div class="admin-card p-4 h-100">
                        <h5>Appointments Overview</h5>
                        <p>View, approve, or reschedule upcoming patient appointments quickly.</p>
                        <a href="booking.php" class="text-success">Go to bookings <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="admin-card p-4 h-100">
                        <h5>Doctor Management</h5>
                        <p>Manage doctor profiles, specializations, and availability status.</p>
                        <a href="doctors.php" class="text-success">Manage doctors <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="admin-card p-4 h-100">
                        <h5>Services Management</h5>
                        <p>Edit and maintain service pages, prices, and treatment descriptions.</p>
                        <a href="services.php" class="text-success">Manage services <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="admin-card p-4 h-100">
                        <h5>Appointments Overview</h5>
                        <p>View, approve, or reschedule upcoming patient appointments quickly.</p>
                        <a href="booking.php" class="text-success">Go to bookings <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="admin-card p-4 h-100">                        <h5>Customer Management</h5>
                        <p>View and manage all customer accounts, contact info, and appointment relationships.</p>
                        <a href="customers.php" class="text-success">Manage customers <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="admin-card p-4 h-100">                        <h5>Services Management</h5>
                        <p>Edit and maintain service pages, prices, and treatment descriptions.</p>
                        <a href="services.php" class="text-success">Manage services <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="admin-card p-4 h-100">
                        <h5>Patient Feedback</h5>
                        <p>Review submitted feedback for service improvement and patient satisfaction.</p>
                        <a href="contact.php" class="text-success">Check feedback <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>

            <div class="row mt-5 g-4">
                <div class="col-lg-6 col-md-6">
                    <div class="admin-card p-4 h-100">
                        <h5>Security Settings</h5>
                        <p>Update access controls, admin credentials, and site security policies.</p>
                        <a href="#" class="text-success">Review settings <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="admin-card p-4 h-100">
                        <h5>Reports & Analytics</h5>
                        <p>Monitor site traffic, appointment conversion, and patient growth metrics.</p>
                        <a href="#" class="text-success">View reports <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>

            <div class="text-center mt-5">
                <a href="booking.php" class="btn btn-success rounded-pill px-5">Create New Appointment</a>
            </div>
        </div>
    </section>

    <footer class="footer-section py-4" style="background-color:#f8f9fa;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <p class="small mb-0">2025 Â© TOOTH IMPRESSION - Dau Branch. Admin Panel</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <a href="homes.php" class="text-success me-3">Go to Homepage</a>
                    <a href="contact.php" class="text-success">Contact</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Decline Appointment Modal -->
    <div class="modal fade" id="declineModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #f8f9fa; border-bottom: 2px solid #dc3545;">
                    <h5 class="modal-title"><i class="fas fa-times-circle text-danger"></i> Decline Appointment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="mb-2">Are you sure you want to decline the appointment for <strong id="declinePatientName">Patient</strong>?</p>
                    <p class="text-muted small">Please select a reason for declining. This will be sent to the patient via email.</p>
                    <div class="mb-3">
                        <label for="rejectionReasonSelect" class="form-label fw-bold">Reason for Declining:</label>
                        <select class="form-select" id="rejectionReasonSelect" onchange="toggleCustomReason()">
                            <option value="">Select a reason...</option>
                            <option value="Scheduling conflict - our team is fully booked">Scheduling conflict - our team is fully booked</option>
                            <option value="Dental team unavailable on this date">Dental team unavailable on this date</option>
                            <option value="Need more information from patient">Need more information from patient</option>
                            <option value="Medical history review required">Medical history review required</option>
                            <option value="Emergency cases take priority">Emergency cases take priority</option>
                            <option value="Equipment maintenance scheduled">Equipment maintenance scheduled</option>
                            <option value="Holiday/closure period">Holiday/closure period</option>
                            <option value="custom">Other (specify below)</option>
                        </select>
                    </div>
                    <div class="mb-3" id="customReasonDiv" style="display: none;">
                        <label for="customRejectionReason" class="form-label">Custom Reason:</label>
                        <textarea class="form-control" id="customRejectionReason" rows="3" placeholder="Please specify the reason..."></textarea>
                    </div>
                    <div class="alert alert-info" role="alert">
                        <small><i class="fas fa-info-circle"></i> The selected reason will be automatically included in the rejection email sent to the patient.</small>
                    </div>
                </div>
                <div class="modal-footer" style="border-top: 1px solid #dee2e6;">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" onclick="submitDeclineForm()"><i class="fas fa-check"></i> Confirm Decline & Send Email</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dropdownToggle = document.querySelector('#allPagesDropdown');
            const dropdownMenu = document.querySelector('.dropdown-menu');

            if (dropdownToggle && dropdownMenu) {
                dropdownToggle.parentElement.addEventListener('mouseenter', function() {
                    dropdownMenu.classList.add('show');
                    dropdownToggle.setAttribute('aria-expanded', 'true');
                });

                dropdownToggle.parentElement.addEventListener('mouseleave', function() {
                    dropdownMenu.classList.remove('show');
                    dropdownToggle.setAttribute('aria-expanded', 'false');
                });
            }
        });

        // Print Records Function
        function printRecords() {
            const printWindow = window.open('', '_blank');
            const table = document.getElementById('appointmentsTable');
            
            if (!table) {
                alert('No table found to print!');
                return;
            }

            // Create print document
            const printContent = `
                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Appointment Records - TOOTH IMPRESSION</title>
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
                    <style>
                        body {
                            font-family: Arial, sans-serif;
                            margin: 20px;
                            background: white;
                        }
                        .print-header {
                            text-align: center;
                            margin-bottom: 30px;
                            border-bottom: 3px solid #2d7560;
                            padding-bottom: 20px;
                        }
                        .print-header h2 {
                            color: #2d7560;
                            margin-bottom: 5px;
                            font-weight: bold;
                        }
                        .print-header p {
                            margin: 5px 0;
                            color: #666;
                            font-size: 13px;
                        }
                        .print-date {
                            text-align: right;
                            margin-bottom: 20px;
                            color: #666;
                            font-size: 13px;
                        }
                        table {
                            width: 100%;
                            border-collapse: collapse;
                            margin-top: 20px;
                        }
                        th, td {
                            border: 1px solid #ddd;
                            padding: 10px;
                            text-align: left;
                            font-size: 12px;
                        }
                        th {
                            background-color: #2d7560;
                            color: white;
                            font-weight: bold;
                        }
                        tr:nth-child(even) {
                            background-color: #f9f9f9;
                        }
                        .badge {
                            padding: 4px 8px;
                            border-radius: 4px;
                            font-size: 11px;
                            font-weight: bold;
                        }
                        .badge-success {
                            background-color: #28a745;
                            color: white;
                        }
                        .badge-danger {
                            background-color: #dc3545;
                            color: white;
                        }
                        .badge-warning {
                            background-color: #ffc107;
                            color: black;
                        }
                        .text-center {
                            text-align: center;
                        }
                        @media print {
                            body { margin: 0; }
                            .no-print { display: none; }
                        }
                    </style>
                </head>
                <body>
                    <div class="print-header">
                        <h2><i class="fas fa-tooth"></i> TOOTH IMPRESSION - Dau Branch</h2>
                        <p>Appointment Records</p>
                        <p>Mabalacat, Pampanga, Philippines</p>
                    </div>
                    <div class="print-date">
                        <strong>Printed on:</strong> ${new Date().toLocaleString()}
                    </div>
                    ${table.outerHTML}
                    <div style="margin-top: 40px; padding-top: 20px; border-top: 2px solid #2d7560; text-align: center; color: #666; font-size: 12px;">
                        <p>This is an official record of appointments. Please keep for your records.</p>
                        <p>&copy; 2026 TOOTH IMPRESSION - Dau Branch. All rights reserved.</p>
                    </div>
                </body>
                </html>
            `;

            printWindow.document.write(printContent);
            printWindow.document.close();

            // Print after content loads
            setTimeout(() => {
                printWindow.print();
                printWindow.close();
            }, 250);
        }

        // Decline Modal Functions
        let currentDeclineAppointmentId = null;
        let currentDeclinePatientName = null;

        function setDeclineAppointmentId(id, patientName) {
            currentDeclineAppointmentId = id;
            currentDeclinePatientName = patientName;
            document.getElementById('declinePatientName').textContent = patientName;
            // Reset form when opening modal
            document.getElementById('rejectionReasonSelect').value = '';
            document.getElementById('customRejectionReason').value = '';
            document.getElementById('customReasonDiv').style.display = 'none';
        }

        function toggleCustomReason() {
            const select = document.getElementById('rejectionReasonSelect');
            const customDiv = document.getElementById('customReasonDiv');
            if (select.value === 'custom') {
                customDiv.style.display = 'block';
            } else {
                customDiv.style.display = 'none';
                document.getElementById('customRejectionReason').value = '';
            }
        }

        function submitDeclineForm() {
            const selectElement = document.getElementById('rejectionReasonSelect');
            const selectedReason = selectElement.value;
            const customReason = document.getElementById('customRejectionReason').value.trim();
            
            let rejectionReason = '';
            
            if (!selectedReason) {
                alert('Please select a reason for declining the appointment.');
                return;
            }
            
            if (selectedReason === 'custom') {
                if (!customReason) {
                    alert('Please provide a custom reason for declining the appointment.');
                    return;
                }
                rejectionReason = customReason;
            } else {
                rejectionReason = selectedReason;
            }

            // Create form and submit
            const form = document.createElement('form');
            form.method = 'POST';
            form.innerHTML = `
                <input type="hidden" name="decline_appointment" value="1">
                <input type="hidden" name="appointment_id" value="${currentDeclineAppointmentId}">
                <input type="hidden" name="rejection_reason" value="${rejectionReason.replace(/"/g, '&quot;')}">
            `;
            document.body.appendChild(form);
            form.submit();
        }
    </script>
</body>
</html>
