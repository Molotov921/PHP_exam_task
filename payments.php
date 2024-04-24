<?php
require_once "db.php";

function createPayment($record_id, $amount, $payment_time) {
    global $conn;
    $sql = "INSERT INTO payments (record_id, amount, payment_time, created_at) VALUES ($record_id, $amount, '$payment_time', NOW())";
    return executeQuery($sql);
}

function updatePayment($payment_id, $amount, $payment_time) {
    global $conn;
    $sql = "UPDATE payments SET amount=$amount, payment_time='$payment_time' WHERE payment_id=$payment_id";
    return executeQuery($sql);
}

function deletePayment($payment_id) {
    global $conn;
    $sql = "DELETE FROM payments WHERE payment_id=$payment_id";
    return executeQuery($sql);
}

function getAllPayments() {
    global $conn;
    $sql = "SELECT * FROM payments";
    $result = $conn->query($sql);
    $payments = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $payments[] = $row;
        }
    }
    return $payments;
}

function getPaymentById($payment_id) {
    global $conn;
    $sql = "SELECT * FROM payments WHERE payment_id=$payment_id";
    $result = $conn->query($sql);
    return $result->fetch_assoc();
}
?>
