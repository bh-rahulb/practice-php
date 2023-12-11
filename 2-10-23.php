
<!-- multiple values from checkbox -->

<!-- <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
Hobbies : Dancing<input type="checkbox" name="hobby[]" value='dancing' /> Singing<input type="checkbox" name="hobby[]" value='singing'/> Acting<input type="checkbox" name="hobby[]" value='acting'/><br>
<input type="submit" value="Submit">
</form> -->


<?php
// foreach ( $_POST["hobby"] as $values) {
//     echo $values."<br>";
// }

$arr=array("HTML","CSS","JavaScript","PHP");
$str=implode(" ",$arr);
echo $str. "<br>";

$str= "Hello welcome to Hollywood";
$arr=explode(" ", $str);
print_r ($arr);

?>
