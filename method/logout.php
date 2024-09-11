<?php

session_start();

if(isset($_SESSION['user_id']))
{
	unset($_SESSION['user_id']);
	echo "<script type='text/javascript'>toastr.success('" . "Logout Already" . "', { timeOut: 100000 })</script>";
}

header("Location: ../login.php");
die;

?>