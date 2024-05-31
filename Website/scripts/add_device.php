<?php
session_start();
include ("../scripts/liga_db.php");
include ("../scripts/getdata.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $type_name = $_POST['type_name'];
    $device_name = $_POST['device_name'];
    $description = $_POST['description'];

    // Primeiro, obtenha o id do tipo de dispositivo
    $query = "SELECT id FROM type_device WHERE name = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $type_name);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $type_id = $row['id'];
    } else {
        // Se o tipo de dispositivo não existir, insira um novo
        $query = "INSERT INTO type_device (name) VALUES (?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $type_name);
        $stmt->execute();
        $type_id = $stmt->insert_id;
    }

    // Insira o novo dispositivo
    $query = "INSERT INTO device (type_id, name, description) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("iss", $type_id, $device_name, $description);
    if ($stmt->execute()) {
        // Redirecione de volta para a página de gerenciamento de dispositivos
        header('Location: ../pages/manage_device.php');
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
