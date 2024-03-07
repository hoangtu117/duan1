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
                        <span class="separator">/</span> Dashboard
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
                    <h1 class="entry-title">My Account</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Page title end -->

    <!-- My Account page content Start -->
    <div id="myaccount-page-content">
        <div class="container">
            <div class="account-text-wrapper">
                <div class="row">
                    <div class="col-md-3">
                        <div class="myaccount-tab-menu nav" role="tablist">
                            <a href="#dashboad" <?= !(isset($_REQUEST['id_order']) || isset($_REQUEST['my_order'])) ? " class='active'" : "" ?> data-bs-toggle="tab"><i class="fa fa-dashboard"></i> Dashboard</a>
                            <a href="#orders" <?= (isset($_REQUEST['id_order']) || isset($_REQUEST['my_order'])) ? " class='active'" : "" ?> data-bs-toggle="tab"><i class="fa fa-cart-arrow-down"></i> Orders</a>
                            <a href="index.php?logout"><i class="fa fa-sign-out"></i> Logout</a>
                        </div>
                    </div>
                    <!-- My Account Tab Menu End -->

                    <!-- My Account Tab Content Start -->
                    <div class="col-md-9 mt-15 mt-lg-0">
                        <div class="tab-content" id="myaccountContent">
                            <!-- Single Tab Content Start -->
                            <div class="tab-pane fade <?= !(isset($_REQUEST['id_order']) || isset($_REQUEST['my_order'])) ? " show active" : "" ?> " id="dashboad" role="tabpanel">
                                <div class="myaccount-content">
                                    <h3>Dashboard</h3>

                                    <div class="welcome">
                                        <p>Hello, <strong><?=$_SESSION['user']['ho_ten']?></strong> (If Not <strong><?=$_SESSION['user']['ho_ten']?> !</strong><a href="login.html" class="logout"> Logout</a>)</p>
                                    </div>

                                    <p class="mb-0">From your account dashboard. you can easily check & view your
                                        recent orders, manage your shipping and billing addresses and edit your
                                        password and account details.</p>
                                </div>
                            </div>
                            <!-- Single Tab Content End -->

                            <!-- Single Tab Content Start -->
                            <div class="tab-pane fade <?= (isset($_REQUEST['id_order']) || isset($_REQUEST['my_order'])) ? " show active" : "" ?>" id="orders" role="tabpanel">
                                <?php if (isset($order_all_by_userID) || isset($_REQUEST['my_order'])) {
                                ?>
                                    <div class="myaccount-content">
                                        <h3>Orders</h3>

                                        <div class="myaccount-table table-responsive text-center">
                                            <table class="table table-bordered">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>Order</th>
                                                        <th>Date</th>
                                                        <th>Status</th>
                                                        <th>Total</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if (isset($order_all_by_userID) || isset($_REQUEST['my_order'])) {
                                                        $count = 1;
                                                        foreach ($order_all_by_userID as $order) {
                                                            extract($order);
                                                    ?>
                                                            <tr>
                                                                <td><?= $count ?></td>
                                                                <td><?= $date_order ?></td>
                                                                <td><?= $tinh_trang ?></td>
                                                                <td><?= $order[8] ?></td>
                                                                <td>
                                                                    <a class="btn btn-primary" href="index.php?my_account&id_order=<?= $id_order ?>">View</a>
                                                                    <?php 
                                                                    if($tinh_trang!=="Đã giao hàng"){
                                                                        ?>
                                                                           <a href="index.php?btn-delete&id_order=<?=$id_order?>" class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa đơn hàng này không?')">Cancel</a>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </td>
                                                            </tr>

                                                    <?php
                                                            $count++;
                                                        }
                                                    }?>
                                                    <?php if(empty($order_all_by_userID)){
                                                        ?>
                                                        <tr><td colspan="5">Ban khong co don hang nao da dat</td></tr>
                                                        <?php
                                                    } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                <?php
                                } ?>
                                <?php if (isset($order_detail_orderID_img)) {
                                ?>
                                    <div class="myaccount-content">
                                        <h3>Orders Detail</h3>

                                        <div class="myaccount-table table-responsive text-center">
                                            <table class="table table-bordered">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>Order</th>
                                                        <th>Image</th>
                                                        <th>Price</th>
                                                        <th>Quantity</th>
                                                        <th>Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if (isset($order_detail_orderID_img)) {
                                                        $count = 1;
                                                        foreach ($order_detail_orderID_img as $order) {
                                                            extract($order);
                                                    ?>
                                                            <tr>
                                                                <td><?= $count ?></td>
                                                                <td><img src="../../upload/<?= $order[13] ?>" alt="" style="width: 150px;height: 100px;"></td>
                                                                <td><?= $gia_moi ?></td>
                                                                <td><?= $so_luong ?></td>
                                                                <td><?= $so_luong * $gia_moi ?></td>
                                                            </tr>

                                                    <?php
                                                            $count++;
                                                        }
                                                    } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <a href="index.php?my_account&my_order" class="btn btn-primary mt-4">My ORDER</a>
                                <?php
                                } ?>
                            </div>
                            <!-- Single Tab Content End -->
                        </div>
                    </div>
                    <!-- My Account Tab Content End -->
                </div>
            </div>
        </div>
    </div>
</body>

</html>