<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        .warning{
            color:red;
            text-align:center;
        }
    </style>
</head>
<body>
<?php
$userId = $_POST['user_name'];
$password = $_POST['password'];

$connLogin = new mysqli("localhost", "root", "", "database");

if ($connLogin->connect_error) {
    echo "Connection error";
} else {
    $sqlLogin = "SELECT user_id, password FROM `users` WHERE user_id = ?";
    $stmt = $connLogin->prepare($sqlLogin);
    $stmt->bind_param("s", $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $storedPassword = $row['password'];

        if ($password===$storedPassword) {
            include "10-10-23.php";
            $stmt->close();
            $connLogin->close();
        } else {
            echo "<p class='warning'>Username and password are incorrect.</p>";
            include "login_form.php";
        }
    } else {
        echo "<p class='warning'>Username not found.</p>";
        include "login_form.php";
    }

}


?>
</body>
</html>