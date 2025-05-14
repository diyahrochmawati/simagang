<?php if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['usernameadmin'])) {
    header('location:login.php');
} else {
    $username=$_SESSION['usernameadmin'];    
}
require_once("connect.php");

$user=$_GET[username];
mysqli_query($connection, "delete from akun_pejabat where usernamepejabat='$user'");
header("location: index.php?page=tampilpejabat");
?>