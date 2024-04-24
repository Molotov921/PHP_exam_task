<?php
require_once "config.php";

function executeQuery($sql) {
    global $conn;
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}
?>
