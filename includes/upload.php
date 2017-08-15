<?php

include '../dbCredentials.php';
include '../functions.php';
  
$name = test_input($_POST["name"]);
$phone = test_input($_POST["phone"]);
$email = test_input($_POST["email"]);
$product = test_input($_POST["product"]);
$dos = test_input($_POST["dos"]);
$fault = test_input($_POST["fault"]);
$accessories = test_input($_POST["accessories"]);
$notes = test_input($_POST["notes"]);
$tested = test_input($_POST["tested"]);
$salesperson = test_input($_POST["salesperson"]);
$date = date("Y-m-d");


$query = "insert into repairs (customer_name, customer_phone, customer_email, repair_date, product_name, dos, product_fault, product_accessories, product_misc, salesperson, tested, status, lastUpdate) values ('$name', '$phone', '$email', '$date', '$product', '$dos', '$fault', '$accessories', '$notes', '$salesperson', '$tested', 'active', '$date')";

$success='0';

if ($conn->query($query) == TRUE) {
	$success='1';
} else {
	echo $query;
	echo "Problem here boss:". $sql. "<br>". $conn->error;
}

$query = "SELECT * FROM repairs ORDER BY repair_ID DESC LIMIT 1";
$result = $conn->query($query);
while ($row = $result->fetch_assoc()) {
	$repair_ID = $row["repair_ID"];
}

if($success == '1'){
	echo "Processing...";
	echo "<script>window.location='../index.php?method=docket&docket=".$repair_ID."';</script>";
}else{	
	echo "There was an issue";
}
?>