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
                    <span class="separator">/</span> Shop
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumbs End -->

<!-- Shop page wraper -->
<div class="shop-page-wraper">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-3 sidebar-shop">
                <div class="sidebar-product-categori">
                    <div class="widget-title">
                        <h3>PRODUCT CATEGORIES</h3>
                    </div>
                    <div class="widget-content">
                        <ul class="product-categories">
                            <?php if (isset($number_cate)) {
                                foreach ($number_cate as $item) {
                                    extract($item);
                            ?>
                                    <li class="cat-item">
                                        <a href="index.php?shop&id_cate=<?=$id_cate?>"><?= $name_cate ?></a>
                                        <span class="count">(<?= $count ?>)</span>
                                    </li>
                            <?php

                                }
                            }  ?>
                        </ul>
                    </div>
                    <div class="product-filter mb-30">
                        <div class="widget-title">
                            <h3>Filter by price</h3>
                        </div>
                        <div class="widget-content">
                            <div id="price-range"></div>
                            <div class="price-values">
                                <form action="index.php?shop&filter" method="post" >
                                    <div class="price_text_btn">
                                        <span>Price:</span>
                                        <input type="text" class="price-amount" name="range_price">
                                    </div>
                                    <button class="button" name="btn-filter" type="submit">Filter</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar-single-banner">
                        <a href="#">
                            <img src="<?php echo $SOURCE_URL ?>/images/banner/shop-sidebar.jpg" alt="Banner">
                        </a>
                    </div>
                    <div class="sidebar-tag">
                        <div class="widget-title">
                            <h3>PRODUCT TAGS</h3>
                        </div>
                        <div class="widget-content">
                            <div class="product-tags">
                                <?php if (isset($product_tag)) {
                                    foreach ($product_tag as $item) {
                                        extract($item);
                                ?>
                                        <a href="index.php?shop&id_tag=<?=$id_tag?>"><?= $name_tag ?> </a>
                                <?php
                                    }
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-9 shop-content">
                <div class="shop-banner">
                    <img src="<?php echo $SOURCE_URL ?>/images/banner/shop-category.jpg" alt="">
                </div>
                <div class="product-toolbar">
                    <div class="topbar-title">
                        <h1>Shop</h1>
                    </div>
                    <div class="product-toolbar-inner">
                                    <div class="product-view-mode">
                                        <ul class="nav nav-tabs">
                                            <li><a class="active" data-bs-toggle="tab" href="#grid"><i class="ion-grid"></i></a></li>
                                            <li><a data-bs-toggle="tab" href="#list"><i class="ion-navicon"></i></a></li>
                                        </ul>
                                    </div>
                                    <p class="woocommerce-result-count">
                                        Showing <?=($curentPage>1)?($curentPage-1)*6:1?>–<?=isset($count_product_in_page)?$count_product_in_page:""?> of <?= isset($count_all)? $count_all:"" ?> results
                                    </p>
                                    <div class="woocommerce-ordering">
                                        <form method="post" class="woocommerce-ordering hidden-xs" action="">
                                            <div class="orderby-wrapper">
                                                <label>Sort By :</label>
                                                <select name="sort" class="nice-select-menu orderby" onchange="this.form.submit()">
                                                    <option value="default" <?= (isset($sort)&&$sort=="default")? "selected":""?>>Default sorting</option>
                                                    <option value="price-asc" <?= (isset($sort)&&$sort=="price-asc")? "selected":""?>>Sort by price: low to high</option>
                                                    <option value="price-desc" <?= (isset($sort)&&$sort=="price-desc")? "selected":""?>>Sort by price: high to low</option>
                                                </select>
                                            </div>
                                            <?php  if(isset($range_down)&&isset($range_up)){
                                                ?>
                                                <input type="hidden" name="range_down" value="<?=$range_down?>">
                                                <input type="hidden" name="range_up" value="<?=$range_up?>">
                                                <?php
                                                }
                                                if(isset($search)){
                                                    ?>
                                                    <input type="hidden" name="key" value="<?=$search?>">
                                                    <?php
                                                }
                                            ?>
                                        </form>
                                    </div>
                                </div>
                    <?php  ?>
                    <div class="shop-page-product-area tab-content">
                        <div id="grid" class="tab-pane fade in show active">
                            <div class="row text-center">
                                <?php if (isset($products_page )) {
                                    foreach ($products_page as $item) {
                                        extract($item);
                                ?>
                                        <div class="col-sm-6 col-md-4 col-xl-4">
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
                                                        <div class="product-info">
                                                            <h2><a style="color: black;font-size:20px;font-weight:600" href="index.php?detail&id_product=<?= $id_product ?>"><?= $name_product?></a></h2>
                                                            <span class="price">
                                                                <del>$ <?=$gia_goc?></del> $ <?= $gia_moi?>
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
                                        </div>
                                        
                                        
                                        <?php
                                    }
                                    if($total_page>1){

                                   ?>
                                    <p class="text-center"><span  class="btn btn-primary fw-bold "><a href="index.php?shop&page=<?=($curentPage - 1)>0? ($curentPage - 1): 1?><?= (isset($sort)&&$sort!=="default" )?"&sort=".$sort:""?>"><</a></span>
                                    <?php if($curentPage  > 1 ){
                                        ?>
                                    <span  class="btn btn-danger fw-bold "><a class="text-black font-[700]" href="index.php?shop&page=<?= ($curentPage-1) ?><?= (isset($sort)&&$sort!=="default" )?"&sort=".$sort:""?>"><?= ($curentPage-1) ?></a></span>
                                        <?php
                                    } ?>  
                                    <span  class="btn btn-danger fw-bold "><a class="text-black font-[700]" href="index.php?shop&page=<?= $curentPage ?><?= (isset($sort)&&$sort!=="default" )?"&sort=".$sort:""?>"><?= $curentPage ?></a></span>
                                    <?php if(($curentPage + 1) <= $total_page){
                                        ?>
                                    <span  class="btn btn-danger fw-bold "><a class="text-black font-[700]" href="index.php?shop&page=<?= ($curentPage+1) ?><?= (isset($sort)&&$sort!=="default" )?"&sort=".$sort:""?>"><?= ($curentPage+1) ?></a></span>
                                        <?php
                                    } ?>
                                    
                                    <span  class="btn btn-primary fw-bold "><a href="index.php?shop&page=<?=($curentPage + 1)>$total_page? $total_page :($curentPage + 1)?><?= (isset($sort)&&$sort!=="default" )?"&sort=".$sort:""?>">></a></span></p>
                                   <?php
                                    }
                                }  ?>
                                <?php if (isset($products_page_search)) {
                                    foreach ($products_page_search as $item) {
                                        extract($item);
                                ?>
                                        <div class="col-sm-6 col-md-4 col-xl-4">
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
                                                        <div class="product-info">
                                                            <h2><a style="color: black;font-size:20px;font-weight:600" href="index.php?detail&id_product=<?= $id_product ?>"><?= $name_product?></a></h2>
                                                            <span class="price">
                                                                <del>$ <?=$gia_goc?></del> $ <?= $gia_moi?>
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
                                                            <button style="width: 100%;" class="btn btn-primary" type="submit" name="btn-add-cart"> Add to cart</button>
                                                        </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                <?php
                                    }
                                    if($total_page>1){

                                    ?>
                                    <p class="text-center"><span  class="btn btn-primary fw-bold "><a href="index.php?shop&search&key=<?=$search?>&page=<?=($curentPage - 1)>0? ($curentPage - 1): 1?><?= (isset($sort)&&$sort!=="default" )?"&sort=".$sort:""?>"><</a></span>
                                    <?php if($curentPage > 1 ){
                                        ?>
                                    <span  class="btn btn-danger fw-bold "><a class="text-black font-[700]" href="index.php?shop&search&key=<?=$search?>&page=<?= ($curentPage-1) ?><?= (isset($sort)&&$sort!=="default" )?"&sort=".$sort:""?>"><?= ($curentPage-1) ?></a></span>
                                    <?php
                                    } ?>  
                                    <span  class="btn btn-danger fw-bold "><a class="text-black font-[700]" href="index.php?shop&search&key=<?=$search?>&page=<?= $curentPage ?><?= (isset($sort)&&$sort!=="default" )?"&sort=".$sort:""?>"><?= $curentPage ?></a></span>
                                    <?php if(($curentPage + 1) <= $total_page){
                                        ?>
                                    <span  class="btn btn-danger fw-bold "><a class="text-black font-[700]" href="index.php?shop&search&key=<?=$search?>&page=<?= ($curentPage+1) ?><?= (isset($sort)&&$sort!=="default" )?"&sort=".$sort:""?>"><?= ($curentPage+1) ?></a></span>
                                    <?php
                                    } ?>  
                                    
                                    <span  class="btn btn-primary fw-bold "><a href="index.php?shop&search&key=<?=$search?>&page=<?=($curentPage + 1)>$total_page? $total_page :($curentPage + 1)?><?= (isset($sort)&&$sort!=="default" )?"&sort=".$sort:""?>">></a></span></p>
                                   <?php
                                    }
                                }  ?>
                                <?php if (isset($products_page_cate)) {
                                    foreach ($products_page_cate as $item) {
                                        extract($item);
                                ?>
                                        <div class="col-sm-6 col-md-4 col-xl-4">
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
                                                        <div class="product-info">
                                                            <h2><a style="color: black;font-size:20px;font-weight:600" href="index.php?detail&id_product=<?= $id_product ?>"><?= $name_product?></a></h2>
                                                            <span class="price">
                                                                <del>$ <?=$gia_goc?></del> $ <?= $gia_moi?>
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
                                        </div>
                                <?php
                                    }
                                    if($total_page>1){

                                    ?>
                                    <p class="text-center">
                                        <span  class="btn btn-primary fw-bold "><a href="index.php?shop&id_cate=<?=$_GET['id_cate']?>&page=<?=($curentPage - 1)>0? ($curentPage - 1): 1?><?= (isset($sort)&&$sort!=="default" )?"&sort=".$sort:""?>"><</a></span>
                                        <?php if($curentPage > 1 ){
                                        ?>
                                        <span  class="btn btn-danger fw-bold "><a class="text-black font-[700]" href="index.php?shop&id_cate=<?=$_GET['id_cate']?>&page=<?= ($curentPage-1) ?><?= (isset($sort)&&$sort!=="default" )?"&sort=".$sort:""?>"><?= ($curentPage-1) ?></a></span>
                                        <?php
                                        } ?> 
                                        <span  class="btn btn-danger fw-bold "><a class="text-black font-[700]" href="index.php?shop&id_cate=<?=$_GET['id_cate']?>&page=<?= $curentPage ?><?= (isset($sort)&&$sort!=="default" )?"&sort=".$sort:""?>"><?= $curentPage ?></a></span>
                                        <?php if(($curentPage + 1) <= $total_page){
                                        ?>
                                        <span  class="btn btn-danger fw-bold "><a class="text-black font-[700]" href="index.php?shop&id_cate=<?=$_GET['id_cate']?>&page=<?= ($curentPage+1) ?><?= (isset($sort)&&$sort!=="default" )?"&sort=".$sort:""?>"><?= ($curentPage+1) ?></a></span>
                                        <?php
                                        } ?> 
                                        
                                        <span  class="btn btn-primary fw-bold "><a href="index.php?shop&id_cate=<?=$_GET['id_cate']?>&page=<?=($curentPage + 1)>$total_page? $total_page :($curentPage + 1)?><?= (isset($sort)&&$sort!=="default" )?"&sort=".$sort:""?>">></a></span></p>
                                   <?php
                                    }
                                }  ?>
                                <?php if (isset($products_page_tag)) {
                                    foreach ($products_page_tag as $item) {
                                        extract($item);
                                ?>
                                        <div class="col-sm-6 col-md-4 col-xl-4">
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
                                                        <div class="product-info">
                                                            <h2><a style="color: black;font-size:20px;font-weight:600" href="index.php?detail&id_product=<?= $id_product ?>"><?= $name_product?></a></h2>
                                                            <span class="price">
                                                                <del>$ <?=$gia_goc?></del> $ <?= $gia_moi?>
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
                                                            <button style="width: 100%;" class="btn btn-primary" type="submit" name="btn-add-cart"> Add to cart</button>
                                                        </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                <?php
                                    }
                                    if($total_page>1){

                                    ?>
                                    <p class="text-center">
                                        <span  class="btn btn-primary fw-bold "><a href="index.php?shop&id_tag=<?=$_GET['id_tag']?>&page=<?=($curentPage - 1)>0? ($curentPage - 1): 1?><?= (isset($sort)&&$sort!=="default" )?"&sort=".$sort:""?>"><</a></span>
                                        <?php if($curentPage > 1 ){
                                        ?>
                                        <span  class="btn btn-danger fw-bold "><a class="text-black font-[700]" href="index.php?shop&id_tag=<?=$_GET['id_tag']?>&page=<?= ($curentPage-1) ?><?= (isset($sort)&&$sort!=="default" )?"&sort=".$sort:""?>"><?= ($curentPage-1) ?></a></span>
                                        <?php
                                        } ?>
                                        <span  class="btn btn-danger fw-bold "><a class="text-black font-[700]" href="index.php?shop&id_tag=<?=$_GET['id_tag']?>&page=<?= $curentPage ?><?= (isset($sort)&&$sort!=="default" )?"&sort=".$sort:""?>"><?= $curentPage ?></a></span>
                                        <?php if(($curentPage + 1) <= $total_page){
                                        ?>
                                        <span  class="btn btn-danger fw-bold "><a class="text-black font-[700]" href="index.php?shop&id_tag=<?=$_GET['id_tag']?>&page=<?= ($curentPage+1) ?><?= (isset($sort)&&$sort!=="default" )?"&sort=".$sort:""?>"><?= ($curentPage+1) ?></a></span>
                                        <?php
                                        } ?> 
                                        
                                        <span  class="btn btn-primary fw-bold "><a href="index.php?shop&id_tag=<?=$_GET['id_tag']?>&page=<?=($curentPage + 1)>$total_page? $total_page :($curentPage + 1)?><?= (isset($sort)&&$sort!=="default" )?"&sort=".$sort:""?>">></a></span></p>
                                   <?php
                                    }
                                }  ?>
                                <?php if (isset($products_page_filter)) {
                                    foreach ($products_page_filter as $item) {
                                        extract($item);
                                ?>
                                        <div class="col-sm-6 col-md-4 col-xl-4">
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
                                                        <div class="product-info">
                                                            <h2><a style="color: black;font-size:20px;font-weight:600" href="index.php?detail&id_product=<?= $id_product ?>"><?= $name_product?></a></h2>
                                                            <span class="price">
                                                                <del>$ <?=$gia_goc?></del> $ <?= $gia_moi?>
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
                                                            <button style="width: 100%;" class="btn btn-primary" type="submit" name="btn-add-cart"> Add to cart</button>
                                                        </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                <?php
                                    }
                                    if($total_page>1){

                                    ?>
                                    <p class="text-center"><span  class="btn btn-primary fw-bold "><a href="index.php?shop&filter&range_down=<?=$range_down?>&range_up=<?=$range_up?>&page=<?=($curentPage - 1)>0? ($curentPage - 1): 1?><?= (isset($sort)&&$sort!=="default" )?"&sort=".$sort:""?>"><</a></span>
                                    <?php if($curentPage > 1 ){
                                        ?>
                                    <span  class="btn btn-danger fw-bold "><a class="text-black font-[700]" href="index.php?shop&filter&range_down=<?=$range_down?>&range_up=<?=$range_up?>&page=<?= ($curentPage-1) ?><?= (isset($sort)&&$sort!=="default" )?"&sort=".$sort:""?>"><?= ($curentPage-1) ?></a></span>
                                    <?php
                                    } ?> 
                                    <span  class="btn btn-danger fw-bold "><a class="text-black font-[700]" href="index.php?shop&filter&range_down=<?=$range_down?>&range_up=<?=$range_up?>&page=<?= $curentPage ?><?= (isset($sort)&&$sort!=="default" )?"&sort=".$sort:""?>"><?= $curentPage ?></a></span>
                                    <?php if(($curentPage + 1) <= $total_page){
                                        ?>
                                    <span  class="btn btn-danger fw-bold "><a class="text-black font-[700]" href="index.php?shop&filter&range_down=<?=$range_down?>&range_up=<?=$range_up?>&page=<?= ($curentPage+1) ?><?= (isset($sort)&&$sort!=="default" )?"&sort=".$sort:""?>"><?= ($curentPage+1) ?></a></span>
                                    <?php
                                    } ?> 
                                    
                                    <span  class="btn btn-primary fw-bold "><a href="index.php?shop&filter&range_down=<?=$range_down?>&range_up=<?=$range_up?>&page=<?=($curentPage + 1)>$total_page? $total_page :($curentPage + 1)?><?= (isset($sort)&&$sort!=="default" )?"&sort=".$sort:""?>">></a></span></p>
                                   <?php
                                    }
                                }  ?>
                            </div>
                        </div>
                        <div id="list" class="tab-pane fade">
                                <div class="row">
                                <?php if (isset($products_page)) {
                                    foreach ($products_page as $item) {
                                        extract($item);
                                ?>
                                    <div class="col-sm-12">
                                        <div class="single-product-area">
                                            <div class="product-wrapper listview">
                                                <div class="list-col4">
                                                    <div class="product-image">
                                                        <a href="index.php?detail&id_product=<?= $id_product ?>">
                                                            <img src="../../upload/<?=$item[9]?>" alt="">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="list-col8">
                                                    <div class="product-info">
                                                        <h2><a style="color: black;font-size:20px;font-weight:600" href="index.php?detail&id_product=<?= $id_product ?>"><?=$name_product?></a></h2>
                                                        <span class="price">
                                                            <del>$ <?=$gia_goc?></del> $ <?=$gia_moi?>
                                                        </span>
                                                        <?php 
                                                    $rate_star = rand(3,5);
                                                    if($rate_star==4){
                                                         ?>
                                                        <div class="product-rattings"  >
                                                            <span><i class="fa fa-star"></i></span>
                                                            <span><i class="fa fa-star"></i></span>
                                                            <span><i class="fa fa-star"></i></span>
                                                            <span><i class="fa fa-star"></i></span>
                                                            <span><i class="fa fa-star-o"></i></span>
                                                        </div>
                                                         <?php
                                                    }elseif($rate_star==3){
                                                        ?>
                                                        <div class="product-rattings"  >
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
                                                        <div class="product-rattings" >
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
                                                            <p><?=$mo_ta?></p>
                                                        </div>
                                                    </div>
                                                    <div class="actions-wrapper">
                                                        <div class="add-to-cart">
                                                        <form action="<?=$SITE_URL?>/gio-hang/" method="post">
                                                        <input type="hidden" name="id_product" value="<?= $id_product ?>">
                                                        <input type="hidden" name="price" value="<?=$gia_goc?>">
                                                        <input type="hidden" name="name_product" value="<?=$name_product?>">
                                                        <input type="hidden" name="hinh_anh" value="<?=$item[9]?>">
                                                        <input type="hidden" name="so_luong" value=1>
                                                            <button class="btn btn-primary" type="submit" name="btn-add-cart"> Add to cart</button>
                                                        </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                    }
                                    if($total_page > 1){

                                    ?>
                                    <p class="text-center"><span  class="btn btn-primary fw-bold "><a href="index.php?shop&page=<?=($curentPage - 1)>0? ($curentPage - 1): 1?><?= (isset($sort)&&$sort!=="default" )?"&sort=".$sort:""?>"><</a></span>
                                    <?php if($curentPage > 1 ){
                                        ?>
                                    <span  class="btn btn-danger fw-bold "><a class="text-black font-[700]" href="index.php?shop&page=<?= ($curentPage-1) ?><?= (isset($sort)&&$sort!=="default" )?"&sort=".$sort:""?>"><?= ($curentPage-1) ?></a></span>
                                        <?php
                                    } ?>
                                    <span  class="btn btn-danger fw-bold "><a class="text-black font-[700]" href="index.php?shop&page=<?= $curentPage ?><?= (isset($sort)&&$sort!=="default" )?"&sort=".$sort:""?>"><?= $curentPage ?></a></span>
                                    <?php if(($curentPage + 1) < $total_page){
                                        ?>
                                    <span  class="btn btn-danger fw-bold "><a class="text-black font-[700]" href="index.php?shop&page=<?= ($curentPage+1) ?><?= (isset($sort)&&$sort!=="default" )?"&sort=".$sort:""?>"><?= ($curentPage+1) ?></a></span>
                                        <?php
                                    } ?>
                                    
                                    <span  class="btn btn-primary fw-bold "><a href="index.php?shop&page=<?=($curentPage + 1)>$total_page? $total_page :($curentPage + 1)?><?= (isset($sort)&&$sort!=="default" )?"&sort=".$sort:""?>">></a></span></p>
                                   <?php
                                    }
                                }?>
                                <?php if (isset($products_page_search)) {
                                    foreach ($products_page_search as $item) {
                                        extract($item);
                                ?>
                                    <div class="col-sm-12">
                                        <div class="single-product-area">
                                            <div class="product-wrapper listview">
                                                <div class="list-col4">
                                                    <div class="product-image">
                                                        <a href="index.php?detail&id_product=<?= $id_product ?>">
                                                            <img src="../../upload/<?=$item[9]?>" alt="">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="list-col8">
                                                    <div class="product-info">
                                                        <h2><a style="color: black;font-size:20px;font-weight:600" href="index.php?detail&id_product=<?= $id_product ?>"><?=$name_product?></a></h2>
                                                        <span class="price">
                                                            <del>$ <?=$gia_goc?></del> $ <?=$gia_moi?>
                                                        </span>
                                                        <?php 
                                                    $rate_star = rand(3,5);
                                                    if($rate_star==4){
                                                         ?>
                                                        <div class="product-rattings"  >
                                                            <span><i class="fa fa-star"></i></span>
                                                            <span><i class="fa fa-star"></i></span>
                                                            <span><i class="fa fa-star"></i></span>
                                                            <span><i class="fa fa-star"></i></span>
                                                            <span><i class="fa fa-star-o"></i></span>
                                                        </div>
                                                         <?php
                                                    }elseif($rate_star==3){
                                                        ?>
                                                        <div class="product-rattings"  >
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
                                                        <div class="product-rattings" >
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
                                                            <p><?=$mo_ta?></p>
                                                        </div>
                                                    </div>
                                                    <div class="actions-wrapper">
                                                        <div class="add-to-cart">
                                                        <form action="<?=$SITE_URL?>/gio-hang/" method="post">
                                                        <input type="hidden" name="id_product" value="<?= $id_product ?>">
                                                        <input type="hidden" name="price" value="<?=$gia_goc?>">
                                                        <input type="hidden" name="name_product" value="<?=$name_product?>">
                                                        <input type="hidden" name="hinh_anh" value="<?=$item[9]?>">
                                                        <input type="hidden" name="so_luong" value=1>
                                                            <button class="btn btn-primary" type="submit" name="btn-add-cart"> Add to cart</button>
                                                        </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                    }
                                    if($total_page>1){

                                    ?>
                                    <p class="text-center"><span  class="btn btn-primary fw-bold "><a href="index.php?shop&search&key=<?=$search?>&page=<?=($curentPage - 1)>0? ($curentPage - 1): 1?><?= (isset($sort)&&$sort!=="default" )?"&sort=".$sort:""?>"><</a></span>
                                    <?php if($curentPage > 1){
                                        ?>
                                    <span  class="btn btn-danger fw-bold "><a class="text-black font-[700]" href="index.php?shop&search&key=<?=$search?>&page=<?= ($curentPage-1) ?><?= (isset($sort)&&$sort!=="default" )?"&sort=".$sort:""?>"><?= ($curentPage-1) ?></a></span>
                                    <?php
                                    } ?> 
                                    <span  class="btn btn-danger fw-bold "><a class="text-black font-[700]" href="index.php?shop&search&key=<?=$search?>&page=<?= $curentPage ?><?= (isset($sort)&&$sort!=="default" )?"&sort=".$sort:""?>"><?= $curentPage ?></a></span>
                                    <?php if(($curentPage + 1) <= $total_page){
                                        ?>
                                    <span  class="btn btn-danger fw-bold "><a class="text-black font-[700]" href="index.php?shop&search&key=<?=$search?>&page=<?= ($curentPage+1) ?><?= (isset($sort)&&$sort!=="default" )?"&sort=".$sort:""?>"><?= ($curentPage+1) ?></a></span>
                                    <?php
                                    } ?> 
                                    
                                    <span  class="btn btn-primary fw-bold "><a href="index.php?shop&search&key=<?=$search?>&page=<?=($curentPage + 1)>$total_page? $total_page :($curentPage + 1)?><?= (isset($sort)&&$sort!=="default" )?"&sort=".$sort:""?>">></a></span></p>
                                   <?php
                                    }
                                }?>
                                <?php if (isset($products_page_cate)) {
                                    foreach ($products_page_cate as $item) {
                                        extract($item);
                                ?>
                                    <div class="col-sm-12">
                                        <div class="single-product-area">
                                            <div class="product-wrapper listview">
                                                <div class="list-col4">
                                                    <div class="product-image">
                                                        <a href="index.php?detail&id_product=<?= $id_product ?>">
                                                            <img src="../../upload/<?=$item[9]?>" alt="">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="list-col8">
                                                    <div class="product-info">
                                                        <h2><a style="color: black;font-size:20px;font-weight:600" href="index.php?detail&id_product=<?= $id_product ?>"><?=$name_product?></a></h2>
                                                        <span class="price">
                                                            <del>$ <?=$gia_goc?></del> $ <?=$gia_moi?>
                                                        </span>
                                                        <?php 
                                                    $rate_star = rand(3,5);
                                                    if($rate_star==4){
                                                         ?>
                                                        <div class="product-rattings"  >
                                                            <span><i class="fa fa-star"></i></span>
                                                            <span><i class="fa fa-star"></i></span>
                                                            <span><i class="fa fa-star"></i></span>
                                                            <span><i class="fa fa-star"></i></span>
                                                            <span><i class="fa fa-star-o"></i></span>
                                                        </div>
                                                         <?php
                                                    }elseif($rate_star==3){
                                                        ?>
                                                        <div class="product-rattings"  >
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
                                                        <div class="product-rattings" >
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
                                                            <p><?=$mo_ta?></p>
                                                        </div>
                                                    </div>
                                                    <div class="actions-wrapper">
                                                        <div class="add-to-cart">
                                                        <form action="<?=$SITE_URL?>/gio-hang/" method="post">
                                                        <input type="hidden" name="id_product" value="<?= $id_product ?>">
                                                        <input type="hidden" name="price" value="<?=$gia_goc?>">
                                                        <input type="hidden" name="name_product" value="<?=$name_product?>">
                                                        <input type="hidden" name="hinh_anh" value="<?=$item[9]?>">
                                                        <input type="hidden" name="so_luong" value=1>
                                                            <button class="btn btn-primary" type="submit" name="btn-add-cart">Add to cart</button>
                                                        </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                    }
                                    if($total_page>1){

                                    ?>
                                    <p class="text-center"><span  class="btn btn-primary fw-bold "><a href="index.php?shop&id_cate=<?=$_GET['id_cate']?>&page=<?=($curentPage - 1)>0? ($curentPage - 1): 1?><?= (isset($sort)&&$sort!=="default" )?"&sort=".$sort:""?>"><</a></span>
                                    <?php if($curentPage > 1){
                                        ?>
                                    <span  class="btn btn-danger fw-bold "><a class="text-black font-[700]" href="index.php?shop&id_cate=<?=$_GET['id_cate']?>&page=<?= ($curentPage-1) ?><?= (isset($sort)&&$sort!=="default" )?"&sort=".$sort:""?>"><?= ($curentPage-1) ?></a></span>
                                    <?php
                                    } ?>
                                    <span  class="btn btn-danger fw-bold "><a class="text-black font-[700]" href="index.php?shop&id_cate=<?=$_GET['id_cate']?>&page=<?= $curentPage ?><?= (isset($sort)&&$sort!=="default" )?"&sort=".$sort:""?>"><?= $curentPage ?></a></span>
                                    <?php if(($curentPage + 1) <= $total_page){
                                        ?>
                                    <span  class="btn btn-danger fw-bold "><a class="text-black font-[700]" href="index.php?shop&id_cate=<?=$_GET['id_cate']?>&page=<?= ($curentPage+1) ?><?= (isset($sort)&&$sort!=="default" )?"&sort=".$sort:""?>"><?= ($curentPage+1) ?></a></span>
                                    <?php
                                    } ?> 
                                    
                                    <span  class="btn btn-primary fw-bold "><a href="index.php?shop&id_cate=<?=$_GET['id_cate']?>&page=<?=($curentPage + 1)>$total_page? $total_page :($curentPage + 1)?><?= (isset($sort)&&$sort!=="default" )?"&sort=".$sort:""?>">></a></span></p>
                                   <?php
                                    }
                                }?>
                                <?php if (isset($products_page_tag)) {
                                    foreach ($products_page_tag as $item) {
                                        extract($item);
                                ?>
                                    <div class="col-sm-12">
                                        <div class="single-product-area">
                                            <div class="product-wrapper listview">
                                                <div class="list-col4">
                                                    <div class="product-image">
                                                        <a href="index.php?detail&id_product=<?= $id_product ?>">
                                                            <img src="../../upload/<?=$item[9]?>" alt="">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="list-col8">
                                                    <div class="product-info">
                                                        <h2><a style="color: black;font-size:20px;font-weight:600" href="index.php?detail&id_product=<?= $id_product ?>"><?=$name_product?></a></h2>
                                                        <span class="price">
                                                            <del>$ <?=$gia_goc?></del> $ <?=$gia_moi?>
                                                        </span>
                                                        <?php 
                                                    $rate_star = rand(3,5);
                                                    if($rate_star==4){
                                                         ?>
                                                        <div class="product-rattings"  >
                                                            <span><i class="fa fa-star"></i></span>
                                                            <span><i class="fa fa-star"></i></span>
                                                            <span><i class="fa fa-star"></i></span>
                                                            <span><i class="fa fa-star"></i></span>
                                                            <span><i class="fa fa-star-o"></i></span>
                                                        </div>
                                                         <?php
                                                    }elseif($rate_star==3){
                                                        ?>
                                                        <div class="product-rattings"  >
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
                                                        <div class="product-rattings" >
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
                                                            <p><?=$mo_ta?></p>
                                                        </div>
                                                    </div>
                                                    <div class="actions-wrapper">
                                                        <div class="add-to-cart">
                                                        <form action="<?=$SITE_URL?>/gio-hang/" method="post">
                                                        <input type="hidden" name="id_product" value="<?= $id_product ?>">
                                                        <input type="hidden" name="price" value="<?=$gia_goc?>">
                                                        <input type="hidden" name="name_product" value="<?=$name_product?>">
                                                        <input type="hidden" name="hinh_anh" value="<?=$item[9]?>">
                                                        <input type="hidden" name="so_luong" value=1>
                                                            <button class="btn btn-primary" type="submit" name="btn-add-cart"> Add to cart</button>
                                                        </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                    }
                                    if($total_page>1){

                                    ?>
                                    <p class="text-center"><span  class="btn btn-primary fw-bold "><a href="index.php?shop&id_tag=<?=$_GET['id_tag']?>&page=<?=($curentPage - 1)>0? ($curentPage - 1): 1?><?= (isset($sort)&&$sort!=="default" )?"&sort=".$sort:""?>"><</a></span>
                                    <?php if($curentPage > 1 ){
                                        ?>
                                    <span  class="btn btn-danger fw-bold "><a class="text-black font-[700]" href="index.php?shop&id_tag=<?=$_GET['id_tag']?>&page=<?= ($curentPage-1) ?><?= (isset($sort)&&$sort!=="default" )?"&sort=".$sort:""?>"><?= ($curentPage-1) ?></a></span>
                                    <?php
                                    } ?> 
                                    <span  class="btn btn-danger fw-bold "><a class="text-black font-[700]" href="index.php?shop&id_tag=<?=$_GET['id_tag']?>&page=<?= $curentPage ?><?= (isset($sort)&&$sort!=="default" )?"&sort=".$sort:""?>"><?= $curentPage ?></a></span>
                                    <?php if(($curentPage + 1) <= $total_page){
                                        ?>
                                    <span  class="btn btn-danger fw-bold "><a class="text-black font-[700]" href="index.php?shop&id_tag=<?=$_GET['id_tag']?>&page=<?= ($curentPage+1) ?><?= (isset($sort)&&$sort!=="default" )?"&sort=".$sort:""?>"><?= ($curentPage+1) ?></a></span>
                                    <?php
                                    } ?> 
                                    
                                    <span  class="btn btn-primary fw-bold "><a href="index.php?shop&id_tag=<?=$_GET['id_tag']?>&page=<?=($curentPage + 1)>$total_page? $total_page :($curentPage + 1)?><?= (isset($sort)&&$sort!=="default" )?"&sort=".$sort:""?>">></a></span></p>
                                   <?php
                                    }
                                }?>
                                <?php if (isset($products_page_filter)) {
                                    foreach ($products_page_filter as $item) {
                                        extract($item);
                                ?>
                                    <div class="col-sm-12">
                                        <div class="single-product-area">
                                            <div class="product-wrapper listview">
                                                <div class="list-col4">
                                                    <div class="product-image">
                                                        <a href="index.php?detail&id_product=<?= $id_product ?>">
                                                            <img src="../../upload/<?=$item[9]?>" alt="">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="list-col8">
                                                    <div class="product-info">
                                                        <h2><a style="color: black;font-size:20px;font-weight:600" href="index.php?detail&id_product=<?= $id_product ?>"><?=$name_product?></a></h2>
                                                        <span class="price">
                                                            <del>$ <?=$gia_goc?></del> $ <?=$gia_moi?>
                                                        </span>
                                                        <?php 
                                                    $rate_star = rand(3,5);
                                                    if($rate_star==4){
                                                         ?>
                                                        <div class="product-rattings"  >
                                                            <span><i class="fa fa-star"></i></span>
                                                            <span><i class="fa fa-star"></i></span>
                                                            <span><i class="fa fa-star"></i></span>
                                                            <span><i class="fa fa-star"></i></span>
                                                            <span><i class="fa fa-star-o"></i></span>
                                                        </div>
                                                         <?php
                                                    }elseif($rate_star==3){
                                                        ?>
                                                        <div class="product-rattings"  >
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
                                                        <div class="product-rattings" >
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
                                                            <p><?=$mo_ta?></p>
                                                        </div>
                                                    </div>
                                                    <div class="actions-wrapper">
                                                        <div class="add-to-cart">
                                                        <form action="<?=$SITE_URL?>/gio-hang/" method="post">
                                                        <input type="hidden" name="id_product" value="<?= $id_product ?>">
                                                        <input type="hidden" name="price" value="<?=$gia_goc?>">
                                                        <input type="hidden" name="name_product" value="<?=$name_product?>">
                                                        <input type="hidden" name="hinh_anh" value="<?=$item[9]?>">
                                                        <input type="hidden" name="so_luong" value=1>
                                                            <button class="btn btn-primary" type="submit" name="btn-add-cart"> Add to cart</button>
                                                        </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                    }
                                    if($total_page>1){

                                    ?>
                                    <p class="text-center"><span  class="btn btn-primary fw-bold "><a href="index.php?shop&filter&range_down=<?=$range_down?>&range_up=<?=$range_up?>&page=<?=($curentPage - 1)>0? ($curentPage - 1): 1?><?= (isset($sort)&&$sort!=="default" )?"&sort=".$sort:""?>"><</a></span>
                                    <?php if($curentPage >1){
                                        ?>
                                    <span  class="btn btn-danger fw-bold "><a class="text-black font-[700]" href="index.php?shop&filter&range_down=<?=$range_down?>&range_up=<?=$range_up?>&page=<?= ($curentPage-1) ?><?= (isset($sort)&&$sort!=="default" )?"&sort=".$sort:""?>"><?= ($curentPage-1) ?></a></span>
                                    <?php
                                    } ?>
                                    <span  class="btn btn-danger fw-bold "><a class="text-black font-[700]" href="index.php?shop&filter&range_down=<?=$range_down?>&range_up=<?=$range_up?>&page=<?= $curentPage ?><?= (isset($sort)&&$sort!=="default" )?"&sort=".$sort:""?>"><?= $curentPage ?></a></span>
                                    <?php if(($curentPage + 1) <= $total_page){
                                        ?>
                                    <span  class="btn btn-danger fw-bold "><a class="text-black font-[700]" href="index.php?shop&filter&range_down=<?=$range_down?>&range_up=<?=$range_up?>&page=<?= ($curentPage+1) ?><?= (isset($sort)&&$sort!=="default" )?"&sort=".$sort:""?>"><?= ($curentPage+1) ?></a></span>
                                    <?php
                                    } ?> 
                                    
                                    <span  class="btn btn-primary fw-bold "><a href="index.php?shop&filter&range_down=<?=$range_down?>&range_up=<?=$range_up?>&page=<?=($curentPage + 1)>$total_page? $total_page :($curentPage + 1)?><?= (isset($sort)&&$sort!=="default" )?"&sort=".$sort:""?>">></a></span></p>
                                   <?php
                                    }
                                }?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
