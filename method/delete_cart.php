<?php
require ('database.php');
// include ('../lang/language.php');

  $sql="DELETE FROM cart WHERE cart_id= " . $_GET['id'];
  $con->set_charset('utf8');
  $myquery = mysqli_query($con,$sql);

if($myquery){
    // echo"<script>alert('" . __('Product deleted') . "');</script>"; 
    echo"<script>window.open('../cart.php','_self')</script>";
}else{
    // echo"<script>alert('" . __('Cannot delete') . "');</script>"; 
    echo"<script>window.open('../cart.php','_self')</script>";
}
  

?>