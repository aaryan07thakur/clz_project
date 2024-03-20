<?php
    class credential extends dbh{
        public function getOwnerCredential($id){
            $sql= "SELECT * FROM owner_credential
            WHERE o_id=$id";
            $result=$this->connect()->query($sql);
            if($result->num_rows > 0){
            while($row = $result->fetch_assoc()) {
                $data[]=$row;
            }
            return $data;
        }
        }
        public function addOwnerCredential($credential_name,$front_path,$back_path,$o_id){
            $credential_name = $this->connect() -> real_escape_string($credential_name);
            $front_path = $this->connect() -> real_escape_string($front_path);
            $back_path = $this->connect() -> real_escape_string($back_path);

            $sql="INSERT INTO owner_credential(credential_name,front_side,back_side,o_id) 
            VALUES('$credential_name','$front_path','$back_path',$o_id)";

            if($this->connect()->query($sql)){
                $_SESSION['message']='<script>alert("Sucessfully Added")</script>';
            }else{
                $_SESSION['message']='<script>alert("Register failed")</script>';
            }
        }
        public function deleteOwnerCredential($id){
            $sql = "DELETE FROM owner_credential where credential_id=$id";
	        $result = $this->connect()->query($sql);
            return $result;
        }
        public function getCustomerCredential($id){
            $sql= "SELECT * FROM customer_credential
            WHERE c_id=$id";
            $result=$this->connect()->query($sql);
            if($result->num_rows > 0){
            while($row = $result->fetch_assoc()) {
                $data[]=$row;
            }
            return $data;
        }
        }
        public function addCustomerCredential($credential_name,$front_path,$back_path,$c_id){
            $credential_name = $this->connect() -> real_escape_string($credential_name);
            $front_path = $this->connect() -> real_escape_string($front_path);
            $back_path = $this->connect() -> real_escape_string($back_path);

            $sql="INSERT INTO customer_credential(credential_name,front_side,back_side,c_id) 
            VALUES('$credential_name','$front_path','$back_path',$c_id)";

            if($this->connect()->query($sql)){
                $_SESSION['message']='<script>alert("Sucessfully Added")</script>';
            }else{
                $_SESSION['message']='<script>alert("Register failed")</script>';
            }
        }
        public function deleteCustomerCredential($id){
            $sql = "DELETE FROM customer_credential where credential_id=$id";
	        $result = $this->connect()->query($sql);
            return $result;
        }
    }
?>