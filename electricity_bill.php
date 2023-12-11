<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electricity Bill</title>
    <style>
        body{
            background-color: #21212170;
        }
        .container{
            width:350px;
            height:300px;
            margin:25px auto;
            padding:1px 25px;
            background-color:palegreen;
            border-radius:8px;
            box-shadow:0 0 10px 2px ;
        }
        h1{
            text-align:center;
            font-family: cursive;
            color:brown;
        }
        form{
            display:flex;
            justify-content:center;
        }
        input{
            margin: 8px 8px;
            padding: 8px 5px;
            border:none;
            border-radius:5px;
        }
        input:focus{
            outline:0;
            box-shadow:0 0 5px 2px skyblue;
        }
        h2{
            color:teal;
            font-family:monospace;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Electricity Bill</h1>
        <form method='post'>
            <input type="number" name='unitUsed' placeholder='Enter units' value=/>
            <input type="submit" value="Submit">
        </form>
    <h2>
        <?php
        $unit=5;
        $unitsLimit=160;  
        $unitUsed=$_POST["unitUsed"];
        $fine=500;
        $bill=$unitUsed*$unit;
        echo "Units used = $unitUsed<br>";
        if($unitUsed<=$unitsLimit){
            echo "Your bill is Rs$bill";
        }
        elseif($unitUsed>$unitsLimit){
            $totalBill=$bill+$fine;
            echo"You have use more than $unitsLimit units<br>";
            echo "Fine is Rs$fine <br>Your bill is Rs$totalBill";
        }
        else{
            echo"Please enter units";
        }
        
        ?>
    </h2>
    </div>
</body>

</html>