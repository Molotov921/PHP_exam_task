<?php
require_once "config.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $lot_id = $_POST['lot_id'];
    $name = $_POST['name'];
    $floor = $_POST['floor'];
    $number = $_POST['number'];
    $status = $_POST['status'];

    if (addParkingLot($lot_id, $floor, $number, $status)) {
        echo json_encode(array("message" => "Parking space added successfully"));
    } else {
        echo json_encode(array("message" => "Failed to add parking space"));
    }
}

function addParkingLot($lot_id, $name, $capacity, $location, $status) {
    global $conn;

    $sql = "INSERT INTO parking_lots (name, capacity, location, status, created_at) VALUES ('$lot_id', '$name', '$capacity', '$location', '$status', NOW())";

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
