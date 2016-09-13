
<table id="docket">
<tr><td>
<table id="repairHeader" width="100%">
<tr class="titleRow"><td>Repair ID</td><td>The Listening Post Wellington<br>150 Willis Street<br></td></tr>
<tr><td><?php echo $repair_ID; ?></td><td> 0508 TO HIFI  |  0508 86 44 34</td></tr>
<tr><td></td><td></td></tr>
<tr class="titleRow"><td>Customer Name</td><td>Date</td></tr>
<tr><td><?php echo $name."<br>".$phone."</br>".$email; ?></td><td><?php $date; ?></td></tr>
<tr><td></td><td></td></tr>
</td></tr></table>

<tr class="titleRow"><td>Product Details:</td></tr>
<tr><td><?php echo $product; ?></td></tr>
<tr><td></td></tr>
<tr class="titleRow"><td>Product Fault:</td></tr>
<tr><td><?php echo $fault; ?></td></tr>
<tr><td></td></tr>
<tr class="titleRow"><td>Included Accessories:</td></tr>
<tr><td><?php echo $accessories; ?></td></tr>
<tr><td></td></tr>
<tr class="titleRow"><td>Notes:</td></tr>
<tr><td><?php echo $notes; ?></td></tr>
<tr><td></td></tr>
<tr class="titleRow"><td>You have been dealing with:</td></tr>
<tr><td>

<?php

switch ($salesperson){
    case "JS":
        $salesperson = "Jason Spears";
        break;
    case "RW":
        $salesperson = "Richard White";
        break;
    case "WW":
        $salesperson = "William Woodhall";
        break;
    case "MS":
        $salesperson = "Manu Scott";
        break;
    default:
        $salesperson = "The Listening Post Staff";
        }
echo $salesperson;
?>

</td></tr>
</table>
