<?php
include("liga_db.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $age = $_POST["age"];
    $address = $_POST["address"];
    $email = $_POST["email"];
    $sql = "INSERT INTO users (username, pass, firstname, lastname, age, address, email, type_id) VALUES ('$username', '$password', '$firstname', '$lastname', '$age', '$address', '$email', 3)";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        header("Location: ../pages/login.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>