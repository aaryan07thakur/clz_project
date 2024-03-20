<?php
    include_once ('../../engine/models/dbconnection.php');
    include '../../engine/models/laptop.php';
?>

<?php 
    $laptop= new laptop();
	if(isset($_GET['id'])){
		$id=$_GET['id'];
        $edit= $laptop->edit($id);
		
	if($_SERVER['REQUEST_METHOD']=="POST"){
		//work for creation
		$name=$_POST['name'];
		$brand=$_POST['brand'];
        $model=$_POST['model'];
        $color=$_POST['color'];
        $ssd=$_POST['ssd'];
        $ram=$_POST['ram'];
        $speed=$_POST['speed'];
        $image=$_FILES['image']['name'];
        $image_path="img/laptop".$image;
		
        $update=$laptop->update($name,$brand,$model,$color,$ssd,$ram,$speed,$image_path,$id);
        
	}
	
	}else{
		 echo "Invalid Request";
		  $message="Invalid Request";
		  $browse_page="m=laptop&message=$message";
		  header("Location: ".$_SERVER['PHP_SELF']."?".$browse_page);
	}
?>
<section class="vh-100">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 cil-xl-11">
          <div class="card text-black" style="border-radius:25px">
            <div class="card-body p-md-5">
                  <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Add Laptop</p>
                  <form method="POST" class="was-validate" action=""  enctype="multipart/form-data">
                    <div class="row justify-content-center">
                        <div class="col-md-10 col-lg-6 col-xl-5">
                            <div class="form-group row">
                                <label for="inputName3" class="col-sm-3 col-form-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="inputName3" name="name" value="<?php echo  $edit['lap_name']?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputBrand3" class="col-sm-3 col-form-label">Brand</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="inputBrand3" name="brand" value="<?php echo  $edit['lap_brand']?>" required>
                                </div>
                            </div>
                                <div class="form-group row">
                                <label for="inputModal3" class="col-sm-3 col-form-label">Model</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="inputModal3" name="model" value="<?php echo  $edit['lap_model']?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="color" class="col-sm-3 col-form-label">Color</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="color" name="color" value="<?php echo  $edit['lap_color']?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="ssd" class="col-sm-3 col-form-label">SSD</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="ssd" name="ssd" value="<?php echo  $edit['lap_ssd']?>" required>
                                </div>
                            </div>
                        </div>     
                        <div class="col-md-10 col-lg-6 col-xl-5">
                            <div class="form-group row">
                                <label for="ram" class="col-sm-3 col-form-label">RAM</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="ram"   name="ram"  value="<?php echo  $edit['lap_ram']?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="speed" class="col-sm-3 col-form-label">Speed</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="speed"   name="speed"  value="<?php echo  $edit['lap_speed']?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="form-label col-sm-3 col-form-label" for="customFile">Laptop Image</label>
                                <div class="col-sm-9">
                                <input type="file" class="form-control" id="customFile" name="image" value="<?php echo  $edit['lap_image']?>"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary" name="update" value="update">Update</button>
                                 </div>
                            </div>
                        </div>
                  </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>