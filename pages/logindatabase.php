<?php
    // include '../scriptlibrary/connection.php';
    include '../engine/models/dbconnection.php';
    include '../engine/models/getUsers.php';
?>
<?php

    $_SESSION['message']='';
    $users= new user();
    if($_SERVER["REQUEST_METHOD"]=="POST") {
        $role=$_POST['role'];
        if($role=='admin'){
            $a_email=$_POST['email'];
            $a_password=$_POST['password'];
        
            $admin= $users->getAdmin($a_email,$a_password);
                
            if($_SESSION['auth']!=null){
                header('location:../modules/admin');
            }else{
                $_SESSION['error']="User name or password error";
                header('location:login.php');
            }
        }
        elseif($role=='owner'){
            $o_email=$_POST['email'];
            $o_password=$_POST['password'];
            $owner= $users->getOwner($o_email,$o_password);
            
            if($_SESSION['auth']!=null){
                header('location:../modules/owner');
                // $_SESSION['auth']->setRole('owner');
            }else{
                $_SESSION['error']="User name or password error";
                header('location:login.php');
            }
        }else{
            $c_email=$_POST['email'];
            $c_password=$_POST['password'];
            
            $customer= $users->getCustomer($c_email,$c_password);
            if($_SESSION['auth']!=null){
                header('location:../modules/customer');
            }else{
                $_SESSION['error']="User name or password error";
                header('location:login.php');
            }
        }
    }
?>