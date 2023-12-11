<!-- session_form.php -->
<?php
    
    include "session_validate.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        span {
            color: red;
        }
    </style>
</head>

<body>

    <form action="session.php" method="post">
        name: <input type="text" name="name" id="name" value="<?php echo isset($name) ? htmlspecialchars($name) : ''; ?>"><span id="name-error"><?php echo $name_err; ?></span><br>
        email: <input type="email" name="email" id="email" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>"><span id="email-error"><?php echo $email_err; ?></span><br>
        password: <input type="password" name="pass" id="pass" value="<?php echo isset($pass) ? htmlspecialchars($pass) : ''; ?>"><span id="pass-error"><?php echo $pass_err; ?></span><br>
        <button type="submit">Submit</button>
    </form>
</body>

</html>
