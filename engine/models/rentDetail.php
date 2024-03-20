<?php
    class rentDetail extends dbh{
        public function getDetails($c_id){
            $sql="SELECT rental_date,return_date,rental_status,payment,days,lap_name 
            FROM rental 
            Inner Join laptop on 
            rental.lap_id=laptop.lap_id 
            where c_id=$c_id";
            
            $result=$this->connect()->query($sql);
            $nums=$result->num_rows;
            if($nums>0){
                while($row=$result->fetch_assoc()){
                    $data[]=$row;
                }
                return $data;
            }
        }
        public function getRentedDetail($id,$status){
            $sql="SELECT rental_id,rental_date,return_date,rental_status,payment,days,lap_name,c_name, laptop.lap_id FROM laptop 
            Inner Join rental on 
            laptop.lap_id=rental.lap_id
            Inner Join customer on
            customer.c_id=rental.c_id
            Where rental.o_id=$id && rental.rental_status='$status';
            ";
            
            $result=$this->connect()->query($sql);
            $nums=$result->num_rows;
            if($nums>0){
                while($row=$result->fetch_assoc()){
                    $data[]=$row;
                }
                return $data;
            }
        }
        public function acceptRent($id){
            $sql="UPDATE rental
               SET rental_status='approved'
               where rental_id=$id;
            ";

            $result= $this->connect()->query($sql);

            return $result;

        }

        public function updateLaptop($lap_id){
            $sql="UPDATE laptop set lap_status='not available' where lap_id=$lap_id";

            $out= $this->connect()->query($sql);
            
            if($out === TRUE){
                return $out;
            }else{
                $this->connect()->error;
            }
            
        }

        public function insertDetails($start,$end,$lap_id,$own_id,$c_id,$lap_price,$day,$total){
            $sql="INSERT into rental(rental_date,return_date,o_id,lap_id,c_id,rental_status,payment,days) 
            Values('$start','$end',$own_id,$lap_id,$c_id,'pending',$total,$day)";
            
            if($this->connect()->query($sql)){
                echo "<script>alert('Sucessfully booked')</script>";
            }else{
                $error= $this->connect()->error;
                echo 
                "<script>alert('$error') </script>";
            }

        }
        public function reject($id){
            $sql = "DELETE FROM rental where rental_id=$id";
	        if($this->connect()->query($sql)){
                
                // echo "<script>alert('Booking rejected')</script>";
            }else{
                die($this->connect()->error);
            }
        }

    }
?>