<?php
  include '../../engine/models/dbconnection.php';
  include '../../engine/models/laptop.php';
  require_once("../../sections/component.php");
?>
<div class="container-fluid mt-mb-2 px-2 bg-light">
  <h4>Welcome Mr/Mrs <?php echo $_SESSION['auth']->name?></h4>
  <p class="small">Before booking laptop you should know the terms and conditions</p>
  <ul class="small">
    <li>First you should add valid credential/document such as citizenship and Liscence to book Laptop.</li>
    <li>You can rent laptop one at a time.</li>
    <li>Owner should approve to rent Laptop.</li>
    <li>You have to pay total ammount in two installment i.e first when you recive laptop and last when you return laptop.</li>
    <li>You have to return latop within 3 days of return date otherwise 10% of charge is added in total.</li>
  </ul>
</div>
<div class="container-fluid min-vh-100 bg-light">
    <div class="col-md-12">
      <h1 class="text-center">Laptops</h1>
    </div>
    <div class="row p-3"> 
        <?php
          $row= new laptop();
          $datas=$row->getAllLaptop();
          foreach($datas as $data){
            component('index.php?m=dashboard&p=check',$data['lap_name'],"../../".$data['lap_image'],$data['lap_status'],300,$data['lap_id']); 
          }
        ?>
    </div>
  </div>