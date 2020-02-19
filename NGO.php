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
	   }
	echo $name;
	echo "<br>";
	echo $cat;
?>