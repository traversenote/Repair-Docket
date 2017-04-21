<div class="panel" id='titleBar'>Repair Number:  <?php echo htmlspecialchars($_GET["docket"]); ?></div>
<div class="container" id='mainContent'>
<?php
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
    	$repair_ID = decode_input($row["repair_ID"]);
    	$name = decode_input($row["customer_name"]);
    	$phone = decode_input($row["customer_phone"]);
    	$email = decode_input($row["customer_email"]);
    	$product = decode_input($row["product_name"]);
    	$fault = decode_input($row["product_fault"]);
    	$accessories = decode_input($row["product_accessories"]);
        $date = date('d M Y', strtotime($row["repair_date"]));
        $notes = decode_input($row["product_misc"]);
        $salesperson = decode_input($row["salesperson"]);
        $tested = decode_input($row["tested"]);
        $updates = decode_input($row["updates"]);
        $status = decode_input($row["status"]);
        $lastUpdate = date('d M Y', strtotime($row["lastUpdate"]));
        $completeDate = $row["completeDate"];
    }
    
}else{
echo "no get record found";
}

$pRecord = (int)$repair_ID -1;
$nRecord = (int)$repair_ID +1;

if($status != 'complete'){
    $displayRepairState = 'Active';
}else{
    $displayRepairState = 'Complete';
}
?>
<div class="panel">
	<div class="row titleRow">
		<div class="col-md-5">Repair ID</div>
		<div class="col-md-5">The Listening Post Wellington</div>
	</div>
	<div class="row inputRow">
		<div class="col-md-5"><?php echo $repair_ID; ?></div>
		<div class="col-md-5">150 Willis Street</br>0508 TO HIFI  |  0508 86 44 34</div>
	</div>
	<div class='row titleRow'>
		<div class="col-md-5">Customer Name</div>
		<div class="col-md-5">Date</div>
	</div>
	<div class="row inputRow">
		<div class="col-md-5"><?php echo $name."<br>".$phone."</br>".$email; ?></div>
		<div class="col-md-5"><?php echo $date; ?></div>
	</div>	
	<div class='row titleRow'>
		<div class="col-md-5">Product Details:</div>
	</div>
	<div class="row inputRow">
		<div class="col-md-10"><?php echo $product; ?></div>
	</div>
	<div class='row titleRow'>
		<div class="col-md-5">Product Fault:</div>
	</div>
	<div class="row inputRow">
		<div class="col-md-10"><?php echo $fault; ?></div>
	</div>
	<div class='row titleRow'>
		<div class="col-md-5">Included Accessories:</div>
	</div>
	<div class="row inputRow">
		<div class="col-md-10"><?php echo $accessories; ?></div>
	</div>
	<div class='row titleRow'>
		<div class="col-md-5">Notes:</div>
	</div>
	<div class="row inputRow">
		<div class="col-md-10"><?php echo $notes; ?></div>
	</div>
	<div class='row titleRow'>
		<div class="col-md-5">Updated at  <?php echo $lastUpdate;?></div>
	</div>
	<div class="row inputRow">
		<div class="col-md-10"><?php echo $updates; ?></div>
	</div>
	<div class='row titleRow'>
		<div class="col-md-5">Tested in Store?</div>
	</div>
	<div class="row inputRow">
		<div class="col-md-10"><?php echo $tested; ?></div>
	</div>
	<div class='row titleRow'>
		<div class="col-md-5">You have been dealing with:</div>
	</div>
	<div class="row inputRow">
		<div class="col-md-10"><?php echo $salesperson; ?></div>
	</div>
	<div class="row inputRow">
		<div class="col-md-10"><?php echo "Status: ".$displayRepairState; ?></div>
	</div>
	<?php
	
	if(isset($completeDate)){
	
	echo "	<div class='row titleRow'><div class='col-md-10'>Date Completed: ".$completeDate."</div></div>";
	
	}
	?>
</div>


<div id="bottomNav" class="panel" >
	<a href="index.php?method=edit&docket=<?php echo $repair_ID ?>" class="fakeButton">Edit this Record</a>
	<a href='print.php?docket=<?php echo $repair_ID ?>' class="fakeButton">Print to PDF</a>
	<a href="index.php?method=docket&docket=<?php echo $repair_ID ?>&state=complete" class="fakeButton">Mark this repair as Complete</a>
</div>
</div>
