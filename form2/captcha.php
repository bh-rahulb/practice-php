<?php
session_start();
include("head.html");

$captcha_err="";

$a=$_SESSION['a'];
$b=$_SESSION['b'];
// $a=rand(1,24);
// $b=rand(0,13);


if($_SERVER['REQUEST_METHOD']== 'POST'){
    
    $sum=$a + $b;
    $captcha=$_POST['captcha'];
    if (empty($captcha)) {
        $captcha_err = "enter captcha";
    } elseif ($sum == $captcha) {
        $captcha_err = "";
    } else {
        $captcha_err = "incorrect";
    }

}

// unset($_SESSION['a']);
// unset($_SESSION['b']);

?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="rounded border p-3">
    <div class="d-flex py-2">
        <label class="w-35" for="captcha">Enter captcha  <span class="text-danger">*</span> : </label>
        <div class="flex-fill w-50">
            <?php echo $a. " + ".$b ." ="; ?>
            <input class="w-25 form-control" type="text" name="captcha" id="captcha">
            <div class="text-danger ps-2">
                <?php echo $captcha_err; ?>
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
    if(empty($captcha_err)){
        header("location:data.php");
    }
}


?>