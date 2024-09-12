<?php
// Include database connection
include("../dir_log/connection.php");

// Check if 'id' is set in the URL
if (isset($_GET['id'])) {
    $product_code = $_GET['id'];

    // Prepare the SQL statement to delete the record
    $query = "DELETE FROM product WHERE product_code = ?";
    $stmt = $con2->prepare($query);
    $stmt->bind_param("s", $product_code);

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect with a success message or just to the list page
        header('Location: myedit_cover.php');
        exit();
    } else {
        // Handle error - you might want to show an error message or log the error
        echo "Error deleting record: " . $con2->error;
    }
} else {
    // Handle the case where 'id' is not provided
    echo "No ID provided.";
}
?>
