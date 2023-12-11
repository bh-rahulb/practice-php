<?php
$a=array("aman","bahubali","cameraman","engineer","developer", "rahul","rishi");

$q = $_REQUEST["q"];
$hints = "";


if ($q !== "") {
  $q = strtolower($q);
  $len=strlen($q);
  foreach($a as $name) {
    if (stristr($q, substr($name, 0, $len))) {
      if ($hints === "") {
        $hints = $name;
      } else {
        $hints .= ", $name";
      }
    }
  }
}

echo $hints === "" ? "no suggestion" : $hints;

?>