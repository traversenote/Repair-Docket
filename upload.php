<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN""http://www.w3.org/TR/html4/loose.dtd">
<html lang='en'>
<head>
<meta http-equiv='content-type' content='text/html; charset=utf-8'>
<link rel='stylesheet' href='repairRegister.css' />
<title>New Repair Docket</title>
</head>
<body>
<div id='topNav'><a href='index.php'>Register Home</a> | <a href='newRepair.php'>New Repair</a></div>
<div id='titleBar'>The Listening Post Repair Register</div>
<div id='mainContent'>
<div id='displayControl'>
<!--- Displays the Choosers for display priority --->
        <div id='search'>
            <form action='search.php' method='post'>
                <input type='text' name='searchQuery'><input type='submit' value='Search'>
            </form>
        </div>
    </div>
<?php
include 'dbCredentials.php';
include 'functions.php';
  
$name = test_input($_POST["name"]);
$phone = test_input($_POST["phone"]);
$email = test_input($_POST["email"]);
$product = test_input($_POST["product"]);
$fault = test_input($_POST["fault"]);
$accessories = test_input($_POST["accessories"]);
$notes = test_input($_POST["notes"]);
$tested = test_input($_POST["tested"]);
$salesperson = test_input($_POST["salesperson"]);
$date = date("Y-m-d");
$updates = $date;

$query = "insert into repairs (customer_name, customer_phone, customer_email, repair_date, product_name, product_fault, product_accessories, product_misc, salesperson, tested, status, lastUpdate) values ('$name', '$phone', '$email', '$date', '$product', '$fault', '$accessories', '$notes', '$salesperson', '$tested', 'active', '$date')";

$success='0';

if ($conn->query($query) == TRUE) {
	$success='1';
} else {
	echo "Problem here boss:". $sql. "<br>". $conn->error;
}

$query = "SELECT * FROM repairs ORDER BY repair_ID DESC LIMIT 1";
$result = $conn->query($query);
while ($row = $result->fetch_assoc()) {
	$repair_ID = $row["repair_ID"];
}
if($success == '1'){
	require 'docket.php';
}else{	
	echo "There was an issue";
}
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