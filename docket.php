<?php
if($status != 'complete'){
    $displayRepairState = "Active";
}else{
    $displayRepairState = "Complete";
}
?>
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
<tr id='docketDetails'><td><?php echo $product; ?></td></tr>
<tr><td></td></tr>
<tr class="titleRow"><td>Product Fault:</td></tr>
<tr id='docketFault'><td><?php echo $fault; ?></td></tr>
<tr><td></td></tr>
<tr class="titleRow"><td>Included Accessories:</td></tr>
<tr id='docketAccessories'><td><?php echo $accessories; ?></td></tr>
<tr><td></td></tr>
<tr class="titleRow"><td>Notes:</td></tr>
<tr><td><?php echo $notes; ?></td></tr>
<tr id='docketNotes'><td></td></tr>
<tr class="titleRow"><td>Updates:</td></tr>
<tr><td><?php echo $updates; ?></td></tr>
<tr id='docketUpdates'><td></td></tr>
<tr class="titleRow"><td>You have been dealing with:</td></tr>
<tr><td>
<tr><td><?php echo $salesperson; ?></td></tr>
<tr><td>
<tr><td><?php echo "Status: ".$displayRepairState; ?></br></td></tr>

</td></tr>
</table>
