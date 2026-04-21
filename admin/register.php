<?php
session_start();
require_once __DIR__ . '/../db.php';

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $accessCode = trim($_POST['admin_access_code'] ?? '');

    $requiredAccessCode = 'adminonly2026';

    if ($username === '' || $email === '' || $password === '' || $accessCode === '') {
        $message = 'Please fill in all fields including Admin Access Code.';
    } elseif ($accessCode !== $requiredAccessCode) {
        $message = 'Invalid Admin Access Code. Please contact existing administrator.';
    } else {
        $stmt = $conn->prepare('SELECT id FROM admin_users WHERE username = ? OR email = ? LIMIT 1');
        $stmt->bind_param('ss', $username, $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $message = 'Username or email already exists.';
        } else {
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $insertStmt = $conn->prepare('INSERT INTO admin_users (username, password_hash, email) VALUES (?, ?, ?)');
            $insertStmt->bind_param('sss', $username, $passwordHash, $email);

            if ($insertStmt->execute()) {
                $_SESSION['admin_logged_in'] = true;
                $_SESSION['admin_username'] = $username;
                header('Location: admin.php');
                exit;
            }

            $message = 'Failed to create account, please try again.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration - TOOTH IMPRESSION</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            background: linear-gradient(135deg, #ffc107 0%, #ff9800 100%);
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
            background: #ffc107;
            color: #212529;
            padding: 30px;
            text-align: center;
        }
        .auth-header h2 {
            margin: 0;
            font-weight: 700;
            font-size: 1.8rem;
        }
        .auth-body { padding: 30px; }
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
        }
        .form-group input:focus {
            outline: none;
            border-color: #ffc107;
            box-shadow: 0 0 5px rgba(255, 193, 7, 0.2);
        }
        .btn-register {
            background: #ffc107;
            color: #212529;
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
            background: #ff9800;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 193, 7, 0.3);
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
            color: #ffc107;
            text-decoration: none;
            font-weight: 600;
        }
        .auth-footer a:hover {
            text-decoration: underline;
        }
        .badge-admin {
            display: inline-block;
            background: #ffc107;
            color: #212529;
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
                <h2><i class="fas fa-lock"></i> ADMIN REGISTRATION</h2>
            </div>

            <div class="auth-body">
                <div class="badge-admin">ðŸ” ADMIN ACCOUNT SETUP</div>

                <?php if ($message): ?>
                    <div class="alert alert-info" role="alert"><?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8') ?></div>
                <?php endif; ?>

                <form method="POST" action="register.php">
                    <div class="form-group">
                        <label for="username">Admin Username *</label>
                        <input type="text" id="username" name="username" placeholder="Enter admin username" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Admin Email *</label>
                        <input type="email" id="email" name="email" placeholder="admin@example.com" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password *</label>
                        <input type="password" id="password" name="password" placeholder="Enter secure password" required>
                    </div>
                    <div class="form-group">
                        <label for="admin_access_code">Admin Access Code *</label>
                        <input type="password" id="admin_access_code" name="admin_access_code" placeholder="Enter admin access code" required>
                        <small class="text-muted">Ask an existing administrator for this code before registering.</small>
                    </div>
                    <button type="submit" class="btn-register">
                        <i class="fas fa-check"></i> Create Admin Account
                    </button>
                </form>
            </div>

            <div class="auth-footer">
                <p>Already have an admin account? <a href="login.php">Login here</a></p>
                <p style="margin-top: 10px;"><a href="homes.php"><i class="fas fa-arrow-left"></i> Back to Homepage</a></p>
                <p style="margin-top: 10px; color: #999; font-size: 0.85rem;">Looking for customer registration? <a href="customer_register.php">Register as Customer</a></p>
            </div>
        </div>
    </div>
            </div>
        </div>
    </div>
</body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
