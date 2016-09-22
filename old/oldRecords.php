<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN""http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="../repairRegister.css" />
<title>New Repair Docket</title>
</head>
<body>
<div id="topNav"><a href="index.php">Register Home</a> | <a href="newRepair.php">New Repair</a></div>
<div id="titleBar">Inserting old records</div>
<div id="mainContent">



<?php
include '../dbCredentials.php';
include '../functions.php';

$row = 0;
if (($handle = fopen("OldRepairsComplete.csv", "r")) !== FALSE) {

    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $cells = 0;
        while( $cells < count($data)){
            $record[$row][] = $data[$cells];            
            $cells++;
        }
        $row++;
    }
    fclose($handle);
}



$repairRecord=0;
while ($repairRecord <= count($record)){


    $repairID = test_input($record[$repairRecord][0]);
    $name = test_input($record[$repairRecord][1]);
    $phone = test_input($record[$repairRecord][2]);
    $email = test_input($record[$repairRecord][3]);
    $date = test_input($record[$repairRecord][4]);
    $product = test_input($record[$repairRecord][5]);
    $fault = test_input($record[$repairRecord][6]);
    $accessories = test_input($record[$repairRecord][7]);
    $updates = test_input($record[$repairRecord][8]);
    $notes = test_input($record[$repairRecord][9]);
    $salesperson = test_input($record[$repairRecord][10]);
    $tested = test_input($record[$repairRecord][11]);
    $completeDate = test_input($record[$repairRecord][12]);
    
    $dateOld = $date;
    $date = explode(' ', $date);
    $date = explode('/', $date[0]);
    $dateClean = $date[2]."-".$date[0]."-".$date[1];

    if(isset($completeDate)){
    $completeDate = explode('/', $completeDate);
    $completeDateTidy = $completeDate[2]."-".$completeDate[1]."-".$completeDate[0];
    }

    /*
  
    echo "Repair ID = ".$repairID."<br>";
    echo "Name = ".$name."<br>";
    echo "Phone = ".$phone."<br>";
    echo "Email = ".$email."<br>";
    echo "Date = ".$Date."<br>";
    echo "Product = ".$product."<br>";
    echo "Fault = ".$fault."<br>";
    echo "accessories = ".$accessories."<br>";
    echo "notes = ".$notes."<br>";
    echo "Salesperson = ".$salesperson."<br>";
    echo "Tested? = ".$tested."<br>";


*/
    
$query = "insert into repairs (repair_ID, customer_name, customer_phone, customer_email, repair_date, product_name, product_fault, product_accessories, product_misc, salesperson, updates, tested, status, completeDate) values ('$repairID', '$name', '$phone', '$email', '$dateClean', '$product', '$fault', '$accessories', '$notes', '$salesperson', '$updates', '$tested', 'complete', '$completeDateTidy')";
    
if ($conn->query($query) == TRUE) {
echo "Repair ".$repairID." created successfully.</br>";

}else{

echo "Problem here boss:". $sql. "<br>".$conn->error;

}
    
    $repairRecord++;
}




/*





if($status != 'complete'){
    $repairState = 'active';
}else{
    $repairState = 'complete';
}
$updates = test_input($_POST["updates"]);
$query = "update repairs set customer_name='$name', customer_phone='$phone', customer_email='$email', product_name='$product', product_fault='$fault', product_accessories='$accessories', product_misc='$notes', updates='$updates', salesperson='$salesperson', status='$repairState', tested='$tested' where repair_ID='$repair_ID'";

if ($conn->query($query) == TRUE) {
echo "Created successfully.";

}
require 'docket.php';
?>
</div>
*/

?>

</body>
</html> 
<!---
create table repairs (repair_ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
customer_name VARCHAR(100),
customer_phone VARCHAR(15),
customer_email VARCHAR(100),
repair_date DATE,
product_name VARCHAR(100),
product_fault VARCHAR(500),
product_accessories VARCHAR(100),
product_misc VARCHAR(100),
salesperson VARCHAR(100),
updates VARCHAR(500), 
status VARCHAR(15),
tested VARCHAR(10));
completeDate DATE;
--->