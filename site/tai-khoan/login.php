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
                                <span class="separator">/</span> sign in
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
                            <h1 class="entry-title">Sign In</h1>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page title end -->
            <!-- cart page content -->
            <div class="login-page-area">
                <div class="container">
                    <div class="login-area">
                        <!-- New Customer Start -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="well mb-sm-30">
                                    <div class="new-customer">
                                        <h3 class="custom-title">new customer</h3>
                                        <p class="mtb-10"><strong>Register</strong></p>
                                        <p>By creating an account you will be able to shop faster, be up to date on an order's status, and keep track of the orders you have previously made</p>
                                        <a class="customer-btn" href="?register">continue</a>
                                    </div>
                                </div>
                            </div>
                            <!-- New Customer End -->
                            <!-- Returning Customer Start -->
                            <div class="col-md-6">
                                <div class="well">
                                    <div class="return-customer">
                                        <h3 class="mb-10 custom-title">returnng customer</h3>
                                        <p class="mb-10"><strong>I am a returning customer</strong></p>
                                        <form action="index.php" method="post">
                                            <div class="form-group">
                                                <label>User Name</label>
                                                <input type="text" name="id_customer" placeholder="Enter your user name..." id="input-email" class="form-control">
                                                <p class="text-danger"><?= isset($_SESSION['errors']['id_customer'])?$_SESSION['errors']['id_customer'] :""?></p>
        
                                            </div>
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="text" name="mat_khau" placeholder="Password" id="input-password" class="form-control">
                                                <p class="text-danger"><?= isset($_SESSION['errors']['mat_khau'])?$_SESSION['errors']['mat_khau'] :""?></p>
                                            </div>
                                            <p class="lost-password"><a href="#">Forgot password?</a></p>
                                            <input type="submit" name="btn-login" value="Login" class="return-customer-btn">
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Returning Customer End -->
                        </div>
                    </div>
                </div>
            </div>
</body>
</html>