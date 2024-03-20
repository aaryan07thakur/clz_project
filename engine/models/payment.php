<?php
    class payment extends dbh{
        public function getRentedDetail($id){
            $sql="SELECT rental_id,rental_date,return_date,rental_status,payment,days,lap_name,c_name, laptop.lap_id FROM laptop 
            Inner Join rental on 
            laptop.lap_id=rental.lap_id
            Inner Join customer on
            customer.c_id=rental.c_id
            Where rental.rental_id=$id
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
        public function insertPayment($id,$first_installment,$last_installment,$total){
            $sql="INSERT INTO payment(rental_id,first_installment,last_installment,total,status)
            values($id,$first_installment,$last_installment,$total,'pending')";

            if($this->connect()->query($sql)===true){

            }else{
                die($this->connect()->error);
            }
        }
        public function getPayment($status){
            $sql="SELECT * from payment
            INNER JOIN rental on payment.rental_id=rental.rental_id
            INNER JOIN customer on customer.c_id=rental.c_id
            WHERE payment.status='pending'
            ";
            $result=$this->connect()->query($sql);
            $nums=$result->num_rows;
            if($nums>0){
                while($row=$result->fetch_assoc()){
                    $datas[]=$row;
                }
                return $datas;
            }
        }
        public function firstReceived($id,$date){
            $sql="UPDATE  payment
            SET first_payment_date='$date'
            WHERE rental_id=$id";
            
            $result=$this->connect()->query($sql);
            return $result;
        }
        public function secondReceived($id,$date,$total){
            $sql="UPDATE  payment
            SET last_payment_date='$date', status='received', total=$total
            WHERE rental_id=$id";
            
            $result=$this->connect()->query($sql);
            return $result;
        }
        public function getFine($id){
            $sql="SELECT * from rental
            INNER JOIN payment on rental.rental_id=payment.rental_id
            where rental.rental_id=$id;
            ";
            $result=$this->connect()->query($sql);
            $nums=$result->num_rows;
            if($nums>0){
                while($row=$result->fetch_assoc()){
                    $data[]= $row;
                }
                return $data;
            }
        }
        public function updateFine($id,$fine,$last_install){
            $sql="UPDATE payment 
            SET add_charge=$fine, last_installment=$last_install 
            WHERE rental_id=$id";

            $result=$this->connect()->query($sql);

            return $result;
        } 
        function laptopStatus($lap_id){
            $sql="UPDATE laptop
            set lap_status='available'
            where lap_id=$lap_id
            ";
            $result=$this->connect()->query($sql);
            return $result;
        }

        public function totalEarned($id){
            $sql="SELECT sum(total) as total FROM payment
            INNER JOIN rental on rental.rental_id=payment.rental_id
            WHERE o_id=$id
            ";
            $result=$this->connect()->query($sql);
            $nums=$result->num_rows;
            if($nums>0){
                while($row=$result->fetch_assoc()){
                    $data = $row['total'];
                }
                return $data;
            }
        }
    }
?>