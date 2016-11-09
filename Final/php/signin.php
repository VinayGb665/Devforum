<?php
include 'config.php';
$email=$_POST['email'];
$pass=$_POST['pass'];
$req=md5($pass);
$dbname="users";
$db=mysql_select_db($dbname) or die(mysql_error());

$query="SELECT * from credentials where email='$email'";
$sl=mysql_query($query);
if(!$sl) die(mysql_error());
$row=mysql_fetch_array($sl);
//echo($row[3]);
//	echo($req);
if($row[5]==0) {$show="Please activate your account by verifying your email"; $what="Signin";$where="../signin.html";}
else{
if($row[3]==$req){session_start();
$_SESSION['loggedin']=true;
$_SESSION['user']=$row[2];
$_SESSION['uid']=$row[0];
header("Location:../homepage.html");
}
else {
	header("Location:../signin.html");
	
};}

?>
<html>
<style>
body{

background-color:#959595;
animation:fade-in 2s;
}
a{
position:relative;
top:350px;
font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
font-size:30px;
text-decoration:none;
color:black;
animation:fade-in 3.3s;
font-weight:lighter;
}
@keyframes fade-in{
from{opacity:0;}
to{opacity:1}
}
h1{
position:relative;
top:300px;

font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
		font-size:45px;
		font-weight:lighter;

}


</style>
<body>
<center><h1><?php echo($show) ?></h1></center>
<center><a href=<?php echo($where); ?> >Click here to <?php echo( $what);?> </a></center>
</body>


</html>


