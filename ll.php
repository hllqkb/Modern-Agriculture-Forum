<?php
include "ll.html";
$png=$_POST["p"];
$title=$_POST["t"];
$text=$_POST["s"];
$zh=$_POST["z"];
$time=$_POST["ti"];
echo "<script src='ll.js'></script>";
echo "<script>ll('$png','$title','$text','$zh','$time')</script>";
?>