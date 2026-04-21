<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$customerLoggedIn = false;
$customerEmail = '';
$customerName = '';

if (isset($_SESSION['customer_logged_in']) && $_SESSION['customer_logged_in'] === true) {
    $customerLoggedIn = true;
    $customerEmail = $_SESSION['customer_email'] ?? '';
    $customerName = $_SESSION['customer_name'] ?? '';
}
?>

