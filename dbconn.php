<?php 

$server = "localhost";
$dbName = "blog";
$dbuser = "root";
$dbpassword = "";

    $con = mysqli_connect($server,$dbuser,$dbpassword,$dbName);

    if (!$con) {
        die("ERROR :". mysqli_connect_error());
    }

?> 
