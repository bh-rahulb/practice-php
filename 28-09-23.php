<?php

$search = "21323";
$pattern = "/^[0-9]*$/";

$result = preg_match($pattern,$search);


if ($result){
    echo "ok good";
}
else{
    echo "not good";
}



?>