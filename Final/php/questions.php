<?php

include 'config.php';


$dbname = 'questions';
$sel = mysql_select_db($dbname) or die('Error conn to database');


$title=	mysql_real_escape_string($_POST['title']);
$quest=mysql_real_escape_string($_POST['question']);
$check="SELECT * FROM question WHERE title='$title' OR question ='$quest'";
$s=mysql_query($check);
$count=mysql_num_rows($s);
if($count==0){
$query="INSERT INTO question (q_no,title,question) VALUES (1,'$title','$quest')";
$result=mysql_query($query) or die(mysql_error());	
$quest_trim=mysql_unreal_escape_string($quest);
$title_trim=mysql_unreal_escape_string($title);
}
else{
header('Location:../askquestion.php');
}



	




?>
<html>
<head>
<style>
#title{
font-size:32px;
font-weight:lighter;
font-family:Arial,"Helvetica Neue",Helvetica,sans-serif;
position:relative;
top:200px;	
	left:160px;
	
	}
	#quest{
	border: 1px solid transparent;
	background:#ddd;
	position:relative;
	left:160px;
	top:250px;
	height:450px;
	font-size:20px;
	resize:none;
	font-weight:normal;
	overflow-y:scroll;
	overflow-x:scroll;
	width:800px;
	}

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
padding:15px;
}



#nav_wrapper a{
	font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";

font-size:2	1px;

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


</style>
<title><?php echo($title_trim)?></title></head>
<body>
<div id="nav_wrapper" > <br>
<ul>
<li ><a href="Homepage.html" >Home</a></li>
<li class="active"><a href="#">Topics</a></a></li>
<li ><a href="#">Projects</a></li>
<li ><a href="#">Downloads</a></li>
<li ><a href="#">Example</a></li>
<li ><a href="#">About</a></li>


</ul> </div>

<h2 id="title"><?php echo($title_trim)?></h2>

<textarea  id="quest"><?php echo($quest_trim)?></textarea>
</body>
</html>
