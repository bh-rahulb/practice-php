<!-- <form action="" method = "get">
Name : <input type="text" name="nm" id=""><br><br>
<input type="submit" value="submit">

</form> -->

<?php
// echo $_GET['nm'];
// $file = fopen("aman.txt","a");
// $a = " <br> hello aman ";
// fwrite($file,$a);
// // $a = fread($file,filesize("aman.txt"));
// // echo $a;
// fclose($file);
// unlink("aman.txt");

$a = 10;
$b = 20;
function fun(){
    $GLOBALS['a'];
    $GLOBALS['b'];
    echo $GLOBALS['a'] ."<br>". $GLOBALS['b'];
}
fun();
// echo $a;

// $a = array(123,234,34,3,34);
// print_r($a[2]);
// $a = array(
//     array(1,2,3),
//     array(4,5,6),
//     array(7,8,9),
// );
// print_r($a[2][1]);


?>