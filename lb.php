<?php
include "function/user.php";
$d=scandir("upload/$zh/");
$a="";
foreach ($d as $d){
    if ($d!="." and $d!=".."){
    $d=$d.":".$a;
    $a=$d;
    
    }
}
echo $d;
?>