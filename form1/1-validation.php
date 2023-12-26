<?php

    $server_name="localhost";
    $user_name="root";
    $db_password="root";
    $db_name="db_first";


    
    if (isset($_POST['f_name'])){
        $fname=trim($_POST['f_name']);
        if (empty($fname)){
            $fname_err="first name is required";
        }else{
            $fname= ucfirst(strtolower($fname));
        }
    }

    if (isset($_POST['l_name'])){
        $lname=trim($_POST['l_name']);
        if (empty($lname)){
            $lname_err="last name is required";
        }else{
            $lname= ucfirst(strtolower($lname));
        }
    }

    if (isset($_POST['email'])){
        $email=trim($_POST['email']);

        $conn_email = new mysqli($server_name, $user_name, $db_password, $db_name);
        if($conn_email){
            $query_email= "SELECT email FROM table_first WHERE email = ?";
            $sql_email=$conn_email->prepare($query_email);
            $sql_email->bind_param('s', $email);
            $sql_email->bind_param('s', $email);
            if($sql_email->execute()){
                $result_email=$sql_email->get_result();
                $row_email=$result_email->fetch_assoc();
            }else{
                echo "Error : ";
            }
                $sql_email->close();
            }else{
                echo "Connection Eror: " . $conn_email->connect_error;
            }
            $conn_email->close();

        if (empty($email)){
            $email_err="email is required";
        }elseif (filter_var($email, FILTER_VALIDATE_EMAIL)==false) {
            $email_err="enter valid email";
        }elseif ($email===$row_email['email']) {
            $email_err="email already exists";
        }
    }

    if (isset($_POST['password'])){
        $password=$_POST['password'];
        if (empty($password)){
            $password_err="password is required";
        }
    }

    if (isset($_POST['c_password'])){
        $c_password=$_POST['c_password'];
        if (empty($c_password)){
            $c_password_err="please confirm password";
        }else{
            $hash_password=password_hash($c_password, PASSWORD_DEFAULT);
        }
    }

    if (isset($_POST['city'])){
        $city=$_POST['city'];
        if (empty($city)){
            $city_err="city is required";
        }
    }

    if (isset($_POST['state'])){
        $state=$_POST['state'];
        if (empty($state)){
            $state_err="state is required";
        }
    }

    if (isset($_POST['gender'])){
        $gender_=$_POST['gender'];
        if (empty($gender_)){
            $gender_err="gender is required";
        }elseif($gender_==='Male'){
            $gender=0;
        }elseif($gender_==='Female'){
            $gender=1;
        }
    }else{
        $gender_err="gender is required";
    }

    if (isset($_POST['skills'])){
        $skills=$_POST['skills'];
        if (empty($skills)){
            $skills_err="skill is required";
        }
    }else{
        $skills_err="skill is required";
    }

    if (isset($_POST['message'])){
        $message=$_POST['message'];
        if (empty($message)){
            $message_err="message is required";
        }
    }

    if (isset($_FILES['image'])){
        $image=$_FILES['image'];
        if ($image['size']['0']==0){
            $image_err="image is required";
        }
    }
    if (isset($_POST['captcha'])){
        $captcha=$_POST['captcha'];
        if(empty($captcha)){
            $captcha_err="enter captcha";
        }elseif($sum==$captcha){
            $captcha_err="";
        }else{
            $captcha_err="incorect";
        }
    
    }

    $skill=null;
    foreach ($skills as $value) {
        $skill .= $value . ", ";
    }
    $skill=trim($skill);
    $skill=substr($skill,0,-1);
?>