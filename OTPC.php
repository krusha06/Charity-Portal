<?php
	session_start();
	
	
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
	
	$otp=$_POST["otp"];
	
	
	
/* 	$sqlu="update user set OTP='$randomString' where User='$uid'";
	$sqln="update ngo set OTP='$randomString' where User='$uid'";
	$sqld="update donor set OTP='$randomString' where User='$uid'";
 */	
	
	$sqluu="select * from user where User='$uid'";
	$sqlnn="select * from ngo where User='$uid'";
	$sqldd="select * from donor where User='$uid'";
	
 	$retvalu = mysql_query( $sqluu, $con );
	$retvaln = mysql_query( $sqlnn, $con );
	$retvald = mysql_query( $sqldd, $con );
	

	
	if($sub=='US')
	{
		//mysqli_query($conn, $sqlu);
		
		
		while($row = mysql_fetch_array($retvalu, MYSQL_ASSOC)) 
		   {
				$em=$row['OTP'];
		   }
		if ( $em != '')
		{
		   if($em == $otp)
		   {
			   header('Location: ChangePassword.php');
		   }
		   else
		   {
			   header('Location: WOTP.php');
		   }
	    }
			
	}
	
	elseif($sub=='NG')
	{
		//mysqli_query($conn,$sqln);
		
		
		while($row1 = mysql_fetch_array($retvaln, MYSQL_ASSOC)) 
		   {
				$em1=$row1['OTP'];
		   }
		if ( $em1 != '')
		{
		   if($em1 == $otp)
		   {
			   header('Location: ChangePassword.php');
		   }
		   else
		   {
			   header('Location: WOTP.php');
		   }
	    }
			
	}
	elseif($sub=='DO')
	{
		//mysqli_query($conn,$sqld);
		
		
		while($row2 = mysql_fetch_array($retvald, MYSQL_ASSOC)) 
		   {
				$em2=$row2['OTP'];
		   }
		if ( $em2 != '')
		{
		   if($em2 == $otp)
		   {
			   header('Location: ChangePassword.php');
		   }
		   else
		   {
			   header('Location: WOTP.php');
		   }
	    }
			
	}

?>

