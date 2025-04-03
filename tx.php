<?php
session_start();
$f=$_FILES["file"];
function update($n){
    $zh=$_SESSION["zh"];
    $sqlzh=$_SESSION["sqlzh"];
$sqlmm=$_SESSION["sqlmm"];
$sqllab=$_SESSION["sqllab"];
$a=mysqli_connect("localhost",$sqlzh,$sqlmm,$sqllab);
if (!$a){
    die("数据库连接失败");
}
$sql="UPDATE $sqllab SET tx='$n' where zh='$zh'";
mysqli_query($a,$sql);
mysqli_close($a);
}
if($f["error"]>0)
{
    die("文件上传错误:".$f["error"]);
    }
    if (file_exists("upload/".$f["name"])){
    update("upload/".$f["name"]);
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
    move_uploaded_file($f["tmp_name"],"upload/".$f["name"]);
    update("upload/".$f["name"]);
    }
else{
    die("非法文件名");
}
echo "上传成功<a href='home.html'>返回主页</a>";
    ?>