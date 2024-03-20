<?php
	require_once('../../engine/models/dbconnection.php');
	require_once('../../engine/models/dbclose.php'); 
?>
<html>
	<head>
		<title>Dashboard</title>
		<link href="../../css/style1.css" type="text/css" rel="stylesheet"/>
		<?php
    		include "../../scriptlibrary/bootstrap.php";
		?>
	</head>
	
	<body>
	<script src="../../script/main.js"></script>
			<?php 
				//check the connection
				include("../../scriptlibrary/connection.php");
			?>
			
			<div class="vertical-nav bg-light" id="sidebar">
				<div class="py-4 px-3 bg-light">
					<div class="d-flex align-items-center mb-3">
						<img src="../<?php echo $_SESSION['auth']->profile?>" alt="...." width="80" height="80" class="mr-2 rounded-circle shadow-sm">
						<div class="media-body">
							<h4 class="m-0"><?php echo $_SESSION['auth']->name?></h4>
						</div>
					</div>
					<div class="d-flex align-items-center">
						<p class="font-weight-normal text-muted mb-0">
						<?php echo $_SESSION['auth']->email?>
						</p>
					</div>
				</div>
				<p class="text-gray font-weight-bold text-center bg-white text-uppercase px-3 medium p-4 mb-0">Owner Dashboard</p>
				<?php 
					include "menu/navigation.php";
				?>
			</div>

			<div class="page-content  bg-light" id="content">
  				<!-- Toggle button -->
				<div id="interface">
				 	<div class="container-fluid bg-secondary p-2 navigation">
						<div class="toogle">
							<button id="sidebarCollapse" type="button" class="btn btn-light rounded-pill shadow-sm px-4 mb-2 mt-2"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold">Toggle</small></button>
						</div>
					</div>
				</div>	
				<div class="separator p-4 mb-5">
					<?php
					$msg=isset($_GET["message"])?$_GET['message']:"";
					if($msg!=""){
					?>
					<div class="status-message"><?php echo $msg;?></div>
					<?php 
					}	
					?>
					<?php 
						 include "../../scriptlibrary/pagecontroller.php";
					?>	
				</div>
				<div class="container-fluid d-flex justify-content-start footer bg-secondary">
					<?php 
						include "../../scriptlibrary/dashfooter.php";
					?>	
				</div>
			</div>
		<?php
			$close= new databaseclose();
			$close->dbclose();
		?>
	</body>
</html>