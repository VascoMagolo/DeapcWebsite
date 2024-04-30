<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "deapc_db";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS $database";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

// Close connection
$conn->close();

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Path to your .sql file
$sqlFilePath = 'db.sql';

// Temporary variable, used to store current query
$templine = '';

// Read in entire file
$lines = file($sqlFilePath);

// Loop through each line
foreach ($lines as $line) {
    // Skip it if it's a comment
    if (substr($line, 0, 2) == '--' || $line == '')
        continue;

    // Add this line to the current segment
    $templine .= $line;

    // If it has a semicolon at the end, it's the end of the query
    if (substr(trim($line), -1, 1) == ';') {
        // Perform the query
        if(!$conn->query($templine)){
            print('Error performing query \'<strong>' . $templine . '\': ' . $conn->error . '<br /><br />');
        }

        // Reset temp variable to empty
        $templine = '';
    }
}

echo "All queries were executed successfully";

$conn->close();
?>
