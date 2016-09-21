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
            $query = "UPDATE repairs SET status='$status' where repair_ID=$record";
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
        $date = $row["repair_date"];
        $notes = $row["product_misc"];
        $salesperson = $row["salesperson"];
        $updates = $row["updates"];
        $status = $row["status"];
    }
    
}else{
echo "no get record found";
}

?>
<body>
<div id='topNav'><a href='index.php'>Register Home</a> | <a href='newRepair.php'>New Repair</a></div><div id="titleBar">Repair # <?php echo $repair_ID ?></div>
<div id="mainContent">
<div id='displayControl'>
        <?php
        if(isset($_GET['display'])){
            $displayFilter = test_input($_GET['display']);
            $displayOrder = test_input($_GET['order']);
            switch($displayOrder) {
                case 'invert':
                    $displayOrder = 'ORDER BY repair_ID DESC';
                    $normalOrder = '';
                    $invertOrder = 'selected';
                    break;
                default:
                    $displayOrder = 'ORDER BY repair_ID ASC';
                    $normalOrder = 'selected';
                    $invertOrder = '';
                    break;
            }
            switch($displayFilter) {
                case 'all':
                    $statusFilter = '';
                    $activeDisplay = '';
                    $allDisplay = 'selected';
                    $completeDisplay = '';
                    break;
                case 'complete':
                    $statusFilter = "WHERE status='complete'";
                    $activeDisplay = '';
                    $allDisplay = '';
                    $completeDisplay = 'selected';
                    break;
                default:
                    $statusFilter = "WHERE status!='complete'";
                    $activeDisplay = 'selected';
                    $allDisplay = '';
                    $completeDisplay = '';
                    break;
            }
                
        }else{
            $statusFilter = "WHERE status!='complete'";
            $activeDisplay = 'selected';
            $allDisplay = '';
            $completeDisplay = '';
            $displayOrder = 'ORDER BY repair_ID DESC';
            $normalOrder = 'selected';
            $invertOrder = '';
        }
        ?>
<!--- Displays the Choosers for display priority --->
        <form id='displayFilter' action='index.php' method='get' onchange='change()' display='inline'>
        <select name='display'>
            <option value='active' <?php echo $activeDisplay; ?> >Active Only</option>
            <option value='all' <?php echo $allDisplay; ?> >All Repairs</option>
            <option value='complete' <?php echo $completeDisplay; ?> >Complete Repairs</option>
        </select>
        <select name='order'>
            <option value='normal' <?php echo $normalOrder; ?> >OldestFirst</option>
            <option value='invert' <?php echo $invertOrder; ?> >Newest First</option>
        </select>
        </form>
        <div id='search' float='right'>
            <form action='search.php' method='post' display='inline'>
                <input type='text' name='searchQuery'><input type='submit' value='Search'>
            </form>
        </div>
    </div>
<?php

require 'docket.php';

?>
</div>

<div id="footNav">
<div id='editButton'><a href="editRecord.php?docket=<?php echo $repair_ID ?>">Edit this Record</a></div>
<div id='completeButton'><a href="record.php?docket=<?php echo $repair_ID ?>&state=complete">Mark this repair as Complete</a></div></div>
</body>
</html>