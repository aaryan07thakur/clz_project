<?php
    include_once ('../../engine/models/dbconnection.php');
    include '../../engine/models/laptop.php';
?>

<div class="d-flex justify-content-between mb-3 bg-info">
    <div class="pt-2"><span class="text-white ml-3">Laptops</span></div>
    <div class="pt-1"><a href="index.php?m=laptop&p=add" class="btn btn-light rounded-pill mb-1 mr-1" role="button">+ Add</a> </div>   
</div>
<div class="table-responsive">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>SN</th>
          <th>Name</th>
          <th>Brand</th>
          <th>Modal</th>
          <th>Processor</th>
          <th>Color</th>
          <th>SSD</th>
          <th>RAM</th>
          <th>Speed</th>
          <th>Laptop Image</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $id=$_SESSION['auth']->id;
        $laptop= new laptop();
        $data=$laptop->getAll($id);
        if(!empty($data)){
            $counter=1;
            foreach($data as $lap){ ?>
            <tr>
                <td><?php echo $counter++;?></td>
                <td><?php echo $lap['lap_name'];?></td>
                <td><?php echo $lap['lap_brand'];?></td>
                <td><?php echo $lap['lap_model'];?></td>
                <td><?php echo $lap['processor'];?></td>
                <td><?php echo $lap['lap_color'];?></td>
                <td><?php echo $lap['lap_ssd'];?></td>
                <td><?php echo $lap['lap_ram'];?></td>
                <td><?php echo $lap['lap_speed'];?></td>
                <td><img src="../../<?php echo $lap['lap_image'];?>" class="mx-auto d-block" heigth="100" width="100" alt="image"></td>
                <td><?php echo $lap['lap_status'];?></td>
                <td><a href="index.php?m=laptop&p=edit&id=<?php echo $lap['lap_id']?>" class="btn btn-info rounded-pill mb-1 mr-1" role="button">Edit</a> | 
                <a href="index.php?m=laptop&p=delete&id=<?php echo $lap['lap_id']?>" class="btn btn-danger rounded-pill mb-1 mr-1" role="button">Delete</a> </td>
            </tr>
            <?php }
        }else {
            ?>
            <tr>
                <td colspan="12" align="center">No data availabe</td>
            </tr>
            <?php
        }
        ?>
      </tbody>
    </table>
</div>