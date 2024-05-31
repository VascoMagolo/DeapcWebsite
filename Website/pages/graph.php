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
$data_sensor = array();
if (!empty($result)) {
    foreach ($result as $row) {
        $data_sensor[$row["device_id"]]['name'] = $row["name"];
        $data_sensor[$row["device_id"]]['values'][] = $row["value"];
    }
}

$query = "SELECT data.value, data.device_id, device.name FROM data JOIN device ON data.device_id = device.id WHERE device.type_id = 1";
$result = my_query($query);
$data_actuator = array();
if (!empty($result)) {
    foreach ($result as $row) {
        $data_actuator[$row["device_id"]]['name'] = $row["name"];
        $data_actuator[$row["device_id"]]['values'][] = $row["value"];
    }
}
?>
<body>
    <?php
    if(isset($_SESSION['username']) && $_SESSION['type_id'] !== 3){
        echo "<div><button><a href='manage_device.php'>Manage Devices</a></button></div>";
    }
    ?>
    <div class="contact">
        <div class="contact-item">
            <canvas id="myChart"></canvas>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
            var ctx = document.getElementById('myChart').getContext('2d');
            var chart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: <?php echo json_encode(range(1, max(array_map(function($deviceData) { return count($deviceData['values']); }, $data_sensor)))); ?>,
                    datasets: <?php echo json_encode(array_map(function($deviceData, $deviceId) {
                        return [
                            'label' => $deviceData['name'],
                            'data' => $deviceData['values'],
                            'fill' => false,
                            'borderColor' => 'rgb(' . rand(0, 255) . ', ' . rand(0, 255) . ', ' . rand(0, 255) . ')',
                            'tension' => 0.1
                        ];
                    }, $data_sensor, array_keys($data_sensor))); ?>
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
        </div>
        <div class="contact-item">
        <canvas id="myChart2"></canvas>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
var ctx = document.getElementById('myChart2').getContext('2d');
var chart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?php echo json_encode(range(1, max(array_map(function($deviceData) { return count($deviceData['values']); }, $data_actuator)))); ?>,
        datasets: <?php echo json_encode(array_map(function($deviceData, $deviceId) {
            return [
                'label' => $deviceData['name'],
                'data' => $deviceData['values'],
                'fill' => false,
                'borderColor' => 'rgb(' . rand(0, 255) . ', ' . rand(0, 255) . ', ' . rand(0, 255) . ')',
                'tension' => 0.1
            ];
        }, $data_actuator, array_keys($data_actuator))); ?>
    },
    options: {
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    callback: function(value, index, values) {
                        return value ? 'On' : 'Off';
                    },
                    stepSize: 1
                    
                }  
            }
        },
        plugins: {
            tooltip: {
                callbacks: {
                    label: function(context) {
                        var label = context.dataset.label || '';
                        if (label) {
                            label += ': ';
                        }
                        if (context.parsed.y !== null) {
                            label += context.parsed.y ? 'On' : 'Off';
                        }
                        return label;
                    }
                }
            }
        }
    }
});
</script>




        </div>
    </div>

</body>
<?php
include ("../pages/footer.php");
?>
