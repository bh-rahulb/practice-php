<?php
function create_thumb($image,$name,$width,$height){
    
if (is_file($image)){
    // get image size
    $info= getimagesize($image);

    $img_width=$info[0];
    $img_height=$info[1];

    // check image farmat
    if($info['mime']=="image/jpeg"){
        $source=imagecreatefromjpeg($image);
    }elseif($info['mime']=="image/png"){
        $source=imagecreatefrompng($image);
    }elseif($info['mime']=="image/gif"){
        $source=imagecreatefromgif($image);
    }
    else{
        return false;
    }

}else{
    echo 'file not exists';
}

// image object representing a black image 
$thumb=imagecreatetruecolor($width,$height);

// aspect ratio of original and thumbnail
// $src_aspect=$img_width/$img_height;
// $thumb_aspect=$width/$height;

// if($src_aspect<$thumb_aspect){
//     // height is max
//     $scale=$width/$img_width;
//     $thumb_width=$width;
//     $thumb_height=$width/$src_aspect;
//     $img_x=0;
//     $img_y=($img_height*$scale-$height)/$scale/2;
// }elseif($src_aspect>$thumb_aspect){
//     // width is max
//     $scale=$width/$img_height;
//     $thumb_width=$height*$src_aspect;
//     $thumb_height=$height;
//     $img_x=($img_width*$scale-$width)/$scale/2;
//     $img_y=0;
// }else{
//     // same height and width
//     $thumb_width=$width;
//     $thumb_height=$height;
//     $img_x=0;
//     $img_y=0;
// }
$thumb_width=$width;
    $thumb_height=$height;
    $img_x=0;
    $img_y=0;

$resize=imagecopyresized($thumb,$source,0,0, $img_x,$img_y,$thumb_width,$thumb_height,$img_width,$img_height);

$target="thumbnail_".$width."x".$height."_".$name;

// imagepng($thumb,$target);

var_dump ($img_width);echo "<br>";
var_dump ($img_height);echo "<br>";
var_dump ($src_aspect);echo "<br>";
var_dump ($thumb_aspect);echo "<br>";
var_dump ($scale);echo "<br>";
var_dump ($thumb_height);echo "<br>";
var_dump ($thumb_width);echo "<br>";
var_dump ($img_y);echo "<br>";
var_dump ($img_x);echo "<br>";
var_dump ($resize);echo "<br>";

}

create_thumb("images/1702470085.jpg","new.png", 500, 300);

?>