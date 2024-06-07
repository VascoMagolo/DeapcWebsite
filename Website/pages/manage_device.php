<head>
    <link rel="stylesheet" type="text/css" href="../css/table.css">
    <link rel="stylesheet" type="text/css" href="../css/devices.css">
</head>
<?php
    session_start();
    include ("../pages/header.php");
    include ("../pages/nav.php");
    include ("../scripts/getdata.php");

    try {
        include ("../scripts/liga_db.php");
    } catch (\Throwable $th) {
        echo "Error: " . $th->getMessage();
        exit();
    }

    $query = "SELECT device.ID, type_device.name AS type_name, device.name AS device_name, device.description FROM device JOIN type_device ON device.type_id = type_device.id";
    $res = my_query($query);
?>
<body>
    <h1>Manage devices</h1>
    <div style="overflow-x:auto;">
        <?php
        $res = my_query($query);

        echo '<table border="1" id="device_table">';
        echo '<thead>';
        echo '<tr>
                <th>ID</th>
                <th>Device type</th>
                <th>Device</th>
                <th>Description</th>
                <th>Delete</th>
            </tr>';
        echo '</thead>';
        echo '<tbody>';
        foreach($res as $v)
        {
        echo '<tr>
        <td>' . htmlspecialchars($v['ID']) . '</td>
        <td>' . htmlspecialchars($v['type_name']) . '</td>
        <td>' . htmlspecialchars($v['device_name']) . '</td>
        <td>' . htmlspecialchars($v['description']) . '</td>
        <td><a href="../scripts/delete_user.php?id=' . htmlspecialchars($v['ID']) . '&t=device"><i class="fas fa-trash"></i></a></td>
        </tr>';
        }
        echo '</tbody>';
        echo "</table>";
        ?>
    </div>
    <script>
        $(document).ready(function() {
        $('#device_table').DataTable({
            "pageLength": 3
        });
    });
    </script>
    <button id="addDeviceBtn" class="BtnDevice">Add Device</button>
    <div id="addDeviceModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Add New Device</h2>
            <form action="../scripts/add_device.php" method="post">
                <label for="type_name">Device Type:</label><br>
                <select name="type_name" id="type_name">
                    <option value="1">Actuator</option>
                    <option value="2">Sensors</option>
                </select>

                <label for="device_name">Device Name:</label><br>
                <input type="text" id="device_name" name="device_name" required><br><br>

                <label for="description">Description:</label><br>
                <textarea id="description" name="description" required></textarea><br><br>

                <button type="submit" class="BtnDevice" style="width:100%;">Add Device</button>
            </form>
        </div>
    </div>
    <script>
    var modal = document.getElementById("addDeviceModal");
    var btn = document.getElementById("addDeviceBtn");
    var span = document.getElementsByClassName("close")[0];

    btn.onclick = function() {
        modal.style.display = "block";
    }

    span.onclick = function() {
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    </script>
</body>
<?php
    include ("../pages/footer.php");
?>