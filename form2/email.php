<?php
session_start();
include("head.html");

$email_err="";

if($_SERVER['REQUEST_METHOD']== 'POST'){
    
    $email=$_POST['email'];

    if (empty($email)){
        $email_err="email is required";
    }else{
        $email=trim($email);
    }

    $_SESSION['email']=$email;

}

?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="rounded border p-3">
    <div class="d-flex pb-2">
        <label class="w-35" for="email">Email <span class="text-danger">*</span> :</label>
        <div class="flex-fill w-50">
            <input class="form-control" type="text" name="email" id="email"/>
            <div class="text-danger ps-2">
                <?php echo $email_err; ?>
            </div>
        </div>
    </div>
    <div class="pt-3 text-center">
        <button class="btn btn-success w-50" type="submit">Submit</button>
    </div>
</form>


<?php

include("foot.html");

if($_SERVER['REQUEST_METHOD']== 'POST'){
    if(empty($email_err)){
        header("location:password.php");
    }
}


?>