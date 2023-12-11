<?php

// Polymorphism

class car{
    function mi(){
        echo "20Kmpl <br>";
    }
    function speed(){
        echo "30Kmpl <br>";
    }
    function seated(){
        echo "5 seated <br>";
    }
}

// functions in inheritance with same name called as overloading

class car2 extends car{
    function mi(){
        parent::mi();   // calling overloading functions called as overriding
        echo "30Kmpl <br>";
    }
    function speed(){
        parent::speed();
        echo "70Kmpl <br>";
    }
    function seated(){
        // parent::seated();
        echo "5 seated <br>";
    }
}

$obj = new car2();
$obj->mi();
$obj->speed();
$obj->seated();


?>