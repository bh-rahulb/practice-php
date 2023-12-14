<?php
session_start();
include("head.html");

$fname_err="";

if($_SERVER['REQUEST_METHOD']== 'POST'){
    
    $fname=$_POST['f_name'];

    if (empty($fname)){
        $fname_err="first name is required";
    }else{
        $fname=trim($fname);
    }

    $_SESSION['fname']=$fname;

}

?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="rounded border p-3">
    <div class="d-flex pb-2">
        <label class="w-35" for="f_name">First Name <span class="text-danger">*</span> :</label>
        <div class="flex-fill w-50">
            <input class="form-control" type="text" name="f_name" id="f_name"/>
            <div class="text-danger ps-2">
                <?php echo $fname_err; ?>
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
    if(empty($fname_err)){
        header("location:lname.php");
    }
}


?>