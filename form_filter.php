<?php
$name=$email=$tel=$nameErr=$emailErr=$telErr="";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name=$_POST["name"];
    $email=$_POST["email"];
    $tel=$_POST["tel"];


    if(filter_var($email,FILTER_VALIDATE_EMAIL)){
        $email= $email;
    }
    else{
        $emailErr="enter valid email";
    }

    if(filter_var($tel,FILTER_VALIDATE_INT)){
        $tel= htmlspecialchars($tel);
    }
    else{
        $telErr="enter valid mobile no.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <center>
        <fieldset style='width:500px'>
            <legend>Login form</legend>
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                <div>Name : <input type="text" name="name" ></div>
                <div>email : <input type="text" name="email" ></div>
                <div><?php echo $emailErr; ?></div>
                <div>tel: <input type="text" name="tel" ></div>
                <div><?php echo $telErr; ?></div>
                <div><input type="submit" value="submit"> <input type="reset" value="reset"></div>

            </form>
        </fieldset>
    </center>
</body>

</html>
<?php
echo $name."<br". $email ."<br>".$tel;


?>