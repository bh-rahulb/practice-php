<?php
// $a  = array("nancy"=>23, "aman" => 20 , "rahul" => 24);
// foreach($a as $i => $v){
//     echo $i. "=" . $v."<br>";
// }

// $a = array(1,2,4,6,7);
// echo $a[1];
$a=array(654,6565,5,54,35,5348,465,35);
$vlength = count($a);

sort($a);
for ($i = 0 ; $i < $vlength ; $i++ ){
    echo $a[$i];
    echo "<br>";
}
echo "<br><br>";

rsort($a);
for ($i = 0 ; $i < $vlength ; $i++ ){
    echo $a[$i];
    echo "<br>";
}
echo "<br><br>";

$b = array("nancy"=>23, "neha"=>30 , "shivani"=>20);

// asort($b);    // associated array in ascending order by value
// ksort($b);    // associated array in ascending order by key
// arsort($b);   // associated array in descending order by value
krsort($b);   // associated array in descending order by key

foreach($b as $i => $v){
    echo $i . "=" . $v;
    echo "<br>";
}

?>