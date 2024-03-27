<?php
$con=mysqli_connect("localhost", "root", "", "ckdatabase")
or die('could not connect to MySQL');


$FirstName = $_POST["FirstName"];
$SecondName = $_POST["SecondName"];
$Username = $_POST["Username"];
$Password = $_POST["Password"];
$sql="INSERT INTO registration (FirstName, SecondName, Username, Password) VALUES ('$FirstName', '$SecondName', '$Username', '$Password')";


if(!mysqli_query($con,$sql)){
die ('Error: ' .mysqli_error($con));
}
else{
echo "Registration completed. Thank you.";
}

?>