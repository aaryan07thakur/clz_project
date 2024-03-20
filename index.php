<?php
  require_once("./sections/component.php");
  include 'engine/models/dbconnection.php';
  include 'engine/models/laptop.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laptop Renting System</title>
    <!-- including booytstrap -->
    <?php 
      include "scriptlibrary/bootstrap.php";
    ?>
</head>
<body>
    <!-- including navbar -->
  <?php
      include 'scriptlibrary/navbar.php';
  ?>
  <div class="container mb-2">
    <div id="demo" class="carousel slide" data-ride="carousel">
      <ul class="carousel-indicators">
        <li data-target="#demo" data-slide-to="0" class="active"></li>
        <li data-target="#demo" data-slide-to="1"></li>
        <li data-target="#demo" data-slide-to="2"></li>
      </ul>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block img-fluid" src="img/lap1.jpg" alt="Los Angeles" width="1100" height="500">
          <div class="carousel-caption">
            <h3>Kathmandu</h3>
            <p>Kathmandu is nice place to visit.</p>
          </div>   
        </div>
        <div class="carousel-item">
          <img class="d-block img-fluid" src="img/lap1.jpg" alt="Chicago" width="1100" height="500">
          <div class="carousel-caption">
            <h3>Bhaktapur</h3>
            <p>Thank you, Bhaktapur!</p>
          </div>   
        </div>
        <div class="carousel-item">
          <img class="d-block img-fluid" src="img/lap1.jpg" alt="New York" width="1100" height="500">
          <div class="carousel-caption">
            <h3>Dhangadhi</h3>
            <p>Eat a Apple a day!</p>
          </div>   
        </div>
      </div>
      <a class="carousel-control-prev" href="#demo" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </a>
      <a class="carousel-control-next" href="#demo" data-slide="next">
        <span class="carousel-control-next-icon"></span>
      </a>
    </div>
  </div>

  <!-- card section -->
  <div class="container-fluid p-5 bg-light">
    <div class="col-md-12 ">
      <h1 class="text-center">Laptops</h1>
    </div>
    <div class="row p-2"> 
        <?php
          $row= new laptop();
          $datas=$row->getAllLaptop();
          foreach($datas as $data){
              component('check.php',$data['lap_name'],$data['lap_image'],$data['lap_status'],300,$data['lap_id']); 
          }      
        ?>
    </div>
  </div>
  
  <section style="width: 100%; float: left; margin-top:20px; border-top:1px solid #434343; padding-top: 10px; bottom:0;line-height: 40px; background:#434343; color:#fff">
    <?php
      include "scriptlibrary/footer.php";
    ?>
  </section>
</body>
</html>