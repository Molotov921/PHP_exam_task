<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "multi-level parking management system"; 

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connection successfull";
?>
