<div class="panel" id='titleBar'>Repair Number:  <?php echo htmlspecialchars($_GET["docket"]); ?></div>
<div class="container" id='mainContent'>
<?php

if($_GET["docket"]){
    $record =  $_GET["docket"];
    $query = "SELECT * FROM repairs WHERE repair_ID=$record";
    $result = $conn->query($query);
    
    while($row = $result->fetch_assoc()) {
        $repair_ID = decode_input($row["repair_ID"]);
        $customer_name = decode_input($row["customer_name"]);
        $customer_phone = decode_input($row["customer_phone"]);
        $customer_email = decode_input($row["customer_email"]);
        $product_name = decode_input($row["product_name"]);
        $product_fault = decode_input($row["product_fault"]);
        $product_accessories = decode_input($row["product_accessories"]);
        $updates = decode_input($row["updates"]);
        $date = date('d M Y', strtotime($row["repair_date"]));
        $notes = decode_input($row["product_misc"]);
        $tested = decode_input($row["tested"]);
        $salesperson = decode_input($row["salesperson"]);
        $status = decode_input($row["status"]);
        
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

<form action="index.php?method=update&docket=<?php echo $repair_ID; ?>" method="post">
<div class="panel">
	<div class="row titleRow">
		<div class="col-md-5">Repair ID</div>
		<div class="col-md-5">The Listening Post Wellington</div>
	</div>
	<div class="row inputRow">
		<div class="col-md-5"><?php echo "<input type='hidden' name='repair_ID' value='".$repair_ID."'>".$repair_ID; ?></div>
		<div class="col-md-5">150 Willis Street<br>0508 TO HIFI  |  0508 86 44 34</div>
	</div>
	<div class="row titleRow">
		<div class="col-md-5">Customer Name</div>
		<div class="col-md-5">Date</div>
	</div>
	<div class="row inputRow">
		<div class="col-md-5"><?php echo "<input type='text' class='form-control' name='name' value='".$customer_name."'><br><input type='text' class='form-control' name='phone' value='".$customer_phone."'></br><input type='text' class='form-control' name='email' value='".$customer_email;?>'></div>
		<div class='col-md-5'><?php echo $date; ?></div>
	</div>
	<div class="row titleRow">
		<div class="col-md-10">Product Details:</div>
	</div>
	<div class="row inputRow">
		<div class="col-md-10"><?php echo "<input type='text' class='form-control' name='product' value='".$product_name."'>"; ?></div>
	</div>
	<div class="row titleRow">
		<div class="col-md-10">Product Fault:</div>
	</div>
	<div class="row inputRow">
		<div class="col-md-10"><?php echo "<input type='text' class='form-control' name='fault' name='fault' value='".$product_fault."'>"; ?></div>
	</div>
	<div class="row titleRow">
		<div class="col-md-10">Included Accessories:</div>
	</div>
	<div class="row inputRow">
		<div class="col-md-10"><?php echo "<input type='text' class='form-control' name='accessories' value='".$product_accessories."'>"; ?></div>
	</div>
	<div class="row titleRow">
		<div class="col-md-10">Notes:</div>
	</div>
	<div class="row inputRow">
		<div class="col-md-10"><?php echo "<input type='text' class='form-control' name='notes' value='".$notes."'>"; ?></div>
	</div>
	<div class="row titleRow">
		<div class="col-md-10">Updates:</div>
	</div>
	<div class="row inputRow">
		<div class="col-md-10"><?php echo "<textarea rows='15' class='form-control' name='updates'>".$updates."</textarea>"; ?></div>
	</div>
	<div class="row titleRow">
		<div class="col-md-10">Tested in Store?</div>
	</div>
	<div class="row inputRow">
		<div class="col-md-10"><?php echo "<input type='text' class='form-control' name='tested' value='".$tested."'>"; ?></div>
	</div>
	<div class="row titleRow">
		<div class="col-md-10">You have been dealing with:</div>
	</div>
	<div class="row inputRow">
		<div class="col-md-10"><?php echo "<input type='text' class='form-control' name='salesperson' value='".$salesperson."'>"; ?></div>
	</div>
	<div class="row inputRow">
		<div class="col-md-5"><label class="checkbox" for="status"><input type='checkbox' name='status' value='complete'<?php echo " ".$checked; ?> >This repair is Complete</label></div>
	</div>
	<div class="row inputRow">
		<div class="col-md-5"><input type="submit" class='btn btn-default' value="Submit"></div>
		<div class="col-md-5"><a href="index.php?method=docket&docket=<?php echo $repair_ID ?>">Cancel</a></div>
	</div>
</form>
</div>
