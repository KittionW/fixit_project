<!DOCTYPE html>
<html>

<head>
    <title>Signup Page | FIX IT</title>
    <meta charset="UTF-8">
    <!-- <title>Project Wesite</title> -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />



</head>








<body class="login-bbac">










    <?php
include("method/header.php");


include("method/check_login.php");
$user_data = check_exist($con);


session_start();

	if($_SERVER['REQUEST_METHOD'] == "POST"){
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
		$Name = $_POST['Name'];
		$Surname = $_POST['Surname'];
		$Email = $_POST['Email'];
		$Phone = $_POST['Phone'];

        $userid = rand(10,1000) + 55;
			$query = "INSERT INTO `users` (`user_name`, `name`, `surname`, `password`, `date`, `type`, `email`, `phone`)
             VALUES ('$user_name', '$Name', '$Surname', '$password', current_timestamp(), 'user', '$Email', '$Phone')";


			$result = mysqli_query($con, $query);
			if($result){
                echo"<script>alert('" . __('Register successfully, Please login') . "')</script>";
                echo"<script>window.open('login.php','_self')</script>";
		}else{
            echo"<script>alert('" . __('Cannot Sign Up') . "')</script>";

		}
		}

?>












    <a class="gotopbtn" href="#"> <i class="fas fa-arrow-up"></i> </a>
    <!-- Start sub-head zone-B -->
    <!-- <section class="asasa">
        <h2 class="text1 ml2">Login Page</h2>
    </section> -->
    <!-- End sub-head zone-B -->
     
    <br>
    <br>
    <br>
    <!-- <br> -->




    <div class="con-login">
        <form method="post" class="pt-3">
            <div class="login-form">




                <h3><?= __('Username')?></h3>
                <input type="text" placeholder="<?= __('Username')?>" name="user_name" required /><br>

                <h3><?= __('Password')?></h3>
                <input type="password" placeholder="<?= __('Password')?>" name="password" required />

                <h3><?= __('Name')?></h3>
                <input type="text" placeholder="<?= __('Name')?>" name="Name" required /><br>

                <h3><?= __('Surname')?></h3>
                <input type="text" placeholder="<?= __('Surname')?>" name="Surname" required /><br>

                <h3><?= __('Email')?></h3>
                <input type="text" placeholder="<?= __('Email')?>" name="Email" required /><br>

                <h3><?= __('Phone')?></h3>
                <input type="text" placeholder="<?= __('Phone')?>" name="Phone" required /><br>

                <input type="submit" value="<?= __('Sign Up')?>" class="login-button log_btnn" />
                <br>
                <br>
                <br>
            </div>
        </form>
    </div>
    <br>
    <br>
    <br>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
    <script src="code.js"></script>
</body>

</html>