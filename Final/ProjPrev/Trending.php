<!DOCTYPE html>
<head>
  <link rel="stylesheet" href="if.css">
  <script type="text/javascript" src="Psub.js"></script>
</head>
<body onload="start()">
  <div id="c">
	<?php
		$servername="localhost";
		$username = "root";
		$password = "root";
		$link = mysql_connect($servername, $username, $password);
		if (!$link) {
			die('Could not connect: ' . mysql_error());
		}
		mysql_select_db('projects');
		$sql="SELECT * FROM project ORDER BY votes DESC;"; 	
		$retval = mysql_query( $sql, $link );
		if(! $retval )
		{
		  die('Could not enter data: ' . mysql_error());
		}
		for($i=0;$i<5;++$i){
		$row = mysql_fetch_row($retval);
		echo '<div class="p">
    <span style="display:none">'.$row[0].'</span>
		<div class="h">'.$row[3].'
		  </div>
		  <div class="d">
			'.$row[1].'
		  </div>
		  <div class="a">
			<table>
			  <tr><td class="n">'.$row[6].'</td></tr>
			  <tr><td class="s">votes</td></tr>
			  <tr><td class="n">'.$row[7].'</td></tr>
			  <tr><td class="s">views</td></tr>
			</table>
		  </div>
		  <div class="tag">
      <ul>';
      $a=explode(',',$row[8]);
      for($j=0;$j<count($a);++$j){
        echo '<li>'.
        $a[$j].
        '</li>
        ';
      }
      echo '</ul>
		  </div>
		  <div class="i">
			<ul>
			  <li>'.$row[2].'</li>
			</ul>
		  </div>
		</div>';}
	?>
  </div>
</body>
