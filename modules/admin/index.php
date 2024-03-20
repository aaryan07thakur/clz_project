<?php
	require_once('../../engine/models/dbconnection.php');
	require_once('../../engine/models/dbclose.php'); 
?>
<html>
	<head>
		<title>Dashboard</title>
		<link href="../../css/style1.css" type="text/css" rel="stylesheet"/>
	</head>
	<?php
    include "../../scriptlibrary/bootstrap.php";
	?>
	<body>
	<script src="../../script/main.js"></script>
			<?php 
				//check the connection
				include("../../scriptlibrary/connection.php");
			?>
			<div class="vertical-nav bg-white" id="sidebar">
				<div class="py-4 px-3 bg-light">
					<div class="d-flex align-items-center mb-4">
						
						<div class="media-body">
							<h4 class="m-0">Dipesh Thakur</h4>
						</div>
					</div>
					<div class="d-flex align-items-center">
						<p class="font-weight-normal text-muted mb-0">
							<?php echo $_SESSION['auth']->email;?>
						</p>
					</div>
				</div>
				<p class="text-gray font-weight-bold text-center bg-white text-uppercase px-3 medium p-4 mb-0">Admin Dashboard</p>
				<?php 
					include "menu/navigation.php";
				?>
			</div>

			<div class="page-content  bg-light" id="content">
  				<!-- Toggle button -->
				<div class="header container-fluid py-2 bg-dark">
					<button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-2 mt-2"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold">Toggle</small></button>
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
				<div class="container-fluid d-flex justify-content-start footer bg-dark">
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