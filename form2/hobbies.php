<?php
session_start();
include("head.html");

$hobbies_err="";
$hobbies=null;

if($_SERVER['REQUEST_METHOD']== 'POST'){
    
    $hobbies=$_POST['hobbies'];

    if (empty($hobbies)){
        $hobbies_err="hobby is required";
    }

    $hobby = "";
    foreach ($hobbies as $hobbs) {
        $hobby .= $hobbs . " ";
    }
    // echo $hobby;
    $_SESSION['hobbies']=trim($hobby);

}

?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="rounded border p-3">
    <div class="d-flex py-2">
        <label class="w-35" for="gender">Hobbies <span class="text-danger">*</span> :</label>
        <div class="flex-fill w-50">
            <div>
                <label class="pe-2" for="coding">Coding</label>
                <input class="" type="checkbox" name="hobbies[]" value="Coding" id="coding" />
                <label class="ps-4 pe-2" for="gaming">Gaming</label>
                <input class="" type="checkbox" name="hobbies[]" value="Gaming" id="gaming" />
            </div>
            <div>
                <label class="pe-2" for="dancing">Dancing</label>
                <input class="" type="checkbox" name="hobbies[]" value="Dancing" id="dancing" />
                <label class="ps-4 pe-2" for="singing">Singing</label>
                <input class="" type="checkbox" name="hobbies[]" value="Singing" id="singing" />
            </div>
            <div class="text-danger ps-2">
                <?php echo $hobbies_err; ?>
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
    if(empty($hobbies_err)){
        header("location:image.php");
    }
}


?>