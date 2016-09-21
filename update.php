<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN""http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="repairRegister.css" />
<title>New Repair Docket</title>
</head>
<body>
<div id="topNav"><a href="index.php">Register Home</a> | <a href="newRepair.php">New Repair</a></div>
<div id="titleBar">The Listening Post Repair Register</div>
<div id="mainContent">
<?php
include 'dbCredentials.php';
include 'functions.php';

$name = test_input($_POST["name"]);
$phone = test_input($_POST["phone"]);
$email = test_input($_POST["email"]);
$product = test_input($_POST["product"]);
$fault = test_input($_POST["fault"]);
$accessories = test_input($_POST["accessories"]);
$notes = test_input($_POST["notes"]);
$salesperson = test_input($_POST["salesperson"]);
$tested = test_input($_POST["tested"]);
$repair_ID = test_input($_POST["repair_ID"]);
$status = test_input($_POST["status"]);

if($status != 'complete'){
    $repairState = 'active';
}else{
    $repairState = 'complete';
}
$updates = test_input($_POST["updates"]);
$query = "update repairs set customer_name='$name', customer_phone='$phone', customer_email='$email', product_name='$product', product_fault='$fault', product_accessories='$accessories', product_misc='$notes', updates='$updates', salesperson='$salesperson', status='$repairState', tested='$tested' where repair_ID='$repair_ID'";

if ($conn->query($query) == TRUE) {
echo "Created successfully.";

}
require 'docket.php';
?>



</div>

</body>
</html>