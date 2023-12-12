<?php

if($_SERVER['REQUEST_METHOD']== 'POST'){
   if (isset($_POST['f_name'])){
       $fname=trim($_POST['f_name']);
       if (empty($fname)){
           $fname_err="first name is required";
       }
   }

   if (isset($_POST['l_name'])){
       $lname=trim($_POST['l_name']);
       if (empty($lname)){
           $lname_err="last name is required";
       }
   }

   if (isset($_POST['email'])){
       $email=trim($_POST['email']);
       if (empty($email)){
           $email_err="email is required";
       }
   }

   if (isset($_POST['password'])){
       $password=trim($_POST['password']);
       if (empty($password)){
           $password_err="password is required";
       }
   }
   if (isset($_POST['c_password'])){
       $c_password=trim($_POST['c_password']);
       if (empty($c_password)){
           $c_password_err="please confirm password";
       }
   }

   if (isset($_POST['city'])){
       $city=$_POST['city'];
       if (empty($city)){
           $city_err="city is required";
       }
   }
   if (isset($_POST['state'])){
       $state=$_POST['state'];
       if (empty($state)){
           $state_err="state is required";
       }
   }

   if (isset($_POST['gender'])){
       $gender=$_POST['gender'] ;
       if (empty($gender)){
           $gender_err="gender is required";
       }
   } else{
      $gender_err="gender is required";
   }

   if (isset($_POST['hobbies'])){
       $hobbies=$_POST['hobbies'];
       if (empty($hobbies)){
           $hobbies_err="hobby is required";
       }
   }else{
      $hobbies_err="hobby is required";
   }

   if (isset($_POST['message'])){
        $message=$_POST['message'];
        if (empty($message)){
            $message_err="message is required";
        }
    }
   
   if (isset($_FILES['image'])){
       $image=$_FILES['image'];
       if ($image['size']==0){
           $image_err="image is required";
       }
   }else{
    $image_err="image is required";
 }
 if (isset($_POST['captcha'])){
    $captcha=$_POST['captcha'];
    if (empty($captcha)){
        $captcha_err="enter captcha";
    }
}
if (isset($_POST['sum'])){
    $sum=$_POST['sum'];
    if(empty($sum)){
        $captcha_err="enter captcha";
    }elseif ($sum==$captcha) {
        $captcha_err="";
    }
    elseif($sum!==$captcha){
        $captcha_err="incorect";
    }
}

   foreach ($hobbies as $hobbs) {
    $hobby .= $hobbs . " ";
 }


//    $t=time();
//    $file_name=basename($image['name']);
//    $ext=pathinfo($file_name, PATHINFO_EXTENSION);
//    $saved_name=$t.".".$ext;

   $file_tmp=$image['tmp_name'];
   $file_name=$image['name'];
   $target_dir="images/".$file_name;

if (empty($fname_err) && empty($lname_err) && empty($email_err) && empty($password_err) && empty($c_password_err) && empty($city_err) && empty($state_err) && empty($gender_err) && empty($hobbies_err) && empty($message_err) && empty($image_err) && empty($captcha_err)){

   move_uploaded_file($file_tmp, $target_dir);

   $thumbnail_path = 'thumbnails/' . $file_name;
   createThumbnail($target_dir, $thumbnail_path, 100, 100);

   echo "<pre>";
   echo "<h3>First Name:         $fname</h3>";
   echo "<h3>Last Name:          $lname</h3>";
   echo "<h3>email:              $email</h3>";
   echo "<h3>password :          $password</h3>";
   echo "<h3>Confirm Password :  $c_password</h3>";
   echo "<h3>City:               $city</h3>";
   echo "<h3>State:              $state</h3>";
   echo "<h3>Gender:             $gender</h3>";
   echo "<h3>Hobbies:            $hobby</h3>";
   echo "<h3>Picture:            $file_name</h3>";
   echo "<h3>message:            <p style='width:200px; padding:2px 10px; '>$message</p> </h3>";
   echo "</pre>";


   
   
    echo "<h3>Uploaded image</h3>";
    echo "<div style='width:312px;height:195px;padding:5px;margin:10px;border:1px solid #000;border-radius:4px;overflow:hidden'>";
    echo "<a href='$target_dir'><img src='$target_dir' style='width:100%' alt='$file_name'/></a>";
    echo "</div>";

    echo "<h3>Uploaded image</h3>";
    // Display the full-size image
    echo "<div style='width:312px;height:195px;padding:5px;margin:10px;border:1px solid #000;border-radius:4px;overflow:hidden'>";
    echo "<a href='$target_dir'><img src='$target_dir' style='width:100%' alt='$file_name'/></a>";
    echo "</div>";

    // Display the thumbnail
    echo "<h3>Thumbnail</h3>";
    echo "<div style='width:100px;height:100px;padding:5px;margin:10px;border:1px solid #000;border-radius:4px;overflow:hidden'>";
    echo "<a href='$target_dir'><img src='$thumbnail_path' style='width:100%' alt='Thumbnail'/></a>";
    echo "</div>";

}else{
    include 'index.php';
}
}
function createThumbnail($source, $destination, $width, $height)
{
    list($source_width, $source_height, $source_type) = getimagesize($source);

    switch ($source_type) {
        case IMAGETYPE_JPEG:
            $source_image = imagecreatefromjpeg($source);
            break;
        case IMAGETYPE_PNG:
            $source_image = imagecreatefrompng($source);
            break;
        case IMAGETYPE_GIF:
            $source_image = imagecreatefromgif($source);
            break;
        default:
            return false;
    }

    $thumbnail = imagecreatetruecolor($width, $height);
    imagecopyresampled($thumbnail, $source_image, 0, 0, 0, 0, $width, $height, $source_width, $source_height);

    switch ($source_type) {
        case IMAGETYPE_JPEG:
            imagejpeg($thumbnail, $destination, 90);
            break;
        case IMAGETYPE_PNG:
            imagepng($thumbnail, $destination, 9);
            break;
        case IMAGETYPE_GIF:
            imagegif($thumbnail, $destination);
            break;
    }

    imagedestroy($source_image);
    imagedestroy($thumbnail);
}

?>