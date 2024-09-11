<?php
// Define the __() function for translations
function __($text) {
    // Example translation logic
    // Replace this with your actual translation logic
    $translations = [
        'Shopping Cart' => 'Shopping Cart',
        'Product has been inserted' => 'Product has been inserted',
        'Cannot add product' => 'Cannot add product',
        'Updated product' => 'Updated product',
        'Cannot update product' => 'Cannot update product',
        'Not Login, Please Login to the system' => 'Not Login, Please Login to the system',
    ];

    return isset($translations[$text]) ? $translations[$text] : $text;
}
?>

<?php
require('method/database.php');
session_start();
error_reporting(E_ALL & ~E_NOTICE); // Hide Notices

if (isset($_SESSION['user_id'])) {
    if (isset($_GET['code'])) {
        $code = strval($_GET['code']);
        $title = strval($_GET['title']);
        $price = strval($_GET['price']);
        $img_cc = strval($_GET['img_cc']);
        $iduser = strval($_SESSION['user_id']);

        $sql1 = "SELECT * FROM cart WHERE code_product = '$code' AND user_id = '$iduser'";
        $con->set_charset('utf8');
        $myquery1 = mysqli_query($con, $sql1);

        if ($run1 = mysqli_fetch_array($myquery1)) {
            // Product already exists in the cart, update quantity
            $newqty = $run1['quantity'] + 1;
            $sql2 = "UPDATE cart SET quantity = '$newqty' WHERE code_product = '$code' AND user_id = '$iduser'";
            $myquery2 = mysqli_query($con, $sql2);

            if ($myquery2) {
                echo "<script>alert('" . __('Updated product') . "');</script>";
                echo "<script>window.open('product.php', '_self');</script>";
            } else {
                echo "<script>alert('" . __('Cannot update product') . "');</script>";
                echo "<script>window.open('product.php', '_self');</script>";
            }
        } else {
            // Product does not exist in the cart, insert new record
            $sql = "INSERT INTO cart (user_id, code_product, name_product, quantity, price, image_cc) 
                    VALUES ('$iduser', '$code', '$title', 1, '$price', '$img_cc')";
            $con->set_charset('utf8');
            $myquery = mysqli_query($con, $sql);

            if ($myquery) {
                echo "<script>alert('" . __('Product has been added to cart') . "');</script>";
                echo "<script>window.open('product.php', '_self');</script>";
            } else {
                echo "<script>alert('" . __('Cannot add product') . "');</script>";
                echo "<script>window.open('product.php', '_self');</script>";
            }
        }
    }
} else {
    echo "<script>alert('" . __('Not Login, Please Login to the system') . "');</script>";
    echo "<script>window.open('login.php', '_self');</script>";
}
?>
