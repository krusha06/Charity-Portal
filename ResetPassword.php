<?php
	session_start();
	include 'connection.php';
	
/* 	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '';
   
   $con = mysql_connect($dbhost, $dbuser, $dbpass);
   mysql_select_db('charityportal');
   if(! $con ) {
      die('Could not conect: ' . mysql_error());
   }
 */   
	$pass=$_POST["pass"];
   	$uid=$_SESSION["uid"];
	//$sub= substr($uid,0,2);
	
	$sql="update login set Password='$pass' where User='$uid'";
	mysqli_query($conn, $sql);
	header('Location: SSignIn.php');
	

/* 	$sqln="update ngo set OTP='$randomString' where User='$uid'";
	$sqld="update donor set OTP='$randomString' where User='$uid'";
 */	
/* 	$sqluu="select * from user where User='$uid'";
	$sqlnn="select * from ngo where User='$uid'";
	$sqldd="select * from donor where User='$uid'";
	
 	$retvalu = mysql_query( $sqluu, $con );
	$retvaln = mysql_query( $sqlnn, $con );
	$retvald = mysql_query( $sqldd, $con );
 */	

	
	

?>

