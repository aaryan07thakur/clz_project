<?php
    include_once ('../../engine/models/dbconnection.php');
    include '../../engine/models/rentDetail.php';
?>
<?php 
	$rent= new rentDetail();
	
	if(isset($_GET['id'])){

	$id=$_GET['id'];
	$reject= $rent->reject($id);	
	
	if ($reject === TRUE) {
	  	$message="Successfully rejected";
		  $browse_page="m=lap_rented&message=$message";
		  header("Location: ".$_SERVER['PHP_SELF']."?".$browse_page);
	} else {
	  	$message="Error rejecting Record";
		  $browse_page="m=lap_rented&message=$message";
		  header("Location: ".$_SERVER['PHP_SELF']."?".$browse_page);
	}
	}else
	{
	  	$message="Invalid Request !!!";
		  $browse_page="m=lap_rented&message=$message";
		  header("Location: ".$_SERVER['PHP_SELF']."?".$browse_page);
	}
?>