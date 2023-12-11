<?php
$email  =  $_POST['user_email'];
$password1 = $_POST['password'];

$conns = new mysqli($host = "localhost", $user = "root", $password = "", $database = "signupclass");
$sql = "SELECT email,password from `signuptbl1` where email = ?";
$stmt = $conns->prepare($sql);

$stmt->bind_param("s",$email);

$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows > 0){
    $row = $result->fetch_assoc();
    $spasssword =  $row["password"];

    if ($password1 == $spasssword){
        include "readtbl.php";
        $stmt->close();
        $conns->close();
    }
    else{
        echo "sorry";
    }

}
else{
    echo "user not found";
}


?>