<?php
include("header.php");

if (isset($_GET['code'])) {
    $code_product = $_GET['code'];
    $sql = "SELECT * FROM product WHERE product_code = '" . $code_product . "'";
    $con->set_charset('utf8');
    $myquery = mysqli_query($con, $sql);

    while ($run = mysqli_fetch_array($myquery)) {
?>
<!DOCTYPE html>
<html>

<head>
    <title>Product detail | FIX IT</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        @import url("https://fonts.googleapis.com/css?family=Lato:400,700");

        body {
            background-image: linear-gradient(180deg, #e9ded8, #d6ebec);
            width: 100%;
        }

        .container_pro_det {
            font-family: "Lato", sans-serif;
            position: relative;
            margin: auto;
            overflow: hidden;
            width: 900px;
            height: 350px;
            border-radius: 10px;
            display: flex;
        }

        .text_pro_de1 {
            font-size: 27px;
            color: black;
            margin-top: -5px;
        }

        .text_pro_de2 {
            font-size: 16px;
            color: #c53434;
            letter-spacing: 1px;
            display: -webkit-box;
            overflow: hidden;
            -webkit-line-clamp: 5;
            -webkit-box-orient: vertical;
        }

        .text_pro_de3 {
            color: #fb5853;
            font-size: 30px;
        }

        .pro_image_detail {
            width: 480px;
        }

        .product {
            position: absolute;
            width: 40%;
            height: 100%;
            top: 10%;
            left: 60%;
            display: flex;
            flex-direction: column;
        }

        .desc {
            text-transform: none;
            letter-spacing: 0;
            margin-bottom: 17px;
            color: #4E4E4E;
            font-size: 15px;
            line-height: 23px;
            margin-right: 25px;
            text-align: justify;
            padding-top: 25px;
        }

        .button_pro {
            background: #e22c3b;
            padding: 10px;
            display: inline-block;
            outline: 0;
            border: 0;
            border-radius: 2px;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #F5F5F5;
            cursor: pointer;
            transition: all 0.4s ease-in-out;
        }

        .button_pro:hover {
            background: black;
        }

        .add {
            width: 100%;
        }

        .control_image_de {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 350px;
        }

        .border_control {
            background: #ffffff7a;
            display: block;
            margin-right: auto;
            margin-left: auto;
            border-radius: 40px;
            padding: 40px;
        }

        .hh-sup {
            background: #ffffff7a;
            width: 1200px;
            display: block;
            margin-right: auto;
            margin-left: auto;
            border-radius: 40px;
            padding: 40px;
            margin-bottom: 30px;
        }

        .arr-sup {
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 20px;
        }

        .sub-aa {
            display: flex;
            align-items: center;
            height: 20px;
            justify-content: space-between;
            flex-grow: 1;
            margin-right: 160px;
        }

        .sell-pro-sup a {
            text-decoration: none;
            color: #e22c3b;
            font-weight: 700;
            transition: all 0.4s ease-in-out;
        }

        .sell-pro-sup a:hover {
            color: black;
        }
    </style>
</head>

<body>
    <div style="padding-top: 150px;"></div>

    <div class="border_control">
        <div class="container_pro_det">
            <div class="control_image_de">
                <img class="pro_image_detail" src="image/image_cover/<?php echo htmlspecialchars($run['imagecover']); ?>" />
            </div>

            <div class="product">
                <h1 class="text_pro_de1"><?php echo htmlspecialchars($run['title']); ?></h1>
                <h2 class="text_pro_de3">฿<?php echo number_format($run['price']); ?></h2>
                <p class="desc text_pro_de2"><?php echo htmlspecialchars($run['description']); ?></p>
                <div>
                    <a href="add_cart.php?code=<?php echo urlencode($run['product_code']); ?>&title=<?php echo urlencode($run['title']); ?>&price=<?php echo urlencode($run['price']); ?>&img_cc=<?php echo urlencode($run['imagecover']); ?>">
                        <button class="add button_pro"><?= __('Add to Cart') ?></button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <?php
    } // End While Loop
}
?>

    <br>
    <br>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
    <script src="code.js"></script>

</body>
</html>
