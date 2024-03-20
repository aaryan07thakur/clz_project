<div class="row">
    <div class="col-md-10 col-lg-6 col-xl-5">
    <p class="h4 fw-bold mb-3 mx-1 mx-md-0 mt-4">Change Password</p> <hr/>
        <form action="index.php?m=setting&p=password" class="was-validate" method="POST">
            <div class="form-group row">
                <label for="password" class="col-sm-5 col-form-label">New Password</label>
                <div class="col-sm-7">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="confirmPassword" class="col-sm-5 col-form-label">Confirm-Password</label>
                <div class="col-sm-7">
                    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" onChange="checkPasswordMatch()" placeholder="Password" required>
                </div>
                <div class="col-sm-7">
                    <div class="registrationFormaAlert text-danger" id="checkMatch"></div> 
                </div>
            </div>     
            <button type="submit" class="btn btn-primary">Change</button>
        </form>
    </div>
</div>
<script type="text/javascript">
    function checkPasswordMatch() {
    var password = $("#password").val();
    var confirmPassword = $("#confirmPassword").val();
    var x=document.getElementById('checkMatch');
    if (password != confirmPassword)
        $("#checkMatch").html("Passwords do not match!");
    else
        $("#checkMatch").html(x.style.display="none");
    }
</script>
      