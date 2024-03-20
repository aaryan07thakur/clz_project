<?php
    require_once ('../../engine/models/dbconnection.php');
    require_once('../../engine/models/payment.php');

    $date=  date('Y-m-d');
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        
        $payment=new payment();
        $firstPayment=$payment->firstReceived($id,$date);

        if($firstPayment== true){
            $mess="First Payment is Received";
            $browse_page="m=rented&message=$mess";
		    header("Location: ".$_SERVER['PHP_SELF']."?".$browse_page);
        }else{
            echo $firstPayment;
        }

    }

?>