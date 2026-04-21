<?php
require_once 'db.php';
header('Content-Type: application/json');

try {
    // Get the appointment date from request
    $appointmentDate = trim($_GET['date'] ?? '');
    
    if (!$appointmentDate) {
        http_response_code(400);
        echo json_encode(['error' => 'Date parameter is required']);
        exit;
    }

    // Fetch all reserved times for the specified date
    $query = "SELECT DISTINCT appointment_time FROM appointments WHERE appointment_date = ? AND appointment_time IS NOT NULL ORDER BY appointment_time";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $appointmentDate);
    $stmt->execute();
    $result = $stmt->get_result();

    if (!$result) {
        http_response_code(500);
        echo json_encode(['error' => 'Database query failed']);
        exit;
    }

    $reservedTimes = [];
    while ($row = $result->fetch_assoc()) {
        $reservedTimes[] = $row['appointment_time'];
    }
    
    $stmt->close();

    echo json_encode(['reserved_times' => $reservedTimes]);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Error fetching reserved times']);
}
?>

