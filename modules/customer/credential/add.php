<?php
    require_once ('../../engine/models/dbconnection.php');
    require_once('../../engine/models/credential.php');    
?>
<?php
    $credential= new credential(); 
    $_SESSION['message']='';
    if($_SERVER["REQUEST_METHOD"]=="POST") {
        $credential_name=$_POST['name'];
        $c_id=$_SESSION['auth']->id;
        $front=$_FILES['image1']['name'];
        $back=$_FILES['image2']['name'];
        $front_path="../../img/customer/credential/".$front;
        $back_path="../../img/customer/credential/".$back;
        
        if(preg_match("!image!",$_FILES['image1']['type']) && preg_match("!image!",$_FILES['image2']['type'])){
            if(copy($_FILES['image1']['tmp_name'],$front_path) && copy($_FILES['image2']['tmp_name'],$back_path)){
                $add= $credential->addCustomerCredential($credential_name,$front_path,$back_path,$c_id);
                $browse_page="m=credential";
                header("Location: ".$_SERVER['PHP_SELF']."?".$browse_page);
            }else{
                $_SESSION['message']='<script>alert("Image should be in JPEG, JPG, PNG form")</script>';
            }   
        }
    }
?>
<div class="conatiner">
    <p class="h1 fw-bold mb-3 mx-1 mx-md-4 mt-4">Add Credential</p>
    <hr/>
    <form action="" class="was-validate" method="POST" enctype="multipart/form-data">
        <div class="form-group row">
            <label for="" class="col-sm-3 col-form-label">Credential Name</label>
            <div class="col-sm-5">
                <select class="form-control" name="name" required>
                    <option value="">Choose Credential</option>
                    <option value="Citizenship">Citizenship</option>
                    <option value="License">License</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="form-label col-sm-3 col-form-label" for="customFile">Front-Side</label>
            <div class="col-sm-5">
                <input type="file" class="form-control" id="customFile" name="image1" required/>
            </div>
        </div>
        <div class="form-group row">
            <label class="form-label col-sm-3 col-form-label" for="customFile">Back-Side</label>
            <div class="col-sm-5">
                <input type="file" class="form-control" id="customFile" name="image2" required/>
            </div>
        </div>
            <button type="submit" class="btn btn-primary">Add</button>
    </form>
</div>