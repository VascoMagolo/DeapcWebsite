<?php
session_start();
include ("../pages/header.php");
include ("../pages/nav.php");
try {
    include ("../scripts/liga_db.php");
} catch (\Throwable $th) {
    echo "Error: " . $th->getMessage();
}
include ("../scripts/getdata.php");
?>
<body>
<canvas id="myChart"></canvas>
<script>
var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: <?php echo json_encode(array_keys($data)); ?>,
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