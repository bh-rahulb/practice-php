<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
if(isset($_FILES['file'])){
    // print_r($_FILES['file']);
    $fname = $_FILES['file']['name'];
    echo $fname;
    $ftmpname = $_FILES['file']['tmp_name'];
    echo $ftmpname;
    // move_uploaded_file($ftmpname,"images/".$fname) ;

}
?>
    <form method="post", enctype = "multipart/form-data">
        User_Photo : <input type="file" name="file" id=""><br><br>
        <input type="submit" value="submit">
    </form>
</body>
</html>