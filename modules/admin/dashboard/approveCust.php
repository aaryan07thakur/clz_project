<?php
    require_once ('../../engine/models/dbconnection.php');
    require_once('../../engine/models/user.php');
    $user= new user();
    $id=$_GET['id'];
    
    $approve=$user->updateCustStatus($id);
    if($approve==true){
        $browse_page="m=dashboard";
		header("Location: ".$_SERVER['PHP_SELF']."?".$browse_page);
    }else{
        die( 'error');
    }
?>