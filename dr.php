<?php
session_start();
$sqlzh=$_SESSION["sqlzh"];
$sqlmm=$_SESSION["sqlmm"];
$sqllab=$_SESSION["sqllab"];
$a=mysqli_connect("localhost",$sqlzh,$sqlmm,$sqllab);
if (mysqli_connect_errno()){
    echo("数据库连接失败");
    exit;
}
if (!isset($_POST["zh"]) || !isset($_POST["mm"])){
    die("非法行为");
}
$zh=$_POST["zh"];
$mm=$_POST["mm"];
$sql="select * from $sqllab where zh='$zh' and mm='$mm'";
$r=mysqli_query($a,$sql);
   if(mysqli_num_rows($r)>0) {
        while($row =mysqli_fetch_assoc($r)) {
    echo "登录成功";
    $_SESSION["zh"]=$zh;
    $_SESSION["mm"]=$mm;
    setcookie("zh",$zh);
    setcookie("mm",$mm);
    }
}
else {
    echo "登录失败";
}
$a->close();
?>