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

// Add Service
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'add') {
    $title = trim($_POST['title'] ?? '');
    $description = trim($_POST['description'] ?? '');
    $image = trim($_POST['image'] ?? '');
    $link = trim($_POST['link'] ?? '');

    if ($title && $description) {
        $stmt = $conn->prepare("INSERT INTO services (title, description, image, link) VALUES (?, ?, ?, ?)");
        $stmt->bind_param('ssss', $title, $description, $image, $link);
        
        if ($stmt->execute()) {
            $message = 'Service added successfully!';
            $messageType = 'success';
        } else {
            $message = 'Error adding service: ' . $conn->error;
            $messageType = 'danger';
        }
        $stmt->close();
    } else {
        $message = 'Title and Description are required!';
        $messageType = 'danger';
    }
}

// Update Service
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'update') {
    $serviceId = intval($_POST['service_id'] ?? 0);
    $title = trim($_POST['title'] ?? '');
    $description = trim($_POST['description'] ?? '');
    $image = trim($_POST['image'] ?? '');
    $link = trim($_POST['link'] ?? '');

    if ($serviceId && $title && $description) {
        $stmt = $conn->prepare("UPDATE services SET title = ?, description = ?, image = ?, link = ? WHERE id = ?");
        $stmt->bind_param('ssssi', $title, $description, $image, $link, $serviceId);
        
        if ($stmt->execute()) {
            $message = 'Service updated successfully!';
            $messageType = 'success';
        } else {
            $message = 'Error updating service: ' . $conn->error;
            $messageType = 'danger';
        }
        $stmt->close();
    } else {
        $message = 'All required fields must be filled!';
        $messageType = 'danger';
    }
}

// Delete Service
if (isset($_GET['delete']) && intval($_GET['delete'])) {
    $serviceId = intval($_GET['delete']);
    $stmt = $conn->prepare("DELETE FROM services WHERE id = ?");
    $stmt->bind_param('i', $serviceId);
    
    if ($stmt->execute()) {
        $message = 'Service deleted successfully!';
        $messageType = 'success';
    } else {
        $message = 'Error deleting service: ' . $conn->error;
        $messageType = 'danger';
    }
    $stmt->close();
}

// Fetch all services
$services = [];
$servicesResult = $conn->query("SELECT * FROM services ORDER BY created_at DESC");
if ($servicesResult) {
    while ($row = $servicesResult->fetch_assoc()) {
        $services[] = $row;
    }
}

// Get service to edit if requested
$editService = null;
if (isset($_GET['edit']) && intval($_GET['edit'])) {
    $serviceId = intval($_GET['edit']);
    $stmt = $conn->prepare("SELECT * FROM services WHERE id = ?");
    $stmt->bind_param('i', $serviceId);
    $stmt->execute();
    $result = $stmt->get_result();
    $editService = $result->fetch_assoc();
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Manage Services</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f5f5f5; }

        .navbar-custom {
            background-color: #2d7560 !important;
            border-radius: 0 0 30px 30px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            padding: 1rem 0;
            transition: opacity 0.3s ease, background-color 0.3s ease;
        }

        .navbar-custom .navbar-brand {
            color: white !important;
        }

        .navbar-custom .nav-link {
            color: white !important;
            font-weight: 600;
            padding: 0.5rem 1rem !important;
            transition: all 0.3s ease;
            font-size: 0.95rem;
        }

        .navbar-custom .nav-link:hover {
            color: #d4e5e1 !important;
            transform: scale(1.05);
        }

        .main-section {
            padding: 40px 20px;
            background-color: #f5f5f5;
        }

        .page-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: #2d7560;
            margin-bottom: 30px;
        }

        .card {
            border: 1px solid #ddd;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            margin-bottom: 30px;
        }

        .card:hover {
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            border: 1px solid #ddd;
            border-radius: 6px;
            padding: 12px;
            font-size: 0.95rem;
            transition: border-color 0.3s ease;
        }

        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            outline: none;
            border-color: #2d7560;
            box-shadow: 0 0 5px rgba(45, 117, 96, 0.2);
        }

        .btn-submit {
            background-color: #2d7560;
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 25px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-submit:hover {
            background-color: #245249;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(45, 117, 96, 0.3);
        }

        .service-table {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .table {
            margin-bottom: 0;
        }

        .table thead {
            background-color: #2d7560;
            color: white;
        }

        .table th {
            font-weight: 600;
            padding: 15px;
            border: none;
        }

        .table td {
            padding: 15px;
            vertical-align: middle;
            border-color: #eee;
        }

        .table tbody tr:hover {
            background-color: #f9f9f9;
        }

        .btn-edit {
            background-color: #007bff;
            color: white;
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 0.85rem;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .btn-edit:hover {
            background-color: #0056b3;
            transform: translateY(-1px);
        }

        .btn-delete {
            background-color: #dc3545;
            color: white;
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 0.85rem;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .btn-delete:hover {
            background-color: #c82333;
            transform: translateY(-1px);
        }

        .alert {
            border-radius: 8px;
            margin-bottom: 30px;
        }

        .section-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: #333;
            margin: 40px 0 25px 0;
            padding-bottom: 15px;
            border-bottom: 3px solid #2d7560;
        }

        @media (max-width: 768px) {
            .page-title {
                font-size: 1.8rem;
            }

            .section-title {
                font-size: 1.3rem;
            }

            .table {
                font-size: 0.85rem;
            }

            .table th, .table td {
                padding: 10px;
            }
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
                    <li class="nav-item">
                        <a class="nav-link" href="customers.php"><i class="fas fa-users"></i> CUSTOMERS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="services.php"><i class="fas fa-cog"></i> SERVICES</a>
                    </li>
                    <li class="nav-item position-relative">
                        <a class="nav-link" href="admin_messages.php">
                            <i class="fas fa-envelope"></i> MESSAGES
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i> LOGOUT</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Section -->
    <section class="main-section">
        <div class="container-lg">
            <h1 class="page-title"><i class="fas fa-cog"></i> Manage Services</h1>

            <?php if ($message): ?>
                <div class="alert alert-<?= $messageType ?>" role="alert">
                    <i class="fas fa-<?= ($messageType === 'success') ? 'check-circle' : 'exclamation-circle' ?>"></i>
                    <?= htmlspecialchars($message) ?>
                </div>
            <?php endif; ?>

            <!-- Add/Edit Service Form -->
            <div class="card p-5" style="background-color: white;">
                <h2 class="section-title"><?= $editService ? 'Edit Service' : 'Add New Service' ?></h2>

                <form action="services.php" method="POST">
                    <input type="hidden" name="action" value="<?= $editService ? 'update' : 'add' ?>">
                    <?php if ($editService): ?>
                        <input type="hidden" name="service_id" value="<?= htmlspecialchars($editService['id']) ?>">
                    <?php endif; ?>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title"><i class="fas fa-heading"></i> Service Title *</label>
                                <input type="text" id="title" name="title" class="form-control" placeholder="e.g., Dental Cleaning" required value="<?= $editService ? htmlspecialchars($editService['title']) : '' ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="link"><i class="fas fa-link"></i> Page Link</label>
                                <input type="text" id="link" name="link" class="form-control" placeholder="e.g., dental-cleaning.php" value="<?= $editService ? htmlspecialchars($editService['link']) : '' ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="image"><i class="fas fa-image"></i> Image Path</label>
                                <input type="text" id="image" name="image" class="form-control" placeholder="e.g., image/cleaning.jpg" value="<?= $editService ? htmlspecialchars($editService['image']) : '' ?>">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description"><i class="fas fa-align-left"></i> Service Description *</label>
                        <textarea id="description" name="description" class="form-control" placeholder="Describe the service in detail..." rows="5" required><?= $editService ? htmlspecialchars($editService['description']) : '' ?></textarea>
                    </div>

                    <div>
                        <button type="submit" class="btn-submit"><i class="fas fa-save"></i> <?= $editService ? 'Update Service' : 'Add Service' ?></button>
                        <?php if ($editService): ?>
                            <a href="services.php" class="btn btn-secondary" style="padding: 12px 30px; border-radius: 25px; text-decoration: none; display: inline-block; margin-left: 10px;"><i class="fas fa-times"></i> Cancel</a>
                        <?php endif; ?>
                    </div>
                </form>
            </div>

            <!-- Services List -->
            <div class="card p-0 mt-5" style="background-color: white;">
                <h2 class="section-title p-5 pb-4 m-0"><i class="fas fa-list"></i> All Services (<?= count($services) ?>)</h2>

                <div class="service-table">
                    <?php if (empty($services)): ?>
                        <div class="alert alert-info m-4">
                            <i class="fas fa-info-circle"></i> No services found. Add your first service using the form above.
                        </div>
                    <?php else: ?>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Link</th>
                                        <th>Image</th>
                                        <th>Created</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($services as $index => $service): ?>
                                        <tr>
                                            <td><?= $index + 1 ?></td>
                                            <td><strong><?= htmlspecialchars($service['title']) ?></strong></td>
                                            <td>
                                                <small><?= htmlspecialchars(substr($service['description'], 0, 60)) ?>...</small>
                                            </td>
                                            <td><small><?= htmlspecialchars($service['link'] ?: '-') ?></small></td>
                                            <td><small><?= htmlspecialchars($service['image'] ?: '-') ?></small></td>
                                            <td><small><?= date('M d, Y', strtotime($service['created_at'])) ?></small></td>
                                            <td>
                                                <a href="services.php?edit=<?= $service['id'] ?>" class="btn-edit"><i class="fas fa-edit"></i> Edit</a>
                                                <a href="services.php?delete=<?= $service['id'] ?>" class="btn-delete" onclick="return confirm('Are you sure you want to delete this service?');"><i class="fas fa-trash"></i> Delete</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
