<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User details</title>
</head>

<body>
    <?php
        session_start();

        $server_name="localhost";
        $user_name="root";
        $db_password="root";
        $db_name="db_first";

        if (isset($_SESSION['access_token'])){
            $conn = new mysqli($server_name, $user_name, $db_password, $db_name);
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
            }else{
                echo "Connection Error";
            }
            $conn->close();
            
            if ($_SESSION['email']===$row['email']) {
                $email_err='';
            }else{
                $email_err='user not found';
                $_SESSION['google_err']= $email_err;
                header('location:1-login.php');
                exit();
            }
            
            if(empty($email_err)){
                echo "<pre>";
                echo "<p>First Name:         ".$row['f_name']."</p>";
                echo "<p>Last Name:          ".$row['l_name']."</p>";
                echo "<p>email:              ".$row['email']."</p>";
                echo "</pre>";

                echo "<p>Profile Picture</p>";
                echo "<div style='width:230px;margin:10px'>";
                echo "<img src='".$row['images']."' style='width:100%;' alt='".$row['images']."'/>";
                echo "</div>";
                echo  "<a href='logout.php'>Logout</a>";
            }
        }else{
            header('location:1-login.php');
            exit();
        } 
        
    ?>

</body>

</html>