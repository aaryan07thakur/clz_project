<?php
    require_once ('../../engine/models/dbconnection.php');
    require_once('../../engine/models/rentDetail.php');

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        if(isset($_POST['request'])){
            $start= date('Y-m-d', strtotime($_POST['start']));
            $end= date('Y-m-d', strtotime($_POST['end']));
            
            $day=(strtotime($end)-strtotime($start))/(24*60*60);
            // echo $day;
            $lap_id= $_POST['lap_id'];
            $own_id= $_POST['own_id'];
            $lap_name= $_POST['lap_name'];
            $lap_price= $_POST['lap_price'];
            $c_id= $_SESSION['auth']->id;
            
            $rent= new rentDetail();

            if($day>60){
                echo "<script>alert('You should book for maximum 2 month')</script>";
                echo "<script>window.location.href='index.php?m=cart&p=browse'</script>";
            }else{
                $total=$day*$lap_price;
                
                $_SESSION['total'][0]=array('booking_date'=>$start,'end_date'=>$end,'days'=>$day,'total'=>$total,'id'=>$lap_id);
                $count= count($_SESSION['total']);
                if($count>1){
                    echo "<script>alert(already booked)</script>";
                    echo "<script>window.location.href='index.php?m=cart&p=browse'</script>"; 
                }else{
                    $insert= $rent->insertDetails($start,$end,$lap_id,$own_id,$c_id,$lap_price,$day,$total);
                    echo "<script>window.location.href='index.php?m=cart&p=browse'</script>";
                }   
            }
        }elseif(isset($_POST['remove'])){
                foreach($_SESSION['cart'] as $key=>$value){
                    if($value["lap_id"]==$_POST['lap_id']){
                        unset($_SESSION['cart'][$key]);
                        echo "<script>alert('added to book is sucessfully removed')</script>";
                        echo "<script>window.location='index.php?m=cart&p=browse'</script>";
                    }
                }
        }
    }

?>