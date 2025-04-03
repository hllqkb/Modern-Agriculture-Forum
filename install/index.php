<?php
	$zh=$_GET["zh"];
   $mm=$_GET["mm"];
   $lab=$_GET["lab"];
   $host="localhost";
   $port="3306";
   $a=@mysqli_connect($host,$zh,$mm,$lab);
   if (!$a){
    die("数据库连接失败");
}
//数据库安装
mysqli_query($a,"drop table $lab");
mysqli_query($a,"drop table wz");
// 使用 sql 创建数据表
$sql = "CREATE TABLE $lab (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
zh VARCHAR(10) NOT NULL,
mm VARCHAR(30) NOT NULL,
tx TEXT NOT NULL,
qm VARCHAR(50) NOT NULL,
ch VARCHAR(30) NOT NULL,
rmb VARCHAR(30) NOT NULL,
reg_date TIMESTAMP
)";
 
if (!mysqli_query($a, $sql)) {
    die("创建数据表错误: " . mysqli_error($a));
}
$sql = "CREATE TABLE wz (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
png TEXT NOT NULL,
title VARCHAR(20) NOT NULL,
text TEXT NOT NULL,
zh VARCHAR(10) NOT NULL,
date TIMESTAMP
)";
 
if (!mysqli_query($a, $sql)) {
    die("创建数据表错误: " . mysqli_error($a));
}
mysqli_close($a);
 //重置
setcookie("zh",null,time()-100);
setcookie("mm",null,time()-100);
unset($_COOKIE["zh"]);
unset($_COOKIE["mm"]);
   $f="../config.php";
   include $f;
   @file_put_contents($f,'<?php
/*数据库配置*/
$c=array(
	"host" => "'.$host.'", //数据库服务器
	"port" => '.$port.', //数据库端口
	"sqlzh" => "'.$zh.'", //数据库用户名
	"sqlmm" => "'.$mm.'", //数据库密码
	"sqllab" => "'.$lab.'" //数据库名
);
?>');
if (file_exists("lock.lock")){
    die("你已经安装过了，如果要重新安装，请到install目录删除lock.lock文件<a href='../index.php'>点我跳转到主页</a>");
}
$f=fopen("lock.lock","w");
   echo "安装成功<a href='../index.php'>点我跳转到主页</a>";
?>