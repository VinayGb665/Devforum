<?php 
include 'php/config.php';
$dbname="projects";
mysql_select_db($dbname);

$title=$_GET['title'];
$check="SELECT * from project where project_title='$title'";
if($res=mysql_query($check)){
	$row=mysql_fetch_array($res);
	$dec=$row[1];
	$count=$row[5];
$path=$row[4];	
}
$files=scandir($path,1);
$arr=array();
//print_r($files);
$no=count($files)-2;
$names="";
foreach($files as $f=>$n){
	$names=$names.'+'.$n;
}
//echo($names);
//echo(array_values($files));
?>
<html>
<head>
<style>
#nav{
height:600px;
position:relative;
top:100px;
background-size:cover;
}
#nav_wrapper{

z-index:10;
position:fixed;
height:120px;
top:0px;
width:100%; 	;
background:#053456;
pading:10px;
margin-left:auto;
margin-right:auto;
margin-top:10px;
opacity:0.7;
}
#nav_wrapper ul{
margin-top:30px;
}



#nav_wrapper ul li{
list-style-type:none;
display:inline;
font-wight:bold;
padding:20px 10px 20px 10px;
}


#nav_wrapper a{
font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";

font-size:25px;
font-weight:light;
text-align:center;
color:white;
margin-top:10px;
text-decoration:none;
padding:100px;
}
 
#nav_wrapper ul li:hover{
background:red;

transition:all 0.7s;
opacity:0.5;
}


.active{
background:#000013;
}

#na{
position:relative;
font-size:26px;
top:-49px;
left:-90px;
}
#files{
	position:relative;
	top:300px;
	left:230px;
	height:600px;
	width:1300px;
	background-color:#ddd;
	
	
}
.gg{
	list-style-type:none;
	font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";

font-size:20px;
padding:5px;
display:none;
position:relative;
left:300px;
	
}
h{
	position:absolute;
	top:200px;
	left:700px;
	font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";

font-size:55px;
}
span{
	position:relative;
	left:-100px;
	
}
</style>

</head>
<body>
<div id="nav_wrapper" > <br>
<ul>
<li ><a href="index.html" >Home</a></li>
<li class="active"><a href="#">Topics</a></a></li>
<li ><a href="ProjPrev/ProjPrev.php">Projects</a></li>
<li ><a href="QPrev/QPrev.php">Questions</a></li>
<li ><a href="#">Example</a></li>


</ul> </div>
<h><span>Title:</span><?php echo $title ?></h>
<div id="files">
<ul>
<li class="gg"><img style="padding-top:4px" src="img/file.png" height="50px" width="50px" /></li>
<li class="gg"></li>
<li class="gg"></li>
<li class="gg"></li>
<li class="gg"></li>
<li class="gg"></li>
<li class="gg"></li>
<li class="gg"></li>
<li class="gg"></li>
<li class="gg"></li>
<li class="gg"></li>
<li class="gg"></li>
<li class="gg"></li>
<li class="gg"></li>
<li class="gg"></li>
<li class="gg"></li>


</ul>

<div>
</body>
<script>
var c="<?php echo $no ;?>";
var t="<?php echo $names; ?>";
var f=t.split('+');
//console.log(t.split('+'));
var e=document.getElementsByClassName('gg');
for(i=1;i<f.length-2;i++){
	e[i].style.display="block";
	//console.log(5);
	e[i].innerHTML="<img style='position:relative;padding:5px;top:15px;left:-5px;' src='img/file.png' height='30px' width='30px' />"+f[i];
}
</script>