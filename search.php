<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN""http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>

<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="repairRegister.css" />
<title>Search Results</title>
</head>
<?php
include 'dbCredentials.php';
include 'functions.php';

$searchQuery = test_input($_POST['searchQuery']);
$displayFilter = test_input($_POST['display']);
$displayOrder = test_input($_POST['order']);

?>
<div id='topNav'><a href='index.php'>Register Home</a> | <a href='newRepair.php'>New Repair</a></div>
<div id="titleBar">The Listening Post Repair Register : Search Results</div>

<?php

$displayMethod = 'search';
include 'register.php';

?>


</html>