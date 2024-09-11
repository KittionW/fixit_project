<!DOCTYPE html>
<html>

<head>
    <title>Account Page | Happy Shop</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer">

    <style>
        .acc-container {
            /* Add styling if needed */
        }

        .scale-acc {
            width: 50%;
            display: block;
            margin: 0 auto;
            border-radius: 20px;
        }

        .prfile1 {
            padding-top: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            font-size: 0.9em;
        }

        .prfile2 {
            padding: 20px 30px 30px 90px;
            line-height: 3em;
            font-size: 0.9em;
        }

        .prfile3 {
            text-align: center;
        }

        .ppra {
            padding: 0;
        }

        .ccaatt {
            font-size: 40px;
            margin: 0;
        }

        @media screen and (max-width: 700px) {
            .scale-acc {
                background-color: #f0f0f0;
                width: 100%;
            }
        }

        .btnlogout {
            background: #252525;
            width: 100%;
            display: block;
            margin: 0 auto;
            text-align: center;
            padding: 20px 0;
            font-weight: 700;
            border-radius: 50px;
            color: white;
            text-transform: uppercase;
            transition: all 0.5s;
        }

        .btnlogout:hover {
            background: #e44141;
        }

        .infodata {
            background-color: #f6f6f6;
            padding: 30px 0 40px;
            border-radius: 30px;
            margin-bottom: 30px;
        }

        .F_info {
            background-color: #f6f6f6;
            padding: 20px 0 15px;
            border-radius: 30px;
            margin-bottom: 30px;
        }
    </style>
</head>

<body>
    <?php
    include("method/header.php");
    session_start(); // Start the session
    ?>

    <br><br><br><br><br><br><br>

    <div class="acc-container">
        <div class="scale-acc">
            <div class="F_info">
                <div class="prfile1">
                    <h1><?= __('My Profile') ?></h1>
                    <span><?= __('Manage and protect your account') ?></span>
                </div>

                <div class="prfile2">
                    <?php
                    if (isset($_SESSION['user_id'])) {
                        $id = $_SESSION['user_id'];

                        // Establish database connection (assuming $con is your connection object)
                        $con->set_charset('utf8');
                        $sql1 = "SELECT * FROM users WHERE user_id = '$id'";
                        $myquery1 = mysqli_query($con, $sql1);

                        if ($myquery1) {
                            // Fetch and display user information
                            while ($run1 = mysqli_fetch_array($myquery1)) {
                    ?>
                                <h2><?= __('Name') ?>: <span><?= htmlspecialchars($run1['name'] . " " . $run1['surname']); ?></span></h2>
                                <h2><?= __('Username') ?>: <span><?= htmlspecialchars($run1['user_name']); ?></span></h2>
                                <h2><?= __('Email') ?>: <span><?= htmlspecialchars($run1['email']); ?></span></h2>
                                <h2><?= __('Phone') ?>: <span><?= htmlspecialchars($run1['phone']); ?></span></h2>
                    <?php
                            }
                        }
                    } else {
                        // Session variable is not set
                        echo "<script>alert('" . __('Please Login to the system') . "');</script>";
                        echo "<script>window.open('login.php', '_self')</script>";
                        die;
                    }
                    ?>
                </div>
            </div>

            <a class="btnlogout" href="method/logout.php"><?= __('Logout') ?></a>
        </div>
    </div>

    <br><br><br><br>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
    <script src="code.js"></script>
</body>

</html>
