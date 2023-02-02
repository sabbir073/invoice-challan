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

<?php

$url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$id = trim($url,'/');
$id = explode('/',$id);
$id  = end($id);

?>


<!DOCTYPE html>
<html lang="EN">
<head>
    <title>Gate Pass</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">

    <!-- External CSS libraries -->
    <link type="text/css" rel="stylesheet" href="../invoice/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="../invoice/fonts/font-awesome/css/font-awesome.min.css">

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="../invoice/img/favicon.ico" type="image/x-icon" >

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Custom Stylesheet -->
    <link type="text/css" rel="stylesheet" href="../invoice/css/style.css">

    <style>
    @page { size: auto;  margin: 0mm; }
    </style>
</head>
<body>

<!-- Invoice 12 start -->
<div class="invoice-12 invoice-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="invoice-inner clearfix">
                    <div class="invoice-info clearfix" id="invoice_wrapper">
                        <div class="invoice-contant">
                            <div class="invoice-headar">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="invoice-logo">
                                            <!-- logo started -->
                                            <div class="logo">
                                                <img src="../invoice/img/logos/logo.png" alt="logo">
                                            </div>
                                            <!-- logo ended -->
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                    <button type="button" class="btn btn-dark rounded-pill px-3 py-2 border" style="cursor:default;">GATE PASS</button>

                                    </div>
                                    <div class="col-sm-4">
                                        <div class="invoice-number-inner">
                                            <?php
                                                $date_query = "SELECT DISTINCT `date` FROM challan WHERE challan_no = '$id'";
                                                $date_result = mysqli_query($link, $date_query);
                                                $date = mysqli_fetch_assoc($date_result);
                                                $timestamp = date('d F Y', strtotime($date['date']));
                                            ?>
                                            <h2 class="name">Gate Pass No: #<?php echo $id;?></h2>
                                            <p class="mb-0">Date: <span><?php echo $timestamp;?></span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="invoice-top">
                                <?php
                                    $info_query = "SELECT DISTINCT `to_company`, `address`, `contact_name`, `style_number`, `job_number` FROM challan WHERE challan_no = '$id'";
                                    $info_result = mysqli_query($link, $info_query);
                                    $info = mysqli_fetch_assoc($info_result);
                                    
                                    $to_company = $info['to_company'];
                                    $address = $info['address'];
                                ?>
                                <div class="row">
                                    <div class="col-sm-12 mb-30">
                                        <div class="terms-conditions mb-30">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <span class="inv-title-1">Name Of Party: </span><span class="name"><?php echo $to_company;?></span>
                                                </div>
                                                <div>
                                                <span class="inv-title-1">Address:</span> <?php echo $address;?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                </div>
                            </div>
                            <div class="invoice-center">
                                <div class="order-summary">
                                    <div class="table-outer">
                                        <table class="default-table invoice-table">
                                            <thead>
                                            <tr>
                                                <th>SL.</th>
                                                <th>Description</th>
                                                <th>Quantity</th>
                                                <th>Job No.</th>
                                                <th>Remarks</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="invoice-bottom">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="terms-conditions mb-30">
                                            <div class="d-flex justify-content-between">
                                                <div style="text-decoration: overline;">Receiver's Signature</div>
                                                <div style="text-decoration: overline;">Authorized Signature</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="invoice-btn-section clearfix d-print-none">
                        <a href="javascript:window.print()" class="btn btn-lg btn-print">
                            <i class="fa fa-print"></i> Print Challan
                        </a>
                        <a id="invoice_download_btn" class="btn btn-lg btn-download btn-theme">
                            <i class="fa fa-download"></i> Download Challan
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Invoice 12 end -->

<script src="../invoice/js/jquery.min.js"></script>
<script src="../invoice/js/jspdf.min.js"></script>
<script src="../invoice/js/html2canvas.js"></script>
<script src="../invoice/js/app.js"></script>
</body>
</html>


