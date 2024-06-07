<?php
include ("../scripts/liga_db.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = intval($_POST['id']);
    $firstname = htmlspecialchars($_POST['firstname']);
    $lastname = htmlspecialchars($_POST['lastname']);
    $age = intval($_POST['age']);
    $address = htmlspecialchars($_POST['address']);
    $email = htmlspecialchars($_POST['email']);
    $username = htmlspecialchars($_POST['username']);
    $password = !empty($_POST['pass']) ? password_hash($_POST['pass'], PASSWORD_BCRYPT) : null;
    $type_id = intval($_POST['type_id']);

    $sql = "UPDATE users SET firstname = ?, lastname = ?, age = ?, address = ?, email = ?, username = ?, type_id = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssissssi", $firstname, $lastname, $age, $address, $email, $username, $type_id, $userId);

    if ($stmt->execute()) {
        echo "Users updated successfully.";
    } else {
        echo "Error updating the users: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
header('Location: ../pages/users.php');
?>
