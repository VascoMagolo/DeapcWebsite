<?php

try {
    include ("../scripts/liga_db.php");
} catch (\Throwable $th) {
    echo "Error: " . $th->getMessage();
    exit();
}

function my_query($sql, $debug=0) {
    global $conn;
    if($debug) echo $sql;
    $result = $conn->query($sql);

    if(isset($result->num_rows)) {
        $arrRes = array();
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $arrRes[] = $row;
            }
        }
        return $arrRes;
    }
    else if ($result === TRUE) { 
        if($last_id = $conn->insert_id) {
            return $last_id;
        }
        return 1;
    } 
    return 0;
}
?>
