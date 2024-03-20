<?php
    require_once ('../../engine/models/dbconnection.php');
    require_once('../../engine/models/credential.php');
?>
<?php
    $id=$_SESSION['auth']->id;
    $credential= new credential();
    $data= $credential->getOwnerCredential($id);
?>

<div class="d-flex justify-content-between mb-3 bg-info">
    <div class="pt-2"><span class="text-white ml-3">Credentials</span></div>
    <div class="pt-1"><a href="index.php?m=credential&p=add" class="btn btn-light rounded-pill mb-1 mr-1" role="button">+ Add</a> </div>   
</div>
<div class="table-responsive">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>SN</th>
          <th>Credential Name</th>
          <th>Front-Side</th>
          <th>Back-Side</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if(!empty($data)){
            $counter=1;
            foreach($data as $lap){ ?>
            <tr>
                <td><?php echo $counter++;?></td>
                <td><?php echo $lap['credential_name'];?></td>
                <td class="text-center"><img src="<?php echo $lap['front_side'];?>"  height="100" width="150" alt="image"></td>
                <td class="text-center"><img src="<?php echo $lap['back_side'];?>" height="100" width="120" alt="image"></td>
                <td><a href="index.php?m=credential&p=delete&id=<?php echo $lap['credential_id']?>" class="btn btn-danger rounded-pill mb-1 mr-1" role="button">Delete</a> </td>
            </tr>
            <?php }
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