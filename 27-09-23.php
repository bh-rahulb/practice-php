<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form{
            width:250px;
            text-align:center;
            margin:20px auto;
        }
        h2 {
        text-align: center;
    }

    .gallary {
        width: 90%;
        margin: 0 auto;
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;
    }

    .gallary img {
        width: 300px;
        border-radius: 5px;
        box-shadow: 0 0 7px 2px;
        transition:0.4s;
    }

    .gallary img:hover {
        transform: scale(1.03);
        box-shadow: 0 0 10px 2px;
    }
    </style>
</head>
<body>

<form action="" method="post">
    <input type="search" name="search" placeholder='' />
    <input type="submit" value="Submit"/>
</form>
    <?php
        // regular Expressions
        $search=$_POST['search'];
        if(preg_match(('/shirt/'),$search)){
            echo include 'tshirt.html';
        }
        elseif(preg_match(('/suit/'),$search)){
            echo include 'suit.html';
        }
        elseif(preg_match(('/lehnga/'),$search)){
            echo include 'lehnga.html';
        }
        elseif(preg_match(('/jeans/'),$search)){
            echo include 'jeans.html';
        }
        else{
            echo "<h3>item not found</h3>";
        }

    ?>
</body>
</html>