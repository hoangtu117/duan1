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
                                <span class="separator">/</span> register
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
                            <h1 class="entry-title">Register</h1>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page title end -->
            <!-- cart page content -->
            <div class="register-page-area">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <form class="form-register" action="index.php" method="post" enctype="multipart/form-data">
                                <fieldset>
                                    <legend>Your Personal Details</legend>
                                    <div class="form-group d-md-flex align-items-md-center">
                                        <label class="control-label col-md-2" for="f-name"><span class="require">*</span>User Name</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" id="f-name" name="id_customer" placeholder="User Name">
                                            <p class="text-danger"><?= isset($_SESSION['errors']['id_customer'])?$_SESSION['errors']['id_customer'] :""?></p>
                                        </div>
                                    </div>
                                    <div class="form-group d-md-flex align-items-md-center">
                                        <label class="control-label col-md-2" for="l-name"><span class="require">*</span>Full Name</label>
                                        <div class="col-md-10">
                                            <input type="text" name="ho_ten" class="form-control" id="l-name" placeholder="Your full name">
                                            <p class="text-danger"><?= isset($_SESSION['errors']['ho_ten'])?$_SESSION['errors']['ho_ten'] :""?></p>
                                        </div>
                                    </div>
                                    <div class="form-group d-md-flex align-items-md-center">
                                        <label class="control-label col-md-2" for="email"><span class="require">*</span>Enter you email address here...</label>
                                        <div class="col-md-10">
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter you email address here...">
                                            <p class="text-danger"><?= isset($_SESSION['errors']['email'])?$_SESSION['errors']['email'] :""?></p>
                                        </div>
                                    </div>
                                    <div class="form-group d-md-flex align-items-md-center">
                                        <label class="control-label col-md-2" for="l-name"><span class="require">*</span>Image</label>
                                        <div class="col-md-10">
                                            <input type="file" name="hinh_anh" class="form-control" id="l-name" placeholder="Ho_Ten">
                                            <p class="text-danger"><?= isset($_SESSION['errors']['image_name'])?$_SESSION['errors']['image_name'] :""?></p>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <legend>Your Password</legend>
                                    <div class="form-group d-md-flex align-items-md-center">
                                        <label class="control-label col-md-2" for="pwd"><span class="require">*</span>Password:</label>
                                        <div class="col-md-10">
                                            <input type="password" class="form-control"  name="mat_khau" id="pwd" placeholder="Password">
                                            <p class="text-danger"><?= isset($_SESSION['errors']['mat_khau'])?$_SESSION['errors']['mat_khau'] :""?></p>
                                        </div>
                                    </div>
                                    <div class="form-group d-md-flex align-items-md-center">
                                        <label class="control-label col-md-2" for="pwd-confirm"><span class="require">*</span>Confirm Password</label>
                                        <div class="col-md-10">
                                            <input type="password" class="form-control" name="check_mat_khau" id="pwd-confirm" placeholder="Confirm password">
                                            <p class="text-danger"><?= isset($_SESSION['errors']['check_mat_khau'])?$_SESSION['errors']['check_mat_khau'] :""?></p>
                                        </div>
                                    </div>
                                </fieldset>
                                
                                <div class="terms">
                                    <div class="float-md-right">
                                        <input type="submit" name="btn-register" value="REGISTER" class="return-customer-btn">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
</body>
</html>