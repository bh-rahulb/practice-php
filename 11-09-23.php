<?php
$num1 = 20;
$num2 = 10;

// operator 

// 1. arithematic

// $result = $num1 + $num2; // Addition  (Sum)
// $result = $num1 - $num2; // Subtraction (Difference)
// $result = $num1 * $num2; // Multiplication (Product)
// $result = $num1 / $num2; // Division 
// $result = $num1 % $num2; // Modulus (remainder)
// $result = $num1 ** $num2; // Exponentiation  (power)

// 2. assignment

// $num1 += $num2; // same as $num1 + $num2
// $num1 -= $num2;
// $num1 *= $num2;
// $num1 /= $num2;

// 3. comparison

// $result= $num1 == $num2;  // equal
// $result= $num1 === $num2; // equal (check datatypes too)
// $result= $num1 != $num2;  // not equal
// $result= $num1 !== $num2;  // not equal (check datatypes too)
// $result= $num1 < $num2;  //  less than
// $result= $num1 > $num2;  //  greater than
// $result= $num1 <= $num2;  //  less than or equal to
// $result= $num1 <= $num2;  //  greater than or equal to

// 4. logical

// &&  and
// ||  or
// !()  not

// 5. increment decrement

// $result= ++$num1; // pre increment
// $result= --$num2; // pre decrement
// $result= $num2++; // post increment
// $result= $num1--; // post decrement

// 6. array

$arr1 = array(1,2,3,4,5);  
$arr2 = array(1,2,3,4,5,6,7,8);  

print_r($arr1 + $arr2); // union
print_r($arr1 == $arr2); // Equal
print_r($arr1 === $arr2); // Equal (checks datatype too)

// 7. string

$fname="Rahul";
$lname=" Rishi";

$result=$fname.$lname;  // . concatenation
$fname.=$lname;  // . concat asignment

// echo $result;
// echo $fname;

?>