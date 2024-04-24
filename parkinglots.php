<?php
require_once "db.php";

function addParkingLot($name, $capacity, $location, $status) {
    global $conn;

    $sql = "INSERT INTO parking_lots (name, capacity, location, status, created_at) VALUES ('$name', '$capacity', '$location', '$status', NOW())";

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

function updateParkingLot($lot_id, $name, $capacity, $location, $status) {
    global $conn;

    $sql = "UPDATE parking_lots SET name='$name', capacity='$capacity', location='$location', status='$status' WHERE lot_id=$lot_id";

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

function deleteParkingLot($lot_id) {
    global $conn;

    $sql = "DELETE FROM parking_lots WHERE lot_id=$lot_id";

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

function getAllParkingLots() {
    global $conn;

    $sql = "SELECT * FROM parking_lots";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $parkingLots = array();

        while ($row = $result->fetch_assoc()) {
            $parkingLots[] = $row;
        }
        return $parkingLots;
    } else {
        return array(); 
    }
}
?>
