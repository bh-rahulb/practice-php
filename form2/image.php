<?php
session_start();
include("head.html");

$image_err="";

if($_SERVER['REQUEST_METHOD']== 'POST'){
    
    $image=$_FILES['image'];

    if ($image['size']==0){
        $image_err="image is required";
    }

}

?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" class="rounded border p-3">
    <div class="d-flex py-2">
        <label class="w-35" for="image">Picture <span class="text-danger">*</span> :</label>
        <div class="flex-fill w-50">
            <input class="form-control" type="file" name="image" id="image" />
            <div class="text-danger ps-2">
                <?php echo $image_err; ?>
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
    if(empty($image_err)){

        $t=time();
        $file_bname=basename($image['name']);
        $ext=pathinfo($file_bname, PATHINFO_EXTENSION);
        $saved_name=$t.".".$ext;
        $file_tmp=$image['tmp_name'];
        $target_dir="images/".$saved_name;

        if(move_uploaded_file($file_tmp, $target_dir)){
        
         echo "done";
        }
        else{
            echo "Error: " . $image['error'];
        }

        $_SESSION['image']=$target_dir;
        $_SESSION['saved_name']=$saved_name;
        header("location:message.php");
    }
}


?>