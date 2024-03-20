<?php
    include_once ('../../engine/models/dbconnection.php');
    include '../../engine/models/laptop.php';
?>
<?php 
	$laptop= new laptop();
	
	if(isset($_GET['id'])){

	$id=$_GET['id'];
	$delete= $laptop->delete($id);	
	
	if ($delete === TRUE) {
	  	$message="Successfully Deleted";
		$browse_page="m=laptop&message=$message";
		header("Location: ".$_SERVER['PHP_SELF']."?".$browse_page);
	} else {
	  	$message="Error Deleting Record";
		  $browse_page="m=laptop&message=$message";
		  header("Location: ".$_SERVER['PHP_SELF']."?".$browse_page);
	}
	}else
	{
	  	$message="Invalid Request !!!";
		  $browse_page="m=laptop&message=$message";
		  header("Location: ".$_SERVER['PHP_SELF']."?".$browse_page);
	}
?>