<?php
// Abstraction


abstract class car{
    protected $name;
    public $model;
    public function __construct($name,$model){
        $this->name = $name;
        $this->model= $model;

    }
    abstract public function intro();
}


// Child class

class audi extends car{
    public function intro(){
        return ("Name :".$this->name."<br>"."Model :".$this->model);
    }
}

class volvo extends car{
    public function intro() {
        return ("Name :".$this->name."<br>"."Model :".$this->model);
    }
}


$obj = new audi(" Audi"," 2018");
echo $obj->intro();

echo "<br><br>";

$obj1 = new volvo(" Volvo"," 2023");
echo $obj1->intro();

// Filter

// $a = "https://www.google.com";

// if(filter_var($a,FILTER_VALIDATE_URL)){
//     echo "URL";
// }
// elseif (filter_var($a,FILTER_VALIDATE_INT)) {
//     echo "Integer";
// }
// elseif (filter_var($a,FILTER_VALIDATE_FLOAT)) {
//     echo "Float";
// }
// elseif (filter_var($a,FILTER_VALIDATE_EMAIL)) {
//     echo "String";
// }
// else{
//     echo "not defined";
// }

?>