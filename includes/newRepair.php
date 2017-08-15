<div id='titleBar'>New Repair Docket</div>
<div class="container" id='mainContent'>
		<form action='includes/upload.php' method='post'>
			<div class="panel">
			<div class='row'>
				<div class='col-md-8 col-md-offset-2'>
		        <legend>Customer Information</legend>
				<div class="form-group">
					<div class='row titleRow'>
						<div class="col-md-8">Customer Name</div>
					</div>
					<div class="row inputRow">
						<div class="col-md-12"><input class="form-control" type='text' name='name' size='50' required></div>
					</div>
					<div class="row titleRow">
						<div class="col-md-6"><label for="phone">Phone Number:</label></div>
						<div class="col-md-6"><label for="email">Email:</label></div>
					</div>
					<div class="row inputRow">
						<div class="col-md-6"><input class="form-control" type='text' name='phone' required></div>
						<div class="col-md-6"><input class="form-control" type='text' name='email'></div>
					</div>

				</div>
				<div class="form-group">
	       		<legend>Product Info</legend>
					<div class='row titleRow'>
						<div class="col-md-12"><label for="product">Product Name:</label></div>
					</div>
					<div class='row inputRow'>
						<div class="col-md-12"><input class="form-control" type='text' name='product' required></div>
					</div>
					<div class='row titleRow'>
						<div class="col-md-12"><label for="product">Date of Sale:</label></div>
					</div>
					<div class='row inputRow'>
						<div class="col-md-12"><input type="text" name='dos' id="datepicker"></div>
					</div>
					<div class='row titleRow'>
						<div class="col-md-12"><label for="fault">Fault:</label></div>
					</div>
					<div class='row inputRow'>
						<div class="col-md-12"><textarea class="form-control" name='fault' rows='10' cols='30' name='fault' required></textarea></div>
					</div>
		            <div class='row titleRow'>
						<div class="col-md-12"><label for="accessories">Included Accessories:</label></div>
					</div>
					<div class='row inputRow'>
						<div class="col-md-12"><input  class="form-control" type='text' name='accessories'></div>
					</div>

		            <div class='row titleRow'>
		            	<div class="col-md-6"><label for="salesperson">Salesperson:</label></div>
						<div class="col-md-6"><label for="tested">Tested in store?</label></div>
					</div>
		            <div class='row inputRow'>
		            	<div class="col-md-6"><input  class="form-control" type='text' name='salesperson' required></div>
						<div class="col-md-6"><input class="form-control" type='text' name='tested'></div>
					</div>
				</div>
				
	       </div></div>
	</div>
	<div id="bottomNav" class="panel" >
 		<input  class="btn btn-default" type='submit' value='Submit'>
	</form>
	</div>
</div>
