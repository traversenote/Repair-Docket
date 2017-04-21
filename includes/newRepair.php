<div id='titleBar'>New Repair Docket</div>
<div class="container" id='mainContent'>
		<form action='upload.php' method='post'>
			<div class="panel">
		        <legend>Customer Information</legend>
				<div class="form-group">
					<label for="name">Customer Name:</label>
					<input class="form-control" type='text' name='name' size='50' required>
					<label for="phone">Phone Number:</label>
					<input class="form-control" type='text' name='phone' required>
					<label for="email">Email:</label>
					<input class="form-control" type='text' name='email'>
				</div>
				<div class="form-group">
	       		<legend>Product Info</legend>
					<label for="product">Product Name:</label>
					<input class="form-control" type='text' name='product' required>
					<label for="fault">Fault:</label>
					<textarea class="form-control" name='fault' rows='10' cols='30' name='fault' required></textarea>
		            <label for="accessories">Included Accessories:</label>
					<input  class="form-control" type='text' name='accessories'>
		            <label for="notes">Notes:</label>
					<input class="form-control" type='text' name='notes'>
		            <label for="tested">Tested in store?</label>
		            <input class="form-control" type='text' name='tested'>
		            <label for="salesperson">Salesperson:</label>
					<input  class="form-control" type='text' name='salesperson' required>
				</div>
	        <input  class="btn btn-default" type='submit' value='Submit'>
	</form>
	</div>
</div>
