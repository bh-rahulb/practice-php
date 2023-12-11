<?php
$num=10;

// echo $num==5 ? "true" : "false"; // ternary condition

// control flow statements

// 1. conditional statements

$marks=5;

if($marks<=100 && $marks>95){
    echo "Grade A<sup>+</sup>";
}
elseif($marks<=95 && $marks>85){
    echo "Grade A";
}
elseif($marks<=85 && $marks>75){
    echo "Grade B<sup>+</sup>";   
}
elseif($marks<=75 && $marks>65){
    echo "Grade B";
}
elseif($marks<=65 && $marks>55){
    echo "Grade C<sup>+</sup>";   
}
elseif($marks<=55 && $marks>45){
    echo "Grade C";
}
elseif($marks<=45 && $marks>33){
    echo "Grade D";
}
elseif($marks<=33 && $marks>=0){
    echo "Fail";
}
else{
    echo"invalid  number";
}

?>