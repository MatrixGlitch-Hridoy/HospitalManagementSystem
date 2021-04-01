<?php 
    $db_host = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_name = "hms";

    $connection = new mysqli($db_host,$db_user,$db_password,$db_name);
    if($connection->connect_error){
        die("connection failed".$connection->connect_error);
    }
    // else{
    //     echo "Connected";
    // }
?>