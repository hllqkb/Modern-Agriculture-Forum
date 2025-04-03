<?php
session_start();
$zh=$_SESSION["zh"];
$f="upload/$zh/";
$size=0;
function gds($f){
    global $size;
   $ff=scandir($f);
   foreach ($ff as $fff){
    if ($fff!="." and $fff!=".."){
    $size+=filesize($f.$fff);
}
}
return floor($size/1024/1024);
}
echo gds($f);
$_SESSION["nc"]=gds($f);
?>