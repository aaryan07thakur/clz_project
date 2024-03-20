<?php
    class addUser extends dbh{
        function addAdmin($name,$email,$password,$profile_path) {
            $name =$this->connect()-> real_escape_string($name);
            $email =$this->connect() -> real_escape_string($email);
            $profile_path =$this->connect() -> real_escape_string($profile_path);

            $sql="INSERT INTO admin(a_name,a_email,a_password,a_image) 
                VALUES('$name','$email','$password','$profile_path')";

                if($this->connect()->query($sql)){
                   return $_SESSION['message']='<script>alert("Sucessfully registered")</script>';
                }else{
                   return $_SESSION['message']='<script>alert("Register failed")</script>';
                }
        }
        function addOwner($name,$address,$email,$password,$contact,$profile_path){
            $name = $this->connect() -> real_escape_string($name);
            $email = $this->connect() -> real_escape_string($email);
            $profile_path = $this->connect() -> real_escape_string($profile_path);

            $sql="INSERT INTO owner(o_name,o_address,o_email,o_password,o_contact,o_profile,account_status,a_id) 
                VALUES('$name','$address','$email','$password','$contact','$profile_path','pending',6)";

                if($this->connect()->query($sql)){
                    return $_SESSION['message']='<script>alert("Sucessfully registered")</script>';
                }else{
                    return $_SESSION['message']='<script>alert("Register failed")</script>';
                }
        }
        function addCustomer($name,$address,$email,$password,$contact,$profile_path){
            $name = $this->connect() -> real_escape_string($name);
            $email = $this->connect() -> real_escape_string($email);
            $profile_path = $this->connect() -> real_escape_string($profile_path);

            $sql="INSERT INTO customer(c_name,c_address,c_email,c_password,c_contact,c_profile,account_status,a_id) 
                VALUES('$name','$address','$email','$password','$contact','$profile_path','pending',6)";

                if($this->connect()->query($sql)){
                    return $_SESSION['message']='<script>alert("Sucessfully registered")</script>';
                }else{
                     return $_SESSION['message']='<script>alert("Register failed")</script>';
                    //die($this->connect()->error);
                }
        }
    }
?>