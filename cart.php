<!DOCTYPE html>
<html>

<head>
    <title>Cart Page | FIX IT</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer">

    <style>
        .paymm {
            color: white;
            background: #d74040;
            margin-top: 100px;
            padding: 10px;
            border-radius: 10px;
            position: absolute;
            bottom: 70px;
            font-weight: 700;
            transition: all 0.5s;
        }

        .paymm:hover {
            background: white;
            color: black;
            font-weight: 700;
        }

        .container-cart {
            padding: 20px;
        }

        .cart-de h1 {
            font-size: 2em;
            margin: 0;
        }

        .cart-de p {
            font-size: 1.2em;
            margin: 5px 0;
        }

        .list-pro {
            display: flex;
            align-items: center;
            border-bottom: 1px solid #ccc;
            padding: 10px 0;
        }

        .img-list_pro {
            width: 100px;
            height: 100px;
            object-fit: cover;
            margin-right: 15px;
        }

        .block {
            flex: 1;
        }

        .coln {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex: 1;
        }

        .qtyy-a {
            display: flex;
            align-items: center;
        }

        .b1,
        .b2 {
            background: #d74040;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 5px;
            margin: 0 5px;
        }

        .b1:hover,
        .b2:hover {
            background: #b52c2c;
        }

        #form1 {
            width: 50px;
            text-align: center;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .timeew {
            color: #d74040;
            font-size: 1.5em;
        }

        .total_bb {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <?php
    session_start(); // Start the session
    ?>

    <?php
    include("header.php");

    if (isset($_SESSION['user_id'])) {
        $user_idd = $_SESSION['user_id'];
        $sql = "SELECT * FROM cart WHERE user_id = '$user_idd'";
        $con->set_charset('utf8');
        $myquery = mysqli_query($con, $sql);
    ?>

    <br><br><br><br><br><br>

    <div class="container-cart">
        <div class="cart-list">
            <div class="cart-de">
                <?php
                $sql3 = "SELECT COUNT(code_product) AS item_count FROM cart WHERE user_id = '$user_idd'";
                $myquery3 = mysqli_query($con, $sql3);
                if ($run3 = mysqli_fetch_array($myquery3)) {
                ?>
                    <h1><?= __('Shopping Cart') ?></h1>
                    <p><?= $run3['item_count'] ?> <?= __('items') ?></p>
                <?php } ?>
            </div>

            <?php
            while ($run = mysqli_fetch_array($myquery)) {
            ?>
                <hr>
                <div class="list-pro">
                    <img class="img-list_pro" src="image/image_cover/<?php echo htmlspecialchars($run['image_cc']); ?>" alt="Product Image">

                    <div class="block">
                        <span><?php echo htmlspecialchars($run['name_product']); ?></span>
                    </div>
                    <div class="coln">
                        <div class="qtyy-a">
                            <a href="method/qty_cart.php?id=<?php echo htmlspecialchars($run['cart_id']); ?>&qty=<?php echo htmlspecialchars($run['quantity']); ?>&btn=dd">
                                <button class="b1">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </a>
                            <input id="form1" min="0" name="quantity" value="<?php echo htmlspecialchars($run['quantity']); ?>" type="text" readonly />
                            <a href="method/qty_cart.php?id=<?php echo htmlspecialchars($run['cart_id']); ?>&qty=<?php echo htmlspecialchars($run['quantity']); ?>&btn=aa">
                                <button class="b2">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </a>
                        </div>
                        <span>฿<?php echo number_format($run['price'] * $run['quantity']); ?></span>
                        <span>
                            <a class="timeew" href="method/delete_cart.php?id=<?php echo htmlspecialchars($run['cart_id']); ?>">
                                <i class="fas fa-times"></i>
                            </a>
                        </span>
                    </div>
                </div>
            <?php
            }
            ?>

        </div>

        <div class="d_30">
            <h2><?= __('Order Summary') ?></h2>
            <br><br>

            <?php
            $sql5 = "SELECT SUM(price * quantity) AS total_amount FROM cart WHERE user_id = '$user_idd'";
            $myquery5 = mysqli_query($con, $sql5);
            if ($run5 = mysqli_fetch_array($myquery5)) {
            ?>
                <h3 class="total_bb"><?= __('Grand total:') ?> <span>฿<?php echo number_format($run5['total_amount']); ?></span></h3>
            <?php
            }
            ?>
        </div>
    </div>

    <?php
    } else {
        echo "<script>alert('" . __('Please Login to the system') . "');</script>";
        echo "<script>window.open('login.php', '_self')</script>";
        die;
    }
    ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
    <script src="code.js"></script>
</body>

</html>
