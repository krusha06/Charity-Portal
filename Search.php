<?php
	session_start();
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '';
    $keyword=$_POST['keyword'];
   $conn = mysql_connect($dbhost, $dbuser, $dbpass);
   mysql_select_db('charityportal');
   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }
   
   	$uid=$_SESSION["uid"];
	   
	$sql="select * from login where User='$uid'";
	
	$sql1="select * from ngo";
    
    $sql2="select * from ngo where User='$keyword'";
    
	$retval = mysql_query( $sql, $conn );
    $retval1 = mysql_query( $sql1, $conn );
    $retval2 = mysql_query( $sql2, $conn );
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
?>
<!DOCTYPE>
<html>
	<head>
		<title>Welcome <?php echo $name;?></title>
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
            <?php
            if($keyword == '')
            {
            ?>
			<div>
			<?php
					while($row1 = mysql_fetch_array($retval1, MYSQL_ASSOC)) 
					{
						$user=$row1['User'];
						$des=$row1['Description'];
						$email=$row1['Email'];
						$con= $row1['Contact'];
			?>
			<a href="NGOProf.php?id=<?php echo $user;?>">
				<div onmouseover="bigImg(this)" onmouseout="normalImg(this)" style="letter-spacing:1.2px;;border:1px solid black;color:black;float:left;height:40%;font-family:RobotoB;border-radius:8px;padding:15px;width:20%;margin-left:2.5%;margin-right:2.5%;text-align:center;margin-top:2%;">
					<div style="background-color:rgb(255, 146, 44);">
					<font style="font-size:25px;">
						<?php echo $user;?>
					<font>
					</div>
					<br>
					<font style="font-size:18px;">
						<?php echo $des;?>
					<font>
					<br><br>
					<font style="font-size:17px;">Contact Us</font>
					<br>
					<font style="font-size:16px;">
						<?php echo $email;?>
					<font>
					<br>
					<font style="font-size:16px;">
						<?php echo $con;?>
					<font>
				</div>
			</a>
			<script>
            function bigImg(x) {
                x.style.height = "40%";
                
            }

            function normalImg(x) {
                x.style.height = "40%";
                
            }
        </script>
			<?php
					}
			?>
            </div>
            
            <?php
            }
            else
            {
            ?>
			<div>
			<?php
					while($row2 = mysql_fetch_array($retval2, MYSQL_ASSOC)) 
					{
						$user1=$row2['User'];
						$des1=$row2['Description'];
						$email1=$row2['Email'];
						$con1= $row2['Contact'];
			?>
			<a href="NGOProf.php?id=<?php echo $user1;?>">
				<div onmouseover="bigImg(this)" onmouseout="normalImg(this)" style="letter-spacing:1.2px;;border:1px solid black;color:black;float:left;height:40%;font-family:RobotoB;border-radius:8px;padding:15px;width:20%;margin-left:2.5%;margin-right:2.5%;text-align:center;margin-top:2%;">
					<div style="background-color:rgb(255, 146, 44);">
					<font style="font-size:25px;">
						<?php echo $user1;?>
					<font>
					</div>
					<br>
					<font style="font-size:18px;">
						<?php echo $des1;?>
					<font>
					<br><br>
					<font style="font-size:17px;">Contact Us</font>
					<br>
					<font style="font-size:16px;">
						<?php echo $email1;?>
					<font>
					<br>
					<font style="font-size:16px;">
						<?php echo $con1;?>
					<font>
				</div>
			</a>
			<script>
            function bigImg(x) {
                x.style.height = "40%";
                
            }

            function normalImg(x) {
                x.style.height = "40%";
                
            }
        </script>
			<?php
					}
			?>
            </div>
            
            <?php
					}
			?>

	</body>
</html>