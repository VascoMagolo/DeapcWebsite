<?php
session_start();
include("liga_db.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $sql = "SELECT * FROM users WHERE username = '$username' AND pass = '$password'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $_SESSION["username"] = $username;
        header("Location: ../pages/index.php");
    } else {
        echo "Invalid username or password";
    }
}
?>