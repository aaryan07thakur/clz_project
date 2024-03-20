<?php
    class updateUser extends dbh{
        public function changePassword($password,$id,$role){
            if($role=='owner'){
                $sql="UPDATE owner
                SET o_password=$password 
                WHERE o_id=$id";

                $result=$this->connect()->query($sql);
                if($result==true){
                    echo "sucessfully updated";
                }else{
                    die($this->connect()->error);
                }
            }elseif($role=='customer'){
                $sql="UPDATE customer
                SET c_password=$password 
                WHERE c_id=$id";

                $result=$this->connect()->query($sql);
                if($result==true){
                    echo "sucessfully updated";
                }else{
                    die($this->connect()->error);
                }
            }else{
                $sql="UPDATE admin
                SET a_password=$password 
                WHERE a_id=$id";

                $result=$this->connect()->query($sql);
                if($result==true){
                    echo "sucessfully updated";
                }else{
                    die($this->connect()->error);
                }
            }  
        }
        public function getProfile($role,$id){
            if($role=='owner'){
                $sql="SELECT * FROM owner 
                WHERE o_id=$id";

                $result=$this->connect()->query($sql);
                $nums=$result->num_rows;
                if($nums>0){
                    while($row=$result->fetch_assoc()){  
                        return $row;
                    }
                }
            }else{
                $sql="SELECT * FROM  customer 
                WHERE c_id=$id";

                $result=$this->connect()->query($sql);
                $nums=$result->num_rows;
                if($nums>0){
                    while($row=$result->fetch_assoc()){
                        return $row;   
                    }
                }
            }
        }
        public function updateProfile($role,$id,$name,$address,$contact){
            if($role=='owner'){
                echo $name."".$id;
                $sql = "UPDATE owner SET o_name='$name',o_address='$address', o_contact=$contact  WHERE o_id=$id";

                $result=$this->connect()->query($sql);
                return $result;
            }else{
                $sql="UPDATE customer
                SET c_name= '$name', c_address='$address', c_contact=$contact 
                WHERE c_id=$id";
                
                $result=$this->connect()->query($sql);
                return $result;
            }
        }
    }
?>