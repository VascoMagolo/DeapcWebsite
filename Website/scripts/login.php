<?php
session_start();
include("liga_db.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $sql = "SELECT firstname,type_id FROM users WHERE username = '$username' AND pass = '$password'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $_SESSION["username"] = $username;
        $_SESSION["name"] = $result->fetch_assoc()["firstname"];
        $_SESSION["type_id"] = $result->fetch_assoc()["type_id"];
        header("Location: ../pages/index.php");
    } else {
        echo "Invalid username or password";
    }
}
?>