<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN""http://www.w3.org/TR/html4/loose.dtd">
<html lang='en'>
<head>
<meta http-equiv='content-type' content='text/html; charset=utf-8'>
<link rel='stylesheet' href='repairRegister.css' />
<title>Repair Docket <?php echo htmlspecialchars($_GET["docket"]); ?></title>
</head>
<?php
include 'dbCredentials.php';
include 'functions.php';


if($_GET["docket"]){
    $record =  $_GET["docket"];
    $query = "SELECT * FROM repairs WHERE repair_ID=$record";
    $result = $conn->query($query);
    while($row = $result->fetch_assoc()) {
        $repair_ID = $row["repair_ID"];
        $name = $row["customer_name"];
        $phone = $row["customer_phone"];
        $email = $row["customer_email"];
        $product = $row["product_name"];
        $fault = $row["product_fault"];
        $accessories = $row["product_accessories"];
        $date = $row["repair_date"];
        $notes = $row["product_misc"];
        $salesperson = $row["salesperson"];
        $updates = $row["status_updates"];
    }
}else{
echo "no get record found";
}

?>
<body>
<div id='topNav'><a href='index.php'>Register Home</a> | <a href='newRepair.php'>New Repair</a> | <form action='search.php' method='post'><input type='text' name='searchQuery'><input type='submit' value='Search'></form></div>
<div id="titleBar">Repair # <?php echo $repair_ID ?></div>
<div id="mainContent">

<?php

require 'docket.php';

?>
</div>

<div id="footNav"><a href="editRecord.php?docket=<?php echo $repair_ID ?>">Edit this Record</a></div>
</body>
</html>