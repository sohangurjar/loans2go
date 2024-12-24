<?php
// Start the session
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Start session if it hasn't been started already
}

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // If not logged in, redirect to login page
    header("Location: ../.././loan/login.html");
    exit();
}else if ($_SESSION['role'] !== 'Admin') {
    // If not logged in, redirect to login page
    header("Location: ../.././loan/index.php");
    exit();
}

?>