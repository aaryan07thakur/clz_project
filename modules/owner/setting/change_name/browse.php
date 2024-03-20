<?php
    require_once('../../engine/models/dbconnection.php');
	require_once('../../engine/models/updateUser.php');
?>
<div class="bg-white mx-2">
    <p class="h4 fw-bold mb-3 mx-2 pt-2 mt-4">Profile</p> <hr/>
    <?php
        $id= $_SESSION['auth']->id;
        $role= $_SESSION['auth']->getRole();
        $profile= new updateUser();

        $viewProfile= $profile->getProfile($role,$id);
        $datas[]=$viewProfile;

        foreach($datas as $data){
            ?>
            <div class="row mx-1">
                <span class="col-md-1 ">Name</span>
				<span class="col-md-11">: <?php echo $data['o_name']?></span>
			</div>
            <div class="row mx-1">
                <span class="col-md-1 ">Email</span>
				<span class="col-md-11">: <?php echo $data['o_email']?></span>
			</div>
            <div class="row mx-1">
                <span class="col-md-1 ">Address</span>
				<span class="col-md-11">: <?php echo $data['o_address']?></span>
			</div>
            <div class="row mx-1">
                <span class="col-md-1 ">Contact </span>
				<span class="col-md-11">: <?php echo $data['o_contact']?></span>
			</div>
            <div class="row mx-1">
                <span class="col-md-1 ">Status</span>
				<span class="col-md-11">: <?php echo $data['account_status']?></span>
			</div>
            <td><a href="index.php?m=setting/change_name&p=change&id=<?php echo $data['o_id']?>" class="btn btn-info mt-3 mb-3 mb-1 mx-3" role="button">Edit Profile</a>
            <?php
        }
    ?>
</div>
