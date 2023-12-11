<?php
$userName=$userId=$userEmail=$password=$Cpassword=$userNameerr=$userIderr=$userEmailerr=$passworderr=$Cpassworderr="";

$connUsers = new mysqli("localhost", "root", "", "database");

    $sqlId = "SELECT user_id FROM `users` WHERE user_id = ?";
    $stmtId = $connUsers->prepare($sqlId);
    $stmtId->bind_param("s", $userId);
    $stmtId->execute();
    $resultId = $stmtId->get_result();


    if($_SERVER['REQUEST_METHOD']=="POST"){
        $userName=($_POST['user_name']);
        $userEmail=($_POST['user_email']);
        $userId=($_POST['user_id']);
        $password=($_POST['password']);
        $Cpassword=($_POST['Cpassword']);
    
    if(empty($userName)){
        $userNameerr ="Please enter your name";
    }elseif((strlen($userName)<4)){
        $userNameerr ="name must be minimum four characters";
    }elseif(!preg_match("/^[a-z]*$/i",$userName)){
        $userNameerr = "only letters";
    }else{
        $userName=htmlspecialchars($userName);
    }
    
    
    if(empty($userEmail)){
        $userEmailerr ="Please enter email";
    }else{
        $userEmail=htmlspecialchars($userEmail);
    }
    
    
    if(empty($userId)){
        $userIderr ="Please enter user id";
    }else{
        $userId=htmlspecialchars($userId);
    }
    
    
    if(empty($password)){
        $passworderr= "Please enter password";
    }elseif((strlen($password)<8 || strlen($password)>12)){
        $passworderr= "password must be minimum eight characters and maximum 12 characters";
    }else{
        $password=htmlspecialchars($password);
    }
    
    
    if(empty($Cpassword)){
        $Cpassworderr= "Please confirm password";
    }elseif(($password !== $Cpassword)){
        $Cpassworderr= "password does't match";
    }else{
        $Cpassword=htmlspecialchars($Cpassword);
        // $Cpassword= password_hash($Cpassword,s PASSWORD_DEFAULT);
    }
    
    }        
    
    

if (empty($userNameerr) && empty($userEmailerr) && empty($userIderr) && empty($passworderr) && empty($Cpassworderr)) {
    

    if ($connUsers->connect_error) {
        echo "Connection error";
    } else {

        $stmtId = $connUsers->prepare("SELECT user_id FROM users WHERE user_id = ?");
    $stmtId->bind_param("s", $userId);
    $stmtId->execute();
    $resultId = $stmtId->get_result();

    if ($resultId->num_rows > 0) {
        $userIderr = "User ID already exists";
    } else {
        $stmtInsert = $connUsers->prepare("INSERT INTO users (name, email, user_id, password) VALUES (?, ?, ?, ?)");
        $stmtInsert->bind_param("ssss", $userName, $userEmail, $userId, $password);

        if ($stmtInsert->execute()) {
            echo "User created";
        } else {
            echo "Error inserting data: " . $stmtInsert->error;
        }

        $stmtInsert->close();
    }

        $connUsers->close();
    }
}
else{
    echo "please fill form";
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Form</title>
    <style>
        fieldset {
            width: 320px;
            margin: 0 auto;
        }

        .field,
        .btn {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
        }

        .btn {
            justify-content: space-around;
        }
        span {
            margin-left: 142px;
            color:red;
        }
        button{
            margin:10px 0;
        }
    </style>
</head>

<body>
    <fieldset>
        <legend>User Login</legend>
        <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post">
            <div class='field'>
                <label for="user_name">Name :</label>
                <input type="text" name="user_name" placeholder="enter name"/>
            </div>
            <span>
                <?php echo $userNameerr;?>
            </span>
            <div class='field'>
                <label for="user_email">Email :</label>
                <input type="text" name="user_email" placeholder="enter email" />
            </div>
            <span>
                <?php echo $userEmailerr;?>
            </span>
            <div class='field'>
                <label for="user_id">User Id :</label>
                <input type="text" name="user_id" placeholder="createuser Id" />
            </div>
            <span>
                <?php echo $userIderr;?>
            </span>
            <div class='field'>
                <label for="password">Create Password :</label>
                <input type="password" name="password" placeholder="enter password" />
            </div>
            <span>
                <?php echo $passworderr;?>
            </span>
            <div class='field'>
                <label for="Cpassword">Confirm Password :</label>
                <input type="password" name="Cpassword" placeholder="enter password " />
            </div>
            <span>
                <?php echo $Cpassworderr;?>
            </span>
            <div class="btn">
                <input type="submit" value="Sign Up">
                <input type="reset" value="Reset">
            </div>
        </form>
        <button><a href="login_form.php">Log In</a></button>
    </fieldset>
</body>

</html>