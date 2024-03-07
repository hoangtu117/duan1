
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin-Dashboard</title>
    <link href="<?=$ADM_URL ?>/public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="<?=$ADM_URL ?>/public/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Antonio&family=Inter:wght@400;600;700;800;900&family=Nunito+Sans:wght@200;300;400;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
    <style>
        #content h3{
            color: blue;
            font-weight: 700;
        }
        #content table{
            color: black;
        }
        body{
            font-family: 'Times New Roman', Times, serif;
            font-family: 'Roboto';
        }
        table tr,th,td{
            border: 1px solid #D6DBDF;
            text-align: center;
        }
        td{
            height: 100px;
            line-height: 100px;
        }
        .search-form{
            margin: 20px;
            margin-bottom: 20px;
            margin-left: 0;
        }
        .search-form input {
            border: 2px solid #999;
            width: 300px;
            height: 40px;
            font: 20px;
            padding: 3px 5px;
            border-radius: 5px 0 0 5px;
        }
        .search-form button{
            border: 2px solid #999;
            width: 50px;
            height: 40px;
            font: 24px;
            margin-left: -6px;
            /* margin-top: 1px; */
            margin-bottom: 3px;
            border-radius: 0 5px 5px 0;
            background-color: black;
            color: white;
            padding: 3px 5px;
        }
    label{
        color: black;
        font-weight: 600;
    }
    ul{
        list-style-type: none;
    }
    ul li a{
        text-decoration: none;
        color: white;
    }
    li{
        margin-top: 10px;
    }
    ul li a:hover{
        text-decoration: none;
        color: black;
    }
    </style>
</head>

</head>

<body id="page-top">
    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="<?=$SITE_URL ?>/trang-chinh/">
                <i class="bi bi-house-gear-fill"></i>
                    <span>Home</span></a>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item active">
                <a class="nav-link" href="<?=$ADM_URL ?>/trang-chinh/">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Addons
            </div>
            <li class="nav-item">
                        <ul>
                            <li><a class="collapse-item" href="<?=$ADM_URL?>/category/"><i class="bi bi-stickies-fill"></i>  CATEGORIES</a></li>
                            <li><a class="collapse-item" href="<?=$ADM_URL?>/tag/"><i class="bi bi-tags"></i>  TAGS</a></li>
                            <li><a class="collapse-item" href="<?=$ADM_URL?>/product/"><i class="bi bi-lightning-charge"></i>  PRODUCTS</a></li>
                            <li><a class="collapse-item" href="<?=$ADM_URL?>/customer/"><i class="bi bi-person-fill-gear"></i>  CUSTOMERS</a></li>
                            <li><a class="collapse-item" href="<?=$ADM_URL?>/order/"><i class="bi bi-shop-window"></i>  ORDERS</a></li>
                            <li><a class="collapse-item" href="<?=$ADM_URL?>/imag/"><i class="bi bi-card-image"></i>  IMAGES</a></li>
                        </ul>
                        <div class="collapse-divider"></div>
            </li>
            <hr class="sidebar-divider d-none d-md-block">
        </ul>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content" class="container-fluid">
                <?php require_once $VIEW_NAME?>
            </div>
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2023</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="<?=$ADM_URL ?>/public/vendor/jquery/jquery.min.js"></script>
    <script src="<?=$ADM_URL ?>/public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?=$ADM_URL ?>/public/js/sb-admin-2.min.js"></script>
</body>

</html>