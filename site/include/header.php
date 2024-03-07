<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<header class="header-area">
                <!-- Header top area start -->
                <div class="header-top-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6">
                                <div class="top-bar-left">
                                    <!-- welcome -->
                                    <div class="welcome">
                                        <p>England's Fastest Online Shopping Destination</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="topbar-nav">
                                    <div class="wpb_wrapper">
                                        <!-- my account -->
                                        <div class="menu-my-account-container">
                                            <a href="#">My Account <i class="ion-ios-arrow-down"></i></a>
                                            <ul>
                                                <li><a href="<?= $SITE_URL?>/tai-khoan/?my_account">My Account</a></li>
                                                <li><a href="<?= $SITE_URL?>/tai-khoan/?login">Login</a></li>
                                                <li><a href="<?= $SITE_URL?>/tai-khoan/?register">Register</a></li>
                                                <li><a href="<?= $SITE_URL?>/gio-hang/?checkout">Checkout</a></li>
                                                <?php if(isset($_SESSION['user']['vai_tro'])&&($_SESSION['user']['vai_tro']==1)){
                                                    ?>
                                                    <li><a href="<?= $ADM_URL?>/trang-chinh/">Administration</a></li>
                                                    <?php
                                                } ?>
                                            </ul>
                                        </div>
                                        <div class="switcher">
                                            <!-- language-menu -->
                                            <div class="language">
                                                <a href="#">
                                                    <img src="<?php echo $SOURCE_URL ?>/images/icons/en.png" alt="language-selector">English
                                                    <i class="ion-ios-arrow-down"></i>
                                                </a>
                                                <ul>
                                                    <li>
                                                        <a href="#">
                                                            <img src="<?php echo $SOURCE_URL ?>/images/icons/fr.png" alt="French">
                                                            <span>French</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- currency-menu -->
                                            <div class="currency">
                                                <a href="#">$ USD<i class="ion-ios-arrow-down"></i></a>
                                                <ul>
                                                    <li><a href="#">€ EUR</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Top bar area end -->
                <!-- Header middle area start -->
                <div class="header-middle-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-2 col-md-12">
                                <!-- site-logo -->
                                <div class="site-logo">
                                    <a href="index.html"><img src="<?php echo $SOURCE_URL ?>/images/logo/logo-white.png" alt="Nikado"></a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-12">
                                <!-- header-search -->
                                <div class="header-search clearfix">
                                    <div class="header-search-form">
                                        <form action="<?=$SITE_URL?>/trang-chinh/index.php?shop&search" method="post">
                                            <input type="text" name="search" placeholder="Search product...">
                                            <input type="submit" name="btn-search" value="Search">
                                        </form>                                    
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-12">
                                <!-- shop-cart-menu -->
                                <div class="shop-cart-menu pull-right">
                                    <ul>
                                        <li><a href="#"><i class="ion-ios-shuffle-strong"></i></a></li>
                                        <li><a href="#"><i class="ion-android-favorite-outline"></i></a></li>
                                        <li><a href="#">
                                            <span class="cart-icon">
                                                <i class="ion-bag"></i><sup><?= isset($_SESSION['cart'])? count($_SESSION['cart']):0 ?></sup>
                                            </span>
                                            <span class="cart-text">
                                                <span class="cart-text-title">My cart <br> 
                                                <?php if(isset($_SESSION['cart'])){
                                                    $total_cart = 0;
                                                    foreach($_SESSION['cart'] as $cart){
                                                        extract($cart);
                                                        $total_cart  = $total_cart + $price*$so_luong;
                                                        }
                                                    }?>
                                                <strong>$<?=!empty($total_cart)?$total_cart :0?></strong>
                                             </span>
                                            </span>
                                        </a>
                                            <ul>
                                                <?php if(isset($_SESSION['cart'])){
                                                    $total = 0;
                                                    foreach($_SESSION['cart'] as $cart){
                                                        extract($cart);
                                                        ?>
                                                        <li>
                                                    <!-- single-shop-cart-wrapper -->
                                                    <div class="single-shop-cart-wrapper">
                                                        <div class="shop-cart-img">
                                                            <a><img src="../../upload/<?=$hinh_anh?>" alt="Image of Product"></a>
                                                        </div>
                                                        <div class="shop-cart-info">
                                                            <h5><a ><?=$name_product?></a></h5>
                                                            <span class="price">$<?=$price?></span>
                                                            <span class="quantaty">Qty: <?=$so_luong?></span>
                                                            <form action="<?=$SITE_URL?>/gio-hang/" method="post">
                                                                 <input type="hidden" name="name_product" value="<?=$name_product?>">
                                                                <button class="cart-remove" type="submit" name="btn-remove"><a><i class="fa fa-times"></i></a></button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </li>
                                                        <?php
                                                        $total  = $total + $price*$so_luong;
                                                    }
                                                } ?>                                               
                                                <li>
                                                    <!-- shop-cart-total -->
                                                    <div class="shop-cart-total">
                                                        <p>Subtotal: <span class="pull-right">$<?=isset($total)?$total:""?></span></p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="shop-cart-btn">
                                                        <a href="<?=$SITE_URL?>/gio-hang/?checkout">Checkout</a>
                                                        <a href="<?=$SITE_URL?>/gio-hang/?cart" class="pull-right">View Cart</a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Header middle area end -->
                <!-- Header bottom area start -->
                <div class="header-bottom-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-3 col-lg-3 hidden-md hidden-sm pull-left category-wrapper">
                                <div class="categori-menu">
                                <span class="categorie-title">Categories</span>
                                <nav>
                                    <ul class="categori-menu-list menu-hidden">
                                    <?php if(isset($categories)){
                                                foreach($categories as $item){
                                                    extract($item);
                                                    ?>
                                                     
                                                     <li><a href="index.php?shop"><?= $name_cate?></a></li>
                                                    <?php
                                                }
                                            } ?>
                                        
                                    </ul>
                                </nav>
                            </div>
                            </div>
                            <div class="col-lg-9">
                                <!-- main-menu -->
                                <div class="main-menu">
                                    <nav>
                                        <ul>
                                            <li class="current"><a href="<?= $SITE_URL?>/trang-chinh/index.php">Home </a></li>
                                            <li><a href="<?= $SITE_URL?>/trang-chinh/index.php?shop">Shop</a></li>
                                            <li><a href="<?= $SITE_URL?>/trang-chinh/index.php?blog">Blog</a></li>
                                            <li><a href="<?= $SITE_URL?>/trang-chinh/index.php?about">About Us</a></li>
                                            <li><a href="<?= $SITE_URL?>/trang-chinh/index.php?contact">Contact</a></li>                                        
                                        </ul>
                                    </nav>
                                </div>
                                <div class="mobile-menu-area">
                                    <div class="mobile-menu">
                                        <nav id="mobile-menu-active">
                                            <ul class="menu-overflow">
                                                <li><a href="#">HOME</a></li>
                                                <li><a href="shop.html">Shop</a></li>
                                                <li><a href="blog.html">Blog</a></li>
                                                <li><a href="about-us.html">About Us</a></li>
                                                <li><a href="contact-us.html">Contact</a></li>                                        
                                            </ul>
                                        </nav>                          
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Header bottom area end -->
            </header>
</body>
</html>