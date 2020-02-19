<?php

$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i <6; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
require 'PHPMailerAutoload.php';
include 'connection.php';
$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output
$em= 'monoarchos@gmail.com';
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'synocharpor@gmail.com';                 // SMTP username
$mail->Password = 'Syno61196';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to

$mail->setFrom('synocharpor@gmail.com', 'Harita Patel');
$mail->addAddress($em);     // Add a recipient
//$mail->addAddress('monoarchos@gmail.com');               // Name is optional
$mail->addReplyTo('synocharpor@gmail.com', 'Charity Portal');
/*$mail->addCC('cc@example.com');
$mail->addBCC('bcc@example.com');
*/
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Request for Changing Password in Charity Portal';
$stri="Your OTP for changing Password is ";
$mail->Body    = $stri.$randomString;
//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '';
   
   $connn = mysql_connect($dbhost, $dbuser, $dbpass);
   mysql_select_db('charityportal');
   
   $sqlu="update user set OTP='$randomString' where User='US001_Test'";
   mysqli_query($conn, $sqlu);
   
if(!$mail->send()) {

}
 else {
header('Location: index.html');
}
?>