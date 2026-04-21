<?php
session_start();
require_once __DIR__ . '/../db.php';

if (empty($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit;
}

$id = intval($_GET['id'] ?? 0);
if ($id <= 0) {
    header('Location: admin.php');
    exit;
}

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstName = trim($_POST['firstName'] ?? '');
    $lastName = trim($_POST['lastName'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $treatment = trim($_POST['treatment'] ?? '');
    $appointmentDate = trim($_POST['appointmentDate'] ?? '');
    $time = trim($_POST['time'] ?? '');
    $notes = trim($_POST['message'] ?? '');

    $recordImage = null;
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

    if ($recordImage) {
        $stmt = $conn->prepare('UPDATE appointments SET first_name=?, last_name=?, email=?, treatment=?, appointment_date=?, appointment_time=?, message=?, record_image=? WHERE id=?');
        $stmt->bind_param('ssssssssi', $firstName, $lastName, $email, $treatment, $appointmentDate, $time, $notes, $recordImage, $id);
    } else {
        $stmt = $conn->prepare('UPDATE appointments SET first_name=?, last_name=?, email=?, treatment=?, appointment_date=?, appointment_time=?, message=? WHERE id=?');
        $stmt->bind_param('sssssssi', $firstName, $lastName, $email, $treatment, $appointmentDate, $time, $notes, $id);
    }

    if ($stmt->execute()) {
        $message = 'Update successful.';
    } else {
        $message = 'Update failed: ' . $conn->error;
    }
}

$stmt = $conn->prepare('SELECT * FROM appointments WHERE id = ? LIMIT 1');
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();
$appointment = $result->fetch_assoc();
if (!$appointment) {
    header('Location: admin.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Appointment - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container py-4">
        <h1 class="mb-4">Edit Appointment</h1>
        <?php if ($message): ?>
            <div class="alert alert-info"><?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8') ?></div>
        <?php endif; ?>
        <form action="edit_patient.php?id=<?= $id ?>" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">First Name</label>
                <input name="firstName" class="form-control" value="<?= htmlspecialchars($appointment['first_name'], ENT_QUOTES, 'UTF-8') ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Last Name</label>
                <input name="lastName" class="form-control" value="<?= htmlspecialchars($appointment['last_name'], ENT_QUOTES, 'UTF-8') ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($appointment['email'], ENT_QUOTES, 'UTF-8') ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Treatment</label>
                <input name="treatment" class="form-control" value="<?= htmlspecialchars($appointment['treatment'], ENT_QUOTES, 'UTF-8') ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Appointment Date</label>
                <input type="date" name="appointmentDate" class="form-control" value="<?= htmlspecialchars($appointment['appointment_date'], ENT_QUOTES, 'UTF-8') ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Time</label>
                <input name="time" class="form-control" value="<?= htmlspecialchars($appointment['appointment_time'], ENT_QUOTES, 'UTF-8') ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Message</label>
                <textarea name="message" class="form-control" rows="4"><?= htmlspecialchars($appointment['message'], ENT_QUOTES, 'UTF-8') ?></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Replace Record Image (Optional)</label>
                <input type="file" name="record_image" class="form-control" accept="image/*">
            </div>
            <button type="submit" class="btn btn-primary">Save Changes</button>
            <a href="admin.php" class="btn btn-secondary">Back to Dashboard</a>
        </form>
    </div>
</body>
</html>

