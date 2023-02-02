<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "invoice";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}



$challan_no = $_POST["challan_no"];

$product = $_POST["product"];
$color = $_POST["color"];
$size = $_POST["size"];
$quantity = $_POST["quantity"];
$to_company = $_POST["to_company"];
$contact_name = $_POST["contact_name"];
$address = $_POST["address"];
$style_number = $_POST["style_number"];
$job_number = $_POST["job_number"];
$proremarks = $_POST["proremarks"];

$sql = "INSERT INTO `challan`(`challan_no`, `to_company`, `contact_name`, `address`, `style_number`, `job_number`, `product_name`, `color`, `size`, `quantity`, `remarks`) VALUES ('$challan_no','$to_company','$contact_name','$address','$style_number','$job_number','$product','$color','$size','$quantity', '$proremarks')";

if (mysqli_query($conn, $sql)) {
  echo "Record added successfully";
} else {
  echo "Error adding record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>