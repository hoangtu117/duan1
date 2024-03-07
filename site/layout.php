
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Bege || Home</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="images/icons/icon_logo.png">
        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="<?php echo $SOURCE_URL ?>/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo $SOURCE_URL ?>/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo $SOURCE_URL ?>/css/ionicons.min.css">
        <link rel="stylesheet" href="<?php echo $SOURCE_URL ?>/css/css-plugins-call.css">
        <link rel="stylesheet" href="<?php echo $SOURCE_URL ?>/css/bundle.css">
        <link rel="stylesheet" href="<?php echo $SOURCE_URL ?>/css/main.css">
        <link rel="stylesheet" href="<?php echo $SOURCE_URL ?>/css/responsive.css">
        <link rel="stylesheet" href="<?php echo $SOURCE_URL ?>/css/colors.css">
        <link href="https://fonts.googleapis.com/css2?family=Antonio&family=Inter:wght@400;600;700;800;900&family=Nunito+Sans:wght@200;300;400;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
        <style>
           .product-area-inner img{
                width: 50%;
                height: 200px;
                display: inline-block;
                margin: auto;
            }
            .deals-of-the-day-area img{
                width: 400px;
                height: 300px;

            }
            .product-details-small img{
                width: 100px;
                height: 100px;
            }
            .product-details-large img{
                width: 300px;
                height: 250px;
            }
            #grid img{
                width: 80%;
                height: 200px;
                display: inline-block;
                margin: auto;
            }
            .product-details-large img{
                margin-left: 20px;
            }
            .cart-page-area th{
                color: black;
                font-weight: 700;
                font-size: 20px;
            }
        </style>
</head>
<body>
    <?php require_once "include/header.php"?>
    <?php require_once $VIEW_NAME ?>
    <?php require_once "include/footer.php" ?>
    <script src="<?php echo $SOURCE_URL ?>/js/jquery-1.12.4.min.js"></script>   
         
        <!-- jQuery Local -->
        

        <!-- Bootstrap min js  -->
        <script src="<?php echo $SOURCE_URL ?>/js/bootstrap.min.js"></script>
		<!-- nivo slider pack js  -->
        <script src="<?php echo $SOURCE_URL ?>/js/jquery.nivo.slider.pack.js"></script>
        <!-- All plugins here -->
        <script src="<?php echo $SOURCE_URL ?>/js/plugins.js"></script>
        <!-- Main js  -->
        <script src="<?php echo $SOURCE_URL ?>/js/main.js"></script>

</body>
</html>