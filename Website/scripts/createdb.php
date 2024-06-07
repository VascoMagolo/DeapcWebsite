<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "deapc_db";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE DATABASE IF NOT EXISTS $database";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully\n";
} else {
    echo "Error creating database: " . $conn->error . "\n";
}

$conn->close();

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sqlFilePath = 'db.sql';

$templine = '';

$lines = file($sqlFilePath);

foreach ($lines as $line) {

    if (substr($line, 0, 2) == '--' || substr($line, 0, 2) == '/*!' || $line == '') {
        continue;
    }

    $templine .= $line;

    if (substr(trim($line), -1, 1) == ';') {
        if (!$conn->query($templine)) {
            print('Error performing query \'<strong>' . $templine . '\': ' . $conn->error . '<br /><br />');
        }

        $templine = '';
    }
}

echo "All queries were executed successfully\n";

$conn->close();
?>
