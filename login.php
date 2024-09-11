<!DOCTYPE html>
<html>

<head>
    <title>Login Page | FIX IT</title>
    <meta charset="UTF-8">
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

	if($_SERVER['REQUEST_METHOD'] == "POST") {
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
		if(!empty($user_name) && !empty($password) && !is_numeric($user_name)) {
			//read from database
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result){

				if($result && mysqli_num_rows($result) > 0){
					$user_data = mysqli_fetch_assoc($result);
					if($user_data['password'] === $password){
						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: account.php");
                        // echo "<script language='javascript'>console.log('" . $user_data . "'); </script>";
						die;
					}
				}
			}
            
            echo "<script type='text/javascript'>toastr.error('" . __('Wrong Username or Password!') . "')</script>";

		} else {
			echo "<script type='text/javascript'>toastr.error('" . __('Wrong Username or Password!') . "')</script>";
		}
	}
?>

    <a class="gotopbtn" href="#"> <i class="fas fa-arrow-up"></i> </a>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <div class="con-login">
        <form method="post" class="pt-3">
            <div class="login-form">
                <h3><?= __('Username')?></h3>
                <input type="text" placeholder="<?= __('Username')?>" name="user_name" required /><br>
                <h3><?= __('Password')?></h3>
                <input type="password" placeholder="<?= __('Password')?>" name="password" required />
                <br>
                <input type="submit" value="<?= __('Login')?>" class="login-button log_btnn" />
                <br>
                <br>
                <a href="signup.php" class="sign-up"><?= __('Sign Up!')?></a>
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