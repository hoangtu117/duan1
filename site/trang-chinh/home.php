<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="slider-area">
        <div class="container">
            <div class="row">
                <div class="slider-hidden col-lg-3">

                </div>
                <div class="slider col-xl-9">

                    <!-- slider-area start -->
                    <div class="slider-area-inner">
                        <!-- slider start -->
                        <div class="slider-inner">
                            <div id="mainSlider" class="nivoSlider nevo-slider">
                                <img src="<?php echo $SOURCE_URL ?>/images/slider/1.jpg" alt="main slider" title="#htmlcaption1" />
                                <img src="<?php echo $SOURCE_URL ?>/images/slider/2.jpg" alt="main slider" title="#htmlcaption2" />
                            </div>
                            <div id="htmlcaption1" class="nivo-html-caption slider-caption">
                                <div class="slider-progress"></div>
                                <div class="col-md-9">
                                    <div class="slider-content slider-content-1 slider-animated-1">
                                        <h1 class="hone">INNOVATIVE</h1>
                                        <h1 class="htwo">SMARTER</h1>
                                        <h1 class="hthree">BRIGHTER</h1>
                                        <h3>40” SkyHi Smart Package</h3>
                                        <div class="button-1 hover-btn-2">
                                            <a href="index.php?shop">SHOP NOW</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="htmlcaption2" class="nivo-html-caption slider-caption">
                                <div class="slider-progress"></div>
                                <div class="col-md-9">
                                    <div class="slider-content slider-content-2 slider-animated-2">
                                        <h1 class="hone">DRONE DIY</h1>
                                        <h1 class="htwo">WORKSHOP</h1>
                                        <h3 class="h3one">Build & Fly</h3>
                                        <h3 class="h3two">Your Own drone!</h3>
                                        <div class="button-1 hover-btn-1">
                                            <a href="index.php?shop">SHOP NOW</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- slider end -->
                    </div>
                    <!-- slider-area end -->
                </div>
            </div>
        </div>
    </div>
    <!-- Slider area end -->
    <!-- Policy area -->
    <div class="policy-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="policy-area-inner">
                        <div class="single-policy-area">
                            <div class="single-policy">
                                <div class="icon"><i class="icon ion-android-sync"></i></div>
                                <h3>Free Return</h3>
                                <p>30 days money back guarantee!</p>
                            </div>
                        </div>
                        <div class="single-policy-area">
                            <div class="single-policy">
                                <div class="icon"><i class="icon ion-paper-airplane"></i></div>
                                <h3>Free Shipping</h3>
                                <p>Free shipping on all order</p>
                            </div>
                        </div>
                        <div class="single-policy-area">
                            <div class="single-policy">
                                <div class="icon"><i class="icon ion-help-buoy"></i></div>
                                <h3>Support 24/7</h3>
                                <p>We support online 24 hrs a day</p>
                            </div>
                        </div>
                        <div class="single-policy-area">
                            <div class="single-policy">
                                <div class="icon"><i class="icon ion-card"></i></div>
                                <h3>Receive Gift Card</h3>
                                <p>Recieve gift all over oder $50</p>
                            </div>
                        </div>
                        <div class="single-policy-area">
                            <div class="single-policy">
                                <div class="icon"><i class="icon ion-ios-locked"></i></div>
                                <h3>Secure Payment</h3>
                                <p>We Value Your Security</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Policy area end -->
    <!-- Deals Of The Day -->
    <div class="deals-of-the-day-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="section-title">
                        <h3>Deals Of The Day</h3>
                    </div>
                </div>
            </div>
            <div class="big-product-area">
                <div class="row">
                    <div class="product-carousel-active owl-carousel">
                        <?php if (isset($deal_of_days)) {
                            foreach ($deal_of_days as $item){
                                extract($item);
                        ?>
                                <div class="col-sm-12">
                                    <div class="single-product-area">
                                        <div class="product-wrapper listview">
                                            <div class="list-col4">
                                                <div class="product-image">
                                                    <a href="index.php?detail&id_product=<?= $id_product ?>">
                                                        <img src="../../upload/<?= $item[9] ?>" alt="detail" >
                                                    </a>

                                                </div>
                                            </div>
                                            <div class="list-col8">
                                                <div class="product-info">
                                                    <h2><a style="color: black;font-size:24px;font-weight:600" href="index.php?detail&id_product=<?= $id_product ?>"><?= $name_product ?></a></h2>
                                                    <span class="price">
                                                        <del>$ <?= $gia_goc ?></del> $ <?= $gia_moi ?>
                                                    </span>
                                                    <?php 
                                                    $rate_star = rand(3,5);
                                                    if($rate_star==4){
                                                         ?>
                                                        <div class="product-rattings" style="font-size: 20px;" >
                                                            <span><i class="fa fa-star"></i></span>
                                                            <span><i class="fa fa-star"></i></span>
                                                            <span><i class="fa fa-star"></i></span>
                                                            <span><i class="fa fa-star"></i></span>
                                                            <span><i class="fa fa-star-o"></i></span>
                                                        </div>
                                                         <?php
                                                    }elseif($rate_star==3){
                                                        ?>
                                                        <div class="product-rattings" style="font-size: 20px;" >
                                                            <span><i class="fa fa-star"></i></span>
                                                            <span><i class="fa fa-star"></i></span>
                                                            <span><i class="fa fa-star"></i></span>
                                                            <span><i class="fa fa-star-o"></i></span>
                                                            <span><i class="fa fa-star-o"></i></span>
                                                        </div>
                                                         <?php
                                                    }
                                                    else{
                                                        ?>
                                                        <div class="product-rattings" style="font-size: 20px;">
                                                            <span><i class="fa fa-star"></i></span>
                                                            <span><i class="fa fa-star"></i></span>
                                                            <span><i class="fa fa-star"></i></span>
                                                            <span><i class="fa fa-star"></i></span>
                                                            <span><i class="fa fa-star"></i></span>
                                                        </div>
                                                         <?php
                                                    }
                                                    ?>
                                                    <div class="product-desc">
                                                        <p><?= $mo_ta ?></p>
                                                    </div>
                                                    <div class="deal-counter">
                                                        <div data-countdown="2023/08/02"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Deals Of The Day -->
    <!-- Home fullwidth banner -->
    <div class="home-fullwidth-banner-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <a href="#">
                        <img src="<?php echo $SOURCE_URL ?>/images/banner/home1-banner2.jpg" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Home fullwidth banner end -->
    <!-- Best sellers -->
    <div class="product-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="section-title">
                        <h3>Best Sellers</h3>
                    </div>
                </div>
            </div>
            <div class="product-area-inner">
                <div class="space-24">
                    <div class="product-carousel-active-2 owl-carousel">
                        <?php if (isset($best_sale)) {
                            foreach ($best_sale as $item) {
                                extract($item);
                        ?>
                                <div class="col-sm-12">
                                    <!-- single product -->
                                    <div class="single-product-area">
                                        <div class="product-wrapper gridview">
                                            <div class="list-col4">
                                                <div class="product-image">
                                                    <a href="index.php?detail&id_product=<?= $id_product ?>">
                                                        <img src="../../upload/<?=$item[9]?>" alt="">
                                                    </a>                                                   
                                                </div>
                                            </div>
                                            <div class="list-col8">
                                                <div class="product-info" style="text-align: center;">
                                                    <h2><a style="color: black;font-size:20px;font-weight:600" href="index.php?detail&id_product=<?= $id_product ?>"><?=$name_product?></a></h2>
                                                    <span class="price">
                                                      $ <?= $gia_goc?>
                                                    </span>
                                                    <?php 
                                                    $rate_star = rand(4,5);
                                                    if($rate_star==4){
                                                         ?>
                                                        <div class="product-rattings" style="margin-left: 70px;">
                                                            <span><i class="fa fa-star"></i></span>
                                                            <span><i class="fa fa-star"></i></span>
                                                            <span><i class="fa fa-star"></i></span>
                                                            <span><i class="fa fa-star"></i></span>
                                                            <span><i class="fa fa-star-o"></i></span>
                                                        </div>
                                                         <?php
                                                    }else{
                                                        ?>
                                                        <div class="product-rattings" style="margin-left: 70px;">
                                                            <span><i class="fa fa-star"></i></span>
                                                            <span><i class="fa fa-star"></i></span>
                                                            <span><i class="fa fa-star"></i></span>
                                                            <span><i class="fa fa-star"></i></span>
                                                            <span><i class="fa fa-star"></i></span>
                                                        </div>
                                                         <?php
                                                    }
                                                    ?>
                                                </div>
                                                <div class="product-hidden">
                                                    <div class="add-to-cart">
                                                        <form action="<?=$SITE_URL?>/gio-hang/" method="post">
                                                        <input type="hidden" name="id_product" value="<?= $id_product ?>">
                                                        <input type="hidden" name="price" value="<?=$gia_goc?>">
                                                        <input type="hidden" name="name_product" value="<?=$name_product?>">
                                                        <input type="hidden" name="hinh_anh" value="<?=$item[9]?>">
                                                        <input type="hidden" name="so_luong" value=1>
                                                            <button style="width: 100%;" class="btn btn-primary " type="submit" name="btn-add-cart">Add to cart</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single product end -->
                                </div>
                        <?php
                            }
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Best sellers end -->
    <!-- Home fullwidth banner -->
    <div class="home-fullwidth-banner-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <a href="#">
                        <img src="<?php echo $SOURCE_URL ?>/images/banner/home1-banner3.jpg" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Home fullwidth banner end -->
    <!-- Best sellers -->
    <div class="product-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="section-title">
                        <h3>New Arrivals</h3>
                    </div>
                </div>
            </div>
            <div class="product-area-inner">
                <div class="space-24" style="text-align: center;">
                    <div class="product-carousel-active-3 owl-carousel">
                    <?php if (isset($new_arrival)) {
                            foreach ($new_arrival as $item) {
                                extract($item);
                        ?>
                        <div class="col-sm-12">
                            <!-- single product -->
                            <div class="single-product-area">
                                <div class="product-wrapper gridview">
                                    <div class="list-col4">
                                        <div class="product-image">
                                            <a href="index.php?detail&id_product=<?= $id_product ?>">
                                                <img src="../../upload/<?=$item[9]?>" alt="">
                                            </a> 
                                        </div>
                                    </div>
                                    <div class="list-col8">
                                        <div class="product-info" >
                                            <h2><a style="color: black;font-size:20px;font-weight:600" href="index.php?detail&id_product=<?= $id_product ?>"><?= $name_product?></a></h2>
                                            <span class="price">
                                                <del>$ <?=$gia_goc?></del> $ <?=$gia_moi?>
                                            </span>
                                            <?php 
                                                    $rate_star = rand(3,5);
                                                    if($rate_star==4){
                                                         ?>
                                                        <div class="product-rattings" style="margin-left: 70px;" >
                                                            <span><i class="fa fa-star"></i></span>
                                                            <span><i class="fa fa-star"></i></span>
                                                            <span><i class="fa fa-star"></i></span>
                                                            <span><i class="fa fa-star"></i></span>
                                                            <span><i class="fa fa-star-o"></i></span>
                                                        </div>
                                                         <?php
                                                    }elseif($rate_star==3){
                                                        ?>
                                                        <div class="product-rattings" style="margin-left: 70px;" >
                                                            <span><i class="fa fa-star"></i></span>
                                                            <span><i class="fa fa-star"></i></span>
                                                            <span><i class="fa fa-star"></i></span>
                                                            <span><i class="fa fa-star-o"></i></span>
                                                            <span><i class="fa fa-star-o"></i></span>
                                                        </div>
                                                         <?php
                                                    }
                                                    else{
                                                        ?>
                                                        <div class="product-rattings" style="margin-left: 70px;">
                                                            <span><i class="fa fa-star"></i></span>
                                                            <span><i class="fa fa-star"></i></span>
                                                            <span><i class="fa fa-star"></i></span>
                                                            <span><i class="fa fa-star"></i></span>
                                                            <span><i class="fa fa-star"></i></span>
                                                        </div>
                                                         <?php
                                                    }
                                                    ?>
                                        </div>
                                        <div class="product-hidden">
                                            <div class="add-to-cart">
                                            <form action="<?=$SITE_URL?>/gio-hang/" method="post">
                                                        <input type="hidden" name="id_product" value="<?= $id_product ?>">
                                                        <input type="hidden" name="price" value="<?=$gia_goc?>">
                                                        <input type="hidden" name="name_product" value="<?=$name_product?>">
                                                        <input type="hidden" name="hinh_anh" value="<?=$item[9]?>">
                                                        <input type="hidden" name="so_luong" value=1>
                                                            <button style="width: 100%;" class="btn btn-primary" type="submit" name="btn-add-cart">Add to cart</button>
                                                        </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- single product end -->
                        </div>
                        <?php
                        }
                        }?>
                </div>
            </div>
        </div>
    </div>
    <!-- Best sellers end -->
    <!-- home banner four -->
    <div class="home-banner-four">
        <div class="container">
            <div class="row">
                <div class="col-sm-5 banner-four-one">
                    <a href="index.php?shop"><img src="<?php echo $SOURCE_URL ?>/images/banner/ehome1-banner4-1.png" alt=""></a>
                </div>
                <div class="col-sm-7 banner-four-two">
                    <div class="top-banner">
                        <a href="index.php?shop"><img src="<?php echo $SOURCE_URL ?>/images/banner/home1-banner4-2.png" alt=""></a>
                    </div>
                    <div class="bottom-banner">
                        <div class="row">
                            <div class="col-sm-6">
                                <a href="index.php?shop"><img src="<?php echo $SOURCE_URL ?>/images/banner/home1-banner4-3.jpg" alt=""></a>
                            </div>
                            <div class="col-sm-6">
                                <a href="index.php?shop"><img src="<?php echo $SOURCE_URL ?>/images/banner/home1-banner4-4.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="brand-logo-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="brand-carousel-active owl-carousel">
                        <!-- single brand logo -->
                        <div class="brand-logo">
                            <a href="#"><img src="<?php echo $SOURCE_URL ?>/images/brand/brand1.jpg" alt="Brand logo"></a>
                        </div>
                        <!-- single brand logo end -->
                        <!-- single brand logo -->
                        <div class="brand-logo">
                            <a href="#"><img src="<?php echo $SOURCE_URL ?>/images/brand/brand2.jpg" alt="Brand logo"></a>
                        </div>
                        <!-- single brand logo end -->
                        <!-- single brand logo -->
                        <div class="brand-logo">
                            <a href="#"><img src="<?php echo $SOURCE_URL ?>/images/brand/brand3.jpg" alt="Brand logo"></a>
                        </div>
                        <!-- single brand logo end -->
                        <!-- single brand logo -->
                        <div class="brand-logo">
                            <a href="#"><img src="<?php echo $SOURCE_URL ?>/images/brand/brand4.jpg" alt="Brand logo"></a>
                        </div>
                        <!-- single brand logo end -->
                        <!-- single brand logo -->
                        <div class="brand-logo">
                            <a href="#"><img src="<?php echo $SOURCE_URL ?>/images/brand/brand5.jpg" alt="Brand logo"></a>
                        </div>
                        <!-- single brand logo end -->
                        <!-- single brand logo -->
                        <div class="brand-logo">
                            <a href="#"><img src="<?php echo $SOURCE_URL ?>/images/brand/brand6.jpg" alt="Brand logo"></a>
                        </div>
                        <!-- single brand logo end -->
                        <!-- single brand logo -->
                        <div class="brand-logo">
                            <a href="#"><img src="<?php echo $SOURCE_URL ?>/images/brand/brand7.jpg" alt="Brand logo"></a>
                        </div>
                        <!-- single brand logo end -->
                        <!-- single brand logo -->
                        <div class="brand-logo">
                            <a href="#"><img src="<?php echo $SOURCE_URL ?>/images/brand/brand8.jpg" alt="Brand logo"></a>
                        </div>
                        <!-- single brand logo end -->
                        <!-- single brand logo -->
                        <div class="brand-logo">
                            <a href="#"><img src="<?php echo $SOURCE_URL ?>/images/brand/brand9.jpg" alt="Brand logo"></a>
                        </div>
                        <!-- single brand logo end -->
                        <!-- single brand logo -->
                        <div class="brand-logo">
                            <a href="#"><img src="<?php echo $SOURCE_URL ?>/images/brand/brand1.jpg" alt="Brand logo"></a>
                        </div>
                        <!-- single brand logo end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>