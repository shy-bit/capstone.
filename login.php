<?php
// Customer-first login entrypoint
// Root login should serve customer login by default for non-folder user flows.
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - TOOTH IMPRESSION</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>body{background:#f7fafc;font-family:Arial,sans-serif;} .box{max-width:420px;margin:100px auto;padding:30px;background:#fff;border-radius:12px;box-shadow:0 8px 30px rgba(0,0,0,.08);}</style>
</head>
<body>
    <div class="box text-center">
        <h2 class="mb-3">Login</h2>
        <p class="mb-4">For customer access use the customer login flow (root files).</p>
        <a href="customer_login.php" class="btn btn-success w-100 mb-2">Customer Login</a>
        <a href="admin/login.php" class="btn btn-outline-secondary w-100">Admin Login</a>
        <hr>
        <p class="mb-0">New customer? <a href="customer_register.php">Register here</a></p>
        <p class="small text-muted">Admin registration is available through admin/register.php only.</p>
    </div>
</body>
</html>

