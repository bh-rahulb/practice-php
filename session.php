<!-- process_form.php -->

<?php
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

// Check if there are no validation errors
if (empty($name_err) && empty($email_err) && empty($pass_err)) {
    $_SESSION['name'] = $name;
    $_SESSION['email'] = $email;
    $_SESSION['pass'] = $pass;

    echo $name . "<br>";
    echo $email . "<br>";
    echo $pass . "<br>";
} else {
    // Display errors and include the form again
    include "session_form.php";
}

}
?>
