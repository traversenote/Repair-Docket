<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN""http://www.w3.org/TR/html4/loose.dtd">
<html lang='en'>
<head>
<meta http-equiv='content-type' content='text/html; charset=utf-8'>
<link rel='stylesheet' href='repairRegister.css' />
<title>Repair Register</title>
</head>
<?php
include 'dbCredentials.php';
include 'functions.php';
?>
<div id='topNav'><a href='index.php'>Register Home</a> | <a href='newRepair.php'>New Repair</a> | </div>
<div id='titleBar'>The Listening Post Repair Register</div>
<div id='mainContent'>
<div id='displayControl'>
<?php
if(isset($_GET["display"])){
    $displayFilterClean = test_input($displayFilter);
    switch($displayFilterClean) {
        case 'all':
            $statusFilter = '';
            break;
        case 'complete':
            $statusFilter = "WHERE status='complete'";
            break;
    }
}else{
    $statusFilter = "WHERE status!='complete'";
}

?>
 
</div>


<table id='repairRegister'>
<tr class="titleRow"><td>Repair ID</td><td>Customer Name</td><td>Item</td><td>Date</td><td>Status</td><td>Active?</td></tr>
<select name='display'>
    <option value='active'>Active Only</option>
    <option value='all'>All Repairs</option>
    <option value='complete'>Complete Repairs</option>
</select>
<div id='search' float='right'><form action='search.php' method='post' display='inline'><input type='text' name='searchQuery'><input type='submit' value='Search'></form></div>

<?php 

$query = "SELECT * FROM repairs $statusFilter ORDER BY repair_ID DESC";
$result = $conn->query($query);
while($row = $result->fetch_assoc()) {

    if ($row["status"] != 'complete'){
        $active = "Active";
    }else{
        $active = "Complete";
    }
    echo "<tr><td><a href=record.php?docket=".$row["repair_ID"].">".$row["repair_ID"]."</td><td>".$row["customer_name"]."</td><td>".$row["product_name"]."</a></td><td>".$row["repair_date"]."</td><td>".$row["updates"]."</td><td>".$active."</td></tr>";  
}


?>
</table>
</div>
</html>
