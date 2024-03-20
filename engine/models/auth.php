<?php
    class Auth{
       public $id;
       public $name;
       public $email;
       public $profile;
       public $role; 
        function __construct($id,$name,$email,$profile) {
            $this->id=$id;
            $this->name=$name;
            $this->email=$email;
            $this->profile=$profile;
        }

        function setRole($role) {
            $this->role=$role;
        }
        function getRole(){
            return $this->role;
        }
    }

?>


