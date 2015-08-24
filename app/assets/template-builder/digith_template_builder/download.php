<?php

if(get_magic_quotes_gpc()){ 

	function stripslashes_deep($value){ 

		$value=is_array($value)?array_map('stripslashes_deep',$value):stripslashes($value); 
		return $value; 
	}

     $_POST=array_map('stripslashes_deep',$_POST);
     $_GET=array_map('stripslashes_deep',$_GET);
     $_COOKIE=array_map('stripslashes_deep',$_COOKIE);
     $_REQUEST=array_map('stripslashes_deep',$_REQUEST);
}
	 
if(empty($_POST['filename']) || empty($_POST['content'])){
	exit;
}

$filename = preg_replace('/[^a-z0-9\-\_\.]/i','',$_POST['filename']);

header("Cache-Control: ");
header("Content-type: text/plain");
header('Content-Disposition: attachment; filename="'.$filename.'"');

echo $_POST['content'];

?>