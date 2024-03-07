<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="breadcrumbs-container">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <nav class="woocommerce-breadcrumb">
                        <a href="index.html">Home</a>
                        <span class="separator">/</span>
                        <a href="shop.html">Shop</a>
                        <span class="separator">/</span> Detail
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumbs End -->
    <!-- Page title -->
    <div class="entry-header">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="entry-title">Detail Product</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Page title end -->
    <!-- Single product area -->
    <div class="single-product-area">
        <div class="container">
            <div class="single-product-wrapper">
                <div class="row">
                    <div class="col-xs-12 col-md-7 col-lg-7 position-relative">
                        <div class="product-details-img-content product-details">
                            <div class="product-details-tab mr-40">
                                <div class="product-details-large tab-content">
                                    <?php if (isset($image_all)) {
                                        $count = 1;
                                        foreach ($image_all as $item) {
                                            extract($item);
                                            if ($count == 1) {

                                    ?>
                                                <div class="tab-pane active" id="pro-details<?= $count ?>">
                                                    <div class="product-popup">
                                                        <a href="../../upload/<?= $name_image ?>">
                                                            <img src="../../upload/<?= $name_image ?>" alt="">
                                                        </a>
                                                    </div>
                                                </div>
                                            <?php
                                            } else {
                                            ?>
                                                <div class="tab-pane" id="pro-details<?= $count ?>">
                                                    <div class="product-popup">
                                                        <a href="../../upload/<?= $name_image ?>">
                                                            <img src="../../upload/<?= $name_image ?>" alt="">
                                                        </a>
                                                    </div>
                                                </div>
                                    <?php
                                            }
                                            $count++;
                                        }
                                    } ?>

                                </div>
                                <div class="product-details-small nav product-dec-slider owl-carousel">
                                    <?php if (isset($image_all)) {
                                        $count = 1;
                                        foreach ($image_all as $item) {
                                            extract($item);
                                            if ($count == 1) {

                                    ?>
                                                <a class="active" href="#pro-details<?= $count ?>">
                                                    <img src="../../upload/<?= $name_image ?>" alt="">
                                                </a>
                                            <?php
                                            } else {
                                            ?>
                                                <a href="#pro-details<?= $count ?>">
                                                    <img src="../../upload/<?= $name_image ?>" alt="">
                                                </a>
                                    <?php
                                            }
                                            $count++;
                                        }
                                    } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-5 col-lg-5 ml-5">
                        <div class="single-product-info">
                            <?php if (isset($product_detail_image)) {
                                extract($product_detail_image[0]);
                            ?>
                                <h1 style="font-size: 32px;font-weight:600;"><?= $name_product ?></h1>
                                <span class="price" style="margin-top: -25px;" >
                                    <del>$ <?= $gia_goc ?></del> $ <?= $gia_moi ?>
                                </span>
                                <?php
                                $rate_star = rand(4, 5);
                                if ($rate_star == 4) {
                                ?>
                                    <div class="product-rattings" style="font-size: 20px;margin-top: -25px;">
                                        <span><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star-o"></i></span>
                                    </div>
                                <?php
                                } else {
                                ?>
                                    <div class="product-rattings" style="font-size: 20px;margin-top: -25px;">
                                        <span><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star"></i></span>
                                    </div>
                                <?php
                                }
                                ?>
                                <p><?= $mo_ta ?></p>
                                <div class="box-quantity d-flex">
                                    <form action="<?= $SITE_URL ?>/gio-hang/" method="post">
                                        <input class="quantity mr-40" min="1" name="so_luong" value="1" type="number">
                                        <input type="hidden" name="id_product" value="<?= $id_product ?>">
                                        <input type="hidden" name="price" value="<?= $gia_goc ?>">
                                        <input type="hidden" name="name_product" value="<?= $name_product ?>">
                                        <input type="hidden" name="hinh_anh" value="<?= $product_detail_image[0][0] ?>">
                                        <button type="submit" name="btn-add-cart" style="background-color:blue;padding: 4px 8px;height: 45px;"> <a style="color: white;font-size: 20px; font-weight: 600;">Add to cart</a></button>
                                    </form>
                                </div>
                                <div class="product_meta">
                                    <span class="posted_in">Tag: <a rel="tag"><?= $name_tag ?></a></span>
                                </div>
                            <?php
                            } ?>
                            <div class="single-product-sharing">
                                <div class="widget widget_socialsharing_widget">
                                    <h3 class="widget-title">Share this product</h3>
                                    <ul class="social-icons">
                                        <li><a class="facebook social-icon" href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a class="twitter social-icon" href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a class="pinterest social-icon" href="#"><i class="fa fa-pinterest"></i></a></li>
                                        <li><a class="gplus social-icon" href="#"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a class="linkedin social-icon" href="#"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Single product area end -->
    <!-- Single related product -->
    <div class="single-related-product-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="section-title">
                        <h3>Related products</h3>
                    </div>
                </div>
            </div>
            <div class="row text-center">
                
                <?php if (isset($product_relation)) {
                    foreach ($product_relation as $item) {
                        extract($item);
                ?>
                        <div class="related-product">
                            <div class="single-product-area">
                                <div class="product-wrapper gridview">
                                    <div class="list-col4">
                                        <div class="product-image">
                                            <a href="index.php?id_product=<?= $id_product ?>">
                                                <img src="../../upload/<?= $item[9] ?>" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="list-col8">
                                        <div class="product-info">
                                            <h2><a href="index.php?id_product=<?= $id_product ?>"><?= $name_product ?></a></h2>
                                            <span class="price">
                                                <del>$ <?= $gia_goc ?></del> $ <?= $gia_moi ?>
                                            </span>
                                            <?php
                                            $rate_star = rand(4, 5);
                                            if ($rate_star == 4) {
                                            ?>
                                                <div class="product-rattings" style="margin-left: 40px;">
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star-o"></i></span>
                                                </div>
                                            <?php
                                            } else {
                                            ?>
                                                <div class="product-rattings" style="margin-left: 40px;">
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
                                                <form action="<?= $SITE_URL ?>/gio-hang/" method="post">
                                                    <input type="hidden" name="id_product" value="<?= $id_product ?>">
                                                    <input type="hidden" name="price" value="<?= $gia_goc ?>">
                                                    <input type="hidden" name="name_product" value="<?= $name_product ?>">
                                                    <input type="hidden" name="hinh_anh" value="<?= $item[9] ?>">
                                                    <input type="hidden" name="so_luong" value=1>
                                                    <button style="width: 100%;" class="btn btn-primary" type="submit" name="btn-add-cart">Add to cart</button>
                                                </form>
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
</body>

</html>