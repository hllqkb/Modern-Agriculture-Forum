<?php
session_start();
$zh=$_SESSION["zh"];
$mm=$_SESSION["mm"];
if (!$_SESSION["zh"] or !$_SESSION["mm"]){
        die("请重新登录");
    }
    //session_destroy();
    echo "$zh";
?>