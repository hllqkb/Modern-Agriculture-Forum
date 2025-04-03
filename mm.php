<?php
session_start();
$mc=$_GET["mm"];
$mcc=$_GET["mmm"];
$zh=$_SESSION["zh"];
$rmb=$_SESSION["rmb"];
$sqlzh=$_SESSION["sqlzh"];
$sqlmm=$_SESSION["sqlmm"];
$sqllab=$_SESSION["sqllab"];
	 $a=mysqli_connect("localhost",$sqlzh,$sqlmm,$sqllab);
 if (!$a){
    die("连接数据库失败");
}
if ($rmb<500){
    echo("软妹币不足");
    b();
    exit;
}
else{
    $r=$rmb-500;
    $sql="update $sqllab set rmb='$r' where zh='$zh'";
    mysqli_query($a,$sql);
}
if ($mc==""){
     die("不会真有人不要密码吧？");
}
if (preg_match_all("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])$/",$mc)){
    die("密码含有非法字符");
}
if (strlen($mc)<4){
    die("密码长度不合格");
}
if (preg_match_all("/^[a-zA-Z][a-zA-Z0-9_]$|\s/",$mc))
{
    die("名字含有非法字符");
}
if ($mc!=$mcc){
   die("两次输入的密码不一样");
}
$sql="update $sqllab set mm='$mc' where zh='$zh'";
mysqli_query($a,$sql);
mysqli_close($a);
echo "修改成功";
b();
session_destroy();
setcookie("mm",$mc);
function b(){
echo "<a href='index.php'>返回主页</a>";
}
?>