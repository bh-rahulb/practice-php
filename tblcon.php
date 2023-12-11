<?php

$conn = new mysqli($host = "localhost", $user = "root", $password = "", $db = "database2");


$sql = "INSERT INTO `tbl1`(`name`,`password`)VALUES ('nancy' , 'n@123')";

if ($conn->query($sql)){
    echo "successfully submitted";
}

// $sql = "CREATE TABLE `tbl1`(`id` INT PRIMARY KEY AUTO_INCREMENT, `name` varchar(45), `password` varchar(45))";
// if ($conn->query($sql)){
//     echo "create table";
// }


?>
