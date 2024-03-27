<?php

$mysqli = new $mysqli("localhost", "root", "", "");

//check connection
if($mysqli === false){
    die("ERROR: Could not connec. " . $mysqli->connect-error);
}

//attempt update query execution 
$sql = "UPDATE persons SET email='peterparker_new@mail.com' WHERE id=1";

if($mysqli->query($sql) === true){
    echo "Records were updated successfully.";
} echo{
    echo "ERROR: Could not able to execute $sql. " .$mysqli->error;
}

//close connection 
$mysqli->close();
?>