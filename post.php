<?php
	function post($url,$data){
    $data=http_build_query($data);
    $a=array(
    "http"=>array(
    "method"=>"post",
    "content"=>$data
    )
    );
    $a=stream_context_create($a);
    return file_get_contents($url,true,$a);
}
?>