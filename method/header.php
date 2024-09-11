<?php
require ('method/database.php');


function __($text, $domain = 'default') {
    // Implement your localization logic here
    // This is a simple example and should be expanded based on your needs
    return $text; // Return the translated text
}

// Usage


    function currentPage($pageName){
        if (($pageName.".php") == basename($_SERVER['PHP_SELF'])){
            echo ' class="current"';
        }
    }
?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
<section class="overall-nav">

        <div class="container">
            <div class="cover_img">
                <a href="#"><img src="image\it-logo.png"></a>
            </div>

<div>



            <nav>

                <ul>
                    <li>
                        <a <?php currentPage('index'); ?> href="index.php"><?= __('Home')?></a>
                    </li>
                    <li>
                        <a <?php currentPage('about'); ?> href="about.php"><?= __('About Us')?></a>
                    </li>
                    <li>
                        <a <?php currentPage('product'); ?> href="product.php"><?= __('Product')?></a>
                    </li>
                
                    <li>
                        <a <?php currentPage('account'); ?>  href="account.php"><i class="fas fa-user-alt"> </i> <?= __('My account')?></a>
                    </li>

                    <li>
                        <a <?php currentPage('cart'); ?>  href="cart.php"><i class="fas fa-shopping-cart"> </i> <?= __('My Cart')?></a>
                    </li>
                </ul>
            </nav>
        </div>




    </section>
<!-- End Header -->

<script src=" https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>