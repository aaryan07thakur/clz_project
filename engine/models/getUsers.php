<?php
    require_once 'auth.php';
    session_start();
    class user extends dbh{
        public function getAdmin($email,$password) {
            $sql="SELECT a_id,a_email,a_password,a_name,a_image FROM admin 
                WHERE a_email='$email' && a_password='$password';
            ";
            $result=$this->connect()->query($sql);
            $nums=$result->num_rows;
            if($nums>0){
                while($row=$result->fetch_assoc()){
                    $_SESSION['auth']= new Auth($row['a_id'],$row['a_name'],$row['a_email'],$row['a_image']);
                    $_SESSION['auth']->setRole('admin');
                }
                return $_SESSION['auth'];
            }else{
                 $_SESSION['auth']=null;
            }

        }
        public function getOwner($email,$password) {
            $sql="SELECT o_id,o_email,o_password,o_name,o_profile FROM owner 
                WHERE o_email='$email' && o_password='$password'
            ";
            $result=$this->connect()->query($sql);
            $nums=$result->num_rows;
            if($nums>0){
                while($row=$result->fetch_assoc()){
                    $_SESSION['auth']= new Auth($row['o_id'],$row['o_name'],$row['o_email'],$row['o_profile'],$row['o_address'],$row['o_contact'],$row['account_status']);
                    $_SESSION['auth']->setRole('owner');
                }
                return $_SESSION['auth'];
            }else{
                 $_SESSION['auth']=null;
            }

        }
        public function getCustomer($email,$password) {
            $sql="SELECT c_id,c_email,c_password,c_name,c_profile FROM customer 
                WHERE c_email='$email' && c_password='$password'
            ";
            $result=$this->connect()->query($sql);
            $nums=$result->num_rows;
            if($nums>0){
                while($row=$result->fetch_assoc()){
                    $_SESSION['auth']= new Auth($row['c_id'],$row['c_name'],$row['c_email'],$row['c_profile']);
                    $_SESSION['auth']->setRole('customer');
                }
                return $_SESSION['auth'];
            }else{
                 $_SESSION['auth']=null;
            }

        }
    }
?>