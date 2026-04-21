<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - TOOTH IMPRESSION</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>body{background:#f7fafc;font-family:Arial,sans-serif;} .box{max-width:420px;margin:100px auto;padding:30px;background:#fff;border-radius:12px;box-shadow:0 8px 30px rgba(0,0,0,.08);}</style>
</head>
<body>
    <div class="box text-center">
        <h2 class="mb-3">Register</h2>
        <p class="mb-4">Create a customer account using root non-folder flow.</p>
        <a href="customer_register.php" class="btn btn-primary w-100 mb-2">Customer Register</a>
        <a href="admin/register.php" class="btn btn-outline-secondary w-100">Admin Register</a>
        <hr>
        <p class="mb-0">Already have account? <a href="customer_login.php">Customer Login</a></p>
        <p class="small text-muted">Admin account request is limited; use admin path only.</p>
    </div>
</body>
</html>
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
