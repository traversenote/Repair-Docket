<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN""http://www.w3.org/TR/html4/loose.dtd">
<html lang='en'>
<head>
<meta http-equiv='content-type' content='text/html; charset=utf-8'>
<link rel='stylesheet' href='repairRegister.css' />
<title>Create a New Repair Docket</title>
</head>
<body>
<div id='topNav'><a href='index.php'>Register Home</a> | <a href='newRepair.php'>New Repair</a></div>
<div id='titleBar'>Create a new repair docket</div>
<div id='mainContent'>

<form action='upload.php' method='post'>
    <fieldset>
        <legend>Customer Information</legend>
        <table class='newRepairTable'>
            <tr><td>Customer Name:</td><td><input type='text' name='name' size='50' required></td></tr>
            <tr><td>Phone Number: </td><td><input type='text' name='phone' required></td></tr>
            <tr><td>Email:</td><td><input type='text' name='email'></td></tr>
        </table>
    </fieldset>
    <fieldset>
        <legend>Product Info</legend>
        <table  class='newRepairTable'>
            <tr><td>Product Name:</td><td><input type='text' name='product' required></td></tr>
            <tr><td>Fault:</td><td><textarea name='fault' rows='10' cols='30' name='fault' required></textarea></td></tr>
            <tr><td>Included Accessories:</td><td><input type='text' name='accessories'></td></tr>
            <tr><td>Notes:</td><td><input type='text' name='notes'></td></tr>
            <tr><td>Tested in store?</td><td><input type='text' name='tested'></td></tr>
            <tr><td>Salesperson:</td><td><input type='text' name='salesperson' required></td></tr>
        </table>
    </fieldset>
        <input type='submit' value='Submit'>
</form>
</div>
</body>
</html>