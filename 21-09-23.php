<?php
// user defined functions

// function func(){
// echo "Hello<br>";
// }

function func($name){
    return "Hello $name<br>";
    }


// func("Rahul");
// echo func("Rahul");

function add($a,$b,$c){
    echo $a+$b+$c;
}

// add(800,80,50);

function subtract($a,$b){
    echo $a-$b;
}

// subtract(500,60);

function multiply($a,$b){
    echo $a*$b;
}

// multiply(50,3);

function percent($totalMarks,$oMarks){
echo $oMarks/$totalMarks*100 . "%";
}

percent(100,79);
?>
