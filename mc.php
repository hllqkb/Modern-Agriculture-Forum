<?php
session_start();
$mc=$_GET["mc"];
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
$sql="select * from $sqllab where zh='$mc'";
$r=mysqli_query($a,$sql);
if (mysqli_num_rows($r)>0){
    die("此名称已被使用");
}
if ($mc==""){
     die("不会真有人不要名称吧？");
}
if (mb_strlen($mc)<4 || mb_strlen($zh)>10){
    die("名称长度不合格");
}
if (preg_match_all("/^[a-zA-Z][a-zA-Z0-9_]$|\s/",$mc))
{
    die("名字含有非法字符");
}
$sql="update $sqllab set zh='$mc' where zh='$zh'";
mysqli_query($a,$sql);
mysqli_close($a);
echo "修改成功";
b();
session_destroy();
setcookie("zh",$mc);
function b(){
echo "<a href='index.php'>返回主页</a>";
}
?>