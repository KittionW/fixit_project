<?php

// Establish a connection to the database
$con = mysqli_connect("localhost", "root", "", "fixit");

// Check if the connection was successful
if (mysqli_connect_errno()) {
    // Display an alert if the connection failed
    echo "<script>alert('Cannot connect to the database: " . mysqli_connect_error() . "');</script>";
    // Optionally, you might want to terminate the script or handle the error appropriately
    // die("Failed to connect to the database!");
}

?>
