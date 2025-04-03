<?php
include "../study.html";
	session_start();
$zh=$_SESSION["zh"];
$mm=$_SESSION["mm"];
if (!$_SESSION["zh"] or !$_SESSION["mm"]){
        header("location:../index.html");
    }
$sqlzh=$_SESSION["sqlzh"];
$sqlmm=$_SESSION["sqlmm"];
$sqllab=$_SESSION["sqllab"];
$zh=$_SESSION["zh"];
$a=mysqli_connect("localhost",$sqlzh,$sqlmm,$sqllab);
if (!$a){
    echo("数据库连接失败");
    exit;
}
$sql="select * from wz order by id desc";
$r=mysqli_query($a,$sql);
if (mysqli_num_rows($r)>0){
    while ($rr=mysqli_fetch_array($r)){
        $png=$rr["png"];
        $title=$rr["title"];
        $text=$rr["text"];
        $zh=$rr["zh"];
        $date=$rr["date"];
        echo "<script src='../js/jquery.lazyload.js' type='text/javascript'></script>";
                         echo "<script src=\"start.js\"></script>";
           echo "<script> start(\"../$png\",\"$title\",\"$text\",\"$zh\",\"$date\")</script>";
}
}
else{
    echo "暂时还没有人发布文章";
}
mysqli_close($a);
?>