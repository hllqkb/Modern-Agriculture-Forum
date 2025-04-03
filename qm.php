<?php
$q=$_GET["qm"];
session_start();
  $zh=$_SESSION["zh"];
    $sqlzh=$_SESSION["sqlzh"];
$sqlmm=$_SESSION["sqlmm"];
$sqllab=$_SESSION["sqllab"];
$a=mysqli_connect("localhost",$sqlzh,$sqlmm,$sqllab);
if (!$a){
    die("数据库连接失败");
}
if (mb_strlen($q)>50){
    die("签名过长");
}
$sql="update $sqllab set qm='$q' where zh='$zh'";
mysqli_query($a,$sql);
mysqli_close($a);
echo "修改签名成功<a href='home.html'>点我返回主页</a>";
?>