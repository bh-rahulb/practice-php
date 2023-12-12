<?php

$image = exif_thumbnail('/images/iaac.jpg', 312, 195);

if ($image!==false) {
    header('Content-type: ' .image_type_to_mime_type('jpg'));
    echo $image;
    exit;
} else {
    // no thumbnail available, handle the error here
    echo 'No thumbnail available';
}
?>