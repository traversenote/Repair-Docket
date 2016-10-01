<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN""http://www.w3.org/TR/html4/loose.dtd">
<html lang='en'>
<head>
<meta http-equiv='content-type' content='text/html; charset=utf-8'>
<link rel='stylesheet' href='repairRegister.css' />
<title>Repair Register</title>
<?php
    include 'dbCredentials.php';
    include 'functions.php';
?>
</head>
<body>
<div id='topNav'><a href='index.php'>Register Home</a> | <a href='newRepair.php'>New Repair</a></div>
<div id='titleBar'>The Listening Post Repair Register</div>
	<?php 
	$displayMethod = 'display';
	include 'register.php';
	?>

</body>
</html>
