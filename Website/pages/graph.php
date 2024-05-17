<?php
session_start();
include ("../pages/header.php");
include ("../pages/nav.php");
try {
    include ("../scripts/getdata.php");
    include ("../scripts/liga_db.php");
} catch (\Throwable $th) {
    echo "Error: " . $th->getMessage();
    exit();
}



// Executa a consulta e obtém os dados
$query = "SELECT value FROM data WHERE device_id = 2";
$result = my_query($query);

// Processa os dados para o gráfico
$data = array();
if (!empty($result)) {
    foreach ($result as $row) {
        $data[] = $row["value"];
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
        labels: <?php echo json_encode(range(1, count($data))); ?>, // Cria labels numéricas
        datasets: [{
            label: 'My Dataset',
            data: <?php echo json_encode(array_values($data)); ?>,
            fill: false,
            borderColor: 'rgb(75, 192, 192)',
            tension: 0.1
        }]
    }
});
</script>
</body>
<?php
include ("../pages/footer.php");
?>
