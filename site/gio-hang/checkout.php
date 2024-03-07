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
                                <span class="separator">/</span> Checkout
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
                            <h1 class="entry-title">Checkout</h1>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page title end -->
            <!-- checkout page content -->
            <div class="checkout-page-area">
                <!-- coupon area -->
                <!-- coupon area end -->
                <!-- checkout area -->
                <div class="checkout-area">
                    <div class="container">
                        <form action="index.php" method="post">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="checkbox-form">
                                        <h3>Billing Details</h3>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="checkout-form-list">
                                                    <label>Ho _ten <span class="required">*</span></label>
                                                    <input type="text" name="ho_ten" placeholder="Ho Ten..." value="<?= isset($_SESSION['user'])?$_SESSION['user']['ho_ten']:""?>">
                                                    <p class="text-danger"><?= isset($_SESSION['checkout_errors']['ho_ten']) ? $_SESSION['checkout_errors']['ho_ten'] : "" ?></p>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="checkout-form-list">
                                                    <label>Address <span class="required">*</span></label>
                                                    <input type="text" name="address" placeholder="Address...">
                                                    <p class="text-danger"><?= isset($_SESSION['checkout_errors']['address']) ? $_SESSION['checkout_errors']['address'] : "" ?></p>

                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="checkout-form-list mb-30">
                                                    <label>Email Address <span class="required">*</span></label>
                                                    <input type="text" name="email" placeholder="Email address..." value="<?= isset($_SESSION['user'])?$_SESSION['user']['email']:""?>">
                                                    <p class="text-danger"><?= isset($_SESSION['checkout_errors']['email']) ? $_SESSION['checkout_errors']['email'] : "" ?></p>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="checkout-form-list mb-30">
                                                    <label>Phone number  <span class="required">*</span></label>
                                                    <input type="text" name="phone" placeholder="Phone number...">
                                                    <p class="text-danger"><?= isset($_SESSION['checkout_errors']['phone']) ? $_SESSION['checkout_errors']['phone'] : "" ?></p>
                                                </div>
                                            </div>
                                            <?php
                                            if(isset($_SESSION['user'])){
                                                ?>
                                            <input type="hidden" name="id_customer" value="<?=$_SESSION['user']['id_customer']?>">
                                                <?php
                                            }else{
                                                ?>
                                                <input type="hidden" name="id_customer" value="">
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="your-order">
                                        <h3>Your order</h3>
                                        <div class="your-order-table table-responsive">
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th class="product-name">Product</th>
                                                        <th class="product-total">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if(isset($_SESSION['cart'])){
                                                        foreach($_SESSION['cart'] as $cart){
                                                            extract($cart);
                                                            $total  = $so_luong*$price;
                                                            ?>
                                                        <tr class="cart_item">
                                                            <td class="product-name">
                                                                <?=$name_product?> <strong class="product-quantity"> × <?=$so_luong?></strong>
                                                            </td>
                                                            <td class="product-total">
                                                                <span class="amount">$<?=$total?></span>
                                                            </td>
                                                        </tr>
                                                            <?php
                                                        }
                                                    } ?>
                                                </tbody>
                                                <tfoot>
                                                    <?php if(isset($_SESSION['cart'])){
                                                        $g_total=0;
                                                        foreach($_SESSION['cart'] as $cart){
                                                            extract($cart);
                                                            $g_total = $g_total + $price*$so_luong;
                                                        }?>
                                                        <tr class="cart-subtotal">
                                                            <th>Cart Subtotal</th>
                                                            <td><span class="amount">$<?=$g_total?></span></td>
                                                        </tr>
                                                        <tr class="order-total">
                                                            <th>Order Total</th>
                                                            <td><strong><span class="amount">$<?=$g_total?></span></strong>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    } ?>
                                                </tfoot>
                                            </table>
                                        </div>
                                        <div class="payment-method">
                                            <div class="payment-accordion">
                                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" role="tab" id="headingOne">
                                                            <h4 class="panel-title">
                                                                <a role="button" data-bs-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                            Direct Bank Transfer
                                                            </a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                                            <div class="panel-body">
                                                                <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" role="tab" id="headingTwo">
                                                            <h4 class="panel-title">
                                                                <a class="collapsed" role="button" data-bs-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                            Cheque Payment
                                                            </a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                                            <div class="panel-body">
                                                                <p>Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" role="tab" id="headingThree">
                                                            <h4 class="panel-title">
                                                                <a class="collapsed" role="button" data-bs-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                            PayPal
                                                            </a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                                            <div class="panel-body">
                                                                <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="order-button-payment">
                                                    <input type="submit" name="btn-purchase" value="Place order">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- checkout area end -->
            </div>
</body>
</html>