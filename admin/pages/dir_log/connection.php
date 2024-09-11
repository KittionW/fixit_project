<?php
// Establishing a connection to the MySQL database
$con2 = mysqli_connect("localhost", "root", "", "fixit");

// Check if the connection was successful
if (mysqli_connect_errno()) {
    // Display an alert message if the connection fails
    echo "<script>alert('Cannot connect to the database');</script>";
}
?>
