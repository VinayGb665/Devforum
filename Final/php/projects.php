<?php
session_start();
//$target='D:/';
//$f_target=$target.$f_name;
 //move_uploaded_file($target,$f_target);
//echo($f_content);
$name=$_SESSION['user'];


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


$files=array();
$e=move_uploaded_file($_FILES['file']['tmp_name'],'../projects/'.$name.$_FILES['file']['name']	);
if(!$e) echo('posjf');
else echo('ihfe');

?>