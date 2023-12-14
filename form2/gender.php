<?php
session_start();
include("head.html");

$gender_err="";
$gender="";

if($_SERVER['REQUEST_METHOD']== 'POST'){
    
    $gender=$_POST['gender'];

    if (empty($gender)){
        $gender_err="gender is required";
    }

    $_SESSION['gender']=$gender;

}

?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="rounded border p-3">
    <div class="d-flex py-2">
        <label class="w-35" for="gender">Gender <span class="text-danger">*</span> :</label>
        <div class="flex-fill w-50">
            <div>
            <label class="pe-2" for="male">Male</label>
            <input class="" type="radio" name="gender" value="Male" id="male" />
            <label class="ps-4 pe-2" for="female">Female</label>
            <input class="" type="radio" name="gender" value="female" id="female" />
            </div>
        <div class="w-100 text-danger ps-2">
            <?php echo $gender_err; ?>
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
    if(empty($gender_err)){
        header("location:hobbies.php");
    }
}


?>