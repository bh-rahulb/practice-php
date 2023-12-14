<?php
session_start();
include("head.html");

$city_err="";

if($_SERVER['REQUEST_METHOD']== 'POST'){
    
    $city=$_POST['city'];

    if (empty($city)){
        $city_err="please confirm password";
    }

    $_SESSION['city']=$city;

}

?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="rounded border p-3">
    <div class="d-flex py-2">
        <label class="w-35" for="city">City <span class="text-danger">*</span> :</label>
        <div class="flex-fill w-50">
            <select class="form-control" name="city" id="city">
                <option value="">--select--</option>
                <option value="Mohali">Mohali</option>
                <option value="Chandigarh">Chandigarh</option>
                <option value="Shimla">Shimla</option>
                <option value="Hamirpur">Hamirpur</option>
            </select>
            <div class="text-danger ps-2">
                <?php echo $city_err; ?>
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
    if(empty($city_err)){
        header("location:state.php");

    }
}


?>