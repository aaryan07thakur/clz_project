<?php
    require_once ('../../engine/models/dbconnection.php');
    require_once('../../engine/models/credential.php');
    include '../../engine/models/laptop.php';
?>  
<?php
    $id=$_SESSION['auth']->id;  
    $credential= new credential();
    $data= $credential->getCustomerCredential($id);
?>
<?php
   if(isset($_POST['add'])){
    if($data!==null){
      if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])){
        $item_array_id= array_column($_SESSION['cart'],"lap_id");
        if($_SESSION['cart']>1){
          echo "<script>alert('Limit exceed')</script>";
          echo "<script>window.location='index.php'</script>";
        }else{
            $count=count($_SESSION['cart']);
            $item_array= array('lap_id'=>$_POST['lap_id']);  
            $_SESSION['cart'][$count]=$item_array;
            echo "<script>window.location='index.php'</script>";
          }
        
      } else{
        $item_array= array(
          'lap_id'=>$_POST['lap_id']
        );
        $_SESSION['cart'][0]=$item_array;
        echo "<script>window.location='index.php'</script>";
      }
    }else{
      echo "<script>alert('First add your document')</script>";
      echo "<script>window.location='index.php'</script>";
    }
  }elseif(isset($_POST['detail'])){
    $lap_id= $_POST['lap_id'];
    $laptop= new laptop();
    $data=$laptop->AllLaptop($lap_id);
    foreach($data as $lap){
    ?>
    <div class="bg-light m-1 p-4">
      <div class="row">
        <div class="col-md-6">
          <img src="../../<?php echo $lap['lap_image'];?>"  class ="img-fluid" alt="Hello">
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
          <a href="index.php?" class="btn btn-info mb-1 mr-1" role="button">Back</a>
        </div>
      </div>
    </div>
    <?php
  }
}  

?>