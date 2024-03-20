<?php
    require_once ('../../engine/models/dbconnection.php');
    require_once('../../engine/models/rentDetail.php');
?>
<div class="h-75">
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
                    <th>Customer Name</th>
                    <th>Total Days</th>
                    <th>Charge</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $book= new rentDetail();
                    $id=$_SESSION['auth']->id;
                    $datas=$book->getRentedDetail($id,'pending');
                    if(!empty($datas)){
                        $counter=1;
                        foreach($datas as $data){
                        ?>
                            <tr>
                                <td><?php echo $counter++;?></td> 
                                <td><?php echo $data['rental_date']?></td>
                                <td><?php echo $data['return_date']?></td>
                                <td><?php echo $data['lap_name']?></td>
                                <td><?php echo $data['c_name']?></td>
                                <td><?php echo $data['days']?></td>
                                <td><?php echo $data['payment']?></td>
                                <td><?php echo $data['rental_status']?></td>
                                <td><a href="index.php?m=lap_rented&p=approve&id=<?php echo $data['rental_id']?>&lap_id=<?php echo $data['lap_id']?>" class="btn btn-info rounded-pill mb-1 mr-1" role="button">Accept</a> | 
                                <a href="index.php?m=lap_rented&p=reject&id=<?php echo $data['rental_id']?>" class="btn btn-danger rounded-pill mb-1 mr-1" role="button">Reject</a>
                                </td>
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