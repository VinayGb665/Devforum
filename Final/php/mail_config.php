
<?php
require 'PHPMailer-master/PHPMailerAutoload.php';
                $mail = new PHPMailer();                $mail->isSMTP();                    
 $mail->Host = 'smtp.gmail.com';
  $mail->SMTPSecure = "ssl";
  $mail->SMTPAuth = true;        
  $mail->Username = 'stupiddevforum@gmail.com';                
 $mail->Password = 'pesuisstupid';                 
//$mail->SMTPSecure = 'tls';                          
$mail->Port = 465;    
  $mail->From = 'stupiddevforum@gmail.com';
   $mail->FromName = 'Developers Forum';
                              

?>