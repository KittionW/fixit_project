<?php
require('database.php');

// Prepare the SQL query to delete the item from the cart
$sql = "DELETE FROM cart WHERE cart_id = " . intval($_GET['id']);
$con->set_charset('utf8');

// Execute the query
$myquery = mysqli_query($con, $sql);

// Check if the query was successful
if ($myquery) {
    // Redirect to cart page if the item was deleted successfully
    echo "<script>window.open('cart.php', '_self');</script>";
} else {
    // Redirect to cart page if there was an error deleting the item
    echo "<script>window.open('cart.php', '_self');</script>";
}
?>
