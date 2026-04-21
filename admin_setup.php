<?php
require_once 'db.php';

// Admin table creation and default migration
$adminTableSQL = "CREATE TABLE IF NOT EXISTS admin_users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL,
    role VARCHAR(30) DEFAULT 'admin',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

if ($conn->query($adminTableSQL) === TRUE) {
    echo 'Admin table created or already exists.<br>';
} else {
    die('Error creating admin table: ' . $conn->error);
}

// Insert default admin user when table is empty
$checkSql = "SELECT COUNT(*) as total FROM admin_users";
$result = $conn->query($checkSql);
$count = 0;
if ($result && $row = $result->fetch_assoc()) {
    $count = (int)$row['total'];
}

if ($count === 0) {
    $defaultUser = 'admin';
    $defaultPass = 'admin123';
    $passwordHash = password_hash($defaultPass, PASSWORD_DEFAULT);
    $insertSql = $conn->prepare("INSERT INTO admin_users (username, password_hash, email) VALUES (?, ?, ?)");
    $email = 'admin@toothimpression.com';
    $insertSql->bind_param('sss', $defaultUser, $passwordHash, $email);
    if ($insertSql->execute()) {
        echo 'Default admin user created: username admin, password admin123<br>';
    } else {
        die('Error creating default admin user: ' . $conn->error);
    }
}

$conn->close();

