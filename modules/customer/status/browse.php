<?php
    require_once ('../../engine/models/dbconnection.php');
    require_once('../../engine/models/rentDetail.php');


    $book= new rentDetail();

    $c_id=$_SESSION['auth']->id;
    $detail=$book->getDetails($c_id);

?>
<div class="">
    <div class="d-flex justify-content-between  mb-3 bg-info">
        <div class="pt-2"><span class="text-white ml-3">Booking status</span></div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>SN</th>
                    <th>Rented Date</th>
                    <th>Return Date</th>
                    <th>Laptop Name</th>
                    <th>Total Days</th>
                    <th>Charge</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if(!empty($detail)){
                    $counter=1;
                    foreach($detail as $data){
                    ?>
                        <tr>
                            <td><?php echo $counter++;?></td> 
                            <td><?php echo $data['rental_date']?></td>
                            <td><?php echo $data['return_date']?></td>
                            <td><?php echo $data['lap_name']?></td>
                            <td><?php echo $data['days']?></td>
                            <td><?php echo $data['payment']?></td>
                            <td><?php echo $data['rental_status']?></td>
                        </tr> <?php
                    }
                }else {
                    ?>
                    <tr>
                        <td colspan="11" align="center">No data availabe</td>
                    </tr>
                    <?php
                }
                ?>
            <tbody>
        </table>
    </div>
</div>         