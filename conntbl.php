<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        h1{
            color:red;
            text-align:center;
        }
    </style>
</head>
<body>
    
</body>
</html>

<?php
$name = $_POST['name1'];
$password = $_POST['pswd'];

if ($name == "aman" && $password == "aman123"){
    include 'readtbl.php';
}
else{
    echo "<h1> Username and password is incorrect</h1>";
    include 'loginform.php';
}


?>