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
?>
<body>
<div id='topNav'><a href='index.php'>Register Home</a> | <a href='newRepair.php'>New Repair</a></div>
<div id="titleBar">Create a new repair docket</div>
<div id="mainContent">
<?php

if($_GET["docket"]){
    $record =  $_GET["docket"];
    $query = "SELECT * FROM repairs WHERE repair_ID=$record";
    $result = $conn->query($query);
    
    while($row = $result->fetch_assoc()) {
        $repair_ID = $row["repair_ID"];
        $customer_name = $row["customer_name"];
        $customer_phone = $row["customer_phone"];
        $customer_email = $row["customer_email"];
        $product_name = $row["product_name"];
        $product_fault = $row["product_fault"];
        $product_accessories = $row["product_accessories"];
        $updates = $row["updates"];
        $date = date('d M Y', strtotime($row["repair_date"]));
        $notes = $row["product_misc"];
        $tested = $row["tested"];
        $salesperson = $row["salesperson"];
        $status = $row["status"];
        
    }
}else{
echo "no get record found";
}

if ($status != 'complete'){
    $checked='';
}else{
    $checked='checked';
}
?>
<form action="update.php?docket=<?php echo $repair_ID ?>" method="post">
<table id="docket">
<tr><td>
<table id="repairHeader" width="100%">
<tr class="titleRow"><td>Repair ID</td><td>The Listening Post Wellington<br>150 Willis Street<br></td></tr>
<tr><td><?php echo "<input type='hidden' name='repair_ID' value='".$repair_ID."'>".$repair_ID; ?></td><td> 0508 TO HIFI  |  0508 86 44 34</td></tr>
<tr><td></td><td></td></tr>
<tr class="titleRow"><td>Customer Name</td><td>Date</td></tr>
<tr><td><?php echo "<input type='text' name='name' value='".$customer_name."' size='50'><br><input type='text' name='phone' value='".$customer_phone."' size='50'></br><input type='text' name='email' value='".$customer_email."'></td><td>".$date; ?></td></tr>
<tr><td></td><td></td></tr>
</td></tr></table>

<tr class="titleRow"><td>Product Details:</td></tr>
<tr><td><?php echo "<input type='text' size='100' name='product' value='".$product_name."'>"; ?></td></tr>
<tr><td></td></tr>
<tr class="titleRow"><td>Product Fault:</td></tr>
<tr><td><?php echo "<textarea rows='15' cols='100' name='fault' name='fault'>".addslashes($product_fault)."</textarea>"; ?></td></tr>
<tr><td></td></tr>
<tr class="titleRow"><td>Included Accessories:</td></tr>
<tr><td><?php echo "<input type='text' size='100' name='accessories' value='".$product_accessories."'>"; ?></td></tr>
<tr><td></td></tr>
<tr class="titleRow"><td>Notes:</td></tr>
<tr><td><?php echo "<input type='text' size='100' name='notes' value='".$notes."'>"; ?></td></tr>
<tr><td></td></tr>
<tr class="titleRow"><td>Updates:</td></tr>
<tr><td><?php echo "<input type='text' size='100' name='updates' value='".$updates."'>"; ?></td></tr>
<tr><td></td></tr>
<tr class="titleRow"><td>Tested in Store?</td></tr>
<tr><td><?php echo "<input type='text' size='100' name='tested' value='".$tested."'>"; ?></td></tr>
<tr><td></td></tr>
<tr class='titleRow'><td>You have been dealing with:</td></tr>
<tr><td>
<tr><td><?php echo "<input type='text' size='100' name='salesperson' value='".$salesperson."'>"; ?></td></tr>
</td></tr>
<tr><td><label><input type='checkbox' name='status' value='complete'<?php echo " ".$checked; ?> >Complete</label></td></tr>
</td></tr>


</table>
</div>

<div id="footNav">
<input type="submit" value="Submit">
</form>
</div>

</body>
</html>