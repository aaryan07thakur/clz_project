<?php
    require_once('../../engine/models/dbconnection.php');
	require_once('../../engine/models/updateUser.php');
    if(isset($_SERVER['REQUEST_METHOD'])=='POST'){
        $name= $_POST['name'];
        $address= $_POST['address'];
        $contact= $_POST['contact'];

        $id=$_SESSION['auth']->id;
        $role= $_SESSION['auth']->getRole();

        $user= new updateUser();
        $update= $user->updateProfile($role,$id,$name,$address,$contact);

        if($update==true){
            $_SESSION['auth']->name=$name;
            $browse_page="m=profile";
		    header("Location: ".$_SERVER['PHP_SELF']."?".$browse_page);
        }
    }
?>