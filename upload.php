<?php
include "nc.php";
session_start();
$zh=$_SESSION["zh"];
$nc=$_SESSION["nc"];
$f=$_FILES["file"];
$mb=10;
$maxmb=100;
if($f["error"]>0)
{
    die("文件上传错误:".$f["error"]);
    }
    if (file_exists("upload/".$zh."/".$f["name"])){
        
    die("上传失败，文件已存在");
}
//大小限制100mb
if ($f["size"]/1024/1024>$mb){
    die("上传文件大小超过 $mb mb");
}
if ($nc>$maxmb){
    die("上传文件总大小超过 $maxmb mb");
}
$allow=array("jpg","png","zip","txt","apk");
$e=explode(".",$f["name"]);
$e=end($e);
$i=0;
foreach ($allow as $a){
    if ($e==$a){
   $i++;
}
}
if ($i==1){
    $dd="upload/".$zh."/";
    if (!file_exists($dd)){
    mkdir($dd);
}
    move_uploaded_file($f["tmp_name"],$dd.$f["name"]);
    echo "上传成功<a href='bj.html'>返回文件列表</a>";
    
}
else{
    die("非法文件名");
}
    ?>