<?php
include 'config.php';
$name=$_GET['name'];
$pass=$_GET['pass'];
$dbname="users";
$d=mysql_select_db($dbname) or die(mysql_error());

$query="SELECT * FROM credentials where name='$name' AND pass='$pass'";
$res=mysql_query($query) or die(mysql_eroor());
$count=mysql_num_rows($res);
if(count==1) {
	mysql_query("update credentials set active=1 where name='$name'");
	
}
else echo('Jujubi');
?>