<?php
require_once("connect.php");
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['usernameadmin'])) {
    header('location:login.php');
} else {
    $username=$_SESSION['usernameadmin'];    
}
$id_peserta=$_GET['id_peserta'];
mysqli_query($connection, "delete from peserta where id_peserta='$id_peserta'");
header("location: index.php?page=datapeserta");
?>