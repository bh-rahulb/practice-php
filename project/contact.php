<?php
$name=$mobileNo=$email=$message=$nameerr=$mobileNoerr=$emailerr=$messageerr="";

function text_input($data){
    $data=htmlspecialchars($data);
    $data=slice($data);
    return $data;
}
if($_SERVER['REQUEST_METHOD']=="POST"){
    $name=($_POST['name']);
    $mobileNo=($_POST['mobileNo']);
}

if(empty($name)){
    $nameerr ="Please enter your name";
}elseif((strlen($name)<4)){
    $nameerr ="name must be minimum four characters";
}elseif(!preg_match("/^[a-z]*$/i",$name)){
    $nameerr = "only letters";
}else{
    $name=text_input($name);
}

if((strlen($mobileNo)==10)&&(!preg_match("/^[0-9]*$/",$mobileNo))){
    $mobileNoerr= "enter ten digis Mobile no.";
}else{
    $mobileNo=text_input($mobileNo);
}



?>