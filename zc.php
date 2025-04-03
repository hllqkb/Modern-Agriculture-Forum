<?php
session_start();
$sqlzh=$_SESSION["sqlzh"];
$sqlmm=$_SESSION["sqlmm"];
$sqllab=$_SESSION["sqllab"];
	 $a=mysqli_connect("localhost",$sqlzh,$sqlmm,$sqllab);
 if (!$a){
    die("连接数据库失败");
}
$sql="INSERT INTO $sqllab(zh,mm,tx,qm,ch,rmb) VALUES(?,?,?,?,?,?)";
$b = mysqli_stmt_init($a);
if(mysqli_stmt_prepare($b,$sql)){
mysqli_stmt_bind_param($b,'sssssi',$zh, $mm,$tx,$qm,$ch,$rmb);
if (!isset($_POST["zh"]) || !isset($_POST["mm"])){
    die("非法行为");
}
$zh=$_POST["zh"];
$mm=$_POST["mm"];
$mmm=$_POST["mmm"];
$tx="png/avatar.jpg";
$qm="暂无签名";
$rmb=1000;
include "function/ch.php";
$ch=rand(0,7);
$sql="select * from $sqllab where zh='$zh'";
$r=mysqli_query($a,$sql);
if (mysqli_num_rows($r)>0){
    while($row =mysqli_fetch_assoc($r)) {
    die("此账号已被注册");
    }
}
if (mb_strlen($zh)<4||mb_strlen($zh)>10){
    die("账号长度不合格");
}
if (strlen($zh)<4){
    die("密码长度不合格");
}
if (preg_match_all("/^[a-zA-Z][a-zA-Z0-9_]$|\s/",$zh))
{
    die("名字含有非法字符");
}
if ($mm==""){
     die("不会真有人不要密码吧？");
}
if (preg_match_all("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])$/",$mm)){
    die("密码含有非法字符");
}
if ($mm!=$mmm){
   die("两次输入的密码不一样");
}
$b->execute();
$b->close();
$a->close();
setcookie("zh",$zh);
setcookie("mm",$mm);
$d="upload/$zh/";
$dd=scandir($d);
foreach ($dd as $dd){
    if ($dd!="." and $dd!=".."){
    unlink($d.$dd);
}
}
rmdir($d);
mkdir($d);
echo "注册成功";
}
?>