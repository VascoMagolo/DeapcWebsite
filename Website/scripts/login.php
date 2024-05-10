<?php
session_start();
include("liga_db.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $sql = "SELECT firstname,type_id,imglink FROM users WHERE username = '$username' AND pass = '$password'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $_SESSION["username"] = $username;
        while ($row = $result->fetch_assoc()) {
            $_SESSION["type_id"] = $row["type_id"];
            $_SESSION["firstname"] = $row["firstname"];
            $_SESSION["imglink"] = $row["imglink"];
        }
            echo $_SESSION["imglink"];
        header("Location: ../pages/index.php");
    } else {
        echo "Invalid username or password";
    }
}
?>