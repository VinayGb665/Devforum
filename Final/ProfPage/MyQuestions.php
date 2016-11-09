<!DOCTYPE html>
<head>
  <link rel="stylesheet" href="../Qprev/if.css">
  <script type="text/javascript" src="../Qprev/Qsub.js"></script>
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
		mysql_select_db('questions');
		$sql="SELECT * FROM question WHERE qid=1 or qid=2;";
		$retval = mysql_query( $sql, $link );
		if(! $retval )
		{
		  die('Could not enter data: ' . mysql_error());
		}
		for($i=0;$i<2;++$i){
		$row = mysql_fetch_row($retval);//'.$row[0].'
		echo '<div class="q">
    <span style="display:none">'.$row[0].'</span>
		<div class="h">'.$row[2].'
		  </div>
		  <div class="d">
			'.$row[3].'
		  </div>
		  <div class="a">
			<table>
			  <tr><td class="n">'.$row[7].'</td></tr>
			  <tr><td class="s">answers</td></tr>
			  <tr><td class="n">'.$row[6].'</td></tr>
			  <tr><td class="s">views</td></tr>
			</table>
		  </div>
		  <div class="tag">
			<ul>';
        $a=explode(",",$row[4]);
        for($j=0;$j<count($a);++$j)
        echo '<li>'.
        $a[$j].
        '</li>
        ';
			echo '
      </ul>
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
