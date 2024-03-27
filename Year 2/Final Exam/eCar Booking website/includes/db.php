<?php
	$serverName="localhost";
	$username="root";
	$password="";
	$dbName="college_ecar_system";

	//connect to database
	$conn = mysqli_connect($serverName, $username, $password, $dbName);

	if(mysqli_connect_errno()){
		echo "Connection to DB error: " . mysqli_connect_errno();
	}
?>