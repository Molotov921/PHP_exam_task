<?php
require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["vehicle_id"]) && isset($_POST["space_id"]) && isset($_POST["entry_time"]) && isset($_POST["status"])) {
        $vehicle_id = $_POST["vehicle_id"];
        $space_id = $_POST["space_id"];
        $entry_time = $_POST["entry_time"];
        $status = $_POST["status"];
        
        addParkingRecord($vehicle_id, $space_id, $entry_time, $status);
    } else {
        echo "Incomplete data provided";
    }
}

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
