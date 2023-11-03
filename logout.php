<?php
session_start(); // Start the session (make sure it's called on all protected pages)

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    // User is logged in, so log them out
    session_destroy(); // Destroy the session
}

header('Location: login.php'); // Redirect to the login page
exit();
?>