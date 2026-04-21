<?php
require_once 'db.php';
require_once 'customer_auth.php';

$customerEmail = '';
$appointments = [];
$showResults = false;
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $customerEmail = trim($_POST['email'] ?? '');
    
    if (empty($customerEmail)) {
        $message = 'Please enter your email address.';
    } else {
        // Search for appointments
        $stmt = $conn->prepare('SELECT id, first_name, last_name, email, treatment, appointment_date, appointment_time, message, created_at FROM appointments WHERE email = ? ORDER BY appointment_date DESC, appointment_time DESC');
        $stmt->bind_param('s', $customerEmail);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $appointments[] = $row;
            }
            $showResults = true;
        } else {
            $message = 'No appointments found for this email address.';
            $showResults = true;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Appointments - TOOTH IMPRESSION</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f5f5f5; }

        /* Navigation Styling */
        .navbar-custom {
            background-color: #2d7560 !important;
            border-radius: 0 0 30px 30px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            padding: 1rem 0;
            transition: opacity 0.3s ease, background-color 0.3s ease;
        }

        .navbar-custom.scrolled {
            opacity: 0.7;
            background-color: rgba(45, 117, 96, 0.8) !important;
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

        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, #2d7560 0%, #245249 100%);
            padding: 50px 20px;
            color: white;
            text-align: center;
            position: relative;
            overflow: hidden;
            min-height: 120px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .hero-section h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin: 0;
            position: relative;
            z-index: 2;
        }

        /* Main Content */
        .content-section {
            padding: 50px 20px;
            background-color: #f5f5f5;
        }

        .search-box {
            background: white;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        .search-box h3 {
            color: #2d7560;
            margin-bottom: 20px;
            font-weight: 700;
        }

        .search-box input {
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 0.95rem;
            transition: border-color 0.3s ease;
        }

        .search-box input:focus {
            outline: none;
            border-color: #2d7560;
            box-shadow: 0 0 5px rgba(45, 117, 96, 0.2);
        }

        .search-btn {
            background: linear-gradient(135deg, #2d7560 0%, #245249 100%);
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 25px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .search-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(45, 117, 96, 0.3);
        }

        /* Appointment Card */
        .appointment-card {
            background: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            border-left: 4px solid #2d7560;
            transition: all 0.3s ease;
        }

        .appointment-card:hover {
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            transform: translateY(-2px);
        }

        .appointment-card h5 {
            color: #2d7560;
            margin-bottom: 15px;
            font-weight: 700;
        }

        .appointment-info {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-bottom: 15px;
        }

        .info-item {
            padding: 10px;
            background-color: #f9f9f9;
            border-radius: 4px;
        }

        .info-item strong {
            color: #2d7560;
            display: block;
            font-size: 0.85rem;
            margin-bottom: 5px;
        }

        .info-item span {
            color: #666;
            font-size: 0.95rem;
        }

        .appointment-message {
            background-color: #f5f5f5;
            padding: 15px;
            border-radius: 4px;
            margin-top: 15px;
            border-left: 3px solid #c84444;
        }

        .appointment-message p {
            margin: 0;
            color: #333;
            line-height: 1.6;
        }

        .no-results {
            background: white;
            border-radius: 8px;
            padding: 40px;
            text-align: center;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .no-results i {
            font-size: 3rem;
            color: #ddd;
            margin-bottom: 15px;
        }

        .no-results p {
            color: #999;
            font-size: 1.1rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero-section h1 {
                font-size: 1.8rem;
            }

            .appointment-info {
                grid-template-columns: 1fr;
            }

            .search-box {
                padding: 20px;
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
                <span class="fw-bold text-white">TOOTH IMPRESSION</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="homes.php">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="services.php">SERVICES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="booking.php">BOOK APPOINTMENT</a>
                    </li>
                    <?php if (!empty($customerLoggedIn)): ?>
                        <li class="nav-item">
                            <span class="badge bg-success ms-2" style="padding: 0.7rem 1rem; display: inline-block; font-size: 0.95rem;">
                                <i class="fas fa-user-circle"></i> CUSTOMER LOGGED IN
                            </span>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="customer_dashboard.php" style="background-color: #17a2b8; color: white; border-radius: 5px; padding: 0.5rem 1rem;margin-left: 10px;">MY ACCOUNT</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="customer_login.php" style="background-color: #2d7560; color: white; border-radius: 5px;">LOGIN</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <h1><i class="fas fa-calendar-check"></i> My Appointments</h1>
    </section>

    <!-- Content Section -->
    <section class="content-section">
        <div class="container-lg">
            <div class="search-box">
                <h3><i class="fas fa-search"></i> Find Your Appointments</h3>
                <form method="POST" action="customer.php">
                    <div class="row">
                        <div class="col-md-9">
                            <input type="email" name="email" class="form-control" placeholder="Enter your email address" value="<?= htmlspecialchars($customerEmail, ENT_QUOTES, 'UTF-8') ?>" required>
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="search-btn w-100"><i class="fas fa-search"></i> Search</button>
                        </div>
                    </div>
                </form>
            </div>

            <?php if ($showResults): ?>
                <?php if (!empty($message)): ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <i class="fas fa-exclamation-circle"></i> <?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>

                <?php if (!empty($appointments)): ?>
                    <div>
                        <h4 class="mb-4" style="color: #2d7560;">
                            <i class="fas fa-list"></i> Your Appointments (<?= count($appointments) ?>)
                        </h4>
                        
                        <?php foreach ($appointments as $apt): ?>
                            <div class="appointment-card">
                                <h5>
                                    <i class="fas fa-tooth"></i> 
                                    <?= htmlspecialchars($apt['treatment'], ENT_QUOTES, 'UTF-8') ?>
                                </h5>
                                
                                <div class="appointment-info">
                                    <div class="info-item">
                                        <strong>Date</strong>
                                        <span>
                                            <i class="fas fa-calendar"></i>
                                            <?= date('M d, Y', strtotime($apt['appointment_date'])) ?>
                                        </span>
                                    </div>
                                    <div class="info-item">
                                        <strong>Time</strong>
                                        <span>
                                            <i class="fas fa-clock"></i>
                                            <?= htmlspecialchars($apt['appointment_time'], ENT_QUOTES, 'UTF-8') ?>
                                        </span>
                                    </div>
                                    <div class="info-item">
                                        <strong>Patient Name</strong>
                                        <span><?= htmlspecialchars($apt['first_name'] . ' ' . $apt['last_name'], ENT_QUOTES, 'UTF-8') ?></span>
                                    </div>
                                    <div class="info-item">
                                        <strong>Booked On</strong>
                                        <span><?= date('M d, Y', strtotime($apt['created_at'])) ?></span>
                                    </div>
                                </div>

                                <?php if (!empty($apt['message'])): ?>
                                    <div class="appointment-message">
                                        <strong style="color: #333;">Your Notes:</strong>
                                        <p><?= htmlspecialchars($apt['message'], ENT_QUOTES, 'UTF-8') ?></p>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="text-center mt-5">
                        <p class="text-muted">
                            <i class="fas fa-info-circle"></i>
                            Need to make changes? Call us at (+63) 917 123 4567
                        </p>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-4">
        <div class="container">
            <p class="mb-2">&copy; 2025 TOOTH IMPRESSION Dau Branch. All Rights Reserved.</p>
            <p class="text-muted small">Phone: (+63) 917 123 4567 | Email: info@toothimpression.com</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Navbar fade on scroll
        const navbar = document.querySelector('.navbar-custom');
        window.addEventListener('scroll', function() {
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    </script>
</body>
</html>

