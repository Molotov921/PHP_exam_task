<?php
require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["lot_id"]) && isset($_POST["floor"]) && isset($_POST["number"]) && isset($_POST["status"])) {
        $lot_id = $_POST["lot_id"];
        $floor = $_POST["floor"];
        $number = $_POST["number"];
        $status = $_POST["status"];
        
        addParkingSpace($lot_id, $floor, $number, $status);
    } else {
        echo "Incomplete data provided";
    }
}

function addParkingSpace($lot_id, $floor, $number, $status) {
    global $conn;

    $sql = "INSERT INTO parking_spaces (lot_id, floor, number, status, created_at) VALUES ('$lot_id', '$floor', '$number', '$status', NOW())";

    if ($conn->query($sql) === TRUE) {
        echo "Data insertion successful";
        return true;
    } else {
        echo "Data insertion failed: " . $conn->error;
        return false;
    }
}

function updateParkingSpace($space_id, $lot_id, $floor, $number, $status) {
    global $conn;

    $sql = "UPDATE parking_spaces SET lot_id='$lot_id', floor='$floor', number='$number', status='$status' WHERE space_id=$space_id";

    if ($conn->query($sql) === TRUE) {
        echo "Data update successful";
        return true;
    } else {
        echo "Data update failed: " . $conn->error;
        return false;
    }
}

function deleteParkingSpace($space_id) {
    global $conn;

    $sql = "DELETE FROM parking_spaces WHERE space_id=$space_id";

    if ($conn->query($sql) === TRUE) {
        echo "Data deletion successful";
        return true;
    } else {
        echo "Data deletion failed: " . $conn->error;
        return false;
    }
}

function getAllParkingSpaces() {
    global $conn;

    $sql = "SELECT * FROM parking_spaces";

    $result = $conn->query($sql);
   
    if ($result->num_rows > 0) {
        $parkingSpaces = array();

        while ($row = $result->fetch_assoc()) {
            $parkingSpaces[] = $row;
        }
        return $parkingSpaces;
    } else {
        echo "No parking spaces found";
        return array(); 
    }
}
?>
