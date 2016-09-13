<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN""http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>

<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="repairRegister.css" />
<title>Repair Register</title>
</head>
<?php
include 'dbCredentials.php';
$query = "SELECT * from repairs";
$result = $conn->query($query);
?>
<div id="topNav"><a href="index.php">Register Home</a> | <a href="newRepair.php">New Repair</a> | Search</div>
<div id="titleBar">The Listening Post Repair Register</div>
<div id="mainContent">
<table id="repairRegister">
<tr><td>Repair ID</td><td>Customer Names</td><td>Item</td></tr>

<?php

while($row = $result->fetch_assoc()) {
    
    echo "<tr><td><a href=record.php?docket=".$row["repair_ID"].">".$row["repair_ID"]."</td><td>".$row["customer_name"]."</td><td>".$row["product_name"]."</a></td><td>".$row["repair_date"]."</td><td>".$row["status_updates"]."</td></tr>";  

}


#if ($conn->query($query) == TRUE) {

#} else {
#echo "problem here boss:". $sql. "<br>". $conn->error;
#}
?>
</table>
</div>
</html>
