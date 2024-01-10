<?php
session_start();

// Unset all session variables
session_unset();

// Destroy the session
session_destroy();

header('Location: login.php'); // Redirect to the login page after logout
exit();
?>
