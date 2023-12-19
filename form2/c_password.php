<?php
session_start();
include("head.html");

$c_password_err="";

if($_SERVER['REQUEST_METHOD']== 'POST'){
    
    $c_password=$_POST['c_password'];

    if (empty($c_password)){
        $c_password_err="please confirm password";
    }else{
        $c_password=trim($c_password);
    }

    $_SESSION['c_password']=$c_password;

}

?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="rounded border p-3">
    <div class="d-flex pb-2">
        <label class="w-35" for="c_password">Confirm Password <span class="text-danger">*</span> :</label>
        <div class="flex-fill w-50">
            <input class="form-control" type="password" name="c_password" id="c_pasword"/>
            <div class="text-danger ps-2">
                <?php echo $c_password_err; ?>
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
    if(empty($c_password_err)){
        header("location:city.php");

    }
}


?>