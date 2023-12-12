<?php

function generateThumbnail($img, $width, $height, $quality = 90)
{
    if (!is_readable($img)) {
        throw new Exception("No valid image provided with {$img}.");
    }

    $pathInfo = pathinfo($img);
    $filename_no_ext = $pathInfo['filename'];

    $imagick = new Imagick(realpath($img));
    $imagick->setImageFormat('jpeg');
    $imagick->setImageCompression(Imagick::COMPRESSION_JPEG);
    $imagick->setImageCompressionQuality($quality);

    $imagick->thumbnailImage($width, $height, true, false); // Maintain aspect ratio

    $thumbnailFilename = $filename_no_ext . '_thumb.jpg';

    if (!$imagick->writeImage($thumbnailFilename)) {
        throw new Exception("Could not write thumbnail contents for {$thumbnailFilename}.");
    }

    return true;
}

// Example usage
try {
    generateThumbnail('images/iaac.jpg', 100, 50, 65);
} catch (ImagickException $e) {
    echo $e->getMessage();
} catch (Exception $e) {
    echo $e->getMessage();
}
?>