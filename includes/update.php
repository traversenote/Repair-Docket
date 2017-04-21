<?php

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
$lastUpdate = date();

if($status != 'complete'){
    $repairState = 'active';
}else{
    $repairState = 'complete';
}
$updates = test_input($_POST["updates"]);
$query = "update repairs set customer_name='$name', customer_phone='$phone', customer_email='$email', product_name='$product', product_fault='$fault', product_accessories='$accessories', product_misc='$notes', updates='$updates', salesperson='$salesperson', status='$repairState', tested='$tested' , lastUpdate=CURDATE() where repair_ID='$repair_ID'";

if ($conn->query($query) == TRUE) {
	require 'record.php';
}

?>
