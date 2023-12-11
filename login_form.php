<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        fieldset {
            width: 270px;
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
        button{
            margin:10px 0;
        }
    </style>
</head>

<body>
    <fieldset>
        <legend>User Login</legend>
        <form action="login_conn.php" method="post">
            <div class='field'>
                <label for="user_name">User Id :</label>
                <input type="text" name="user_name" />
            </div>
            <div class='field'>
                <label for="password">Password :</label>
                <input type="password" name="password" />
            </div>
            <div class="btn">
                <input type="submit" value="Log In">
                <input type="reset" value="Reset">
            </div>
        </form>
        <button><a href="sign_up.php">Sign Up</a></button>
    </fieldset>
</body>

</html>