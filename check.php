<?php 
  include "scriptlibrary/bootstrap.php";
  include_once ('engine/models/dbconnection.php');
  include 'engine/models/laptop.php';
?>
<?php
    include 'scriptlibrary/connection.php'; 
    if(isset($_POST['add'])){
      if(isset($_SESSION['auth'])){
        echo $_SESSION['auth']->name;
      }else{  
        echo "<script>alert('Login as a Customer to book')
        window.location.href='index.php'
        </script>";
      }
    }elseif(isset($_POST['detail'])){
      $lap_id= $_POST['lap_id'];
      $laptop= new laptop();
      $data=$laptop->AllLaptop($lap_id);
      foreach($data as $lap){
      ?>
      <div class="bg-light m-5 p-3">
        <div class="row">
          <div class="col-md-6">
            <img src="<?php echo $lap['lap_image'];?>"  class ="img-fluid" alt="Hello">
            <p class=""><?php echo $lap['description'];?></p>
          </div>
          <div class="col-md-6 p-5">
          <p class="h4 text-left mb-3">Details</p>
            <div class="row">
              <div class="col-sm-2">
                <label>Laptop name<label>
              </div>
              <div class="col-sm-1">
                <label>:</label>
              </div>
              <div class="col-sm-3">
                <?php echo $lap['lap_name'];?>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-2">
                <label>Brand</label>
              </div>
              <div class="col-sm-1">
                <label>:</label>
              </div>
              <div class="col-sm-3">
                <?php echo $lap['lap_brand'];?>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-2">
                <label>Modal</label>
              </div>
              <div class="col-sm-1">
                <label>:</label>
              </div>
              <div class="col-sm-3">
                <?php echo $lap['lap_model'];?>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-2">
                <label>Processor</label>
              </div>
              <div class="col-sm-1">
                <label>:</label>
              </div>
              <div class="col-sm-3">
                <?php echo $lap['processor'];?>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-2">
                <label>Color</label>
              </div>
              <div class="col-sm-1">
                <label>:</label>
              </div>
              <div class="col-sm-3">
                <?php echo $lap['lap_color'];?>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-2">
                <label>SSD</label>
              </div>
              <div class="col-sm-1">
                <label>:</label>
              </div>
              <div class="col-sm-3">
                <?php echo $lap['lap_ssd'];?>
              </div>
            </div>    
            <div class="row">
              <div class="col-sm-2">
                <label>RAM</label>
              </div>
              <div class="col-sm-1">
                <label>:</label>
              </div>
              <div class="col-sm-3">
                <?php echo $lap['lap_ram'];?>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-2">
                <label>Speed</label>
              </div>
              <div class="col-sm-1">
                <label>:</label>
              </div>
              <div class="col-sm-3">
                <?php echo $lap['lap_speed'];?>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-2">
                <label>Status</label>
              </div>
              <div class="col-sm-1">
                <label>:</label>
              </div>
              <div class="col-sm-3">
                <?php echo $lap['lap_status'];?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php
    }
  }    
?>