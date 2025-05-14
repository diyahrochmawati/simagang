<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "simagang";

$connection = mysqli_connect($servername, $username, $password, $dbname);
if (!$connection){
        die("Connection Failed:".mysqli_connect_error());
    }
?>
