<?php
    $serverName='localhost';
    $username='Calumxkerr@gmail.com';
    $password='test';
    $dbname='college_ecar_system';

    // connect to database
    $conn = mysqli_connect($serverName, $username, $password, $dbname);


    if(mysqli_connect_errno()){
        echo "Connection to DB error: " . mysqli_connect_errno();
    }

?>