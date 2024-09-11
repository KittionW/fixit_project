<?php
require ('database.php');

$btn = $_GET['btn'];

if($btn == "aa"){


    $id = $_GET['id'];
    $qty = $_GET['qty'] + 1;
    // echo"<script>alert('Cannot GET Value');</script>"; 
    // echo"<script>history.go(-1);</script>"; 

$sql="UPDATE `cart` SET `quantity` = '" . $qty . "' WHERE `cart_id` = '" . $id . "'";
$con->set_charset('utf8');
$myquery = mysqli_query($con,$sql);
// echo $_GET['id'];
// echo $_GET['qty'];
if($myquery){
  // echo"<script>alert('Added Already');</script>"; 
  echo"<script>window.open('../cart.php','_self')</script>";
}else{
  echo"<script>alert('Cannot Add');</script>"; 
  echo"<script>window.open('../cart.php','_self')</script>";
}


}elseif($btn == "dd"){

    
$id = $_GET['id'];
$qty = $_GET['qty'] - 1;
// echo"<script>alert('Cannot GET Value');</script>"; 
// echo"<script>history.go(-1);</script>"; 

// echo "Add";

if($_GET['qty'] != 1){
    $sql="UPDATE `cart` SET `quantity` = '" . $qty . "' WHERE `cart_id` = '" . $id . "'";
    $con->set_charset('utf8');
    $myquery = mysqli_query($con,$sql);
    // echo $_GET['id'];
    // echo $_GET['qty'];
    if($myquery){
    // echo"<script>alert('Deduct Already');</script>"; 
    echo"<script>window.open('../cart.php','_self')</script>";
    }else{
    echo"<script>alert('Cannot Deduct');</script>"; 
    echo"<script>window.open('../cart.php','_self')</script>";
    }
}else{
    // echo"<script>alert('The product minimum is 1 qty');</script>"; 
    echo"<script>window.open('../cart.php','_self')</script>";
}
}





?>