<?php
include 'config.php';
include ('mail_config.php');

$flag=0;
$dbname="users";
$db=mysql_select_db($dbname) or die(mysql_error());

$name=mysql_real_escape_string($_POST['name']);
$email=mysql_real_escape_string($_POST['email']);
$pass=md5($_POST['pass']);
$check="SELECT * FROM credentials WHERE name='$name' OR email ='$email'";
$s=mysql_query($check);
$count=mysql_num_rows($s);
if($count!=0){
	
	header("Location: ../signup.html");
}

$query="INSERT INTO credentials (email,Name,pass) VALUES ('$email','$name','$pass')";
$res=mysql_query($query) or die(mysql_error());


$msg="Dear '.$name.',
Thanks for signing up!
Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
 
------------------------

------------------------
 
Please click this link to activate your account:
";


$message = '
<html>
<body>
<p>Dear '.$name.',</p>
<p>Thanks for signing up!</p>
<p>Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.</p>
 
<p>------------------------</p>

<p>------------------------</p>
 
<p>Please click this link to activate your account:</p>
 
<a href="localhost/Final/php/verify.php?name='.$name.'&pass='.$pass.'">Click Here</a>
 
 
<p> If you did not create this account Please IGNORE this message.<p>

 </body>
 </html>
 
 ';

if($res==true){
	$flag=true;


                $mail->addAddress($email);               // Name is optional


               $mail->isHTML(true);                                  // Set email format to HTML

                $mail->Subject = 'Verification Required';
                $mail->Body    = $message;
            //  $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
				
                if(!$mail->send()) {
                	$show="Mail couldnt be sent please try again";
	$where="../signup.html";
	$what ="Signup";

                } else {
                    //echo 'Message has been sent';
                
				$show="A Confirmation email has been sent to your email adress.";
$where='../signin.html';
				$what ="signin";
				//echo('yuafd');
				mkdir('../projects/'.$name,0775);
			//echo chdir('..');
				}
				
				
}

?>  -->
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
<center><a href=<?php echo($where); ?> >Click here to   <?php echo($what);?> </a></center>
</body>


</html>


