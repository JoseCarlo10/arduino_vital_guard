<?php
// Start session
session_start();

// Check if username and password are correct
if ($_POST['username'] == 'admin' && $_POST['password'] == 'root') {
    // Store username in session
    $_SESSION['username'] = $_POST['username'];
    // Redirect to admin page if login is successful
    header("Location: admin.php");
    exit(); // Terminate script execution after redirect
} else {
    // Redirect back to login page if login fails
    header("Location: index.php");
    exit(); // Terminate script execution after redirect
}
?>
