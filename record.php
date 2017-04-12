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

if($_GET["docket"]) {
    $record = $_GET["docket"];
    
    if($_GET["state"]) {
        $status = test_input($_GET["state"]);
        if($status = "complete"){
            $date = date("Y-m-d");
            $query = "UPDATE repairs SET lastUpdate='$date', status='$status', completeDate='$date' where repair_ID=$record";
            $result = $conn->query($query);
  
        }
    }

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
        $date = date('d M Y', strtotime($row["repair_date"]));
        $notes = $row["product_misc"];
        $salesperson = $row["salesperson"];
        $tested = $row["tested"];
        $updates = $row["updates"];
        $status = $row["status"];
        $lastUpdate = date('d M Y', strtotime($row["lastUpdate"]));
        $completeDate = $row["completeDate"];
    }
    
}else{
echo "no get record found";
}

$pRecord = (int)$repair_ID -1;
$nRecord = (int)$repair_ID +1;

?>
<body>
<div id='topNav'><!--<a href='record.php?docket=<?php echo $pRecord; ?>'>Previous</a> | ---><a href='index.php'>Register Home</a> | <a href='newRepair.php'>New Repair</a><!-- | <a href='record.php?docket=<?php echo $nRecord; ?>'>Next</a>--></div><div id="titleBar">Repair # <?php echo $repair_ID ?></div>
<div id="mainContent">
<div id='displayControl'>
<!--- Displays the Choosers for display priority --->
        <div id='search'>
            <form action='search.php' method='post'>
                <input type='text' name='searchQuery'><input type='submit' value='Search'>
            </form>
        </div>
    </div>
<?php

require 'docket.php';

?>
</div>

<div id='footNav'>
<div id='navInner'>
<div class='navCell'><a href="editRecord.php?docket=<?php echo $repair_ID ?>">Edit this Record</a></div>
<div class='navCell'><a href='print.php?docket=<?php echo $repair_ID ?>'>Print to PDF</a></div>
<div class='navCell'><a href="record.php?docket=<?php echo $repair_ID ?>&state=complete">Mark this repair as Complete</a></div>
</div>
</div>
</body>
</html>