<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form {
            width: 300px;
            margin: 50px auto;
        }

        .input {
            margin: 15px 0;
        }

        .input input {
            width: 100%;
            padding: 5px 8px;
        }

        .btn {
            text-align: center;
        }
        span{
            color:red;
        }
    </style>
</head>

<body>
    <form action=<?php echo $_SERVER['PHP_SELF'];?> method='post'>
        <h2 style='text-align: center;'>Registration Form</h2>
        <div class='input'>
            <input type="text" name='user_fname' placeholder='Enter First Name'>
            <span>
                <?php
                    if($_SERVER['REQUEST_METHOD']=="POST"){
                        $fname=$_POST['user_fname'];
                        if(empty($fname)){
                            echo "Please enter your first name";
                        }
                    }
                ?>
            </span>
        </div>
        <div class='input'>
            <input type="text" name='user_lname' placeholder='Enter Last Name'>
            <span>
                <?php
                    if($_SERVER['REQUEST_METHOD']=="POST"){
                        $lname=$_POST['user_lname'];
                        if(empty($lname)){
                            echo "Please enter your last name";
                        }
                    }
                ?>
            </span>
        </div>
        <div class='input'>
            <input type="number" name='user_age' placeholder='Enter Age'>
            <span>
                <?php
                    if($_SERVER['REQUEST_METHOD']=="POST"){
                        $age=$_POST['user_age'];
                        if(empty($age)){
                            echo "Please enter your age";
                        }
                    }
                ?>
            </span>
        </div>
        <div class='input'>
            <input type="password" name='user_password' placeholder='Enter Password'>
            <span>
                <?php
                    if($_SERVER['REQUEST_METHOD']=="POST"){
                        $password=$_POST['user_password'];
                        if(empty($password)){
                            echo "Please enter your password";
                        }
                    }
                ?>
            </span>
        </div>
        <div class='btn'>
            <input type="submit" value="Submit">
        </div>
    </form>

    <?php
        echo "$fname <br> $lname <br> $age <br> $password";
    ?>
</body>

</html>