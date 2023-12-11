<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tables</title>
    <style>
        .container{
            width:300px;
            margin:25px auto;
            text-align:center;
        }
        input{
            margin-bottom:8px;
        }
        .table{
            width:100px;
            margin:25px auto;
            padding:5px;
            border:2px solid black;
        }
        h3{
            text-align:center;
            margin:0 0 0 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Table</h1>
        <form action="" method='post'>
            <input type="text" name='num' placeholder='Enter a number' required />
            <input type="submit" value="Submit">
        </form>
    </div>
    <div  class="table">
            <?php
            // for loop

            // $num= $_POST["num"];
            // echo "<h3>table of $num</h3>";
            // for($i=1; $i <= 10; $i++) {
            //     $result=$num*$i;
            //     echo "$num x $i = $result <br/>";
            // }

            
            // while loop
                // $num= $_POST["num"];
                // echo "<h3>table of $num</h3>";
                // $i=1;
                // while($i<=10){
                //     $result=$num*$i;
                //     echo "$num x $i = $result<br>" ;
                //     $i++;
                // }



            // do while loop
                $num= $_POST["num"];
                echo "<h3>table of $num</h3>";
                $i=1;
                do{
                    $result=$num*$i;
                    echo "$num x $i = $result<br>" ;
                    $i++;
                }
                while($i<=10)
            ?>

        </div>
</body>

</html>