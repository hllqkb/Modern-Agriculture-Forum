<?php
$f=file_get_contents("fun.txt");
$f=explode("\n",$f);
$r=array();
foreach ($f as $yy){
array_push($r,substr($yy,strpos($yy,":")+1));
 }
$r=$r[rand(0,count($r)-1)];
print_r($r);
?>