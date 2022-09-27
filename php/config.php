<?php 
    // credentials
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "chatbase";

    // create connection
    $con = mysqli_connect($host, $username, $password, $database);
    if(!$con){
        echo "Error: " . mysqli_connect_error();
    }
?>