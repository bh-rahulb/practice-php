<?php
session_start();
include("head.html");

$state_err="";

if($_SERVER['REQUEST_METHOD']== 'POST'){
    
    $state=$_POST['state'];

    if (empty($state)){
        $state_err="state is required";
    }

    $_SESSION['state']=$state;

}
?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="rounded border p-3">
    <div class="d-flex py-2">
        <label class="w-35" for="state">State <span class="text-danger">*</span> :</label>
        <div class="flex-fill w-50">
            <select class="form-control" name="state" id="state">
                form.php <option value="">--select--</option>
                <option value="Punjab">Punjab</option>
                <option value="Haryana">Haryana</option>
                <option value="Himachal Pradesh">Himachal Pradesh</option>
            </select>
            <div class="text-danger ps-2">
                <?php echo $state_err; ?>
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
    if(empty($state_err)){
        header("location:gender.php");

    }
}


?>