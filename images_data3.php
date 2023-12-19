<?php


if($_SERVER['REQUEST_METHOD']== 'POST'){
    $image1=$_FILES['image1'];
    $image2=$_FILES['image2'];
    $image3=$_FILES['image3'];
    $image4=$_FILES['image4'];
    $image5=$_FILES['image5'];
    $image6=$_FILES['image6'];
    $image7=$_FILES['image7'];
    $image8=$_FILES['image8'];
    $image9=$_FILES['image9'];
    $image10=$_FILES['image10'];

    if ($image1['size']==0){
        $_SESSION['img1_err']=$image1_err="image is required";
    }else{
        $img1_bname=$image1['name'];
        $img1_tmp_name=$image1['tmp_name'];
        $img1_name= "1_".time(). "." .(pathinfo($img1_bname, PATHINFO_EXTENSION));
    }
    
    if ($image2['size']==0){
        $_SESSION['img2_err']=$image2_err="image is required";
    }else{
        $img2_bname=$image2['name'];
        $img2_tmp_name=$image2['tmp_name'];
        $img2_name= "2_".time(). "." .(pathinfo($img2_bname, PATHINFO_EXTENSION));
    }

    if ($image3['size']==0){
        $_SESSION['img3_err']=$image3_err="image is required";
    }else{
        $img3_bname=$image3['name'];
        $img3_tmp_name=$image3['tmp_name'];
        $img3_name= "3_".time(). "." .(pathinfo($img3_bname, PATHINFO_EXTENSION));
    }

    if ($image4['size']==0){
        $_SESSION['img4_err']=$image4_err="image is required";
    }else{
        $img4_bname=$image4['name'];
        $img4_tmp_name=$image4['tmp_name'];
        $img4_name= "4_".time(). "." .(pathinfo($img4_bname, PATHINFO_EXTENSION));
    }

    if ($image5['size']==0){
        $_SESSION['img5_err']=$image5_err="image is required";
    }else{
        $img5_bname=$image5['name'];
        $img5_tmp_name=$image5['tmp_name'];
        $img5_name= "5_".time(). "." .(pathinfo($img5_bname, PATHINFO_EXTENSION));
    }

    if ($image6['size']==0){
        $_SESSION['img6_err']=$image6_err="image is required";
    }else{
        $img6_bname=$image6['name'];
        $img6_tmp_name=$image6['tmp_name'];
        $img6_name= "6_".time(). "." .(pathinfo($img6_bname, PATHINFO_EXTENSION));
    }

    if ($image7['size']==0){
        $_SESSION['img7_err']=$image7_err="image is required";
    }else{
        $img7_bname=$image7['name'];
        $img7_tmp_name=$image7['tmp_name'];
        $img7_name= "7_".time(). "." .(pathinfo($img7_bname, PATHINFO_EXTENSION));
    }

    if ($image8['size']==0){
        $_SESSION['img8_err']=$image8_err="image is required";
    }else{
        $img8_bname=$image8['name'];
        $img8_tmp_name=$image8['tmp_name'];
        $img8_name= "8_".time(). "." .(pathinfo($img8_bname, PATHINFO_EXTENSION));
    }

    if ($image9['size']==0){
        $_SESSION['img9_err']=$image9_err="image is required";
    }else{
        $img9_bname=$image9['name'];
        $img9_tmp_name=$image9['tmp_name'];
        $img9_name= "9_".time(). "." .(pathinfo($img9_bname, PATHINFO_EXTENSION));
    }

    if ($image10['size']==0){
        $_SESSION['img10_err']=$image10_err="image is required";
    }else{
        $img10_bname=$image10['name'];
        $img10_tmp_name=$image10['tmp_name'];
        $img10_name= "10_".time(). "." .(pathinfo($img10_bname, PATHINFO_EXTENSION));
    }

    if(empty($image1_err) && empty($image2_err) && empty($image3_err) && empty($image4_err) && empty($image5_err) && empty($image6_err) && empty($image7_err) && empty($image8_err) && empty($image9_err) && empty($image10_err)){
        $target1_dir="images/".$img1_name;
        $target2_dir="images/".$img2_name;
        $target3_dir="images/".$img3_name;
        $target4_dir="images/".$img4_name;
        $target5_dir="images/".$img5_name;
        $target6_dir="images/".$img6_name;
        $target7_dir="images/".$img7_name;
        $target8_dir="images/".$img8_name;
        $target9_dir="images/".$img9_name;
        $target10_dir="images/".$img10_name;

        move_uploaded_file($img1_tmp_name, $target1_dir);
        move_uploaded_file($img2_tmp_name, $target2_dir);
        move_uploaded_file($img3_tmp_name, $target3_dir);
        move_uploaded_file($img4_tmp_name, $target4_dir);
        move_uploaded_file($img5_tmp_name, $target5_dir);
        move_uploaded_file($img6_tmp_name, $target6_dir);
        move_uploaded_file($img7_tmp_name, $target7_dir);
        move_uploaded_file($img8_tmp_name, $target8_dir);
        move_uploaded_file($img9_tmp_name, $target9_dir);
        move_uploaded_file($img10_tmp_name, $target10_dir);

    }else{
        header('location:images_upload.php');
    }

};

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
    <h3 class="text-center">Uploaded Images</h3>
        <div class="row py-3">
            <div class="col-sm-12 col-md-4 col-lg-3 my-2">
                <p class="text-center"><?php echo $img1_name; ?></p>
                <img src="<?php echo $target1_dir; ?>" alt="<?php echo $img1_name; ?>" width="100%">
            </div>
            <div class="col-sm-12 col-md-4 col-lg-3 my-2">
                <p class="text-center"><?php echo $img2_name; ?></p>
                <img src="<?php echo $target2_dir; ?>" alt="<?php echo $img2_name; ?>" width="100%">
            </div>
            <div class="col-sm-12 col-md-4 col-lg-3 my-2">
                <p class="text-center"><?php echo $img3_name; ?></p>
                <img src="<?php echo $target3_dir; ?>" alt="<?php echo $img3_name; ?>" width="100%">
            </div>
            <div class="col-sm-12 col-md-4 col-lg-3 my-2">
                <p class="text-center"><?php echo $img4_name; ?></p>
                <img src="<?php echo $target4_dir; ?>" alt="<?php echo $img4_name; ?>" width="100%">
            </div>
            <div class="col-sm-12 col-md-4 col-lg-3 my-2">
                <p class="text-center"><?php echo $img5_name; ?></p>
                <img src="<?php echo $target5_dir; ?>" alt="<?php echo $img5_name; ?>" width="100%">
            </div>
            <div class="col-sm-12 col-md-4 col-lg-3 my-2">
                <p class="text-center"><?php echo $img6_name; ?></p>
                <img src="<?php echo $target6_dir; ?>" alt="<?php echo $img6_name; ?>" width="100%">
            </div>
            <div class="col-sm-12 col-md-4 col-lg-3 my-2">
                <p class="text-center"><?php echo $img7_name; ?></p>
                <img src="<?php echo $target7_dir; ?>" alt="<?php echo $img7_name; ?>" width="100%">
            </div>
            <div class="col-sm-12 col-md-4 col-lg-3 my-2">
                <p class="text-center"><?php echo $img8_name; ?></p>
                <img src="<?php echo $target8_dir; ?>" alt="<?php echo $img8_name; ?>" width="100%">
            </div>
            <div class="col-sm-12 col-md-4 col-lg-3 my-2">
                <p class="text-center"><?php echo $img9_name; ?></p>
                <img src="<?php echo $target9_dir; ?>" alt="<?php echo $img9_name; ?>" width="100%">
            </div>
            <div class="col-sm-12 col-md-4 col-lg-3 my-2">
                <p class="text-center"><?php echo $img10_name; ?></p>
                <img src="<?php echo $target10_dir; ?>" alt="<?php echo $img10_name; ?>" width="100%">
            </div>
        </div>
</body>

</html>