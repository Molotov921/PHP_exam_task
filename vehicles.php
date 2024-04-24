<?php
require_once "db.php";

function addVehicle($plate_number, $model, $color, $type) {
    global $conn;

    $sql = "INSERT INTO vehicles (plate_number, model, color, type, created_at) VALUES ('$plate_number', '$model', '$color', '$type', NOW())";

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

function updateVehicle($vehicle_id, $plate_number, $model, $color, $type) {
    global $conn;

    $sql = "UPDATE vehicles SET plate_number='$plate_number', model='$model', color='$color', type='$type' WHERE vehicle_id=$vehicle_id";

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

function deleteVehicle($vehicle_id) {
    global $conn;

    $sql = "DELETE FROM vehicles WHERE vehicle_id=$vehicle_id";

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

function getAllVehicles() {
    global $conn;

    $sql = "SELECT * FROM vehicles";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $vehicles = array();

        while ($row = $result->fetch_assoc()) {
            $vehicles[] = $row;
        }
        return $vehicles;
    } else {
        return array();
    }
}
?>
