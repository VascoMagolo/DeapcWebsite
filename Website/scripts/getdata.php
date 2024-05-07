<?php
try {
    include ("../scripts/liga_db.php");
} catch (\Throwable $th) {
    echo "Error: " . $th->getMessage();
    exit();
}
$query = "SELECT value FROM data WHERE device_id = 2";
$result = $conn->query($query);
$data = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    echo json_encode($data);
    // this will return the value of the first row
    foreach ($data as $key => $value) {
        $data[$key] = $value["value"];
    }
} else {
    echo "No data found";
}
?>
