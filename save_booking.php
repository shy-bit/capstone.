<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: booking.php');
    exit;
}

$firstName = trim($_POST['firstName'] ?? '');
$lastName = trim($_POST['lastName'] ?? '');
$email = trim($_POST['email'] ?? '');
$treatment = trim($_POST['treatment'] ?? '');
$appointmentDate = trim($_POST['appointmentDate'] ?? '');
$time = trim($_POST['time'] ?? '');
$message = trim($_POST['message'] ?? '');
$doctorId = !empty($_POST['doctor_id']) ? intval($_POST['doctor_id']) : null;
$recordImage = null;

// Upload handling
if (isset($_FILES['record_image']) && $_FILES['record_image']['error'] === UPLOAD_ERR_OK) {
    $uploadsDir = __DIR__ . '/uploads';
    if (!is_dir($uploadsDir)) {
        mkdir($uploadsDir, 0755, true);
    }

    $fileTmpPath = $_FILES['record_image']['tmp_name'];
    $fileName = basename($_FILES['record_image']['name']);
    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    $allowedExt = ['jpg', 'jpeg', 'png', 'gif'];

    if (in_array($fileExt, $allowedExt, true)) {
        $newFileName = time() . '_' . bin2hex(random_bytes(8)) . '.' . $fileExt;
        $destPath = $uploadsDir . '/' . $newFileName;

        if (move_uploaded_file($fileTmpPath, $destPath)) {
            $recordImage = $newFileName;
        }
    }
}

// Create or get customer record
$customerId = null;
$checkCustomer = $conn->prepare('SELECT id FROM customers WHERE email = ?');
$checkCustomer->bind_param('s', $email);
$checkCustomer->execute();
$customerResult = $checkCustomer->get_result();

if ($customerResult->num_rows > 0) {
    $customerRow = $customerResult->fetch_assoc();
    $customerId = $customerRow['id'];
} else {
    // Create new customer with generated password
    $tempPassword = bin2hex(random_bytes(8));
    $passwordHash = password_hash($tempPassword, PASSWORD_BCRYPT);
    
    $createCustomer = $conn->prepare('INSERT INTO customers (first_name, last_name, email, password_hash) VALUES (?, ?, ?, ?)');
    $createCustomer->bind_param('ssss', $firstName, $lastName, $email, $passwordHash);
    
    if ($createCustomer->execute()) {
        $customerId = $conn->insert_id;
    }
}

// Insert appointment with customer_id and doctor_id
$stmt = $conn->prepare('INSERT INTO appointments (customer_id, doctor_id, first_name, last_name, email, treatment, appointment_date, appointment_time, message, record_image) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
$stmt->bind_param('iissssssss', $customerId, $doctorId, $firstName, $lastName, $email, $treatment, $appointmentDate, $time, $message, $recordImage);

if ($stmt->execute()) {
    header('Location: booking.php?success=1');
    exit;
}

header('Location: booking.php?success=0');
exit;

