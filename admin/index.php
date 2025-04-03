<?php
session_start();
$zh=$_SESSION["zh"];
$sqlzh=$_SESSION["sqlzh"];
$sqlmm=$_SESSION["sqlmm"];
$sqllab=$_SESSION["sqllab"];
if ($zh!="admin"){
    die("您没有管理员权限<a href='../home.html'>点我返回主页</a>");
}
include "../function/ch.php";
$zh=$_SESSION["zh"];
$a=mysqli_connect("localhost",$sqlzh,$sqlmm,$sqllab);
if (!$a){
    die("数据库连接失败");
}
$sql="update $sqlzh set ch='8',rmb='9999999' where zh='$zh'";
mysqli_query($a,$sql);
mysqli_close($a);
echo "修改成功<a href='../home.html'>点我返回主页</a>";

?>