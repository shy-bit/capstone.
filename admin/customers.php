<?php
session_start();
require_once __DIR__ . '/../db.php';

if (empty($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit;
}

$message = '';
$messageType = '';

// Handle customer deletion
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $customerId = intval($_GET['id']);
    $deleteStmt = $conn->prepare('DELETE FROM customers WHERE id = ?');
    $deleteStmt->bind_param('i', $customerId);
    if ($deleteStmt->execute()) {
        $message = 'Customer deleted successfully.';
        $messageType = 'success';
    } else {
        $message = 'Failed to delete customer.';
        $messageType = 'danger';
    }
}

// Handle customer info update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['customerId'])) {
    $customerId = intval($_POST['customerId']);
    $firstName = trim($_POST['firstName'] ?? '');
    $lastName = trim($_POST['lastName'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $address = trim($_POST['address'] ?? '');

    if ($firstName && $lastName && $email) {
        $updateStmt = $conn->prepare('UPDATE customers SET first_name=?, last_name=?, email=?, phone=?, address=? WHERE id=?');
        $updateStmt->bind_param('sssssi', $firstName, $lastName, $email, $phone, $address, $customerId);
        if ($updateStmt->execute()) {
            $message = 'Customer updated successfully.';
            $messageType = 'success';
        } else {
            $message = 'Failed to update customer.';
            $messageType = 'danger';
        }
    }
}

// Search functionality
$searchQuery = trim($_GET['search'] ?? '');
$searchSql = '';
if ($searchQuery !== '') {
    $like = '%' . $conn->real_escape_string($searchQuery) . '%';
    $searchSql = "WHERE first_name LIKE '$like' OR last_name LIKE '$like' OR email LIKE '$like'";
}

// Get customers
$customers = [];
$customersResult = $conn->query("SELECT * FROM customers $searchSql ORDER BY created_at DESC");
if ($customersResult) {
    while ($row = $customersResult->fetch_assoc()) {
        $customers[] = $row;
    }
}

// Unread admin messages count
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Management - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .navbar-custom {
            background-color: #2d7560 !important;
        }
        .navbar-custom.scrolled {
            background-color: rgba(45, 117, 96, 0.95) !important;
            box-shadow: 0 2px 20px rgba(0,0,0,0.1) !important;
        }
        .customer-card {
            border: 1px solid #dee2e6;
            border-radius: 8px;
            transition: box-shadow 0.2s ease;
        }
        .customer-card:hover {
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
    </style>
</head>
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
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="admin.php"><i class="fas fa-home"></i> DASHBOARD</a>
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
                        <a class="nav-link" href="logout.php" class="text-danger">LOGOUT</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid py-5" style="background-color:#f8f9fa; min-height:100vh;">
        <div class="container">
            <div class="row mb-4">
                <div class="col-md-6">
                    <h1 class="fw-bold" style="color:#2d7560;">Customer Management</h1>
                    <p class="text-muted">View, edit, and manage customer accounts and their appointments</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <a href="admin.php" class="btn btn-secondary">Back to Dashboard</a>
                </div>
            </div>

            <?php if ($message): ?>
                <div class="alert alert-<?= $messageType ?> alert-dismissible fade show" role="alert">
                    <?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <!-- Search Form -->
            <form class="row g-3 mb-4" method="GET" action="customers.php">
                <div class="col-sm-8">
                    <input type="text" name="search" class="form-control" placeholder="Search customer by name or email" value="<?= htmlspecialchars($searchQuery, ENT_QUOTES, 'UTF-8') ?>">
                </div>
                <div class="col-sm-4">
                    <button type="submit" class="btn btn-success w-100">Search</button>
                </div>
            </form>

            <!-- Customers List -->
            <div class="row g-4">
                <?php if (empty($customers)): ?>
                    <div class="col-12">
                        <div class="alert alert-info text-center">No customers found.</div>
                    </div>
                <?php else: ?>
                    <?php foreach ($customers as $customer): ?>
                        <?php
                        // Get customer's appointments
                        $appointmentStmt = $conn->prepare('SELECT id, treatment, appointment_date, appointment_time, status FROM appointments WHERE customer_id = ? ORDER BY appointment_date DESC');
                        $appointmentStmt->bind_param('i', $customer['id']);
                        $appointmentStmt->execute();
                        $appointmentResult = $appointmentStmt->get_result();
                        $appointments = [];
                        while ($appt = $appointmentResult->fetch_assoc()) {
                            $appointments[] = $appt;
                        }
                        ?>
                        <div class="col-lg-6">
                            <div class="customer-card p-4">
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <div>
                                        <h5 class="mb-1"><?= htmlspecialchars($customer['first_name'] . ' ' . $customer['last_name'], ENT_QUOTES, 'UTF-8') ?></h5>
                                        <p class="text-muted mb-0"><?= htmlspecialchars($customer['email'], ENT_QUOTES, 'UTF-8') ?></p>
                                    </div>
                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editModal<?= $customer['id'] ?>">
                                            <i class="fas fa-edit"></i> Edit
                                        </button>
                                        <a href="customers.php?action=delete&id=<?= $customer['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this customer?')">
                                            <i class="fas fa-trash"></i> Delete
                                        </a>
                                    </div>
                                </div>

                                <div class="mb-3 small">
                                    <?php if (!empty($customer['phone'])): ?>
                                        <p><strong>Phone:</strong> <?= htmlspecialchars($customer['phone'], ENT_QUOTES, 'UTF-8') ?></p>
                                    <?php endif; ?>
                                    <?php if (!empty($customer['address'])): ?>
                                        <p><strong>Address:</strong> <?= htmlspecialchars($customer['address'], ENT_QUOTES, 'UTF-8') ?></p>
                                    <?php endif; ?>
                                    <p class="text-muted">Joined: <?= htmlspecialchars($customer['created_at'], ENT_QUOTES, 'UTF-8') ?></p>
                                </div>

                                <!-- Appointments -->
                                <hr>
                                <h6 class="fw-bold">Appointments (<?= count($appointments) ?>)</h6>
                                <?php if (empty($appointments)): ?>
                                    <p class="text-muted small">No appointments</p>
                                <?php else: ?>
                                    <div class="list-group list-group-sm">
                                        <?php foreach ($appointments as $appt): ?>
                                            <a href="../admin/admin.php" class="list-group-item list-group-item-action small py-2">
                                                <div class="d-flex justify-content-between align-items-start">
                                                    <div>
                                                        <strong><?= htmlspecialchars($appt['treatment'], ENT_QUOTES, 'UTF-8') ?></strong>
                                                        <br>
                                                        <small class="text-muted"><?= htmlspecialchars($appt['appointment_date'] . ' ' . $appt['appointment_time'], ENT_QUOTES, 'UTF-8') ?></small>
                                                    </div>
                                                    <span class="badge bg-<?= $appt['status'] === 'accepted' ? 'success' : ($appt['status'] === 'declined' ? 'danger' : 'warning') ?> text-dark">
                                                        <?= ucfirst($appt['status']) ?>
                                                    </span>
                                                </div>
                                            </a>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <!-- Edit Customer Modal -->
                            <div class="modal fade" id="editModal<?= $customer['id'] ?>" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Customer</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <form method="POST" action="customers.php">
                                            <div class="modal-body">
                                                <input type="hidden" name="customerId" value="<?= $customer['id'] ?>">
                                                <div class="mb-3">
                                                    <label class="form-label">First Name</label>
                                                    <input type="text" name="firstName" class="form-control" value="<?= htmlspecialchars($customer['first_name'], ENT_QUOTES, 'UTF-8') ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Last Name</label>
                                                    <input type="text" name="lastName" class="form-control" value="<?= htmlspecialchars($customer['last_name'], ENT_QUOTES, 'UTF-8') ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Email</label>
                                                    <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($customer['email'], ENT_QUOTES, 'UTF-8') ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Phone</label>
                                                    <input type="tel" name="phone" class="form-control" value="<?= htmlspecialchars($customer['phone'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Address</label>
                                                    <textarea name="address" class="form-control" rows="3"><?= htmlspecialchars($customer['address'] ?? '', ENT_QUOTES, 'UTF-8') ?></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save Changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

