<?php
session_start();
include("head.html");

$lname_err="";

if($_SERVER['REQUEST_METHOD']== 'POST'){
    
    $lname=$_POST['l_name'];

    if (empty($lname)){
        $lname_err="last name is required";
    }else{
        $lname=trim($lname);
    }

    $_SESSION['lname']=$lname;

}

?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="rounded border p-3">
    <div class="d-flex pb-2">
        <label class="w-35" for="l_name">Last Name <span class="text-danger">*</span> :</label>
        <div class="flex-fill w-50">
            <input class="form-control" type="text" name="l_name" id="l_name"/>
            <div class="text-danger ps-2">
                <?php echo $lname_err; ?>
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
    if(empty($lname_err)){
        header("location:email.php");
    }
}


?>