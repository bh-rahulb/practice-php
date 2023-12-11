<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        p{
            color:red;
            text-align:center;
        }
    </style>
</head>
<body>
    
</body>
</html>

<?php
$name = $_POST['un'];
$pswd = $_POST['pswd'];

if($name == "rahul" && $pswd == "rahul123"){
    include  "readtbl.php";
}
else{
    echo "<p> username and password is incorrect </p>";
    include "loginpage.php";
    
}

?>