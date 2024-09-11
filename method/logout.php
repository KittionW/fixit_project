<?php

session_start();

if (isset($_SESSION['user_id'])) {
    // Unset the session variable
    unset($_SESSION['user_id']);
    
}

// Redirect to login page
header("Location: ../login.php");
die;

?>
