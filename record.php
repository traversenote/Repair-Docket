<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN""http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>

<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="repairRegister.css" />
<title>Repair Docket <?php echo htmlspecialchars($_GET["docket"]); ?></title>
</head>
<?php
include 'dbCredentials.php';
include 'functions.php';
?>
<body>
<div id="topNav"><a href="index.php">Register Home</a> | <a href="newRepair.php">New Repair</a> | Search</div>
<div id="titleBar">Create a new repair docket</div>
<div id="mainContent">
<?php

if($_GET["docket"]){
    $record =  $_GET["docket"];
    $query = "SELECT * from repairs where repair_ID=$record";
    $result = $conn->query($query);
    while($row = $result->fetch_assoc()) {
        $repair_ID = $row["repair_ID"];
        $customer_name = $row["customer_name"];
        $customer_phone = $row["customer_phone"];
        $customer_email = $row["customer_email"];
        $product_name = $row["product_name"];
        $product_fault = $row["product_fault"];
        $product_accessories = $row["product_accessories"];
        $date = $row["repair_date"];
        $notes = $row["product_misc"];
    }
}else{
echo "no get record found";
}
?>
<table id="docket">
<tr><td>
<table id="repairHeader" width="100%">
<tr class="titleRow"><td>Repair ID</td><td>The Listening Post Wellington<br>150 Willis Street<br></td></tr>
<tr><td><?php echo $repair_ID; ?></td><td> 0508 TO HIFI  |  0508 86 44 34</td></tr>
<tr><td></td><td></td></tr>
<tr class="titleRow"><td>Customer Name</td><td>Date</td></tr>
<tr><td><?php echo $customer_name."<br>".$customer_phone."</br>".$customer_email; ?></td><td><?php $date; ?></td></tr>
<tr><td></td><td></td></tr>
</td></tr></table>

<tr class="titleRow"><td>Product Details:</td></tr>
<tr><td><?php echo $product_name; ?></td></tr>
<tr><td></td></tr>
<tr class="titleRow"><td>Product Fault:</td></tr>
<tr><td><?php echo $product_fault; ?></td></tr>
<tr><td></td></tr>
<tr class="titleRow"><td>Included Accessories:</td></tr>
<tr><td><?php echo $product_accessories; ?></td></tr>
<tr><td></td></tr>
<tr class="titleRow"><td>Notes:</td></tr>
<tr><td><?php echo $notes; ?></td></tr>
<tr><td></td></tr>
<tr class="titleRow"><td>You have been dealing with:</td></tr>
<tr><td>
<?php

$salesperson = $row["salesperson"];
switch ($salesperson){
    case "JS":
        $salesperson = "Jason Spears";
        break;
    case "RW":
        $salesperson = "Richard White";
        break;
    case "WW":
        $salesperson = "William Woodhall";
        break;
    case "MS":
        $salesperson = "Manu Scott";
        break;
    default:
        $salesperson = "The Listening Post Staff";
        }
echo $salesperson;        

?>
</td></tr>
</table>
</div>
</body>
</html>