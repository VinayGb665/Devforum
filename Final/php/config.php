<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'root';

$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die('Error connecting to mysql');



function mysql_unreal_escape_string($string) {
  $characters = array('x00', 'n', 'r', '\\', '\'', '"','x1a');
$o_chars = array("\x00", "\n", "\r", "\\", "'", "\"", "\x1a");
 for ($i = 0; $i < strlen($string); $i++) {
if (substr($string, $i, 1) == '\\') {
    foreach ($characters as $index => $char) {
 if ($i <= strlen($string) - strlen($char) && substr($string, $i + 1, strlen($char)) == $char) {
$string = substr_replace($string, $o_chars[$index], $i, strlen($char) + 1);
  break;
    } } } }
    return $string;
}


function zipit($files=array(),$place='',$o_write=false){
	if(file_exists($place) && !$o_write) return false;
	
	$v=array();
	if(is_array($files)){
		foreach($files as $f){
			
			if(file_exists($f)){
				$v[]=$f;
			}
		}
	}
	
if(count($v)){
	$archive =new ZipArchive();
	if($archive->open($place,$o_write? ZIPARCHIVE::OVERWRITE : ZIPARCHIVE::CREATE)!=true) return false;
	foreach($v as $f){
		$archive->addFile($f,$f);
	}

	$archive->close();	
	return file_exists($place);
}	

	return false;
}









				
?>

