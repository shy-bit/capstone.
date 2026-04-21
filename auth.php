<?php
// Common authentication helper for all public pages
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$adminLoggedIn = !empty($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true;
$adminUsername = $adminLoggedIn ? ($_SESSION['admin_username'] ?? 'Admin') : null;

