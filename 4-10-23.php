<?php

// connetion to database

// $con = new mysqli($host = "localhost" , $user = "root" , $password = "", $db = "db3");
// if ($con->connect_error){
//     echo "error";
// }
// else{
//     $db = "CREATE TABLE `tbl11`(`id` int primary key auto_increment ,name varchar(50))";
//     if ($con->query($db)){
//         echo "done";
//     }
// }


$host="localhost";
$user="root";
$password="";
$db="database2";

$conn= new mysqli($host,$user,$password,$db);
// if($conn->connect_error){
//     echo "error";
// }
// else{
//     // echo "connection ok";
//     $db="CREATE DATABASE `database2`";
// }


$sql="CREATE TABLE `table1`(`id` INT NOT NULL primary key auto_increment, `name` varchar(30), `mobile_no` bigint(10), `email` varchar(30), `date_of_birth` date, `gender` varchar(30), `joining` date, `role` varchar(30), `salary` int(10) )";

if ($conn->query($sql)){
      echo "table created";
}

?>