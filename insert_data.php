<?php
$conn = new mysqli("localhost" ,"root","","database");

if($conn->connect_error){
 echo "connection error";
}
else{
    $sql= $conn->prepare("INSERT INTO `reg_table` (name, user_name, mobile_no, password, category, gender, s_question, s_answer, date_of_birth) VALUES (?,?,?,?,?,?,?,?,?) ");
    $sql->bind_param("ssssssssd"$name,$userName,$mobileNo,$Cpassword,$category,$gender,$question,$answer,$dob);
    $sql->execute();
    $sql->close();
    $conn->close();
    echo "data inserted";
}

?>