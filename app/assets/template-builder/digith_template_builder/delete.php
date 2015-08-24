<?php
set_time_limit(0);//folder
$dir = realpath("server/php/files");
getFile($dir);

//function
function getFile($dir){
//global $file_end;
if(is_dir($dir)){
$file = scandir($dir);
foreach($file as $v){
if($v != '..' && $v !='.' ){
getFile($dir.'/'.$v);
}
}
}
if(is_file($dir)){
unlink($dir);
echo $dir,"\r\n";
}
}/**/
?>