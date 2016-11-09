<?php

?>
<!DOCTYPE html>
<head>
	<title>Profile</title>
	<link rel="stylesheet" href="profpage.css">
	<script src="profpage.js"></script>
</head>
<body onload = "start()">
		<div id="nav_wrapper" > <br>
			<ul>
				<li ><a href="../index.html" >Home</a></li>
				<li ><a href="../Homepage.html">Topics</a></a></li>
				<li ><a href="/ProjPrev/ProjPrev.php">Projects</a></li>
				<li ><a href="/Qprev/Qprev.php">Questions</a></li>
				<li id="active"><a href="#">Profile</a></li>
			</ul>
		</div>
		<div id="pic">
			<img id="dp" src="uploads/varun.png" alt="image not found" onerror="this.src='profpic.png';">
			<form id="iu" action="" method="POST" enctype="multipart/form-data">
			<input  id="fil" type="file" name="image" value="ChooseImage">
			<label for="fil">ChooseImage</label>
			<div class ="u">update</div>
			</form>
			<table>
				<?php
					session_start();
					if($_SESSION['loggedin']!=true){
						header("Location:../signin.html");
					}
					$all_tags=array("C","C#","JavaScript","Java","Python","HTML","CSS","PHP");
					$user=$_SESSION['user'];//$_SESSION['user'];
          include '../php/config.php';
					mysql_select_db('users');
					if(isset($_POST['ls'])){
							$a = (string)($_POST['ls']);
							$a=chop($a,',');
							$sql="UPDATE credentials SET tags = '$a' WHERE Name='$user'";
							mysql_query($sql,$conn);
					}
					$sql="SELECT * FROM credentials WHERE Name='$user'";
					$retval = mysql_query( $sql, $conn );
					if(! $retval )
					{
					  die('Could not enter data: ' . mysql_error());
					}
					$row = mysql_fetch_row($retval);
					$ta=array();
					echo '<tr><td id="name">'.$row[2].'</td></tr>'.
					'<tr><td id="em">'.$row[1].'</td></tr>'.
					'<tr><td><ul id="ftag">';
					$ut=explode(',',$row[6]);
					for($j=0;$j<count($ut);++$j){
						array_push($ta,$ut[$j]);
						echo '<li>'.$ut[$j].'</li>';
					}
					echo '</ul>'.
					'<select id="choices">
					<option>SelectTag</option>';
					for($j=0;$j<count($all_tags);++$j)
						if(!in_array($all_tags[$j],$ut))
							echo '<option>'.$all_tags[$j].'</option>';
					echo '</select>'.
					'<div>edit</div></td></tr>';
          if(isset($_FILES['image'])){
            $errors= array();
            $file_name = $_FILES['image']['name'];
            $file_size =$_FILES['image']['size'];
            $file_tmp =$_FILES['image']['tmp_name'];
            $file_type=$_FILES['image']['type'];
            $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));

            $extensions= array("jpeg","jpg","png");

            if(in_array($file_ext,$extensions)=== false){
               $errors[]="extension not allowed, please choose a JPEG or PNG file.";
            }

            if($file_size > 2097152){
               $errors[]='File size must be excately 2 MB';
            }

            if(empty($errors)==true){
               move_uploaded_file($file_tmp,"uploads/varun.png");
            }else{
               //print_r($errors);
            }
          }
				?>
			</table>
			<form action="" id="tags" style="display: none;" method="POST" enctype="multipart/form-data"><input id ="ti" type="text" name="ls"></form>
		</div>
		<div id = "cont">
			<div id="cont_nav" >
				<ul>
					<li class="l" style="background-color:white">MyProjects</li>
					<li class="l">MyQuestions</li>
					<li class="l">Answers</li>
				</ul>
			</div>
			<iframe id="im" src="MyProjects.php"></iframe>
		</div>
</body>
