<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

include("config.php");
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="universal admin is super flexible, powerful, clean & modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, universal admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="assets/images/favicon.png" type="image/x-icon"/>
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon"/>
    <title>Universal - Premium Admin Template</title>

    <!--Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700" rel="stylesheet">

    <!-- Font Awesome 
    <link rel="stylesheet" type="text/css" href="assets/css/fontawesome.css">-->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- ico-font -->
    <link rel="stylesheet" type="text/css" href="assets/css/icofont.css">

    <!-- Themify icon -->
    <link rel="stylesheet" type="text/css" href="assets/css/themify.css">

    <!-- Flag icon -->
    <link rel="stylesheet" type="text/css" href="assets/css/flag-icon.css">

    <!-- prism css -->
    <link rel="stylesheet" type="text/css" href="assets/css/prism.css">

    <!-- Owl css -->
    <link rel="stylesheet" type="text/css" href="assets/css/owlcarousel.css">

    <!--JSGrid css-->
    <link rel="stylesheet" type="text/css" href="assets/css/datatables.css" />

    <!-- Bootstrap css -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">

    <!-- App css -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

    <!-- Responsive css -->
    <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">

</head>
<body>

<!-- Loader starts -->
<div class="loader-wrapper">
    <div class="loader bg-white">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
        <h4>Have a great day at work today <span>&#x263A;</span></h4>
    </div>
</div>
<!-- Loader ends -->

<!--page-wrapper Start-->
<div class="page-wrapper">

    <!--Page Header Start-->
    <div class="page-main-header">
        <div class="main-header-left">
            <div class="logo-wrapper">
                <a href="dashboard.php">
                    <img src="assets/images/logoxubisoft.png" class="image-dark" alt=""/>
                    <img src="assets/images/logo-light-dark-layout.png" class="image-light" alt=""/>
                </a>
            </div>
        </div>
        <div class="main-header-right row">
            <div class="mobile-sidebar col-1 ps-0">
                <div class="text-start switch-sm">
                    <label class="switch">
                        <input type="checkbox" id="sidebar-toggle" checked>
                        <span class="switch-state"></span>
                    </label>
                </div>
            </div>
            <div class="nav-right col">
                <ul class="nav-menus">
                    <li>
                        <form class="form-inline search-form">
                            <div class="form-group">
                                <label class="sr-only">Email</label>
                                <input type="search"  class="form-control-plaintext" placeholder="Search.." >
                                <span class="d-sm-none mobile-search">
                                </span>
                            </div>
                        </form>
                    </li>
                    <li>
                        <a href="#!" onclick="javascript:toggleFullScreen()" class="text-dark">
                            <img class="align-self-center pull-right me-2" src="assets/images/dashboard/browser.png" alt="header-browser">
                        </a>
                    </li>
                    <li class="onhover-dropdown">
                        <div class="d-flex align-items-center">
                            <img class="align-self-center pull-right flex-shrink-0 me-2" src="assets/images/dashboard/user.png" alt="header-user"/>
                            <div>
                                <h6 class="m-0 txt-dark f-16">
                                    My Account
                                    <i class="fa fa-angle-down pull-right ms-2"></i>
                                </h6>
                            </div>
                        </div>
                        <ul class="profile-dropdown onhover-show-div p-20">
                            <li>
                                <a href="#">
                                    <i class="icon-user"></i>
                                    Edit Profile
                                </a>
                            </li>
                            <li>
                                <a href="logout.php">
                                    <i class="icon-power-off"></i>
                                    Logout
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <div class="d-lg-none mobile-toggle">
                    <i class="icon-more"></i>
                </div>
            </div>
        </div>
    </div>
    <!--Page Header Ends-->

    <!--Page Body Start-->
    <div class="page-body-wrapper">
        <!--Page Sidebar Start-->
        <div class="page-sidebar custom-scrollbar">
            <div class="sidebar-user text-center">
                <div>
                    <img class="img-50 rounded-circle" src="assets/images/user/user.png" alt="#">
                </div>
                <h6 class="mt-3 f-12"><?php echo $_SESSION["name"];?></h6>
            </div>
            <ul class="sidebar-menu">
                <li class="active">
                <li>
                    <a href="javascript:void(0)" class="sidebar-header">
                        <i class="icon-palette"></i> <span>Challan</span>
                        <i class="fa fa-angle-right pull-right"></i>
                    </a>
                    <ul class="sidebar-submenu">
                        <li><a href="add-challan.php"><i class="fa fa-angle-right"></i>Add New</a></li>
                        <li><a href="challan-all.php"><i class="fa fa-angle-right"></i>View All</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0)" class="sidebar-header">
                        <i class="icon-layout"></i> <span>Products</span>
                        <i class="fa fa-angle-right pull-right"></i>
                    </a>
                    <ul class="sidebar-submenu">
                        <li><a href="add-product.php"><i class="fa fa-angle-right"></i>Add</a></li>
                        <li><a href="product-all.php"><i class="fa fa-angle-right"></i>View All</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0)" class="sidebar-header">
                        <i class="icon-layout"></i> <span>Units</span>
                        <i class="fa fa-angle-right pull-right"></i>
                    </a>
                    <ul class="sidebar-submenu">
                        <li><a href="add-unit.php"><i class="fa fa-angle-right"></i>Add</a></li>
                        <li><a href="product-units.php"><i class="fa fa-angle-right"></i>View All</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0)" class="sidebar-header">
                        <i class="icon-layout"></i> <span>Colors</span>
                        <i class="fa fa-angle-right pull-right"></i>
                    </a>
                    <ul class="sidebar-submenu">
                        <li><a href="add-color.php"><i class="fa fa-angle-right"></i>Add</a></li>
                        <li><a href="product-colors.php"><i class="fa fa-angle-right"></i>View All</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0)" class="sidebar-header">
                        <i class="icon-layout"></i> <span>Sizes</span>
                        <i class="fa fa-angle-right pull-right"></i>
                    </a>
                    <ul class="sidebar-submenu">
                        <li><a href="add-size.php"><i class="fa fa-angle-right"></i>Add</a></li>
                        <li><a href="product-sizes.php"><i class="fa fa-angle-right"></i>View All</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0)" class="sidebar-header">
                    <i class="fa-solid fa-user"></i> <span>Users</span>
                        <i class="fa fa-angle-right pull-right"></i>
                    </a>
                    <ul class="sidebar-submenu">
                        <li><a href="add-user.php"><i class="fa fa-angle-right"></i>Add</a></li>
                        <li><a href="users-all.php"><i class="fa fa-angle-right"></i>View All</a></li>
                    </ul>
                </li>
                
                <li>
                    <a href="javascript:void(0)" class="sidebar-header">
                        <i class="icon-cloud-down"></i> <span>Vendor</span>
                        <i class="fa fa-angle-right pull-right"></i>
                    </a>
                    <ul class="sidebar-submenu">
                        <li><a href="add-vendor.php"><i class="fa fa-angle-right"></i>Add</a></li>
                        <li><a href="vendors-all.php"><i class="fa fa-angle-right"></i>View All</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0)" class="sidebar-header">
                        <i class="icon-cloud-down"></i> <span>Clients</span>
                        <i class="fa fa-angle-right pull-right"></i>
                    </a>
                    <ul class="sidebar-submenu">
                        <li><a href="add-client.php"><i class="fa fa-angle-right"></i>Add</a></li>
                        <li><a href="clients-all.php"><i class="fa fa-angle-right"></i>View All</a></li>
                    </ul>
                </li>
            </ul>
            <div class="sidebar-widget text-center">
                <div class="sidebar-widget-top">
                    <h6 class="mb-2 fs-14">Need Help</h6>
                    <i class="icon-bell"></i>
                </div>
                <div class="sidebar-widget-bottom p-20 m-20">
                    <p><span class="need-help-icon"><i class="fa fa-phone" aria-hidden="true"></i></span>+88017 1402 8710
                        <br> <span class="need-help-iconmail"><i class="fa fa-envelope-o" aria-hidden="true"></i></span> info@xubisoft.com
                        <br><a href="https://xubisoft.com/" class="xubisoft"><img src="assets/images/xubisoft-logo.jpg" alt=""></a>
                    </p>
                </div>
            </div>
        </div>
        <!--Page Sidebar Ends-->