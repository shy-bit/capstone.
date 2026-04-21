<?php
session_start();
require_once 'db.php';

$message = '';
$messageType = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if (empty($email) || empty($password)) {
        $message = 'Please enter email and password.';
        $messageType = 'danger';
    } else {
        $stmt = $conn->prepare('SELECT id, first_name, last_name, email, password_hash FROM customers WHERE email = ? LIMIT 1');
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($user = $result->fetch_assoc()) {
            if (password_verify($password, $user['password_hash'])) {
                $_SESSION['customer_logged_in'] = true;
                $_SESSION['customer_email'] = $user['email'];
                $_SESSION['customer_name'] = $user['first_name'] . ' ' . $user['last_name'];
                header('Location: customer_dashboard.php');
                exit;
            }
        }

        $message = 'Invalid email or password.';
        $messageType = 'danger';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Login - TOOTH IMPRESSION</title>
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
            max-width: 400px;
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

        .btn-login {
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

        .btn-login:hover {
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
                <h2><i class="fas fa-sign-in-alt"></i> CUSTOMER LOGIN</h2>
            </div>

            <div class="auth-body">
                <div class="badge-customer"> CUSTOMER ACCOUNT</div>

                <?php if ($message): ?>
                    <div class="alert alert-<?= htmlspecialchars($messageType, ENT_QUOTES, 'UTF-8') ?>" role="alert">
                        <?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8') ?>
                    </div>
                <?php endif; ?>

                <form method="POST" action="customer_login.php">
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" placeholder="your@email.com" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter your password" required>
                    </div>

                    <button type="submit" class="btn-login">
                        <i class="fas fa-sign-in-alt"></i> Login
                    </button>
                </form>
            </div>

            <div class="auth-footer">
                <p>Don't have an account? <a href="customer_register.php">Create one now</a></p>
                <p style="margin-top: 10px;"><a href="homes.php"><i class="fas fa-arrow-left"></i> Back to Homepage</a></p>
                <p style="margin-top: 10px; color: #999; font-size: 0.85rem;">Are you an admin? <a href="admin/login.php">Login as Admin</a></p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

