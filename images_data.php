<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uploaded Images</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h3 class="text-center">Uploaded Images</h3>
        <div class="row py-3">
            <?php
                if($_SERVER['REQUEST_METHOD']== 'POST'){
                    $image=$_FILES['image'];
                    $img_bname=$image['name'];
                    $img_tmp_name=$image['tmp_name'];
                    $i=1;
                    foreach($img_tmp_name as $tmp_name){
                        $img_name="";
                        $target_dir="";
                        $ext="";
                        foreach($img_bname as $name){
                            $ext=pathinfo($name, PATHINFO_EXTENSION);
                            if(empty($ext)){
                            }else{
                                $img_name= $i ."_".time(). "." .$ext;
                            }
                        }
                        $target_dir="images/".$img_name;
                        move_uploaded_file($tmp_name, $target_dir);
                        if (file_exists($target_dir)){
                            echo '<div class="col-sm-12 col-md-4 col-lg-3 my-2">';
                            echo '<p class="text-center">'.$img_name.'</p>';
                            echo '<img src="'.$target_dir.'" width="100%"></div>';
                        }
                        $i+=1;
                    }
                }
            ?>
        </div>
    </div>
</body>

</html>