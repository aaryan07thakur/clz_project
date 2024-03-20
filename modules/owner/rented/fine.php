<?php
    require_once ('../../engine/models/dbconnection.php');
    require_once('../../engine/models/payment.php');

    $date=  date('Y-m-d');
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $date=date('Y-m-d');
        $payment=new payment();
        $getPayment= $payment->getFine($id);
        
        foreach($getPayment as $data){
            $return_date=$data['return_date'];
            $total= $data['payment'];
            $last_install=$data['last_installment'];
            $first_install=$data['first_installment'];
        }

        $day=(strtotime($date)-strtotime($return_date))/(24*60*60)."<br>";
        echo $day;

        if($day > 3){
            $fine=0.1*$total;
            $last_install=$last_install+$fine;
            $fine= $payment->updateFine($id,$fine,$last_install);
            echo $last_install;
            if($fine== true){
                $browse_page="m=rented";
		        header("Location: ".$_SERVER['PHP_SELF']."?".$browse_page);
            }
        }else{
            $fine=0;
            $fine= $payment->updateFine($id,$fine,$last_install,$total);
            if($fine== true){
                $browse_page="m=rented";
		        header("Location: ".$_SERVER['PHP_SELF']."?".$browse_page);
            }
        }
    }

?>