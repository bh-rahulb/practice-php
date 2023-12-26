<?php
session_start();

$conn = new mysqli($server_name, $user_name, $db_password, $db_name);

    if($conn){
        $query= "INSERT INTO `table_first` (`f_name`, `l_name`, `email`, `password`, `city`, `state`, `gender`, `skills`, `images`, `message`) VALUES (?,?,?,?,?,?,?,?,?,?)";
        $sql=$conn->prepare($query);
        $sql->bind_param("ssssssssss", $fname, $lname, $email, $hash_password, $city, $state, $gender, $skill, $image_name, $message);
        echo 'done';
    
        if($sql->execute()){
            $_SESSION['message']='Details Summited';
        }else{
            echo "Error : ";
        }
        $sql->close();
    
        header('location:1-signup.php');
        exit();
    }else{
        echo "Connection Eror: " . $conn->connect_error;
    }

$conn->close();

?>