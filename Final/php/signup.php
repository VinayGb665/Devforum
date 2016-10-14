<?php
include 'config.php';

$dbname="users";
$db=mysql_select_db($dbname) or die(mysql_error());

$name=mysql_real_escape_string($_POST['name']);
$mail=mysql_real_escape_string($_POST['email']);
$pass=md5($_POST['pass'].$_POST['email']);
$check="SELECT * FROM credentials WHERE name='$name' OR mail ='$mail'";
$s=mysql_query($check);
$count=mysql_num_rows($s);
if($count!=0){
	header('Location:nn.html');
	return;
}
//echo($pass);
$query="INSERT INTO credentials (id,name,mail,pass) VALUES (1,'$name','$mail','$pass')";
$res=mysql_query($query) or die(mysql_error());
if($res==true){
	session_start();
	$_SESSION['loggedin']=true;
	$_SESSION['user']=mysql_unreal_escape_string($name);
	echo('done');
	
}




?>