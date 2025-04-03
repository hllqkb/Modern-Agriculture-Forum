<?php
include "study.html";
session_start();
$zh=$_SESSION["zh"];
$f=$_FILES["file"];
$mb=10;
if($f["error"]>0)
{
    die("文件上传错误:".$f["error"]);
    }
//大小限制100mb
if ($f["size"]/1024/1021>$mb){
    die("上传文件大小超过 $mb mb");
}
$allow=array("jpg","png");
$e=explode(".",$f["name"]);
$e=end($e);
$i=0;
foreach ($allow as $a){
    if ($e==$a){
   $i++;
}
}
if ($i==1){
    if (!file_exists("upload/".$f["name"])){
    $dd="upload/";
    move_uploaded_file($f["tmp_name"],$dd.$f["name"]);
  }
    }
else{
    die("非法文件名");
}
$p="upload/".$f["name"];
$t=$_POST["title"];
$te=$_POST["text"];
$te = str_replace("\r\n","<br>",$te);
  $zh=$_SESSION["zh"];
    $sqlzh=$_SESSION["sqlzh"];
$sqlmm=$_SESSION["sqlmm"];
$sqllab=$_SESSION["sqllab"];
$a=mysqli_connect("localhost",$sqlzh,$sqlmm,$sqllab);
if (!$a){
    die("数据库连接失败");
}
$sql="insert into wz(png,title,text,zh) values('$p','$t','$te','$zh')";
mysqli_query($a,$sql);
mysqli_close($a);
echo "<script> mdui.alert('发布成功'); setTimeout(\"window.location='function/getwz.php'\",1000);</script>";
?>

