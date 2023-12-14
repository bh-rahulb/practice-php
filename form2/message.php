<?php
session_start();
include("head.html");

$message_err="";

if($_SERVER['REQUEST_METHOD']== 'POST'){
    
    $message=$_POST['message'];

    if (empty($message)){
        $message_err="first name is required";
    }else{
        $message=trim($message);
    }

    $_SESSION['message']=$message;

}

?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="rounded border p-3">
    <div class="d-flex py-2">
        <label class="w-35" for="message">Message <span class="text-danger">*</span> :</label>
        <div class="flex-fill w-50">
            <textarea class="form-control" name="message" id="message" rows="5"></textarea>
            <div class="text-danger ps-2">
                <?php echo $message_err; ?>
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

        $_SESSION['a']=rand(1,25);;
        $_SESSION['b']=rand(0,12);

        header("location:captcha.php");
    }
}


?>