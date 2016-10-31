<?php
include 'config.php';

$name=$_GET['name'];
echo($name);
$pass=$_GET['pass'];
$dbname="users";
$d=mysql_select_db($dbname) or die(mysql_error());

$query="SELECT * FROM credentials where name='$name' AND pass='$pass'";
$res=mysql_query($query) or die(mysql_eroor());
$count=mysql_num_rows($res);
echo $count;
if($count==1) {
	mysql_query("update credentials set active=1 where name='$name'");
	$what ="Your account has been activated successfuly.Please wait while we redirect";
	$where="../signin.html";
	$do="Please login with your credentials";
}
else {
	
	$what="The link is invalid or expired.Please wait while we redirect";
	$where="../signup.html";
	$do="Please try once again";
	
}
//echo($where);
?>

<html>
<head>
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
h1,h2{
position:relative;
top:300px;

font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
		font-size:45px;
		font-weight:lighter;

}


</style>
<script>
var e="<?php echo($where); ?>";

setTimeout(function(){
console.log(e);	
	window.open(e,'_self');
},3000);

</script>
</head>
<body>
<center><h1><?php echo($what) ?></h1></center>
<center><h2 style="font-size:30px;"><?php echo ($do) ?></h2></center>
</body>


</html>


