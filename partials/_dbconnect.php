<?php 
    //Initialising Variables
    $uname = "root";
    $pass = "";
    $server = "localhost";
    $database = "user";

    //Creating Connection
    $con = mysqli_connect($server, $uname, $pass, $database);
    $error = mysqli_error($con);

    //Checking Connection
    if(!$con) {
        echo "Some error occured! $error";
    }
?>