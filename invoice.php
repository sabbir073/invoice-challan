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

/**$url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$id = trim($url,'/');
$id = explode('/',$id);
$id  = end($id);


$product_query = "SELECT DISTINCT product_name FROM challan WHERE challan_no = '$id'";
$product_result = mysqli_query($link, $product_query);
while ($product = mysqli_fetch_assoc($product_result)) {
  echo "<h2>" . $product['product_name'] . "</h2>";
  
  // Get all unique sizes for the current product
  $size_query = "SELECT DISTINCT size FROM challan WHERE product_name = '" . $product['product_name'] . "'";
  $size_result = mysqli_query($link, $size_query);
  $sizes = array();
  while ($size = mysqli_fetch_assoc($size_result)) {
    $sizes[] = $size['size'];
  }
  
  echo "<table>";
  echo "<thead>";
  echo "<tr>";
  echo "<th>Color</th>";
  foreach ($sizes as $size) {
    echo "<th>" . $size . "</th>";
  }
  echo "</tr>";
  echo "</thead>";
  
  echo "<tbody>";
  // Get all colors for the current product
  $color_query = "SELECT DISTINCT color FROM challan WHERE product_name = '" . $product['product_name'] . "'";
  $color_result = mysqli_query($link, $color_query);
  while ($color = mysqli_fetch_assoc($color_result)) {
    echo "<tr>";
    echo "<td>" . $color['color'] . "</td>";
    foreach ($sizes as $size) {
      // Get the quantity for the current product, color, and size
      $quantity_query = "SELECT quantity FROM challan WHERE product_name = '" . $product['product_name'] . "' AND color = '" . $color['color'] . "' AND size = '" . $size . "'";
      $quantity_result = mysqli_query($link, $quantity_query);
      $quantity = mysqli_fetch_assoc($quantity_result)['quantity'];
      echo "<td>" . $quantity . "</td>";
    }
    echo "</tr>";
  }
  echo "</tbody>";
  echo "</table>";
}**/
?>


<!DOCTYPE html>
<html lang="EN">
<head>
    <title>Delivery Challan</title>
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
                                    <button type="button" class="btn btn-dark rounded-pill px-3 py-2 border" style="cursor:default;">DELIVERY CHALLAN</button>

                                    </div>
                                    <div class="col-sm-4">
                                        <div class="invoice-number-inner">
                                            <h2 class="name">Challan No: #45613</h2>
                                            <p class="mb-0">Invoice Date: <span>21 Sep 2021</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="invoice-top">
                                <div class="row">
                                    <div class="col-sm-4 mb-30">
                                        <div class="invoice-number">
                                            <h4 class="inv-title-1">To, M/S</h4>
                                            <h2 class="name mb-10">Jhon Smith</h2>
                                            <p class="invo-addr-1 mb-0">
                                                <span class="inv-title-1">Address:</span>
                                                info@themevessel.com <br/>
                                                21-12 Green Street, Meherpur<br/>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 mb-30">
                                        <div class="invoice-number">
                                            <div class="invoice-number-inner">
                                                <h4 class="inv-title-1">Buyer</h4>
                                                <h2 class="name mb-10">Animas Roky</h2>
                                                <p class="invo-addr-1 mb-0">
                                                    <span class="inv-title-1">Style No.</span> #322176  <br/>
                                                    <span class="inv-title-1">Job No.</span> #322176  <br/>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 mb-30 invoice-contact-us">
                                        <span class="inv-title-1">Factory</span>
                                        <ul class="link">
                                            <li>
                                                <i class="fa fa-map-marker"></i> Sorkar Market Ashrafia Madrasa Road, Ashulia, Dhaka.
                                            </li>
                                            <li>
                                                <i class="fa fa-phone"></i> <a href="#">01713-019291, 01613-732576</a>
                                            </li>
                                            <li>
                                                <i class="fa fa-envelope"></i> <a href="#">nazmul.df123@gmail.com</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="invoice-center">
                                <div class="order-summary">
                                    <div class="table-outer">
                                        <h4>01. Shirt</h4>
                                        <table class="default-table invoice-table">
                                            <thead>
                                            <tr>
                                                <th>Color</th>
                                                <th>XS</th>
                                                <th>S</th>
                                                <th>M</th>
                                                <th>L</th>
                                                <th>Total</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            <tr>
                                                <td>Red</td>
                                                <td>100 </td>
                                                <td>200</td>
                                                <td>300</td>
                                                <td>400</td>
                                                <td>1000</td>
                                            </tr>
                                            <tr>
                                                <td>Green</td>
                                                <td>100 </td>
                                                <td>200</td>
                                                <td>300</td>
                                                <td>400</td>
                                                <td>1000</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="invoice-center">
                                <div class="order-summary">
                                    <div class="table-outer">
                                        <h4>01. Shirt</h4>
                                        <table class="default-table invoice-table">
                                            <thead>
                                            <tr>
                                                <th>Color</th>
                                                <th>XS</th>
                                                <th>S</th>
                                                <th>M</th>
                                                <th>L</th>
                                                <th>Total</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            <tr>
                                                <td>Red</td>
                                                <td>100 </td>
                                                <td>200</td>
                                                <td>300</td>
                                                <td>400</td>
                                                <td>1000</td>
                                            </tr>
                                            <tr>
                                                <td>Green</td>
                                                <td>100 </td>
                                                <td>200</td>
                                                <td>300</td>
                                                <td>400</td>
                                                <td>1000</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="invoice-bottom">
                                <div class="row">
                                    <div class="col-lg-6 col-md-7 col-sm-7">
                                        <div class="terms-conditions mb-30">
                                            <h3 class="inv-title-1 mb-10">Terms & Conditions</h3>
                                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy.
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-5 col-sm-5">
                                        <div class="payment-method mb-30">
                                            <h3 class="inv-title-1 mb-10">Payment Method</h3>
                                            <ul class="payment-method-list-1 text-14">
                                                <li><strong>Account No:</strong> 00 123 647 840</li>
                                                <li><strong>Account Name:</strong> Jhon Doe</li>
                                                <li><strong>Branch Name:</strong> xyz</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="invoice-btn-section clearfix d-print-none">
                        <a href="javascript:window.print()" class="btn btn-lg btn-print">
                            <i class="fa fa-print"></i> Print Invoice
                        </a>
                        <a id="invoice_download_btn" class="btn btn-lg btn-download btn-theme">
                            <i class="fa fa-download"></i> Download Invoice
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


