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
            <tr><td>Customer Name:</td><td><input type='text' name='name' rows='50' required></tr></td>
            <tr><td>Phone Number: </td><td><input type='text' name='phone' required></tr></td>
            <tr><td>Email:</td><td><input type='text' name='email'></tr></td>
        </table>
    </fieldset>
    <fieldset>
        <legend>Product Info</legend>
        <table  class='newRepairTable'>
            <tr><td>Product Name:</td><td><input type='text' name='product' required></tr></td>
            <tr><td>Fault:</td><td><textarea name='fault' rows='10' cols='30' name='fault' required></textarea></tr></td>
            <tr><td>Included Accessories:</td><td><input type='text' name='accessories'></tr></td>
            <tr><td>Notes:</td><td><input type='text' name='notes'></tr></td>
            <tr><td>Tested in store?</td><td><input type='text' name='tested'></tr></td>
            <tr><td>Salesperson:</td><td><input type='text' name='salesperson' required></tr></td>
        </table>
    </fieldset>
        <input type='submit' value='Submit'>
</form>
</div>
</body>
</html>