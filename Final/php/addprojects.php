<?php
include 'config.php';
$dbname="projects";
mysql_select_db($dbname);
session_start();
//$target='D:/';
//$f_target=$target.$f_name;
 //move_uploaded_file($target,$f_target);
//echo($f_content);
$name=$_SESSION['user'];
$title=$_POST['title'];
$desc=$_POST['description'];
$uid =$_SESSION['uid'];

//shell_exec('mkdir '.$title);
mkdir('../projects/'.$name.'/'.$title);
//echo $_FILES['file'][0];
//print_r($_FILES);
$path='projects/'.$name.'/'.$title.'/';
$query="insert into project (description,uid,project_title,path,count) VALUES ('$desc','$uid','$title','$path','$fc')";
if($res=mysql_query($query)){ 

foreach($_FILES['file']['tmp_name'] as $key => $tmp_name ){
    $file_name = $key.$_FILES['file']['name'][$key];
	
    $file_size =$_FILES['file']['size'][$key];
    $file_tmp =$_FILES['file']['tmp_name'][$key];
    $file_type=$_FILES['file']['type'][$key];
	if(!file_exists($file_name)){
	move_uploaded_file($_FILES['file']['tmp_name'][$key],'../projects/'.$name.'/'.$title.'/'.$file_name);
	//array_push($files,$file_name);
}
}
//print(urldecode('bling.php?'.$title));
$link=urldecode('../bling.php?title='.$title);
//$files=scandir("../projects/Vinay/uu/");
//$zip=zipit($files,"../projects/gg.zip");
chdir('../projects/'.$name.'/');
//echo(shell_exec('dir'));
echo(exec('git'));
header("Location:$link");
}
else{
	echo 'gg';
}
?>