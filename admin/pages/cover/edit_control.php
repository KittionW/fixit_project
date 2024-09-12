<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Include database connection
  include("../dir_log/connection.php");

  // Get the form data
  $product_code = $_POST['product_code'];
  $pr_name = $_POST['pr_name'];
  $pr_desc = $_POST['pr_desc'];
  $pr_price = $_POST['pr_price'];

  // First, retrieve the current image from the database
  $query = "SELECT imagecover FROM product WHERE product_code = ?";
  $stmt = $con2->prepare($query);
  $stmt->bind_param("s", $product_code);
  $stmt->execute();
  $result = $stmt->get_result();
  $product = $result->fetch_assoc();
  $existing_image = $product['imagecover']; // This is the existing image in the database

  // Handle file upload if a new file is selected
  if (isset($_FILES['imageCC']) && $_FILES['imageCC']['error'][0] == 0) {
    // A new image has been uploaded
    $image_name = "Image_CC-" . $pr_name . "_" . "0" . "-" . $PR_CC_filename . $_FILES['imageCC']['name'][0]; // Use the first file from the array
    $image_tmp = $_FILES['imageCC']['tmp_name'][0];
    
    // Define the upload path and move the uploaded file
    $upload_path = "../../../image/image_cover/" . $image_name;
    move_uploaded_file($image_tmp, $upload_path);
  } else {
    // No new image uploaded, use the existing one
    $image_name = $existing_image;
  }

  // Prepare the SQL query to update the product
  $query = "UPDATE product SET title = ?, description = ?, price = ?, imagecover = ? WHERE product_code = ?";
  $stmt = $con2->prepare($query);
  $stmt->bind_param("ssdss", $pr_name, $pr_desc, $pr_price, $image_name, $product_code);

  // Execute the query
  if ($stmt->execute()) {
    echo '<script type="text/javascript">
        alert("Successfully edited the product");
        window.location.href = "myedit_cover.php";
    </script>';
    exit();
  } else {
    echo "Error updating product: " . $con2->error;
  }
}
?>
