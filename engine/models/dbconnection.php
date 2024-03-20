<?php
    class dbh{
        private $servername;
        private $username;
        private $password;
        private $dbname;
        private $conn= null;

        protected function connect(){
            $this->servername="localhost";
            $this->username ="root";
            $this->password="";
            $this->dbname="rentlaptop";

            //create connection

            $conn= new mysqli($this->servername,$this->username,$this->password,$this->dbname);
            return $conn;
        }
    }  
?>