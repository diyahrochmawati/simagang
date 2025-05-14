<?php
include "connect.php";
require_once "connect.php";

    $username = $_POST['username'];
    $pass = $_POST['no_hp'];
        
    $cekuser = mysqli_query($connection, "SELECT * FROM user WHERE username = '$username'");
    $jumlah = mysqli_num_rows($cekuser);
    $hasil = mysqli_fetch_array($cekuser);
    if ($jumlah == 0) {
    echo "<script>alert('Email belum terdaftar!');history.go(-1);</script>";
    } else {
    //if (!(password_verify($pass, $hasil["password"]))) {
            if ($pass != $hasil['no_hp']) {
            echo "<script>alert('NOMOR HP TIDAK TERDAFTAR !');history.go(-1);</script>";
            } else {
            header("location:resetpassword.php?username=$username");
            }
    }


?>