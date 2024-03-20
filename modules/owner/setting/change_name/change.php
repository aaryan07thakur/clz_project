<?php
    require_once('../../engine/models/dbconnection.php');
	require_once('../../engine/models/updateUser.php');

    $viewProfile= new updateUser();
	
	if(isset($_GET['id'])){

        $id=$_GET['id'];
        $role= $_SESSION['auth']->getRole();

            $Profile= $viewProfile->getProfile($role,$id);
            $datas[]=$Profile;
            foreach($datas as $data){
            $name=$data['o_name'];
            $address=$data['o_address'];
            $contact=$data['o_contact'];
        }
    }
    ?>
    <form method="POST" name="myForm" class="was-validate" action="index.php?m=setting/change_name&p=update">
        <div class="form-group row">
            <label for="inputName3" class="col-sm-1 col-form-label">Name</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="inputName3" name="name" placeholder="Full Name" value="<?php echo $name; ?>" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputAddress3" class="col-sm-1 col-form-label">Address</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="inputAddress3" name="address" placeholder="Address" value="<?php echo $address; ?>" required>
            </div>
        </div>   
        <div class="form-group row">
            <label for="inputContact3" class="col-sm-1 col-form-label">Contact</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="inputContact3"  onkeypress='validate(event)' name="contact" maxlength="10" value="<?php echo $contact; ?>" required>
            </div>
         </div>
        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary" name="update">Update</button>
            </div>
        </div>
    </form>
    <script type="text/javascript">
        function validate(evt) {
            var theEvent = evt || window.event;

            // Handle paste
            if (theEvent.type === 'paste') {
            key = event.clipboardData.getData('text/plain');
            } else {
               // Handle key press
                var key = theEvent.keyCode || theEvent.which;
            key = String.fromCharCode(key);
            }
            var regex = /[0-9]|\./;
            if( !regex.test(key) ) {
                theEvent.returnValue = false;
                if(theEvent.preventDefault) theEvent.preventDefault();
            }
       }
    </script>