<?php
session_start();

$server_name="localhost";
$user_name="root";
$db_password="root";
$db_name="db_first";

$conn = new mysqli($server_name, $user_name, $db_password, $db_name);

if(isset($_SESSION['f_name'])){
    if($conn){

        $query= "SELECT * FROM table_first WHERE email = ?";
        $sql=$conn->prepare($query);
        $sql->bind_param('s', $_SESSION['email']);
        if($sql->execute()){
            $result=$sql->get_result();
            $row=$result->fetch_assoc();
        }else{
            echo "Error : ";
        }
        $sql->close();


        if ($_SESSION['email']===$row['email']) {
            $google_err='user registred already';
            $_SESSION['google_err']= $google_err;
            header('location:1-signup.php');
            exit();
        }else{
            $query= "INSERT INTO `table_first` (`f_name`, `l_name`, `email`, `images`) VALUES (?,?,?,?)";
            $sql=$conn->prepare($query);
            $sql->bind_param("ssss", $_SESSION['f_name'], $_SESSION['l_name'], $_SESSION['email'], $_SESSION['profile']);
            echo 'done';

            if($sql->execute()){
                $_SESSION['message']='Details Summited';
            }else{
                echo "Error : ";
            }
            $sql->close();
        
            header('location:1-signup.php');
            exit();
        }

        
    }else{
        echo "Connection Eror: " . $conn->connect_error;
    }
}else{
    header('location:1-signup.php');
    exit();
}


?>