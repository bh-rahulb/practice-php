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
        
        if($_SERVER['REQUEST_METHOD']== 'POST'){
            if (isset($_POST['email'])){
                $email=trim($_POST['email']);
                
                $conn = new mysqli($server_name, $user_name, $db_password, $db_name);
                if($conn){
                    $query= "SELECT * FROM table_first WHERE email = ?";
                    $sql=$conn->prepare($query);
                    $sql->bind_param('s', $email);
                    $sql->bind_param('s', $email);
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
                    
                if (empty($email)){
                    $email_err="please enter email";
                }elseif (filter_var($email, FILTER_VALIDATE_EMAIL)==false) {
                    $email_err="enter valid email";
                }elseif ($email===$row['email']) {
                    $email_err="";
                }else{
                    $email_err='email not registred';
                }
            }
            
            if (isset($_POST['password'])){
                $password=$_POST['password'];;
                if (empty($password)){
                    $password_err="password is required";
                }elseif(password_verify($password,$row['password'])){
                    $password_err="";
                }else{
                    $password_err="incorrect password";
                }
            }
            
            if ($row['gender']==0){
                $gender='Male';
            }elseif($row['gender']==1){
                $gender='Female';
            }
        
            if(empty($email_err) && empty($password_err)){
                echo "<pre>";
                echo "<p>First Name:         ".$row['f_name']."</p>";
                echo "<p>Last Name:          ".$row['l_name']."</p>";
                echo "<p>email:              ".$row['email']."</p>";
                echo "<p>City:               ".$row['city']."</p>";
                echo "<p>State:              ".$row['state']."</p>";
                echo "<p>Gender:             ".$gender."</p>";
                echo "<p>Skills:             ".$row['skills']."</p>";
                echo "<div>message:            <p style='width:200px; padding:2px 10px; '>".$row['message']."</p> </div>";
                echo "</pre>";
                
                echo "<p>Uploaded image</p>";
                $images=explode(", ",$row['images']);
                
                foreach($images as $image){
                    if (is_file("images/".$image)){
                        echo "<div style='width:230px;margin:10px'>";
                        echo "<p>$image</p>";
                        echo "<img src='images/$image' style='width:100%;' alt='$image'/>";
                        echo "</div>";
                    }
                }
            }else{
                $_SESSION['email_err']= $email_err;
                $_SESSION['password_err']= $password_err;
                $_SESSION['email_address']= $email;
                header('location:1-login.php');
            }
        }else{
            header('location:1-login.php');
        }
        
    ?>

</body>

</html>