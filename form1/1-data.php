<?php

if($_SERVER['REQUEST_METHOD']== 'POST'){
    include '1-validation.php';

    if(empty($fname_err) && empty($lname_err) && empty($email_err) && empty($password_err) && empty($c_password_err) && empty($city_err) && empty($state_err) && empty($gender_err) && empty($skills_err) && empty($message_err) && empty($image_err)){
        $ext=null;
        $images=[];
        $img_rotate=null;
        $target_dir=null;
        $i=1;
        $j=0;
        // echo 'done';
        foreach($image['tmp_name'] as $tmp_name){
            foreach ($image['name'] as $name) {
                $ext=pathinfo($name, PATHINFO_EXTENSION);
            }
            if(!empty($ext)){
                $img_name= $i ."_".time(). "." .$ext;
                $target_dir="images/".$img_name;
                if(move_uploaded_file($tmp_name, $target_dir)){
                    $images[$j]=$img_name;
                }
                
            }else{
                echo 'error';
            }
            $i+=1;
            $j+=1;
        }
        $image_name=null;
        foreach ($images as $value) {
            $image_name .= $value . ", ";
        }
        $image_name=trim($image_name);
        $image_name=substr($image_name,0,-1);

        include '1-insert.php';

    }else{
        include '1-signup.php';
    }
}

?>