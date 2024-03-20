<?php
include 'signupdatabase.php';
?>
<?php
  include '../scriptlibrary/bootstrap.php';
?>
<html>
<head>
<title>Laptop Renting System</title>
  <link href="../css/signup.css" type="text/css" rel="stylesheet"/>
</head>
<body>
<div><?php echo $_SESSION['message'];?></div>
  <section class="vh-100">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 cil-xl-11">
          <div class="card text-black" style="border-radius:25px">
            <div class="card-body p-md-5">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                  <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>
                  <form method="POST" name="myForm" class="was-validate" action="<?php echo $_SERVER['PHP_SELF'];?>"  enctype="multipart/form-data">
                    <div class="form-group row">
                      <label for="inputName3" class="col-sm-3 col-form-label">Name</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputName3" name="name" placeholder="Full Name" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputAddress3" class="col-sm-3 col-form-label">Address</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputAddress3" name="address" placeholder="Address" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Email</label>
                      <div class="col-sm-9">
                        <input type="email" class="form-control" id="inputEmail3" name="email" placeholder="Email" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="password" class="col-sm-3 col-form-label">Password</label>
                      <div class="col-sm-9">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="confirmPassword" class="col-sm-3 col-form-label">Re-Password</label>
                      <div class="col-sm-9">
                        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" onChange="checkPasswordMatch()" placeholder="Password" required>
                      </div>
                      <div class="col-sm-9">
                        <div class="registrationFormaAlert text-danger" id="checkMatch"></div> 
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputContact3" class="col-sm-3 col-form-label">Contact</label>
                      <div class="col-sm-9">
                        <input type="phone" class="form-control" id="inputContact3"  onkeypress='validate(event)' name="contact" maxlength="10" placeholder="9840000000" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="form-label col-sm-3 col-form-label" for="customFile">Photo</label>
                      <div class="col-sm-9">
                      <input type="file" class="form-control" id="customFile" name="image" required/>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">Role</label>
                      <div class="col-sm-9">
                        <select class="form-control" name="role" required>
                          <option value="">Choose role</option>
                          <option value="admin">Admin</option>
                          <option value="owner">Owner</option>
                          <option value="customer">Customer</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group form-check">
                      <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="remember" required> I agree on rules and procedures of the system.
                      </label>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Sign Up</button>
                        <p >Already registered <a href="login.php">click here</a> to login</p>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                  <img src="../img/lap1.jpg" class="img-fluid" alt="Sample image">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
  </section>
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
</body>
</html>