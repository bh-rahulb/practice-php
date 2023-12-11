<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .container{
            width:300px;
            margin:25px auto;
            text-align:center;
        }
        input{
            margin:8px 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Doller to Inr</h1>
        <form method='post'>
            <select name="currency" id="">
                <option value="doller">Doller</option>
                <option value="rupee">Rupee</option>
            </select><br/>
            <input type="text" name='num' placeholder='Enter number' required /><br />
            <input type="submit" value="Submit">
        </form>
        <h2>
            <?php
                $currency= $_POST["currency"];
                if($currency=="doller"){
                    $num= $_POST["num"];
                    $rupee=82*$num;
                    echo "$num$ is ₹$rupee";
                }
                elseif($currency=="rupee"){
                    $num= $_POST["num"];
                    $doller=$num/82;
                    echo "₹$num is $doller$";
                }
                else{
                    echo "please select currency";
                }
            ?>
        </h2>
    </div>

</body>

</html>