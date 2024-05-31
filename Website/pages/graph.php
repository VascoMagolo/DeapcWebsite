<?php
session_start();
include ("../pages/header.php");
include ("../pages/nav.php");
try {
    include ("../scripts/liga_db.php");
    include ("../scripts/getdata.php");
} catch (\Throwable $th) {
    echo "Error: " . $th->getMessage();
    exit();
}

$query = "SELECT data.value, data.device_id, device.name FROM data JOIN device ON data.device_id = device.id WHERE device.type_id = 2";

$result = my_query($query);

$data = array();
if (!empty($result)) {
    foreach ($result as $row) {
        $data[$row["device_id"]]['name'] = $row["name"];
        $data[$row["device_id"]]['values'][] = $row["value"];
    }
}
?>
<body>
<canvas id="myChart"></canvas>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: <?php echo json_encode(range(1, max(array_map(function($deviceData) { return count($deviceData['values']); }, $data)))); ?>,
        datasets: <?php echo json_encode(array_map(function($deviceData, $deviceId) {
            return [
                'label' => $deviceData['name'],
                'data' => $deviceData['values'],
                'fill' => false,
                'borderColor' => 'rgb(' . rand(0, 255) . ', ' . rand(0, 255) . ', ' . rand(0, 255) . ')',
                'tension' => 0.1
            ];
        }, $data, array_keys($data))); ?>
    },
    options: {
        scales: {
            y: {
                beginAtZero: false
            }
        }
    }
});
</script>

<?php
if (isset($_SESSION["username"]) && ($_SESSION['type_id'] == 1) || ($_SESSION['type_id'] == 2)) {
} else
?>

</body>
<?php
include ("../pages/footer.php");
?>
