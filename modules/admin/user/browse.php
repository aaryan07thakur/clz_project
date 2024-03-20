<?php
     require_once ('../../engine/models/dbconnection.php');
     require_once('../../engine/models/user.php');
     $user= new user();
?>
<div class="mb-3">
  <div class="d-flex justify-content-between  mb-3 bg-info">
      <div class="pt-2"><span class="text-white ml-3">Owner</span></div>   
  </div>
  <div class="table-responsive">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>SN</th>
          <th>Name</th>
          <th>Address</th>
          <th>Contact</th>
          <th>Email</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $owner=$user->getOwner('approve');
        if(!empty($owner)){
            $counter=1;
            foreach($owner as $data){ 
                ?>
                    <tr>
                        <td><?php echo $counter++;?></td>
                        <td><?php echo $data['o_name']?></td>
                        <td><?php echo $data['o_address']?></td>
                        <td><?php echo $data['o_contact']?></td>
                        <td><?php echo $data['o_email']?></td>
                        <td><?php echo $data['account_status']?></td>
                        <td><a href="index.php?m=user&p=deleteOwner&id=<?php echo $data['o_id']?>" class="btn btn-info rounded-pill mb-1 mr-1" role="button">Delete</a></td>
                    </tr>    
                    <?php 
            }
        }else {
            ?>
            <tr>
                <td colspan="11" align="center">No data availabe</td>
            </tr>
            <?php
        }
        ?>
      </tbody>
    </table>
  </div>
</div>

<div class="mb-3">
  <div class="d-flex justify-content-between  mb-3 bg-info">
      <div class="pt-2"><span class="text-white ml-3">Customer</span></div>   
  </div>
  <div class="table-responsive">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>SN</th>
          <th>Name</th>
          <th>Address</th>
          <th>Contact</th>
          <th>Email</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $customer=$user->getCustomer('approve');
        if(!empty($customer)){
            $counter=1;
            foreach($customer as $data){
                ?>
                <tr>
                  <td><?php echo $counter++;?></td>
                  <td><?php echo $data['c_name']?></td>
                  <td><?php echo $data['c_address']?></td>
                  <td><?php echo $data['c_contact']?></td>
                  <td><?php echo $data['c_email']?></td>
                  <td><?php echo $data['account_status']?></td>
                  <td><a href="index.php?m=user&p=deleteCust&id=<?php echo $data['c_id']?>" class="btn btn-info rounded-pill mb-1 mr-1" role="button">Delete</a> </td>
                </tr>    
              <?php 
            }
        }else {
            ?>
            <tr>
                <td colspan="11" align="center">No data availabe</td>
            </tr>
            <?php
        }
        ?>
      </tbody>
    </table>
  </div>
</div>