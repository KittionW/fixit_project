<?php
include("header.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page | FIX IT</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer">

    <style>
        /* Add your custom styles here */
    </style>
</head>

<body>
    <a class="gotopbtn" href="#"> <i class="fas fa-arrow-up"></i> </a>

    <section class="asasa">
        <h2 class="text1 ml2">Products</h2>
    </section>

    <br><br>

    <?php
    $sql = "SELECT * FROM product";
    $con->set_charset('utf8');
    $myquery = mysqli_query($con, $sql);
    ?>

    <div class="main-product">
        <?php while ($run = mysqli_fetch_array($myquery)) { ?>
            <div class="flexmain">
                <a href="product_view.php?code=<?php echo htmlspecialchars($run['product_code']); ?>">
                    <div class="imga">
                        <img class="img-control-product"
                            src="image/image_cover/<?php echo htmlspecialchars($run['imagecover']); ?>"
                            alt="Product Image">
                    </div>
                    <div class="text-product">
                        <h2><?php echo htmlspecialchars($run['title']); ?></h2>
                        <div class="product-text">
                            <span class="hiia">
                                <span class="span-pro"><?= __('Description'); ?>:</span>
                                <?php echo htmlspecialchars($run['description']); ?>
                            </span>
                        </div>
                    </div>
                    <div class="price">
                        <?php echo number_format($run['price']); ?> <?= __('Baht'); ?>
                    </div>
                </a>
            </div>
        <?php } ?>
    </div>

    <br><br>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
    <script src="code.js"></script>
</body>

</html>
