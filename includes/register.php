<div class="panel" id='titleBar'>The Listening Post <?php echo $location; ?> Repair Register</div>
<div class="container" id='mainContent'>
<!---This section handles display control information. Display order, weather completed orders are displayed, etc.--->

        <?php
        $page = test_input($_GET['page']);
        if($page <= 0){ $page=1; }
        
        $displayNum = test_input($_GET['displayNum']);
        $displayFilter = test_input($_GET['display']);
        $displayOrder = test_input($_GET['order']);
        $searchQuery = test_input($_GET['searchQuery']);
        if(isset($_POST['searchQuery'])){
        	$searchQuery=test_input($_POST['searchQuery']);
        }
        
        if(isset($_GET['display'])){
            $displayNum = test_input($_GET['displayNum']);
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
                    $statusFilter = "status like '%'";
                    $activeDisplay = '';
                    $allDisplay = 'selected';
                    $completeDisplay = '';
                    break;
                case 'complete':
                    $statusFilter = "status='complete'";
                    $activeDisplay = '';
                    $allDisplay = '';
                    $completeDisplay = 'selected';
                    break;
                default:
                    $statusFilter = "status!='complete'";
                    $activeDisplay = 'selected';
                    $allDisplay = '';
                    $completeDisplay = '';
                    break;
            }
           switch($displayNum) {
                case '100':
                    $dNum50 = '';
                    $dNum100= 'selected';
                    $dnum200 = '';
                    break;
                case '200':
                    $dNum50 = '';
                    $dNum100= '';
                    $dnum200 = 'selected';
                    break;
                default:
                    $displayNum = '50';
                    $dNum50 = 'selected';
                    $dNum100 = '';
                    $dnum200 = '';
                    break;
            }               
        }else{
            $statusFilter = "status!='complete'";
            $activeDisplay = 'selected';
            $allDisplay = '';
            $completeDisplay = '';
            $displayOrder = 'ORDER BY repair_ID DESC';
            $normalOrder = '';
            $invertOrder = 'selected';
            $displayNum = '50';
            $dNum50 = 'selected';
            $dNum100 = '';
            $dnum200 = '';
            $page = '1';
        }
        ?>
<!--- Displays the Choosers for display priority --->
    <div class="row" id='displayControl'>
        <form class="form-group" id='displayFilter' action='<?php echo basename($_SERVER['PHP_SELF']); ?>' method='get' onchange='change()'>
	        <input type="hidden" name=page value='<?php echo $page; ?>'>
	        <input type='hidden' name='searchQuery' value='<?php echo $searchQuery; ?>'>
			<div class="col-md-2">
		        <select class="form-control" name='display'>
		            <option value='test_input($_GET['searchQuery']);active' <?php echo $activeDisplay; ?> >Active Only</option>
		            <option value='all' <?php echo $allDisplay; ?> >All Repairs</option>
		            <option value='complete' <?php echo $completeDisplay; ?> >Complete Repairs</option>
		        </select>
		    </div>
		    <div class="col-md-2">
		        <select class="form-control" name='order'>
		            <option value='normal' <?php echo $normalOrder; ?> >OldestFirst</option>
		            <option value='invert' <?php echo $invertOrder; ?> >Newest First</option>
		        </select>
		    </div>
		    <div class="col-md-2">
		        Page <?php echo $page ?>
		    </div>
		    <div class="col-md-1">
		        <button class="btn btn-default" type='submit' name='page' value='<?php echo $page - 1; ?>'><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span></button>
		    </div>
		    <div class="col-md-2">
		        <select class="form-control" name='displayNum'>
		            <option value='50' <?php echo $dNum50; ?> >50</option>
		            <option value='100' <?php echo $dNum100; ?> >100</option>
		            <option value='200' <?php echo $dNum200; ?> >200</option>
		        </select>
			</div>
		    <div class="col-md-2">
	        	<button class="btn btn-default" type='submit' name='page' value='<?php echo $page + 1; ?>'><span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span></button>
			</div>
	    </form>
    </div>
    <div class="panel" id='repairRegister'>
    	<div class="row titleRow">
        	<div class="col-md-1">#</div><div class="col-md-1">RepairID</div><div class="col-md-2">Customer Name</div><div class="col-md-2">Item</div><div class="col-md-2">Date</div><div class="col-md-1">Updates</div><div class="col-md-2">Status</div>
        </div>
        <?php
        $date = date('Y-m-d', strtotime($attentionTime.' weeks'));
        $pageIndex = $page * $displayNum;
        $queryOffset = $pageIndex - $displayNum;
        $rowCount = $queryOffset + 1;
        if($displayMethod == 'display'){
        	$query = "SELECT * FROM repairs WHERE $statusFilter $displayOrder limit $queryOffset, $displayNum";
        } elseif ($displayMethod =='search') {
       		$query = "SELECT * from repairs WHERE (repair_id LIKE '%$searchQuery%' or customer_name LIKE '%$searchQuery%' or product_name LIKE '%$searchQuery%' or customer_phone LIKE '%$searchQuery%') AND $statusFilter $displayOrder limit $queryOffset, $displayNum";
        }
        	if ($conn->query($query) == TRUE) {
        	}else{
        		#echo "Problem here boss:". $sql. "<br>". $conn->error;
        	}
        $result = $conn->query($query);        
        while($row = $result->fetch_assoc()) {
          if ($row["status"] != 'complete'){
                $active = "Active";
            }else{
                $active = "Complete";
            }
            if (isset($row['lastUpdate']) && $active == 'Active' && $row['lastUpdate'] <= $date ){
            	$attFlag = "attention";            
            }else{
            	$attFlag = "";
            }
            echo "<div class='row regRows ".$attFlag."'>\n<div class='col-md-1 repairCell'><div class='col-md-1'>".$rowCount."</div><div class='col-md-1'><a href=print.php?docket=".$row["repair_ID"]." target='_blank'><img src='images/pdf.png' width='25' alt='Print to PDF'></a></div></div><a href=/repairRegister/index.php?method=docket&docket=".$row["repair_ID"]."><div class='col-md-1 repairCell'>".$row["repair_ID"]."</div><div class='col-md-2 repairCell'>".$row["customer_name"]."</div><div class='col-md-2 repairCell'>".$row["product_name"]."</div><div class='col-md-2 repairCell'>".date('d M Y', strtotime($row["repair_date"]))."</div><div class='col-md-1 repairCell'>".$row["updates"]."</div><div class='col-md-2 repairCell'>".$active."</div>\n</a></div>\n";  
            
            $rowCount++;
        }
        ?>
    </div>
    </div>