<?php
session_start();
include "config.php";
if (!isset($c["sqlzh"]) || !isset($c["sqlmm"]) || !isset($c["sqllab"]) || !file_exists("install/lock.lock")){
    include "install/index.html";
    exit;
}
$_SESSION["sqlzh"]=$c["sqlzh"];
$_SESSION["sqlmm"]=$c["sqlmm"];
$_SESSION["sqllab"]=$c["sqllab"];
include "index.html";
if (isset($_COOKIE["zh"]) and isset($_COOKIE["mm"])){
        echo "<script>var zh='".$_COOKIE["zh"]."'</script>";
    echo "<script>var mm='".$_COOKIE["mm"]."'</script>";
   echo  "<script>document.querySelector('input[name=drzh]').value=zh</script>";
echo "<script>document.querySelector('input[name=drmm]').value=mm</script>";
}
?>