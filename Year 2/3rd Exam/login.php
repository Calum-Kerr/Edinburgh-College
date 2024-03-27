<?php
$con=mysqli_connect("localhost", "root", "" , "ckdatabase")
or die('could not connect to MySQL');

$Username = $_POST["Username"];
$Password = $_POST["Password"];


$sql= mysqli_query ($con, " SELECT * FROM registration WHERE Username='$Username'
  AND Password ='$Password'");
 
 if (mysqli_num_rows($sql)==1) 
 { 
echo "Welcome to members area.";
 } 
 else
 {
	 echo "Username and password do not match";
 }

?>