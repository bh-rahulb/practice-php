<?php
session_start();

// var_dump ($_SESSION);

$fname=$_SESSION['fname'];
$lname=$_SESSION['lname'];
$email=$_SESSION['email'];
$password=$_SESSION['password'];
$c_password=$_SESSION['c_password'];
$city=$_SESSION['city'];
$state=$_SESSION['state'];
$gender=$_SESSION['gender'];
$hobby=$_SESSION['hobbies'];
$target_dir=$_SESSION['image'];
$saved_name=$_SESSION['saved_name'];
$message=$_SESSION['message'];

//    include "thumb.php";

    // create_thumb($target_dir, $saved_name, 100,100);
    // create_thumb($target_dir, $saved_name, 150,150);
    // create_thumb($target_dir, $saved_name, 200,200);

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
   echo "<h3>Picture:            $saved_name</h3>";
   echo "<h3>message:            <p style='width:200px; padding:2px 10px; '>$message</p> </h3>";
   echo "</pre>";
   
    echo "<h3>Uploaded image</h3>";
if (is_file("thumbnail_100x100_$saved_name")){
    echo "<div style='width:130px;margin:10px'>";
    echo "<a href='thumbnail_100x100_$saved_name'><img src='thumbnail_100x100_$saved_name' style='width:100%;border:1px solid #000;border-radius:4px' alt='thumbnail_100x100_$saved_name'/>";
    echo "<p>thumbnail_100x100_$saved_name</p></a>";
    echo "</div>";

}
if (is_file("thumbnail_150x150_$saved_name")){
    echo "<div style='width:150px;margin:10px'>";
    echo "<a href='thumbnail_150x150_$saved_name'><img src='thumbnail_150x150_$saved_name' style='width:100%;border:1px solid #000;border-radius:4px' alt='thumbnail_150x150_$saved_name'/>";
    echo "<p>thumbnail_150x150_$saved_name</p></a>";
    echo "</div>";
}
if (is_file("thumbnail_200x200_$saved_name")){
    echo "<div style='width:170px;margin:10px'>";
    echo "<a href='thumbnail_200x200_$saved_name'><img src='thumbnail_200x200_$saved_name' style='width:100%;border:1px solid #000;border-radius:4px' alt='thumbnail_200x100_$saved_name'/>";
    echo "<p>thumbnail_200x200_$saved_name</p></a>";
    echo "</div>";
}

    echo "<div style='width:250px;margin:10px'>";
    echo "<a href='$target_dir'><img src='$target_dir' style='width:100%;border-radius:4px' alt='$saved_name'/>";
    echo "<p>$saved_name</p></a>";
    echo "</div>";

session_destroy();
?>