<?php

$con = mysqli_connect("localhost","root","","fixit");

 if(mysqli_connect_errno()){
  
//   echo"Failed to connect : " . mysqli_connect_error(); 
  echo"<script>alert('Cannot Database');</script>"; 
//   echo"<script>alert('Hello! I am an alert box!" . mysqli_connect_error() . "');</script>"; 
  
}


// $dbhost = "localhost";
// $dbuser = "root";
// $dbpass = "";
// $dbname = "happyshop";

// if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
// {

// 	die("failed to connect!");
// }


?>