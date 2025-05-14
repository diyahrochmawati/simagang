<?php
include "connect.php";
require_once "connect.php";
function login($data){
    global $connection;
    
    $username = $_POST['username'];
    $pass = $_POST['password'];
    $jabatan=$_POST['jabatan'];
        
    $cekuser = mysqli_query($connection, "SELECT * FROM akun_pejabat WHERE usernamepejabat = '$username'");
    $jumlah = mysqli_num_rows($cekuser);
    $hasil = mysqli_fetch_array($cekuser);
    if ($jumlah == 0) {
    echo "<script>alert('Username belum terdaftar!');history.go(-1);</script>";
    } else {
        if (!(password_verify($pass, $hasil["password"]))) {
        //if ($pass != $hasil['password']) {
            echo "<script>alert('Password Salah!');history.go(-1);</script>";
        }else if($jabatan=='pilih') {
            echo "<script>alert('Pilih Jabatan Anda!');history.go(-1);</script>"; 
        }else if($jabatan != $hasil['jabatan']) {
            echo "<script>alert('Periksa Kembali Jabatan Anda');history.go(-1);</script>"; 
        }else {
            if ($hasil['jabatan']=='Admin')
            {
                $_SESSION['usernameadmin'] = $hasil['usernamepejabat'];
                header('location:index.php');
            }
            
            else if($hasil['jabatan']=='Staff')
            {
                $_SESSION['usernamestaff'] = $hasil['usernamepejabat'];
                header('location:../staff/index.php');
            }
            
             else if($hasil['jabatan']=='Kabag_SDM')
            {
                $_SESSION['usernamekabag'] = $hasil['usernamepejabat'];
                header('location:../kabag/index.php');
            }
             else if($hasil['jabatan']=='Pimpinan_Bagian')
            {
                $_SESSION['usernamepimpinan'] = $hasil['usernamepejabat'];
                $_SESSION['posisipimpinan'] = $hasil['posisi'];
                header('location:../pimpinan/index.php');
            }
            
        
        }
    }
}
?>