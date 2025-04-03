<?php
include "ch.php";
session_start();
$sqlzh=$_SESSION["sqlzh"];
$sqlmm=$_SESSION["sqlmm"];
$sqllab=$_SESSION["sqllab"];
$zh=$_SESSION["zh"];
$a=mysqli_connect("localhost",$sqlzh,$sqlmm,$sqllab);
if (!$a){
    echo("数据库连接失败");
    exit;
}
$sql="select * from $sqllab where zh='$zh'";
$r=mysqli_query($a,$sql);
if (mysqli_num_rows($r)>0){
    while ($rr=mysqli_fetch_array($r)){
       $ch=ch($rr["ch"]);
    echo $ch[0].":".$ch[1].":".$rr["tx"].":".$rr["qm"].":".$rr["rmb"];
    $_SESSION["rmb"]=$rr["rmb"];
}
}
else{
    echo "查询错误";
}
mysqli_close($a);
?>