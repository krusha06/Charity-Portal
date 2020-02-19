<?php
	session_start();
	include 'connection.php';
	require 'PHPMailerAutoload.php';
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '';
   
   $con = mysql_connect($dbhost, $dbuser, $dbpass);
   mysql_select_db('charityportal');
   if(! $con ) {
      die('Could not conect: ' . mysql_error());
   }
   
   	$uid=$_SESSION["uid"];
	$sub= substr($uid,0,2);
	
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i <6; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
	
	
	$sqlu="update user set OTP='$randomString' where User='$uid'";
	$sqln="update ngo set OTP='$randomString' where User='$uid'";
	$sqld="update donor set OTP='$randomString' where User='$uid'";
	
	$sqluu="select * from user where User='$uid'";
	$sqlnn="select * from ngo where User='$uid'";
	$sqldd="select * from donor where User='$uid'";
	
 	$retvalu = mysql_query( $sqluu, $con );
	$retvaln = mysql_query( $sqlnn, $con );
	$retvald = mysql_query( $sqldd, $con );
	

	
	if($sub=='US')
	{
		mysqli_query($conn, $sqlu);
		
		
		while($row = mysql_fetch_array($retvalu, MYSQL_ASSOC)) 
		   {
				$em=$row['Email'];
		   }
			$mail = new PHPMailer;

			//$mail->SMTPDebug = 3;                               // Enable verbose debug output

			$mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = 'synocharpor@gmail.com';                 // SMTP username
			$mail->Password = 'Syno61196';                           // SMTP password
			$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 465;                                    // TCP port to conect to

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
			
			if(!$mail->send()) {

			}
			 else {
			header('Location: OTP.php');
			}
	}
	
	elseif($sub=='NG')
	{
		mysqli_query($conn,$sqln);
		
		
		while($row1 = mysql_fetch_array($retvaln, MYSQL_ASSOC)) 
		   {
				$em1=$row1['Email'];
		   }
			$mail1 = new PHPMailer;

			//$mail->SMTPDebug = 3;                               // Enable verbose debug output

			$mail1->isSMTP();                                      // Set mailer to use SMTP
			$mail1->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
			$mail1->SMTPAuth = true;                               // Enable SMTP authentication
			$mail1->Username = 'synocharpor@gmail.com';                 // SMTP username
			$mail1->Password = 'Syno61196';                           // SMTP password
			$mail1->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
			$mail1->Port = 465;                                    // TCP port to conect to

			$mail1->setFrom('synocharpor@gmail.com', 'Harita Patel');
			$mail1->addAddress($em1);     // Add a recipient
			//$mail->addAddress('monoarchos@gmail.com');               // Name is optional
			$mail1->addReplyTo('synocharpor@gmail.com', 'Charity Portal');
			/*$mail->addCC('cc@example.com');
			$mail->addBCC('bcc@example.com');
			*/
			//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
			//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
			$mail1->isHTML(true);                                  // Set email format to HTML

			$mail1->Subject = 'Request for Changing Password in Charity Portal';
			$stri1="Your OTP for changing Password is ";
			$mail1->Body    = $stri1.$randomString;
			//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

			if(!$mail1->send()) {

			}
			 else {
			header('Location: OTP.php');
			}
	}
	elseif($sub=='DO')
	{
		mysqli_query($conn,$sqld);
		
		
		while($row2 = mysql_fetch_array($retvald, MYSQL_ASSOC)) 
		   {
				$em2=$row2['Email'];
		   }
			$mail2 = new PHPMailer;

			//$mail->SMTPDebug = 3;                               // Enable verbose debug output

			$mail2->isSMTP();                                      // Set mailer to use SMTP
			$mail2->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
			$mail2->SMTPAuth = true;                               // Enable SMTP authentication
			$mail2->Username = 'synocharpor@gmail.com';                 // SMTP username
			$mail2->Password = 'Syno61196';                           // SMTP password
			$mail2->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
			$mail2->Port = 465;                                    // TCP port to conect to

			$mail2->setFrom('synocharpor@gmail.com', 'Harita Patel');
			$mail2->addAddress($em2);     // Add a recipient
			//$mail->addAddress('monoarchos@gmail.com');               // Name is optional
			$mail2->addReplyTo('synocharpor@gmail.com', 'Charity Portal');
			/*$mail->addCC('cc@example.com');
			$mail->addBCC('bcc@example.com');
			*/
			//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
			//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
			$mail2->isHTML(true);                                  // Set email format to HTML

			$mail2->Subject = 'Request for Changing Password in Charity Portal';
			$stri2="Your OTP for changing Password is ";
			$mail2->Body    = $stri2.$randomString;
			//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

			if(!$mail2->send()) {

			}
			 else {
			header('Location: OTP.php');
			}
	}

?>

