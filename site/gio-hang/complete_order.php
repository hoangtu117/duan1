<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .complete_bill{
            margin-left: 300px;
        }
    </style>
</head>

<body>
    <h2 class="text-success text-center">Your order has been placed successfully</h2>
    <div class="complete_bill col-lg-6 col-md-6 ">
        <div class="your-order">
            <h3 class="text-center">Your Bill</h3>
            <div class="your-order-table table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th class="product-name">Product</th>
                            <th class="product-total">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (isset($_SESSION['complete'])) {
                            foreach ($_SESSION['complete'] as $cart) {
                                extract($cart);
                                $total  = $so_luong * $price;
                        ?>
                                <tr class="cart_item">
                                    <td class="product-name">
                                        <?= $name_product ?> <strong class="product-quantity"> × <?= $so_luong ?></strong>
                                    </td>
                                    <td class="product-total">
                                        <span class="amount">$<?= $total ?></span>
                                    </td>
                                </tr>
                        <?php
                            }
                        } ?>
                    </tbody>
                    <tfoot>
                        <?php if (isset($_SESSION['complete'])) {
                            $g_total = 0;
                            foreach ($_SESSION['complete'] as $cart) {
                                extract($cart);
                                $g_total = $g_total + $price * $so_luong;
                            } ?>
                            <tr class="cart-subtotal">
                                <th>Cart Subtotal</th>
                                <td><span class="amount">$<?= $g_total ?></span></td>
                            </tr>
                            <tr class="order-total">
                                <th>Order Total</th>
                                <td><strong><span class="amount">$<?= $g_total ?></span></strong>
                                </td>
                            </tr>
                        <?php
                        } ?>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <p style="margin-left: 500px;" class="d-flex">
        <a style="margin-right: 8px;" class="btn btn-primary mt-4 inline-block" href="index.php?back-shop">Continue Shopping</a>
        
    </p>
</body>

</html>