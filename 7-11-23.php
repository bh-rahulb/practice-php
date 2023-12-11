<?php

// Multilevel Inheritance

// class parent1{
//    function fun(){
//       echo "hello i am fun <br>";
//    }
// }
// class level1 extends parent1{
//    function fun1(){
//       echo "hello i am fun2 <br>";
//    }
// }
// class level2 extends level1{
//    function fun2(){
//       echo "hello i am fun3 <br>";
//    }
// }
// class level3 extends level2{
//    function fun3(){
//       echo "hello i am fun4 <br>";
//    }
// }

// $obj =new level2();
// $obj->fun();
// $obj->fun1();
// $obj->fun2();


// Harraical Inheritance

class first{
    function fun_1(){
        echo "i am function 1<br>";
    }
}


class level_a extends first{
    function fun_2(){
        echo "i am function 2<br>";
    }
}


class level_a1 extends level_a{
    function fun_4(){
        echo "i am function 4<br>";
    }
}

class level_a2 extends level_a{
    function fun_5(){
        echo "i am function 5<br>";
    }
}


class level_b extends first{
    function fun_3(){
        echo "i am function 3<br>";
    }
}


class level_b1 extends level_b{
    function fun_6(){
        echo "i am function 6<br>";
    }
}

class level_b2 extends level_b{
    function fun_7(){
        echo "i am function 7<br>";
    }
}


$obj1 = new level_a1();

$obj1->fun_1();
$obj1->fun_2();
$obj1->fun_4();
echo "<br>";

$obj2 = new level_b2();

$obj2->fun_1();
$obj2->fun_3();
$obj2->fun_7();
echo "<br>";



?>