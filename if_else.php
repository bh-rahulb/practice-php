<?php

$num1=50;
$num2=10;

$oprator="%";

if($oprator=="+"){
    echo "addition is ". $num1 + $num2;
}
elseif($oprator=="-"){
    echo "diffrence is ". $num1 - $num2;
}
elseif($oprator=="*"){
    echo "multiplication is ". $num1 * $num2;
}
elseif($oprator=="/"){
    echo "division is ". $num1 / $num2;
}
elseif($oprator=="%"){
    echo "remainder is ". $num1 % $num2;
}
else{
    echo "enter valid numbers and oprator";
}

?>