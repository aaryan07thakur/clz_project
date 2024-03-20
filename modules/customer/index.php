<html>
    <head>
        <title>Laptop Renting System</title>
        <link href="../../css/style.css" type="text/css" rel="stylesheet"/>
        <?php
            include "../../scriptlibrary/bootstrap.php";
        ?>
    </head>
    <body>
    <?php 
		//check the connection
		include("../../scriptlibrary/connection.php");
	?>	
        <nav class="navbar fixed navbar-expand-md bg-light navbar-light">
            <a class="navbar-brand" href="#">Laptop Renting System</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                  
                <li class="nav-item drop">
                    <div class="dropdown">
                        <a class="nav-link" data-toggle="dropdown">
                        <?php echo $_SESSION['auth']->name;?>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="index.php?m=profile"><i class="fal fa-user mr-1"></i>View Profile</a>
                            <a class="dropdown-item" href="index.php?m=changepass"><i class="fal fa-key mr-1"></i>Change Password</a>
                            <a class="dropdown-item" href="index.php?m=cart"><i class="fal fa-shopping-cart mr-1"></i>Add cart(
                                <?php
                                    if(isset($_SESSION['cart'])){
                                        $count=count($_SESSION['cart']);
                                        echo "<span>$count</span>";
                                    }else{
                                        echo "<span>0</span>";
                                    }
                                ?>
                            )</a>
                            <a class="dropdown-item" href="index.php?m=credential"><i class="fal fa-file mr-1"></i>Credential</a>
                            <a class="dropdown-item" href="index.php?m=status"><i class="fal fa-file mr-1"></i>Booked Status</a>
                            <a class="dropdown-item" href="index.php?m=logout"><i class="fal fa-sign-out-alt mr-1"></i>Logout</a>
                        </div>
                    </div>
                </li>  
                </ul>
            </div>  
        </nav>
        <div class="content" id="content">
				<div class="p-4 mb-5">
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
		</div>    
        <div class="container-fluid d-flex justify-content-start footer bg-secondary">
			<?php 
				include "../../scriptlibrary/dashfooter.php";
    		?>	
		</div>
    </body>
</html>
