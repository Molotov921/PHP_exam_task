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

function executeQuery($sql) {
    global $conn;
    $result = $conn->query($sql);
    if ($result === TRUE) {
        return array("success" => true, "message" => "Query executed successfully");
    } else {
        return array("success" => false, "message" => "Error executing query: " . $conn->error);
    }
}

?>
