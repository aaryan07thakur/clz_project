<?php
    include 'dbconnection.php';
    include 'getUsers.php';
?>
<?php
    $row= new user();
    // $admin=$row->getAdmin();
    // foreach($admin as $data){
    //     echo $data['a_id'];
    //     echo $data['a_name']; 
    // }

    $admin=$row->getOwner($o_email="devraj@gmail.com", $o_password="123456");
    foreach($admin as $data){
        echo $data['o_id'];
        echo $data['o_name']; 
    }

    $admin=$row->getCustomer();
    foreach($admin as $data){
        echo $data['a_id'];
        echo $data['a_name']; 
    }
?>