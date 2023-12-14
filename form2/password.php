<?php
session_start();
include("head.html");

$password_err="";

if($_SERVER['REQUEST_METHOD']== 'POST'){
    
    $password=$_POST['password'];

    if (empty($password)){
        $password_err="password is required";
    }else{
        $password=trim($password);
    }

    $_SESSION['password']=$password;

}

?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="rounded border p-3">
    <div class="d-flex pb-2">
        <label class="w-35" for="password">Password <span class="text-danger">*</span> :</label>
        <div class="flex-fill w-50">
            <input class="form-control" type="password" name="password" id="password"/>
            <div class="text-danger ps-2">
                <?php echo $password_err; ?>
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
    if(empty($password_err)){
        header("location:c_password.php");

    }
}


?>