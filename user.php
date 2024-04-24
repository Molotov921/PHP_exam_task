<?php
require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["password"])) {
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        
        createUser($username, $email, $password);
    } else {
        echo "Incomplete data provided";
    }
}

function createUser($username, $email, $password) {
    global $conn;
    $sql = "INSERT INTO users (username, email, password, created_at) VALUES ('$username', '$email', '$password', NOW())";
    return executeQuery($sql);
}

function updateUser($user_id, $username, $email, $password) {
    global $conn;
    $sql = "UPDATE users SET username='$username', email='$email', password='$password' WHERE user_id=$user_id";
    return executeQuery($sql);
}

function deleteUser($user_id) {
    global $conn;
    $sql = "DELETE FROM users WHERE user_id=$user_id";
    return executeQuery($sql);
}

function getAllUsers() {
    global $conn;
    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);
    $users = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $users[] = $row;
        }
    }
    return $users;
}

function getUserById($user_id) {
    global $conn;
    $sql = "SELECT * FROM users WHERE user_id=$user_id";
    $result = $conn->query($sql);
    return $result->fetch_assoc();
}
?>
