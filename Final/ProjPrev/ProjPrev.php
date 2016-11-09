<!DOCTYPE html>
<head>
  <title>Projects</title>
  <script src="ProjPrev.js"></script>
  <link rel="stylesheet" href="ProjPrev.css">
</head>
<body onload="start()">
  <div id="nav_wrapper" > <br>
    <ul>
      <li ><a href="../WelcomePage.html">Home</a></li>
      <li ><a href="../Homepage.html">Topics</a></a></li>
      <li id="active"><a href="../ProjPrev/ProjPrev.php">Projects</a></li>
      <li  ><a href="../Qprev/Qprev.php">Questions</a></li>
      <li ><a href="../ProfPage/profpage.php">Profile</a></li>
    </ul>
  </div>
  <div id="q">
    <div id="q_nav" >
      <ul>
        <li class="l" style="background-color:white">Latest</li>
        <li class="l">Trending</li>
      </ul>
    </div>
    <iframe id = "im" src="Latest.php" width="100%" height="93%"></iframe>
  </div>
  <div id="t">
  <button class="but" onclick="window.open('../createproj.php');">Add Project</button>
    <table id="tags">
      <?php
        session_start();
        if(true)
          include "../php/config.php";
          $user=1;//$_SESSION['user'];
          mysql_select_db('test');
          echo '<tr><th>Favourite Tags</th></tr>';
          $sql="SELECT * FROM profile WHERE Uid=".$user.";";
          $retval = mysql_query( $sql, $conn ) or die(mysql_error());
          $row = mysql_fetch_row($retval);
          $a=explode(',',$row[6]);
          for($j=0;$j<count($a);++$j)
            echo '<tr><td>'.$a[$j].'</td></tr>';
      ?>
    </table>
  </div>
</body>
