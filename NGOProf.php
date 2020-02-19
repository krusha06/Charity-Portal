<?php
	session_start();
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '';
    $id=$_GET["id"];

   $conn = mysql_connect($dbhost, $dbuser, $dbpass);
   mysql_select_db('charityportal');
   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }
   
   	$uid=$_SESSION["uid"];
	   
	$sql="select * from login where User='$uid'";
	
	$sql1="select * from ngo where User='$id'";
	
	$retval = mysql_query( $sql, $conn );
	$retval1 = mysql_query( $sql1, $conn );
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
       
       while($row1 = mysql_fetch_array($retval1, MYSQL_ASSOC)) 
       {
           $user=$row1['User'];
           $des=$row1['Description'];
           $email=$row1['Email'];
           $con= $row1['Contact'];
           $address= $row1['Address'];
           $trust= $row1['Trusty'];
        }
       
?>
<!DOCTYPE>
<html>
	<head>
		<title>Welcome <?php echo $user;?></title>
		<link rel="shortcut icon" href="Image/Logo.png" />
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="User.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	</head>
	<body>
            <div>
			<a href="#">
				<div class="leftHeader">
					<i class="glyphicon glyphicon-user"><?php echo $name;?></i>
				</div>
			</a>
			
			<div class="rightHeader">
				<form method="POST" style="padding-left:80px;float:left" action="Search.php">
					   <input class="rightHeader" name="keyword" placeholder="Search NGO" type="text"/>
						   &nbsp;
						<input class="rightHeader" style="background-color:rgb(255, 227, 71)" type="submit" value="Search"/>
				</form>
				<a href="Signout.php">
				<i style="padding-right:35px;letter-spacing:1.8px;float:right;color:black; font-size:25px;"class="glyphicon glyphicon-log-out">Sign-Out</i>
				</a>
			</div>
            </div>
            
            <div style="font-size:45px;text-align:center;;padding-top:8%;border:0px solid black" >
            <?php echo $user;?>
            </div>
            <div style="font-size:18px;padding:5px;border:0px solid black;text-align:center">
            Trusted By
            </div>
            <div style="font-size:20px;padding:2px;text-align:center;border:0px solid black">
                <?php echo $trust;?>
            </div>

            <div style="float:left;padding:15px;border: 1px solid black;margin:30px;margin-top:85px;text-align:center;margin-left:65px;width:25%; height:25%;border-radius:8px;">
                <b style="font-size:22px;">Description</b>
                <br><br><br>
                <?php echo $des;?>
            </div>

            <div style="float:left;padding:15px;border: 1px solid black;margin:30px;margin-top:85px;text-align:center;margin-left:65px;width:25%; height:25%;border-radius:8px;">
                <b style="font-size:22px;">Address</b>
                <br><br><br>
                <?php echo $address;?>
            </div>
            
            <div style="float:left;padding:15px;border: 1px solid black;margin:30px;margin-top:85px;text-align:center;margin-left:65px;width:25%; height:25%;border-radius:8px;">
                <b style="font-size:22px;">Contact Us</b>
                <br><br><br>
                <b>Email : </b> <?php echo $email;?>
                <br><br>
                <b>Phone : </b><?php echo $con;?>
            </div>
    </body>
</html>
