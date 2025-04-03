<?php
//	exec("unzip -P 123456 -d /home/web/zip/ o.zip");
echo "文件列表";
    function l($f){
$s=scandir($f);
$l=count($s);
for ($i=0;$i<$l;$i++){
   $ss= $s[$i];
   if ($ss!="." and $ss!=".."){
    if (!is_dir($ss)){
        echo("<a href='".$f."/".$ss."'>".$ss."</a>");
         $a=explode(".",$ss);
   if(end($a)=="zip")
   {
       echo "<button>解压</button>";
       }
       echo "<br>";
        }
    else{
    l($f."/".$ss);
}
}
}
}
l("./");
?>