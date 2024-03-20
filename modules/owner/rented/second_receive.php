<?php
    require_once ('../../engine/models/dbconnection.php');
    require_once('../../engine/models/payment.php');

    $date=  date('Y-m-d');
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $payment=new payment();
        $fine=$payment->getFine($id);
        foreach($fine as $data){
            $lap_id= $data['lap_id'];
            $last_install=$data['last_installment'];
            $first_install=$data['first_installment'];
        }
        
        $total=$first_install+$last_install;
        $secondPayment=$payment->secondReceived($id,$date,$total);
        
        if($secondPayment== true){
            $update=$payment->laptopStatus($lap_id);
            $mess="Last installment received is Received";
            $browse_page="m=rented&message=$mess";
		    header("Location: ".$_SERVER['PHP_SELF']."?".$browse_page);
        }else{
            echo $secondPayment;
        }
    }

?>