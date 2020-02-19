<?php
include 'connection.php';

//echo "<script type='text/javascript'>alert('Successfully Registered');</script>";

$name=$_POST['Name'];
$cat=$_POST['parent_selection'];
$u1=substr($cat,0,2);

$u2=$_POST['UID'];
$u=$u1.$u2;
$pass=$_POST['Password'];

$add="INSERT INTO login VALUES('$name','$cat','$u','$pass')";
mysqli_query($conn,$add);		

header("Location: SignIn.html");
?>