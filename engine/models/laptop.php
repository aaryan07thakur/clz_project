<?php
    class laptop extends dbh{
        public function getAll($id) {
            $sql="SELECT * from laptop
            WHERE o_id=$id";
            $result=$this->connect()->query($sql);
            $nums=$result->num_rows;
            if($nums>0){
                while($row=$result->fetch_assoc()){
                    $data[]=$row;
                }
                return $data;
            }
        }
        // public function getAllLaptop() {
        //     $sql="SELECT * from laptop";
        //     $result=$this->connect()->query($sql);
        //     $nums=$result->num_rows;
        //     if($nums>0){
        //         while($row=$result->fetch_assoc()){
        //             $data[]=$row;
        //         }
        //         return $data;
        //     }
        // }


        //from here  algorithm merg sort
                  public function getAllLaptop() {
                $sql = "SELECT * FROM laptop";
                $result = $this->connect()->query($sql);
        
                $data = [];
        
                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $data[] = $row;
                    }
                }
        
                // Sort the data using merge sort
                $sortedData = $this->mergeSort($data);
        
                return $sortedData;
            }
        
            public function mergeSort($arr) {
                $length = count($arr);
        
                if ($length <= 1) {
                    return $arr;
                }
        
                $middle = (int)($length / 2);
                $left = array_slice($arr, 0, $middle);
                $right = array_slice($arr, $middle);
        
                $left = $this->mergeSort($left);
                $right = $this->mergeSort($right);
        
                return $this->merge($left, $right);
            }
        
            private function merge($left, $right) {
                $result = [];
                while (count($left) > 0 && count($right) > 0) {
                    $compare = $this->compareLaptops($left[0], $right[0]);
        
                    if ($compare >= 0) {
                        $result[] = array_shift($left);
                    } else {
                        $result[] = array_shift($right);
                    }
                }
        
                return array_merge($result, $left, $right);
            }
        
            private function compareLaptops($laptop1, $laptop2) {
                // Compare laptops based on RAM, speed, and SSD.
                // You can define your own logic here.

                if ($laptop1['lap_ram'] != $laptop2['lap_ram']) {
                    return $laptop1['lap_ram'] - $laptop2['lap_ram'];
                }
        
            //   echo "I'm about to learn RAM --> $laptop1[lap_speed] $laptop2[lap_speed] <br>";

                if ($laptop1['lap_speed'] != $laptop2['lap_speed']) {
                    return $laptop1['lap_speed'] - $laptop2['lap_speed'];
                }
        
                return $laptop1['lap_ssd'] - $laptop2['lap_ssd'];
            }
        
        
        //to here 
 

        public function AllLaptop($lap_id) {
            $sql="SELECT * from laptop
            WHERE lap_id=$lap_id";
            $result=$this->connect()->query($sql);
            $nums=$result->num_rows;
            if($nums>0){
                while($row=$result->fetch_assoc()){
                    $data[]=$row;
                }
                return $data;
            }
        }
        public function countLaptop($o_id) {
            $sql="SELECT count(o_id) as total from laptop
            WHERE o_id=$o_id";
            $result=$this->connect()->query($sql);
            $nums=$result->num_rows;
            if($nums>0){
                while($row=$result->fetch_assoc()){
                    $data = $row['total'];
                }
                return $data;
            }

        }

        public function edit($id){
            $sql = "SELECT * FROM laptop where lap_id=".$id;
		    $result = $this->connect()->query($sql);

            if ($result->num_rows > 0) {
            // output data of each row
            return $data[] = $result->fetch_assoc();
            }else{
                echo $this->connect()->error;
            }
        }
        public function update($name,$brand,$model,$color,$ssd,$ram,$speed,$image_path,$id) {
            $sql = "UPDATE laptop set lap_name = '$name',lap_brand='$brand',lap_model='$model', lap_color='$color',lap_ssd='$ssd',lap_ram= '$ram',lap_speed='$speed',lap_image='$image_path' where lap_id=$id";
            if($this->connect()->query($sql) === TRUE) {
            echo "Updated successfully";
            $message="updated successfully";
            $browse_page="m=laptop&message=$message";
            header("Location: ".$_SERVER['PHP_SELF']."?".$browse_page);
            } else {
            echo "<font color=red>Error: " . $sql . "<br>" . $conn->error."</br>";
            }
        }

        public function delete($id){
            $sql = "DELETE FROM laptop where lap_id=$id";
	        $result = $this->connect()->query($sql);
            return $result;
        }

        public function add($lap_name,$brand,$processor,$model,$color,$ssd,$ram,$speed,$desc,$lapimage_path,$o_id){   
            $lap_name = $this->connect() -> real_escape_string($lap_name);
            $processor = $this->connect() -> real_escape_string($processor);
            $brand = $this->connect() -> real_escape_string($brand);
            $model = $this->connect() -> real_escape_string($model);
            $color = $this->connect() -> real_escape_string($color);
            $ssd = $this->connect() -> real_escape_string($ssd);
            $ram = $this->connect() -> real_escape_string($ram);
            $speed = $this->connect() -> real_escape_string($speed);
            $desc = $this->connect() -> real_escape_string($desc);
            $lapimage_path = $this->connect() -> real_escape_string($lapimage_path);
        
            $sql="INSERT INTO laptop(lap_name,lap_brand,processor,lap_model,lap_color,lap_ssd,lap_ram,lap_speed,description,lap_image,o_id,lap_status) 
                VALUES('$lap_name','$brand','$processor','$model','$color','$ssd','$ram','$speed','$desc','$lapimage_path',$o_id,'available')";
                
                if($this->connect()->query($sql)){
                    $_SESSION['message']='<script>alert("Sucessfully Added")</script>';
                }else{
                    $_SESSION['message']='<script>alert("Register failed")</script>';
                }
        }
        public function getLapName($id){
            $sql="SELECT lap_name from laptop
            WHERE o_id=$id";
            $result=$this->connect()->query($sql);
            $nums=$result->num_rows;
            if($nums>0){
                while($row=$result->fetch_assoc()){
                    $data[]=$row['lap_name'];
                }
                return $data;
            }                    
        }
    }
?>