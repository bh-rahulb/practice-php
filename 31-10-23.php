<?php

// 29-9-23.php
// file handling

// 1. write "w"

$createFile= fopen("newfile.txt","w");

fwrite($createFile,"Hello world!<br>");
fclose($createFile);


// 2. update "a"

$openFile= fopen("newfile.txt","a");

fwrite($openFile,"Hi World!<br>");
fwrite($openFile,"Namaste World!<br>");
fwrite($openFile,"Hello PHP!<br>");
fwrite($openFile,"Hi PHP!<br>");
fwrite($openFile,"Nmaste PHP!<br>");
fclose($openFile);




// 30-9-23.php
// 3.read 

$readFile=fopen("newfile.txt","r");
echo fread($readFile,filesize("newfile.txt"));
fclose($readFile);


// 4.delete

// unlink("newfile.txt");

// $file="newfile.txt";
// require $file;


?>