<?php
    include 'logindatabase.php';
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
        <section class="vh-100">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-lg-12 cil-xl-11">
                        <div class="card text-black" style="border-radius:25px">
                            <div class="card-body p-md-5">
                                <div class="row justify-content-center">
                                    <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-1">
                                        <img src="../img/lap1.jpg" class="img-fluid" alt="Sample image">
                                    </div>
                                    <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-2">
                                        <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Login</p>
                                        <?php if(isset($_SESSION['error'])){?>
                                            <span class="text-danger"><?php echo $_SESSION['error']?></span> 
                                            <?php 
                                        }
                                        ?>
                                        <form action="" class="was-validate" method="POST">
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Email</label>
                                                <div class="col-sm-9">
                                                <input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="email" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputPassword3" class="col-sm-3 col-form-label">Password</label>
                                                <div class="col-sm-9">
                                                <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="password" required>
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
                                            <div class="custom-control custom-checkbox my-1 mr-sm-2 mb-4">
                                                <input type="checkbox" class="custom-control-input" id="customControlInline">
                                                <label class="custom-control-label" for="customControlInline">Remember my preference</label>
                                            </div>
                                                <button type="submit" class="btn btn-primary">Login</button>
                                                <p>Register if you have not registered: <a href="signup.php">Click here</a></p>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>   