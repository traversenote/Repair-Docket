<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN""http://www.w3.org/TR/html4/loose.dtd">
<html lang='en'>
<head>
<meta http-equiv='content-type' content='text/html; charset=utf-8'>
<link rel='stylesheet' href='repairRegister.css' />
<title>New Repair Docket</title>
</head>
<body>
<div id='topNav'><a href='index.php'>Register Home</a> | <a href='newRepair.php'>New Repair</a> | <form action='search.php' method='post'><input type='text' name='searchQuery'><input type='submit' value='Search'></form></div>
<div id='titleBar'>The Listening Post Repair Register</div>
<div id='mainContent'>
<?php
include 'dbCredentials.php';
include 'functions.php';
  
$name = test_input($_POST["name"]);
$phone = test_input($_POST["phone"]);
$address1 = test_input($_POST["address1"]);
$address2 = test_input($_POST["address2"]);
$email = test_input($_POST["email"]);
$product = test_input($_POST["product"]);
$fault = test_input($_POST["fault"]);
$accessories = test_input($_POST["accessories"]);
$notes = test_input($_POST["notes"]);
$salesperson = test_input($_POST["salesperson"]);
$date = date("Y-m-d");

$query = "insert into repairs (customer_name, customer_phone, customer_address1, customer_address2, customer_email, repair_date, product_name, product_fault, product_accessories, product_misc, salesperson) values ('$name', '$phone', '$address1', '$address2', '$email', '$date', '$product', '$fault', '$accessories', '$notes', '$salesperson')";


if ($conn->query($query) == TRUE) {
echo "Created successfully.</br>";

require 'docket.php';

} else {
echo "Problem here boss:". $sql. "<br>". $conn->error;
}


?>

</div>

</body>
</html>