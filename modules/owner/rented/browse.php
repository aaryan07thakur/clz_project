<?php
    require_once ('../../engine/models/dbconnection.php');
    require_once('../../engine/models/payment.php');

    

?>
<div class="container-fluid table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>SN</th>
                <th>Customer Name</th>
                <th>1 Installment</th>
                <th>Payment Date</th>
                <th>Fine</th>
                <th>2 Installment</th>
                <th>Payment Date</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $payment= new payment();
            $paymentDetail=$payment->getPayment('pending');
            if(!empty($paymentDetail)){
                $counter=1;
                foreach($paymentDetail as $data){ 
                    ?>
                        <tr>
                                    <td><?php echo $counter++;?></td> 
                                    <td><?php echo $data['c_name']?></td>
                                    <td><?php echo $data['first_installment']?></td>
                                    <td><?php echo $data['first_payment_date']?></td>
                                    <td><?php echo $data['add_charge']?></td>
                                    <td><?php echo $data['last_installment']?></td>
                                    <td><?php echo $data['last_payment_date']?></td>
                                    <td><?php echo $data['total']?></td>
                                    <td><a href="index.php?m=rented&p=first_receive&id=<?php echo $data['rental_id']?>" class="btn btn-info rounded-pill mb-1 mr-1" name='first' role="button">1 R</a>|
                                    <a href="index.php?m=rented&p=second_receive&id=<?php echo $data['rental_id']?>" class="btn btn-info rounded-pill mb-1 mr-1" name="second" role="button">2 R</a>|
                                    <a href="index.php?m=rented&p=fine&id=<?php echo $data['rental_id']?>" class="btn btn-info rounded mb-1 mr-1" name="fine" role="button">Fine</a></td>
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