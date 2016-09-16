<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN""http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>

<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="repairRegister.css" />
<title>Search Results</title>
</head>
<?php
include 'dbCredentials.php';
include 'functions.php';


?>
<div id="topNav"><a href="index.php">Register Home</a> | <a href="newRepair.php">New Repair</a> | <form action="search.php" method="post"><input type="text" name="searchQuery"><input type="submit" value="Search"></form></div>
<div id="titleBar">The Listening Post Repair Register : Search Results</div>
<div id="mainContent">


<table id="repairRegister">
<tr><td>Repair ID</td><td>Customer Name</td><td>Item</td><td>Date</td><td>Status</td></tr>

<?php

$searchQuery = test_input($_POST["searchQuery"]);
$name = test_input($_POST["name"]);


$query = "SELECT * from repairs WHERE repair_id LIKE '%$searchQuery%' or customer_name LIKE '%$searchQuery%' or product_name LIKE '%$searchQuery%' or customer_phone LIKE '%$searchQuery%' ORDER BY repair_ID DESC";



$result = $conn->query($query);


while($row = $result->fetch_assoc()) {
    
    echo "<tr><td><a href=record.php?docket=".$row["repair_ID"].">".$row["repair_ID"]."</td><td>".$row["customer_name"]."</td><td>".$row["product_name"]."</a></td><td>".$row["repair_date"]."</td><td>".$row["updates"]."</td></tr>";  

}
echo "</table>";

?>

</div>
</html>