<?php
  include '../../engine/models/dbconnection.php';
  include '../../engine/models/laptop.php';
  require_once("../../sections/component.php");
?>
<div class="container-fluid">
    <div class="row px-5">
        <div class="col-md-7">
            <div class="cart">
                <h6 class="mt-1">Please pick up suitable date for Booking</h6>
                <h6 class="mt-1">Cart Laptop</h6>
                <hr>
                <?php
                    if(isset($_SESSION['cart'])&& !empty($_SESSION['cart'])){
                        $lap_id= array_column($_SESSION['cart'],'lap_id');
                        $row= new laptop();
                        $datas=$row->getAllLaptop();
                        foreach($datas as $data){
                            foreach($lap_id as $id){
                                if($data['lap_id']==$id){
                                    cartElement($data['lap_name'],"../../".$data['lap_image'],300,$data['lap_id'],$data['o_id']);
                                }
                            } 
                        }
                    }else{
                        echo "<h5>Cart is empty</h5>";
                    }
                ?>
            </div>
        </div>
        <div class="col-md-4 offset-md-1 border rounded shadow mt-5 bg-white">
            <div class="pt-4">
                <h6>Price details</h6>
                <hr>
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <?php
                            if(isset($_SESSION['cart'])){
                                $count=count($_SESSION['cart']);
                                if(isset($_SESSION['total'])){
                                        ?>
                                        <?php 
                                        foreach ($_SESSION['total'] as $data){
                                        ?>
                                            <h6><label>Starting Date: </label> <?php echo $data['booking_date'];?></h6><br>
                                            <h6><label>Ending Date:</label> <?php echo $data['end_date'];?></label></h6><br><br>
                                            <h6><label>Total days: </label><?php echo $data['days'];?></h6><br>
                                            <h6><label>Total: </label><?php echo $data['total'];?></h6>
                                        <?php
                                        }
                                }else{
                                    ?>
                                    <h6><label>Starting Date: </label></h6><br>
                                    <h6><label>Ending Date:</label></h6><br>
                                    <h6><label>Total days: </label></h6><br>
                                    <h6><label>Total: </label></h6>
                                    <?php
                                }
                            
                            }else{
                                echo "<h6>Not added to booking</h6>";
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
