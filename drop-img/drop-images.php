<h3>Uploaded image</h3>
<?php
    if(isset($_GET['filename'])){
        $image = $_GET['filename'];
        $img_name = basename($image);
        $target_dir="images/".$img_name;

        // Check if the file exists before attempting to display it
        if(file_exists($target_dir)){
            echo "<p>".$img_name."<p>";
            echo "<img src=".$target_dir." width='250px'>";
        } else {
            echo "File not found.";
        }
    } else {
        echo "No filename provided.";
    }
?>
