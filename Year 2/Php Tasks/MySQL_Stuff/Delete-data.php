<?php 

$mysqli = new mysqli("localhost", "root", "");

// check connection

if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}

// Attempt delete query execution
$sql = "DELETE FROM presons WHERE first_name='John'";

if($mysqli->query($sql) === true){
    echo "Records were deleted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " .  $mysqli->error;
}

// close connection 
$mysqli->close();
?>