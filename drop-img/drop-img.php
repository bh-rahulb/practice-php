<?php
    $image=$_FILES['file'];
    var_dump ($image);
    $img_name=$image['name'];
    $ext=pathinfo($img_name, PATHINFO_EXTENSION);
    $saved_name= time(). "." .$ext;

    $img_tmp_name=$image['tmp_name'];
    $saved_name;
    $target_dir='images/'.$saved_name;

    if(move_uploaded_file($img_tmp_name,$target_dir)){
        echo json_encode(['filename'=>$saved_name]);
    }else {
        echo json_encode(['error'=>'File upload failed']);
    }

?>