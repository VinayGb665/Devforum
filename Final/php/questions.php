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
if($result) echo($new);
else echo('jsdvh');
}
else{
echo('Hey man look ..Its already There');
header('Location:addquestion.php');
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


</style>
<title><?php echo($title_trim)?></title></head>
<body>
<h2 id="title">This is the title</h2>

<textarea  id="quest"><?php echo($quest_trim)?></textarea>
</body>
</html>
