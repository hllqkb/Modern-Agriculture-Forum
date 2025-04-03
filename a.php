<?php
function kill($d){
if (is_dir($d)){
    scandir($d);
    foreach ($d as $dd){
        if ($dd!="." and $dd!=".."){
    unlink($d.$dd);
    }
}
rmdir($d);
}
else{
        unlink($d."/".$dd);
        }
}
$d="upload/admin/";
scandir($d);
    foreach ($d as $dd){
        
            }
?>