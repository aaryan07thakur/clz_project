<?php
    require_once('../../engine/models/dbconnection.php');
	require_once('../../engine/models/updateUser.php');

    $changePass= new updateUser();
    if(isset($_SERVER['REQUEST_METHOD'])=='POST'){
        $password=$_POST['password'];
        $role= $_SESSION['auth']->getRole();
        $id= $_SESSION['auth']->id;
        
        $change=$changePass->changePassword($password,$id,$role);
        $message="Successfully Changed Password";
		$browse_page="m=changepass&message=$message";
		header("Location: ".$_SERVER['PHP_SELF']."?".$browse_page);
    }
?>