<?php 
session_start();
include("../dir_log/connection.php");

$impr_name = $_POST['pr_name'];

// Image Cover Method
$PR_CC_filename = $_FILES['imageCC']['name'][0];
$PR_CC_NewImgName = "Image_CC-" . $impr_name . "_" . "0" . "-" . $PR_CC_filename;
move_uploaded_file($_FILES['imageCC']['tmp_name'][0], '../../../image/image_cover/' . $PR_CC_NewImgName);
// Image Cover Method

$pr_name = $_POST['pr_name'];
$pr_price = $_POST['pr_price'];
$pr_desc = $_POST['pr_desc'];

// Insert product details into the database
$sql = "INSERT INTO `product` (`imagecover`, `title`, `price`, `description`) 
        VALUES ('$PR_CC_NewImgName', '$pr_name', '$pr_price', '$pr_desc')";

if (mysqli_query($con2, $sql)) {
    echo '<script type="text/JavaScript"> 
            alert("Successfully uploaded the product");
            window.location.href="myupload_cover.php";
          </script>';
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con2);
}
?>
