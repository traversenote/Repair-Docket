<?php
// Credentials for connecting to the Database
$servername = "localhost";
$username = "repairsApp";
$password = "wellingtonRepairs";
$dbname = "repairs";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>