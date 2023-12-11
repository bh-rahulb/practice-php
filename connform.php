<?php
$name = $_POST['nm'];
$email = $_POST['em'];
$tel = $_POST['tel'];


$con = new mysqli($host = "localhost" , $user = "root", $password = "", $database = "db3");

if($con->connect_error){
    echo "error";
}
else{
    $stmt =$con->prepare("INSERT INTO `tbl1`(name,email,tel)VALUES(?,?,?)");
    $stmt->bind_param("sss",$name,$email,$tel);
    $stmt->execute();
    $stmt->close();
    $con->close();
    echo "done";
}


?>