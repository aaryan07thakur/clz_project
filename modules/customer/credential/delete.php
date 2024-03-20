<?php
	require_once ('../../engine/models/dbconnection.php');
    require_once('../../engine/models/credential.php');    
?>
<?php 
	if(isset($_GET['id'])){
	$credential=new credential();	
	$id=$_GET['id'];
	$message="<script>confirm()</script>";
	$delete= $credential->deleteCustomerCredential($id);
	if ($delete === TRUE) {
	  	$message="Successfully Deleted";
		  $browse_page="m=credential&message=$message";
		  header("Location: ".$_SERVER['PHP_SELF']."?".$browse_page);
	} else {
	  	$message="Error Deleting Record";
		  $browse_page="m=credential&message=$message";
		  header("Location: ".$_SERVER['PHP_SELF']."?".$browse_page);
	}

	}else
	{
	  	$message="Invalid Request !!!";
		  $browse_page="m=credential&message=$message";
		  header("Location: ".$_SERVER['PHP_SELF']."?".$browse_page);
	}
?>