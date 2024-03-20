<?php
    include_once ('../../engine/models/dbconnection.php');
    include '../../engine/models/laptop.php';
    require_once('../../engine/models/credential.php');
?>
<?php
    $id=$_SESSION['auth']->id;
    $credential= new credential();
    $data= $credential->getOwnerCredential($id);
?>
<?php
    $laptop=new laptop();
    $_SESSION['message']='';
    if($data!==null){
        if($_SERVER["REQUEST_METHOD"]=="POST") {
            $lap_name=$_POST['name'];
            $o_id=$_SESSION['auth']->id;
            $processor=$_POST['processor'];
            $brand=$_POST['brand'];
            $model=$_POST['model'];
            $color=$_POST['color'];
            $ssd=$_POST['ssd'];
            $ram=$_POST['ram'];
            $speed=$_POST['speed'];
            $desc=$_POST['desc'];
            $image=$_FILES['image']['name'];
            $lapimage_path="img/laptop/".$image;
            
    
            if(preg_match("!image!",$_FILES['image']['type'])){
                if(copy($_FILES['image']['tmp_name'],"../../".$lapimage_path)){
                    $add=$laptop->add($lap_name,$brand,$processor,$model,$color,$ssd,$ram,$speed,$desc,$lapimage_path,$o_id);
                    $browse_page="m=laptop";
                    header("Location: ".$_SERVER['PHP_SELF']."?".$browse_page);
                }else{
                    $_SESSION['message']='<script>alert("Image should be in JPEG, JPG, PNG form")</script>';
                }
                  
            }
        }
        ?>
        <div><?php echo $_SESSION['message'];?></div>
            <div class="container">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-lg-12 cil-xl-11">
                    <div class="card text-black" style="border-radius:25px">
                        <div class="card-body p-md-5">
                            <p class="text-center h1 fw-bold mb-2 mx-1 mx-md-4 mt-2">Add Laptop</p>
                            <form method="POST" name="myForm" class="was-validate"   enctype="multipart/form-data">
                                <div class="row justify-content-center">
                                    <div class="col-md-10 col-lg-6 col-xl-5">
                                        <div class="form-group row">
                                            <label for="inputName3" class="col-sm-5 col-form-label">Name</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" id="inputName3" name="name" placeholder="Laptop Name" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputBrand3" class="col-sm-5 col-form-label">Brand</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" id="inputBrand3" name="brand" placeholder="Brand" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputBrand3" class="col-sm-5 col-form-label">Processor</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" id="inputBrand3" name="processor" placeholder="processor" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputModal3" class="col-sm-5 col-form-label">Model</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" id="inputModal3" name="model" placeholder="Model" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="color" class="col-sm-5 col-form-label">Color</label>
                                            <div class="col-sm-7">
                                            <input type="text" class="form-control" id="color" name="color" placeholder="color" required>
                                        </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="ssd" class="col-sm-5 col-form-label">SSD</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" id="ssd" name="ssd" placeholder="Size of ssd" required>
                                            </div>
                                        </div>
                                    </div>     
                                    <div class="col-md-10 col-lg-6 col-xl-5">
                                        <div class="form-group row">
                                            <label for="ram" class="col-sm-5 col-form-label">RAM</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" id="ram"   name="ram"  placeholder="Size of ram" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="speed" class="col-sm-5 col-form-label">Speed</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" id="speed"   name="speed"  placeholder="Speed of laptop" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="desc" class="col-sm-5 col-form-label">Description</label>
                                            <div class="col-sm-7">
                                                <textarea class="form-control" id="textAreaExample3" name="desc" rows="2"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="form-label col-sm-5 col-form-label" for="customFile">Laptop Image</label>
                                            <div class="col-sm-7">
                                            <input type="file" class="form-control" id="customFile" name="image" required/>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-primary">Add</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div> <?php        
    }else{
        echo "<script>alert('First add your document')</script>";
        echo "<script>window.location='index.php?m=laptop'</script>";
    }
    
