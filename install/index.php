<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    
    // Create database
    $sql = "CREATE DATABASE IF NOT EXISTS Laptop";
    if ($conn->query($sql) === TRUE) {
        $conn= new mysqli($servername, $username, $password,"Laptop"); 
    }else{
        die("Error creating database: " . $conn->error);
    }  
    echo   "<br/>Creating table admin";
    
    $sql = "CREATE TABLE IF NOT EXISTS admin(
        a_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        a_name VARCHAR(30) NOT NULL,
        a_image VARCHAR(225) NOT NULL,
        a_email VARCHAR(30) NOT NULL,
        a_password VARCHAR(30) NOT NULL
        )";
    echo $sql;
    if($conn->query($sql)===TRUE) {
        echo "Tablecreated sucessfully";
    } else{
        echo "<b>Error creating table: '.$conn->error.'</b>";
    }

    echo   "<br/>Creating table user";
    $sql= "CREATE TABLE IF NOT EXISTS customer(
        c_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		c_name VARCHAR(30) NOT NULL,
		c_address VARCHAR(30) NOT NULL,
        c_contact VARCHAR(10) NOT NULL,
        c_profile VARCHAR(225) NOT NULL,
        c_email VARCHAR(30) NOT NULL,
        c_password VARCHAR(30) NOT NULL,
        account_status boolean,
        a_id int(11) UNSIGNED,
        FOREIGN KEY(a_id) REFERENCES admin(a_id) ON UPDATE CASCADE ON DELETE CASCADE
    )";
    echo $sql;
    if($conn->query($sql)===TRUE) {
        echo "Table created sucessfully";
    } else{
        echo "<b>Error creating table: '.$conn->error.'</b>";
    }

    echo   "<br/>Creating table customer credential";
    $sql= "CREATE TABLE IF NOT EXISTS customer_credential(
        credential_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		credential_name VARCHAR(30) NOT NULL,
		front_side VARCHAR(225) NOT NULL,
        back_side VARCHAR(225) NOT NULL,
        c_id int(11) UNSIGNED,
        FOREIGN KEY(c_id) REFERENCES customer(c_id) ON DELETE CASCADE ON UPDATE CASCADE
    )";
    echo $sql;
    if($conn->query($sql)===TRUE) {
        echo "Table created sucessfully";
    } else{
        echo "<b>Error creating table: '.$conn->error.'</b>";
    }

    echo "<br/> Creating table Owner";
    $sql= "CREATE TABLE IF NOT EXISTS owner(
        o_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		o_name VARCHAR(30) NOT NULL,
		o_address VARCHAR(30) NOT NULL,
        o_contact VARCHAR(10) NOT NULL,
        o_profile VARCHAR(225) NOT NULL,
        o_email VARCHAR(30) NOT NULL,
        o_password VARCHAR(10) NOT NULL,
        account_status boolean,
        a_id INT(11) UNSIGNED,
        FOREIGN KEY(a_id) REFERENCES admin(a_id)
    )";
    echo $sql;
    if($conn->query($sql)===TRUE) {
        echo "Table created sucessfully";
    } else{
        echo "<b>Error creating table: '.$conn->error.'</b>";
    }

    echo "<br/> Creating table laptop";
    $sql= "CREATE TABLE IF NOT EXISTS laptop(
        lap_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		lap_name VARCHAR(30) NOT NULL,
		lap_descrip VARCHAR(30) NOT NULL,
        lap_model VARCHAR(40) NOT NULL,
        lap_brand VARCHAR(30) NOT NULL,
        lap_color VARCHAR(30) NOT NULL,
        lap_ssd VARCHAR(10) NOT NULL,
        lap_ram VARCHAR(10) NOT NULL,
        lap_speed VARCHAR(10) NOT NULL,
        lap_image VARCHAR(225) NOT NULL,
        o_id int(11) UNSIGNED,
        FOREIGN KEY(o_id) REFERENCES owner(o_id),
        lap_status VARCHAR(20)
    )";
    echo $sql;
    if($conn->query($sql)===TRUE) {
        echo "Table created sucessfully";
    } else{
        echo "<b>Error creating table: '.$conn->error.'</b>";
    }

    echo "<br/>Creating table owner credential";
    $sql="CREATE TABLE IF NOT EXISTS owner_credential(
        credential_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		credential_name VARCHAR(30) NOT NULL,
		front_side VARCHAR(225) NOT NULL,
        back_side VARCHAR(225) NOT NULL,
        o_id int(11) UNSIGNED,
        FOREIGN KEY(o_id) REFERENCES owner(o_id)
    )";
    echo $sql;
    if($conn->query($sql)===TRUE) {
        echo "Table created sucessfully";
    }else {
        echo "<b>Error creating table: '.$conn->error.'</b>";
    }

    echo "<br/> Creating table rental";
    $sql= "CREATE TABLE IF NOT EXISTS rental(
        rental_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		rental_date DATE NOT NULL,
        return_date DATE NOT NULL,
        o_id int(11) UNSIGNED,
        lap_id int(11) UNSIGNED,
        c_id int(11) UNSIGNED,
        FOREIGN KEY(o_id) REFERENCES owner(o_id),
        FOREIGN KEY(lap_id) REFERENCES laptop(lap_id),
        FOREIGN KEY(c_id) REFERENCES customer(c_id),
        rental_status varchar(15),
        payment int(11),
        days int(11)
    )";
    echo $sql;
    if($conn->query($sql)===TRUE) {
        echo "Table created sucessfully";
    } else{
        echo "<b>Error creating table: '.$conn->error.'</b>";
    }

    echo "<br/> Creating table Payment";
    $sql= "CREATE TABLE IF NOT EXISTS payment(
        payment_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		rental_id INT(11) UNSIGNED,
        first_installment INT(10) NOT NULL,
        first_payment_date DATE,
        add_charge INT(10),
        last_installment INT(10) NOT NULL,
        last_payment_date DATE,
        total int(10),
        FOREIGN KEY(rental_id) REFERENCES rental(rental_id)
    )";
    echo $sql;
    if($conn->query($sql)===TRUE) {
        echo "Table created sucessfully";
    } else{
        echo "<b>Error creating table: '.$conn->error.'</b>";
    }
     
    $sql= "INSERT INTO  "
    
?>