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
                        <span class="separator">/</span> Cart
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
                    <h1 class="entry-title">Cart</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Page title end -->
    <!-- cart page content -->
    <div class="cart-page-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <!-- Form Start -->
                        <!-- Table Content Start -->
                        <div class=" table-cart mb-50">
                            <table style="margin:auto;vertical-align: middle;"  class="table table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th >Image</th>
                                        <th >Product</th>
                                        <th >Price</th>
                                        <th >Quantity</th>
                                        <th >Total</th>
                                        <th style="width:20px;" >Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($_SESSION['cart'])) {
                                        foreach ($_SESSION['cart'] as $cart) {
                                            extract($cart);
                                    ?>
                                            <tr>
                                                <td style="width: 30%;">
                                                    <a><img src="../../upload/<?=$hinh_anh?>" alt="cart-image"></a>
                                                </td>
                                                <td style="width: 30%;"><a><?=$name_product?></a></td>
                                                <td style="width: 15%;"><span class="amount">$<?=$price?></span>
                                                <input type="hidden" class="price_input" value="<?=$price?>">
                                                </td>
                                                <td style="width: 15%;">
                                                        <input style="width: 50px;" class="quantity_input" onchange="subTotal()" name="Mod_quantity" min="1" type="number" value="<?=$so_luong?>">
                                                </td>
                                                <td style="width: 15%;">$<span class="total_price"></span></td>
                                                <td class=" d-flex"> 
                                                    <form action="<?=$SITE_URL?>/gio-hang/" method="post" >
                                                    <input type="hidden" name="Mod_quantity"  class="update_quantity">
                                                    <input type="hidden" name="name_product" value="<?=$name_product?>">
                                                    <button style="margin-top:50px" class="btn btn-primary" type="submit" name="btn-update-cart"> <a><i class="bi bi-pencil-fill"></i></a></button>
                                                    </form>
                                                   <form action="<?=$SITE_URL?>/gio-hang/" method="post">
                                                   <input type="hidden" name="name_product" value="<?=$name_product?>">
                                                   <button style="margin-top:50px; margin-left:-30px" type="submit" class="btn btn-danger" name="btn-remove-cart"> <a><i class="bi bi-trash3-fill"></i></a></button>
                                                   </form>
                                                </td>
                                            </tr>
                                    <?php
                                        }
                                    }else{
                                       ?>
                                       <tr>
                                           <td colspan="6" style="font-weight: 700;font-size: 20px;color:red">Không có sản phẩm nào trong giỏ hàng</td>
                                       </tr>
                                       <?php
                                    } ?>

                                </tbody>
                            </table>
                        </div>
                        <!-- Table Content Start -->
                        <div class="row">
                            <!-- Cart Button Start -->
                            <div class="col-md-8 col-sm-7 col-xs-12">
                                <div class="buttons-cart">
                                    <a href="<?= $SITE_URL ?>/trang-chinh/?shop">Continue Shopping</a>
                                </div>
                            </div>
                            <!-- Cart Button Start -->
                            <!-- Cart Totals Start -->
                            <div class="col-md-4 col-sm-5 col-xs-12">
                                <div class="cart_totals">
                                    <h2>Cart Totals</h2>
                                    <br>
                                    <table>
                                        <tbody>
                                            <tr class="order-total">
                                                <th>Total:</th>
                                                <td>
                                                    <strong>$<span class="amount g-total"></span></strong>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="wc-proceed-to-checkout">
                                        <a href="?checkout">Proceed to Checkout</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Cart Totals End -->
                        </div>
                        <!-- Row End -->
                    <!-- Form End -->
                </div>
            </div>
        </div>
    </div>
    <script>
      var  update_quantity = document.querySelectorAll('.update_quantity');
      var  price_products = document.querySelectorAll('.price_input');
      var  quantity_products = document.querySelectorAll('.quantity_input');
      var  total = document.querySelectorAll('.total_price');
      var  gTotal = document.querySelector('.g-total');
      var  gt = 0;
        function subTotal(){
            gt=0;
              for(var i=0;i < price_products.length ;i++){
              total[i].innerHTML  = price_products[i].value*quantity_products[i].value;
              update_quantity[i].value = quantity_products[i].value;
              gt =gt+ price_products[i].value*quantity_products[i].value;
              }
              gTotal.innerHTML =  gt;

        }
        subTotal();
    </script>
</body>

</html>