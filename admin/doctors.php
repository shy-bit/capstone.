<?php
require_once __DIR__ . '/../auth.php';
require_once __DIR__ . '/../db.php';

if (!$adminLoggedIn) {
    header('Location: login.php');
    exit;
}

// Handle form submissions
$message = '';
$messageType = '';

// Add Doctor
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'add') {
    $name = trim($_POST['name'] ?? '');
    $specialization = trim($_POST['specialization'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $availability_status = trim($_POST['availability_status'] ?? 'available');

    if ($name && $specialization) {
        $stmt = $conn->prepare("INSERT INTO doctors (name, specialization, email, phone, availability_status) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param('sssss', $name, $specialization, $email, $phone, $availability_status);

        if ($stmt->execute()) {
            $message = 'Doctor added successfully!';
            $messageType = 'success';
        } else {
            $message = 'Error adding doctor: ' . $conn->error;
            $messageType = 'danger';
        }
        $stmt->close();
    } else {
        $message = 'Name and Specialization are required!';
        $messageType = 'danger';
    }
}

// Update Doctor
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'update') {
    $doctorId = intval($_POST['doctor_id'] ?? 0);
    $name = trim($_POST['name'] ?? '');
    $specialization = trim($_POST['specialization'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $availability_status = trim($_POST['availability_status'] ?? 'available');

    if ($doctorId && $name && $specialization) {
        $stmt = $conn->prepare("UPDATE doctors SET name = ?, specialization = ?, email = ?, phone = ?, availability_status = ? WHERE id = ?");
        $stmt->bind_param('sssssi', $name, $specialization, $email, $phone, $availability_status, $doctorId);

        if ($stmt->execute()) {
            $message = 'Doctor updated successfully!';
            $messageType = 'success';
        } else {
            $message = 'Error updating doctor: ' . $conn->error;
            $messageType = 'danger';
        }
        $stmt->close();
    } else {
        $message = 'Name and Specialization are required!';
        $messageType = 'danger';
    }
}

// Delete Doctor
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'delete') {
    $doctorId = intval($_POST['doctor_id'] ?? 0);

    if ($doctorId) {
        $stmt = $conn->prepare("DELETE FROM doctors WHERE id = ?");
        $stmt->bind_param('i', $doctorId);

        if ($stmt->execute()) {
            $message = 'Doctor deleted successfully!';
            $messageType = 'success';
        } else {
            $message = 'Error deleting doctor: ' . $conn->error;
            $messageType = 'danger';
        }
        $stmt->close();
    } else {
        $message = 'Invalid doctor ID!';
        $messageType = 'danger';
    }
}

// Fetch all doctors
$doctors = [];
$doctorsResult = $conn->query("SELECT * FROM doctors ORDER BY name ASC");
if ($doctorsResult) {
    while ($row = $doctorsResult->fetch_assoc()) {
        $doctors[] = $row;
    }
} else {
    $doctors = [];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Management - TOOTH IMPRESSION Admin</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../styles.css">

    <style>
        .navbar-custom.scrolled {
            background-color: rgba(45, 117, 96, 0.95) !important;
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1) !important;
        }

        .admin-card {
            border: 1px solid #dee2e6;
            border-radius: 12px;
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        }

        .admin-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .status-badge {
            padding: 4px 8px;
            border-radius: 12px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .status-available {
            background-color: #d4edda;
            color: #155724;
        }

        .status-unavailable {
            background-color: #f8d7da;
            color: #721c24;
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
                        <a class="nav-link" href="admin.php"><i class="fas fa-calendar-check"></i> APPOINTMENTS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="customers.php"><i class="fas fa-users"></i> CUSTOMERS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="doctors.php"><i class="fas fa-user-md"></i> DOCTORS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="services.php"><i class="fas fa-cog"></i> SERVICES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin_messages.php">
                            <i class="fas fa-envelope"></i> MESSAGES
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
                    <h1 class="display-4 fw-bold">Doctor Management</h1>
                    <p class="lead">Manage doctor profiles, specializations, and availability status.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5" style="background-color:#f8f9fa;">
        <div class="container">
            <div class="row mb-4">
                <div class="col-md-8">
                    <h3 class="fw-bold" style="color:#2d7560;">Doctor Profiles</h3>
                    <p class="small text-muted">Add, edit, and manage doctor information and availability.</p>
                </div>
                <div class="col-md-4 text-md-end">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addDoctorModal">
                        <i class="fas fa-plus"></i> Add Doctor
                    </button>
                    <a href="logout.php" class="btn btn-warning btn-sm ms-2">Logout (<?= htmlspecialchars($_SESSION['admin_username'] ?? 'Admin', ENT_QUOTES, 'UTF-8') ?>)</a>
                </div>
            </div>

            <?php if (!empty($message)): ?>
                <div class="alert alert-<?= htmlspecialchars($messageType, ENT_QUOTES, 'UTF-8') ?> alert-dismissible fade show" role="alert">
                    <i class="fas fa-<?= $messageType === 'success' ? 'check-circle' : 'exclamation-triangle' ?>"></i>
                    <?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <div class="row">
                <?php if (empty($doctors)): ?>
                    <div class="col-12">
                        <div class="text-center py-5">
                            <i class="fas fa-user-md fa-3x text-muted mb-3"></i>
                            <h4 class="text-muted">No doctors found</h4>
                            <p class="text-muted">Add your first doctor to get started.</p>
                        </div>
                    </div>
                <?php else: ?>
                    <?php foreach ($doctors as $doctor): ?>
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="admin-card p-4 h-100">
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <div>
                                        <h5 class="mb-1"><?= htmlspecialchars($doctor['name'], ENT_QUOTES, 'UTF-8') ?></h5>
                                        <p class="text-muted mb-2 small"><?= htmlspecialchars($doctor['specialization'], ENT_QUOTES, 'UTF-8') ?></p>
                                    </div>
                                    <span class="status-badge status-<?= $doctor['availability_status'] ?>">
                                        <?= ucfirst($doctor['availability_status']) ?>
                                    </span>
                                </div>

                                <div class="mb-3">
                                    <?php if (!empty($doctor['email'])): ?>
                                        <p class="mb-1 small"><i class="fas fa-envelope text-muted me-2"></i><?= htmlspecialchars($doctor['email'], ENT_QUOTES, 'UTF-8') ?></p>
                                    <?php endif; ?>
                                    <?php if (!empty($doctor['phone'])): ?>
                                        <p class="mb-1 small"><i class="fas fa-phone text-muted me-2"></i><?= htmlspecialchars($doctor['phone'], ENT_QUOTES, 'UTF-8') ?></p>
                                    <?php endif; ?>
                                </div>

                                <div class="d-flex gap-2">
                                    <button type="button" class="btn btn-sm btn-outline-primary" onclick="editDoctor(<?= $doctor['id'] ?>, '<?= htmlspecialchars($doctor['name'], ENT_QUOTES, 'UTF-8') ?>', '<?= htmlspecialchars($doctor['specialization'], ENT_QUOTES, 'UTF-8') ?>', '<?= htmlspecialchars($doctor['email'], ENT_QUOTES, 'UTF-8') ?>', '<?= htmlspecialchars($doctor['phone'], ENT_QUOTES, 'UTF-8') ?>', '<?= $doctor['availability_status'] ?>')">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>
                                    <button type="button" class="btn btn-sm btn-outline-danger" onclick="deleteDoctor(<?= $doctor['id'] ?>, '<?= htmlspecialchars($doctor['name'], ENT_QUOTES, 'UTF-8') ?>')">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Add Doctor Modal -->
    <div class="modal fade" id="addDoctorModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-plus"></i> Add New Doctor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="action" value="add">

                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>

                        <div class="mb-3">
                            <label for="specialization" class="form-label">Specialization <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="specialization" name="specialization" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="tel" class="form-control" id="phone" name="phone">
                        </div>

                        <div class="mb-3">
                            <label for="availability_status" class="form-label">Availability Status</label>
                            <select class="form-select" id="availability_status" name="availability_status">
                                <option value="available">Available</option>
                                <option value="unavailable">Unavailable</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Add Doctor</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Doctor Modal -->
    <div class="modal fade" id="editDoctorModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-edit"></i> Edit Doctor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="action" value="update">
                        <input type="hidden" id="edit_doctor_id" name="doctor_id">

                        <div class="mb-3">
                            <label for="edit_name" class="form-label">Full Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="edit_name" name="name" required>
                        </div>

                        <div class="mb-3">
                            <label for="edit_specialization" class="form-label">Specialization <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="edit_specialization" name="specialization" required>
                        </div>

                        <div class="mb-3">
                            <label for="edit_email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="edit_email" name="email">
                        </div>

                        <div class="mb-3">
                            <label for="edit_phone" class="form-label">Phone</label>
                            <input type="tel" class="form-control" id="edit_phone" name="phone">
                        </div>

                        <div class="mb-3">
                            <label for="edit_availability_status" class="form-label">Availability Status</label>
                            <select class="form-select" id="edit_availability_status" name="availability_status">
                                <option value="available">Available</option>
                                <option value="unavailable">Unavailable</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update Doctor</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Doctor Modal -->
    <div class="modal fade" id="deleteDoctorModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger"><i class="fas fa-trash"></i> Delete Doctor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="action" value="delete">
                        <input type="hidden" id="delete_doctor_id" name="doctor_id">

                        <p>Are you sure you want to delete <strong id="delete_doctor_name"></strong>?</p>
                        <div class="alert alert-warning">
                            <i class="fas fa-exclamation-triangle"></i> This action cannot be undone.
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete Doctor</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <footer class="footer-section py-4" style="background-color:#f8f9fa;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <p class="small mb-0">2025 Â© TOOTH IMPRESSION - Dau Branch. Admin Panel</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <a href="../index.php" class="text-success me-3">Go to Homepage</a>
                    <a href="contact.php" class="text-success">Contact</a>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function editDoctor(id, name, specialization, email, phone, status) {
            document.getElementById('edit_doctor_id').value = id;
            document.getElementById('edit_name').value = name;
            document.getElementById('edit_specialization').value = specialization;
            document.getElementById('edit_email').value = email;
            document.getElementById('edit_phone').value = phone;
            document.getElementById('edit_availability_status').value = status;

            new bootstrap.Modal(document.getElementById('editDoctorModal')).show();
        }

        function deleteDoctor(id, name) {
            document.getElementById('delete_doctor_id').value = id;
            document.getElementById('delete_doctor_name').textContent = name;

            new bootstrap.Modal(document.getElementById('deleteDoctorModal')).show();
        }
    </script>
</body>
</html>
