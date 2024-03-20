<?php
    require_once ('../../engine/models/dbconnection.php');
    require_once('../../engine/models/rentDetail.php');
    require_once('../../engine/models/payment.php');

    
    $book= new rentDetail();
    $payment = new payment();
    if(isset($_GET['id'],$_GET['lap_id'])){
        $id=$_GET['id'];
        $lap_id=$_GET['lap_id'];
        $accept=$book->acceptRent($id);
            $getDetail= $payment->getRentedDetail($id);
            foreach($getDetail as $data){
                  $total=$data['payment'];
            }
            $first_installment=$total/2;
            $last_installment=$total-$first_installment;
            if ($accept === TRUE) {
            $update= $book->updateLaptop($lap_id);
            $insertPayment=$payment->insertPayment($id,$first_installment,$last_installment,$total);
            if($update === TRUE){
                  $message="Accepted";
                  $browse_page="m=lap_rented&message=$message";
                  header("Location: ".$_SERVER['PHP_SELF']."?".$browse_page);
            }else{
                  echo 'abc';
            }
            
            } else {
            $message="Error Accepting";
            $browse_page="m=lap_rented&message=$message";
            header("Location: ".$_SERVER['PHP_SELF']."?".$browse_page);
      }
    }else{
            $message="Invalid Request !!!";
            $browse_page="m=lap_rented&message=$message";
            header("Location: ".$_SERVER['PHP_SELF']."?".$browse_page);
      }
    
?>