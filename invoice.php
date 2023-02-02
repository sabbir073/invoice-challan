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
                                            <?php
                                                $date_query = "SELECT DISTINCT `date` FROM challan WHERE challan_no = '$id'";
                                                $date_result = mysqli_query($link, $date_query);
                                                $date = mysqli_fetch_assoc($date_result);
                                                $timestamp = date('d F Y', strtotime($date['date']));
                                            ?>
                                            <h2 class="name">Challan No: #<?php echo $id;?></h2>
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
                                    $contact_name = $info['contact_name'];
                                    $style_number = $info['style_number'];
                                    $job_number = $info['job_number'];
                                ?>
                                <div class="row">
                                    <div class="col-sm-4 mb-30">
                                        <div class="invoice-number">
                                            <h4 class="inv-title-1">To, M/S</h4>
                                            <h2 class="name mb-10"><?php echo $to_company;?></h2>
                                            <p class="invo-addr-1 mb-0">
                                                <span class="inv-title-1">Address:</span>
                                                <?php echo $address;?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 mb-30">
                                        <div class="invoice-number">
                                            <div class="invoice-number-inner">
                                                <h4 class="inv-title-1">Buyer</h4>
                                                <h2 class="name mb-10"><?php echo $contact_name;?></h2>
                                                <p class="invo-addr-1 mb-0">
                                                    <span class="inv-title-1">Style No.</span> #<?php echo $style_number;?>  <br/>
                                                    <span class="inv-title-1">Job No.</span> #<?php echo $job_number;?>  <br/>
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
                                        <table class="default-table invoice-table">
                                            <thead>
                                            <tr>
                                                <th>SL.</th>
                                                <th>Item Name</th>
                                                <th>Description Of Goods</th>
                                                <th>Total</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            <?php
                                                $i = 1;
                                                $grand_total = 0;
                                                $product_query = "SELECT DISTINCT product_name FROM challan WHERE challan_no = '$id'";
                                                $product_result = mysqli_query($link, $product_query);
                                                while ($product = mysqli_fetch_assoc($product_result)){
                                                    
                                                    echo "<tr>";
                                                    echo "<td>".$i."</td>";
                                                    echo "<td>".$product['product_name']." </td>";
                                                    echo "<td>";
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
                                                        echo "<th>Sub Total</th>";
                                                        echo "</tr>";
                                                        echo "</thead>";
                                                        
                                                        echo "<tbody>";
                                                        // Get all colors for the current product
                                                        $color_query = "SELECT DISTINCT color FROM challan WHERE product_name = '" . $product['product_name'] . "'";
                                                        $color_result = mysqli_query($link, $color_query);
                                                        while ($color = mysqli_fetch_assoc($color_result)) {
                                                            echo "<tr>";
                                                            echo "<td>" . $color['color'] . "</td>";
                                                            $total_quantity = 0;
                                                            foreach ($sizes as $size) {
                                                            // Get the quantity for the current product, color, and size
                                                            $quantity_query = "SELECT quantity FROM challan WHERE product_name = '" . $product['product_name'] . "' AND color = '" . $color['color'] . "' AND size = '" . $size . "'";
                                                            $quantity_result = mysqli_query($link, $quantity_query);
                                                            if ($quantity = mysqli_fetch_assoc($quantity_result)) {
                                                                $quantity = $quantity['quantity'];
                                                                $total_quantity += $quantity;
                                                                echo "<td>" . $quantity . "</td>";
                                                              } else {
                                                                $quantity = 0;
                                                                echo "<td>0</td>";
                                                              }
                                                            }
                                                            echo "<td>" . $total_quantity . "</td>";
                                                            echo "</tr>";
                                                            $grand_total += $total_quantity;
                                                        }
                                                        echo "</tbody>";
                                                        echo "</table>";
                                                    echo "</td>";
                                                
                                                    echo "<td>".$grand_total."</td>";

                                                    echo "</tr>";
                                                    $i++;
                                                    $grand_total = 0;
                                                }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="table-outer pt-3 mb-30">
                            <center><h5 class="text-dark">[This is remarks]</h5></center>
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


