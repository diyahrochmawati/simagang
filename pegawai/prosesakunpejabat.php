<?php
include "connect.php";
require_once "connect.php";
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['usernameadmin'])) {
    header('location:login.php');
} else {
    $username=$_SESSION['usernameadmin'];    
}
function akun_pejabat($data){
    global $connection;

    $usernamepejabat = mysqli_real_escape_string($connection, $data['usernamepejabat']);
    //$email = mysqli_real_escape_string($connection, $data['email']);
    //$password = mysqli_real_escape_string($connection, $data['password']);
    $password = password_hash($data['password'],PASSWORD_DEFAULT);
    $jabatan = mysqli_real_escape_string($connection, $data['jabatan']);
    $posisi = mysqli_real_escape_string($connection, $data['posisi']);

        $akun_pejabat= mysqli_query(
        $connection,
        "INSERT INTO akun_pejabat 
        Value ('$usernamepejabat','$usernamepejabat','$password','$jabatan','$posisi')"
        );
        return true;
    }

?>
