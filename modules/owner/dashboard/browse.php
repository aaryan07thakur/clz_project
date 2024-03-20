<?php
    // include '../../engine/models/dbconnection.php';
    include '../../engine/models/laptop.php';
    include '../../engine/models/payment.php';
    $laptop= new laptop();
    $id=$_SESSION['auth']->id;
    $total=$laptop->countLaptop($id);
    $payment= new payment();
    $earned= $payment->totalEarned($id);
    $lapName= $laptop->getLapName($id);
?>
<div class="row justify-content-center mb-3">
    <div class="col-md-4">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title text-center">Total Laptop</h5>
                <p class="card-text text-center"><?php echo $total; ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title text-center">Total Earned</h5>
                <p class="card-text text-center">NPR <?php echo $earned;?></p>
            </div>
        </div>
    </div>
</div>
<div class="container mt-3 mb-4">
  <canvas id="myChart"></canvas>
</div>
<script>
  const labels = <?php echo json_encode($lapName); ?>;

  const data = {
    labels: labels,
    datasets: [{
        label: 'Laptops',
        data: [5, 10, 6, 9, 4, 2, 1],
        backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(255, 159, 64, 0.2)',
        'rgba(255, 205, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(153, 102, 255, 0.2)'
        ],
        borderColor: [
        'rgb(255, 99, 132)',
        'rgb(255, 159, 64)',
        'rgb(255, 205, 86)',
        'rgb(75, 192, 192)',
        'rgb(54, 162, 235)',
        'rgb(153, 102, 255)'
        ],
        borderWidth: 1
    }]
  };

    const config = {
    type: 'bar',
    data: data,
    options: {
        scales: {
        y: {
            beginAtZero: true
        }
        }
    },
    };
  const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>
