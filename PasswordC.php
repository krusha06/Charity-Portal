<?php
	session_start();
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '';
   
   $conn = mysql_connect($dbhost, $dbuser, $dbpass);
   mysql_select_db('charityportal');
   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }
   
   	$uid=$_SESSION["uid"];
	$pass=$_POST['pass'];
	   
	$sql="select * from login where User='$uid'";
	
	$retval = mysql_query( $sql, $conn );
	if(! $retval ) 
	{
      die('Could not get data: ' . mysql_error());
	}
	while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) 
	   {
			$name=$row['Name'];
			$cat=$row['Category'];
			$usid=$row['User'];
			$upass=$row['Password'];
	   }
	   
	if ( $upass != '')
		{
		   if($upass == $pass)
		   {
			   $sub= substr($uid,0,2);
				if($sub=='NG')
				{
				header('Location: NGO.php');		
				}
				elseif($sub=='DO')
				{
				header('Location: Donor.php');		
				}
				elseif($sub=='US')
				{
				header('Location: User.php');		
				}		
		   }
		   else
		   {
			   header('Location: WPassword.php');
		   }
	    }
?>