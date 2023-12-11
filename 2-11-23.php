<?php
// try{
//     $num = 4;
//     if ($num > 15){
//         throw new Exception("value must be less than 15");
//     }
// }
// catch(Exception $e){
//     echo "error ".$e->getMessage();
// }
// finally{
//     echo "<br> i am very faltu person";
// }


try{
    $num = 205;
    if ($num > 15){
        throw new error("value must be less than 15");
    }
}
catch(error $e){
    echo $e->getMessage();
}
finally{
    echo "<br> i am very faltu person";
}

?>