<?php
session_start();
require_once 'db.php';

$message = '';
$messageType = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstName = trim($_POST['firstName'] ?? '');
    $lastName = trim($_POST['lastName'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirmPassword'] ?? '';
    $phone = trim($_POST['phone'] ?? '');

    if (empty($firstName) || empty($lastName) || empty($email) || empty($password) || empty($confirmPassword)) {
        $message = 'Please fill in all required fields.';
        $messageType = 'danger';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = 'Please enter a valid email address.';
        $messageType = 'danger';
    } elseif (strlen($password) < 6) {
        $message = 'Password must be at least 6 characters long.';
        $messageType = 'danger';
    } elseif ($password !== $confirmPassword) {
        $message = 'Passwords do not match.';
        $messageType = 'danger';
    } else {
        // Check if email already exists
        $stmt = $conn->prepare('SELECT id FROM customers WHERE email = ? LIMIT 1');
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $message = 'Email address already registered.';
            $messageType = 'danger';
        } else {
            // Create account
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $insertStmt = $conn->prepare('INSERT INTO customers (first_name, last_name, email, password_hash, phone) VALUES (?, ?, ?, ?, ?)');
            $insertStmt->bind_param('sssss', $firstName, $lastName, $email, $passwordHash, $phone);

            if ($insertStmt->execute()) {
                $_SESSION['customer_logged_in'] = true;
                $_SESSION['customer_email'] = $email;
                $_SESSION['customer_name'] = $firstName . ' ' . $lastName;
                header('Location: customer_dashboard.php');
                exit;
            } else {
                $message = 'Failed to create account. Please try again.';
                $messageType = 'danger';
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Registration - TOOTH IMPRESSION</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            background: linear-gradient(135deg, #2d7560 0%, #245249 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .auth-container {
            width: 100%;
            max-width: 450px;
            padding: 20px;
        }

        .auth-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }

        .auth-header {
            background: linear-gradient(135deg, #2d7560 0%, #245249 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }

        .auth-header h2 {
            margin: 0;
            font-weight: 700;
            font-size: 1.8rem;
        }

        .auth-body {
            padding: 30px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
            display: block;
        }

        .form-group input {
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 6px;
            width: 100%;
            font-size: 0.95rem;
            transition: border-color 0.3s ease;
        }

        .form-group input:focus {
            outline: none;
            border-color: #2d7560;
            box-shadow: 0 0 5px rgba(45, 117, 96, 0.2);
        }

        .btn-register {
            background: linear-gradient(135deg, #2d7560 0%, #245249 100%);
            color: white;
            padding: 12px;
            border: none;
            border-radius: 6px;
            font-weight: 600;
            width: 100%;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 20px;
        }

        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(45, 117, 96, 0.3);
        }

        .auth-footer {
            padding: 20px 30px;
            background-color: #f9f9f9;
            text-align: center;
            border-top: 1px solid #eee;
        }

        .auth-footer p {
            margin: 0;
            color: #666;
            font-size: 0.9rem;
        }

        .auth-footer a {
            color: #2d7560;
            text-decoration: none;
            font-weight: 600;
        }

        .auth-footer a:hover {
            text-decoration: underline;
        }

        .row-cols {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .badge-customer {
            display: inline-block;
            background: #2d7560;
            color: white;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 700;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="auth-container">
        <div class="auth-card">
            <div class="auth-header">
                <h2><i class="fas fa-user-plus"></i> CUSTOMER REGISTRATION</h2>
            </div>

            <div class="auth-body">
                <div class="badge-customer">ðŸ‘¤ CUSTOMER ACCOUNT SETUP</div>

                <?php if ($message): ?>
                    <div class="alert alert-<?= htmlspecialchars($messageType, ENT_QUOTES, 'UTF-8') ?>" role="alert">
                        <?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8') ?>
                    </div>
                <?php endif; ?>

                <form method="POST" action="customer_register.php">
                    <div class="row-cols">
                        <div class="form-group">
                            <label for="firstName">First Name *</label>
                            <input type="text" id="firstName" name="firstName" required>
                        </div>
                        <div class="form-group">
                            <label for="lastName">Last Name *</label>
                            <input type="text" id="lastName" name="lastName" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address *</label>
                        <input type="email" id="email" name="email" placeholder="your@email.com" required>
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="tel" id="phone" name="phone" placeholder="+63 917 123 4567">
                    </div>

                    <div class="row-cols">
                        <div class="form-group">
                            <label for="password">Password *</label>
                            <input type="password" id="password" name="password" required>
                        </div>
                        <div class="form-group">
                            <label for="confirmPassword">Confirm Password *</label>
                            <input type="password" id="confirmPassword" name="confirmPassword" required>
                        </div>
                    </div>

                    <small class="text-muted d-block mb-3">* Required fields</small>

                    <button type="submit" class="btn-register">
                        <i class="fas fa-check"></i> Create Account
                    </button>
                </form>
            </div>

            <div class="auth-footer">
                <p>Already have an account? <a href="customer_login.php">Login here</a></p>
                <p style="margin-top: 10px;"><a href="homes.php"><i class="fas fa-arrow-left"></i> Back to Homepage</a></p>
                <p style="margin-top: 10px; color: #999; font-size: 0.85rem;">Are you an admin? <a href="register.php">Register as Admin</a></p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

