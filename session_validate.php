<!-- validation.php -->

<?php
$name_err = $email_err = $pass_err = "";
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['name'])) {
        $name = trim($_POST['name']);
        if (empty($name)) {
            $name_err = "Enter name";
        }
    }

    if (isset($_POST['email'])) {
        $email = trim($_POST['email']);
        if (empty($email)) {
            $email_err = "Enter email";
        }
    }

    if (isset($_POST['pass'])) {
        $pass = trim($_POST['pass']);
        if (empty($pass)) {
            $pass_err = "Enter password";
        }
    }
}
?>
