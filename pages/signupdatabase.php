<?php
     include '../engine/models/dbconnection.php';
     include '../engine/models/addUser.php';
?>
<?php 
    // include '../scriptlibrary/connection.php';
    $add= new addUser();
    $data= new dbh();
    $_SESSION['message']='';
    if($_SERVER["REQUEST_METHOD"]=="POST") {
        $role=$_POST['role'];
        if($role=='admin'){
            $a_name=$_POST['name'];
            $a_address=$_POST['address'];
            $a_contact=$_POST['contact'];
            $a_email=$_POST['email'];
            $a_password=$_POST['password'];
            $profile=$_FILES['image']['name'];
            $profile_path="../img/admin/".$profile;
            if(preg_match("!image!",$_FILES['image']['type'])){
                if(copy($_FILES['image']['tmp_name'],$profile_path)){
                    $admin= $add->addAdmin($a_name,$a_email,$a_password,$profile_path);
                }else{
                    $_SESSION['message']='<script>alert("File uplaoding failed")</script>';
                }
            }else{
                $_SESSION['message']='<script>alert("Image should be in JPEG, JPG, PNG form")</script>';
            }   
        }
        elseif($role=='owner'){
            $name=$_POST['name'];
            $address=$_POST['address'];
            $contact=$_POST['contact'];
            $email=$_POST['email'];
            $password=$_POST['password'];
            $profile=$_FILES['image']['name'];
            $profile_path="../img/owner/profile/".$profile;
            if(preg_match("!image!",$_FILES['image']['type'])){
                if(copy($_FILES['image']['tmp_name'],$profile_path)){
                    $owner= $add->addOwner($name,$address,$email,$password,$contact,$profile_path);
                }else{
                    $_SESSION['message']='<script>alert("File uplaoding failed")</script>';
                }
            }else{
                $_SESSION['message']='<script>alert("Image should be in JPEG, JPG, PNG form")</script>';
            }
        }else{
            $name=$_POST['name'];
            $address=$_POST['address'];
            $contact=$_POST['contact'];
            $email=$_POST['email'];
            $password=$_POST['password'];
            $profile=$_FILES['image']['name'];
            $profile_path="../img/customer/profile/".$profile;
            if(preg_match("!image!",$_FILES['image']['type'])){
                if(copy($_FILES['image']['tmp_name'],$profile_path)){
                    $owner= $add->addCustomer($name,$address,$email,$password,$contact,$profile_path);
                }else{
                    $_SESSION['message']='<script>alert("File uplaoding failed")</script>';
                }
            }else{
                $_SESSION['message']='<script>alert("Image should be in JPEG, JPG, PNG form")</script>';
            }
        }
    }
?>
<?php
  include '../engine/models/dbclose.php';  
?>