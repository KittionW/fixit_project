<?php
require('database.php');

// Get the action button parameter
$btn = $_GET['btn'];

if ($btn == "aa") {
    // Increase quantity
    $id = $_GET['id'];
    $qty = $_GET['qty'] + 1;

    // Prepare and execute SQL query
    $sql = "UPDATE `cart` SET `quantity` = '" . $qty . "' WHERE `cart_id` = '" . $id . "'";
    $con->set_charset('utf8');
    $myquery = mysqli_query($con, $sql);

    // Check if the query was successful and redirect
    if ($myquery) {
        echo "<script>window.open('cart.php', '_self');</script>";
    } else {
        echo "<script>alert('Cannot Add');</script>";
        echo "<script>window.open('cart.php', '_self');</script>";
    }

} elseif ($btn == "dd") {
    // Decrease quantity
    $id = $_GET['id'];
    $qty = $_GET['qty'] - 1;

    // Check if the quantity is greater than 1 before updating
    if ($_GET['qty'] != 1) {
        // Prepare and execute SQL query
        $sql = "UPDATE `cart` SET `quantity` = '" . $qty . "' WHERE `cart_id` = '" . $id . "'";
        $con->set_charset('utf8');
        $myquery = mysqli_query($con, $sql);

        // Check if the query was successful and redirect
        if ($myquery) {
            echo "<script>window.open('cart.php', '_self');</script>";
        } else {
            echo "<script>alert('Cannot Deduct');</script>";
            echo "<script>window.open('cart.php', '_self');</script>";
        }
    } else {
        // Redirect if quantity is 1
        echo "<script>window.open('cart.php', '_self');</script>";
    }
}
?>
