<?php
require_once "db.php";

function addParkingRecord($vehicle_id, $space_id, $entry_time, $status) {
    global $conn;

    $sql = "INSERT INTO parking_records (vehicle_id, space_id, entry_time, status, created_at) VALUES ('$vehicle_id', '$space_id', '$entry_time', '$status', NOW())";

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

function updateParkingRecord($record_id, $vehicle_id, $space_id, $entry_time, $exit_time, $status) {
    global $conn;

    $sql = "UPDATE parking_records SET vehicle_id='$vehicle_id', space_id='$space_id', entry_time='$entry_time', exit_time='$exit_time', status='$status' WHERE record_id=$record_id";

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

function deleteParkingRecord($record_id) {
    global $conn;

    $sql = "DELETE FROM parking_records WHERE record_id=$record_id";

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

function getAllParkingRecords() {
    global $conn;

    $sql = "SELECT * FROM parking_records";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $parkingRecords = array();

        while ($row = $result->fetch_assoc()) {
            $parkingRecords[] = $row;
        }

        return $parkingRecords;
    } else {
        return array();
    }
}
?>
