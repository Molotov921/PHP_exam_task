<?php
require_once "db.php";

function addParkingSpace($lot_id, $floor, $number, $status) {
    global $conn;

    $sql = "INSERT INTO parking_spaces (lot_id, floor, number, status, created_at) VALUES ('$lot_id', '$floor', '$number', '$status', NOW())";

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

function updateParkingSpace($space_id, $lot_id, $floor, $number, $status) {
    global $conn;

    $sql = "UPDATE parking_spaces SET lot_id='$lot_id', floor='$floor', number='$number', status='$status' WHERE space_id=$space_id";

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

function deleteParkingSpace($space_id) {
    global $conn;

    $sql = "DELETE FROM parking_spaces WHERE space_id=$space_id";

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
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
        return array(); 
    }
}
?>
