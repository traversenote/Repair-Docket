<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN""http://www.w3.org/TR/html4/loose.dtd">
<html lang='en'>
<head>
<meta http-equiv='content-type' content='text/html; charset=utf-8'>
<link rel='stylesheet' href='repairRegister.css' />
<title>Repair Register</title>
<?php
    include 'dbCredentials.php';
    include 'functions.php';
?>
</head>
<div id='topNav'><a href='index.php'>Register Home</a> | <a href='newRepair.php'>New Repair</a></div>
<div id='titleBar'>The Listening Post Repair Register</div>
<div id='mainContent'>
<!---This section handles display control information. Display order, weather completed orders are displayed, etc.--->
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
    <table id='repairRegister'>
        <tr class="titleRow"><td>Repair ID</td><td>Customer Name</td><td>Item</td><td>Date</td><td>Updates</td><td>Status</td></tr>
        <?php 
        $query = "SELECT * FROM repairs $statusFilter $displayOrder";
        $result = $conn->query($query);
        while($row = $result->fetch_assoc()) {
            if ($row["status"] != 'complete'){
                $active = "Active";
            }else{
                $active = "Complete";
            }
            echo "<tr><td><a href=record.php?docket=".$row["repair_ID"].">".$row["repair_ID"]."</td><td><a href=record.php?docket=".$row["repair_ID"].">".$row["customer_name"]."</a></td><td><a href=record.php?docket=".$row["repair_ID"].">".$row["product_name"]."</a></td><td><a href=record.php?docket=".$row["repair_ID"].">".$row["repair_date"]."</a></td><td><a href=record.php?docket=".$row["repair_ID"].">".$row["updates"]."</a></td><td><a href=record.php?docket=".$row["repair_ID"].">".$active."</a></td></tr>";  
        }
        ?>
    </table>
</div>
</html>
