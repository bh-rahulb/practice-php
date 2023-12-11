<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <center>
    <fieldset style = "width : 600px;">
        <legend style = "text-align:center;">Signup form</legend>
        <form action = "<?php echo $_SERVER['PHP_SELF'];   ?>" method = "post">
Name : <input type="text" name="nm" id=""><br><br>
password : <input type="password" name="pswd" id=""><br><br>
email: <input type="email" name="em" id=""><br><br>
Hobbies: singing: <input type="checkbox" name="a[]" id="" value = "singing"> Dancing : <input type="checkbox" name="a[]" id="" value = "dancing"> Acting : <input type="checkbox" name="a[]" id="" value = "acting"><br><br>
Gender:  Male<input type="radio" name="gender" id="" value = "male"> Female<input type="radio" name="gender" id="" value = "female"><br><br>
Date of Birth : <input type="date" name="dob" id=""><br><br>
<!-- user_image : <input type="file" name="file" id=""> -->
<input type="submit" value="submit"> <input type="reset" value="reset">
</form>
<a href= "loginclass.php">Login </a>

    </fieldset>
    </center>

    <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $name = $_POST["nm"];
            $password1 = $_POST["pswd"];
            $email = $_POST["em"];
            $hobbies = $_POST["a"];
            $hob = "";
            foreach($hobbies as $hob1){
                $hob.=$hob1.",";
            }
            $gender = $_POST["gender"];
            $dob= $_POST["dob"];

         $conn = new mysqli($host = "localhost", $user = "root" , $password = "", $database = "signupclass");
         $stmt = $conn->prepare("INSERT INTO signuptbl1(name,password,email,hobbies,gender,date_of_birth) VALUES(?,?,?,?,?,?)");
         $stmt->bind_param("ssssss",$name,$password1,$email,$hob,$gender,$dob);
         $stmt->execute();
         $stmt->close();
         $conn->close();
}

?>
</body>
</html>