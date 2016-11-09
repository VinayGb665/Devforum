
<?php
session_start();
include 'config.php';

$user=$_SESSION['user'];
$uid=$_SESSION['uid'];
$dbname = 'questions';
$sel = mysql_select_db($dbname) or die('Error conn to database');
$title=	mysql_real_escape_string($_POST['title']);
$tags=	mysql_real_escape_string($_POST['tags']);
$quest=mysql_real_escape_string($_POST['question']);
$check="SELECT * FROM question WHERE title='$title' OR question ='$quest'";
$s=mysql_query($check);
$count=mysql_num_rows($s);
if($count==0){
$query="INSERT INTO question (uid,title,question,tags) VALUES ('$uid','$title','$quest','$tags')";
$result=mysql_query($query) or die(mysql_error());	
$quest_trim=mysql_unreal_escape_string($quest);
$title_trim=mysql_unreal_escape_string($title);

$where=urldecode('../q_rack.php?title='.$title);
header("Location:$where");
}


else{

header("Location:../askquestion.php");

}


?>

