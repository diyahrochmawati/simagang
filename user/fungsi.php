<?php
include "connect.php";
require_once "connect.php";
if (!isset($_SESSION)) {
    session_start();
}

function daftar($data){
    global $connection;

    $username = mysqli_real_escape_string($connection, $data['username']);
    //password = mysqli_real_escape_string($connection, $data['password']);
    $password = password_hash($data['password'],PASSWORD_DEFAULT);
    //$nama = mysqli_real_escape_string($connection, $data['nama']);
    $kelamin = mysqli_real_escape_string($connection, $data['kelamin']);
    //$email = mysqli_real_escape_string($connection, $data['email']);
    $no_hp = mysqli_real_escape_string($connection, $data['no_hp']);
    $instansi = mysqli_real_escape_string($connection, $data['instansi']);

    $cekuser = mysqli_query($connection, "SELECT username from user where username='$username'");
    if (mysqli_fetch_assoc($cekuser)) {
        echo "<div class='alert alert-danger position-relative container' style='top: 100px;'>E-mail Sudah Terpakai</div>";
        return false;
    } else {
        $daftar= mysqli_query(
        $connection,
        "INSERT INTO user 
        Value ('','$username','$password','$nama','$kelamin','$username','$no_hp','$instansi')"
        );
        return true;
    }
}
function login($data){
    global $connection;
    
    $username = $_POST['username'];
    $pass = $_POST['password'];
        
    $cekuser = mysqli_query($connection, "SELECT * FROM user WHERE username = '$username'");
    $jumlah = mysqli_num_rows($cekuser);
    $hasil = mysqli_fetch_array($cekuser);
    if ($jumlah == 0) {
    echo "<script>alert('Username belum terdaftar!');history.go(-1);</script>";
    } else {
    if (!(password_verify($pass, $hasil["password"]))) {
    //if ($pass != $hasil['password']) {
    echo "<script>alert('Password Salah!');history.go(-1);</script>";
    } else {
    $_SESSION['username'] = $hasil['username'];
    header('location:index.php');
    }
    }
}

function registrasi($data){
    global $connection;
    $username=$_SESSION['username'];
    $jml_peserta = mysqli_real_escape_string($connection, $data['jml_peserta']);
    $no_ktp = mysqli_real_escape_string($connection, $data['no_ktp']);
    $nama_ketua = mysqli_real_escape_string($connection, $data['nama_ketua']);
    $tempat_lahir = mysqli_real_escape_string($connection, $data['tempat_lahir']);
    $tanggal_lahir = mysqli_real_escape_string($connection, $data['tanggal_lahir']);
    $kelamin = mysqli_real_escape_string($connection, $data['kelamin']);
    $alamat = mysqli_real_escape_string($connection, $data['alamat']);
    $email = mysqli_real_escape_string($connection, $data['email']);
    $no_tlp = mysqli_real_escape_string($connection, $data['no_tlp']);
    $jenjang = mysqli_real_escape_string($connection, $data['jenjang']);
    $instansi = mysqli_real_escape_string($connection, $data['instansi']);
    $jurusan = mysqli_real_escape_string($connection, $data['jurusan']);
    $tgl_masuk = mysqli_real_escape_string($connection, $data['tgl_masuk']);
    $tgl_selesai = mysqli_real_escape_string($connection, $data['tgl_selesai']);
            $jumlah=0;
            $ceklengkap = mysqli_query($connection, "SELECT * FROM peserta WHERE id_daftar = '$daftar'");
            $jumlah = mysqli_num_rows($ceklengkap);
            
            
             
            if ($jml_peserta == 1) {
             $pendaftaran= mysqli_query($connection,"update pendaftaran set status='Menunggu Konfirmasi Admin', jml_peserta='$jml_peserta',no_ktp='$no_ktp',nama_ketua='$nama_ketua',tempat_lahir='$tempat_lahir',tanggal_lahir='$tanggal_lahir',kelamin='$kelamin',alamat='$alamat',email='$email',no_tlp='$no_tlp',jenjang='$jenjang',instansi='$instansi',jurusan='$jurusan',tgl_masuk='$tgl_masuk',tgl_selesai='$tgl_selesai',posisi='Belum diterima' where username='$username'");
                return true;
            } else {
             $pendaftaran= mysqli_query($connection,"update pendaftaran set status='Belum Daftar', jml_peserta='$jml_peserta',no_ktp='$no_ktp',nama_ketua='$nama_ketua',tempat_lahir='$tempat_lahir',tanggal_lahir='$tanggal_lahir',kelamin='$kelamin',alamat='$alamat',email='$email',no_tlp='$no_tlp',jenjang='$jenjang',instansi='$instansi',jurusan='$jurusan',tgl_masuk='$tgl_masuk',tgl_selesai='$tgl_selesai',posisi='Belum diterima' where username='$username'");
                return true;
            }   
    }

    function anggota($data){
    global $connection;
    $username=$_SESSION['username'];
    $status = mysqli_query($connection, "SELECT * FROM pendaftaran where username='$username'");
    $hasil = mysqli_fetch_array($status);
    $daftar=$hasil['id_daftar'];
    $no_ktpa = mysqli_real_escape_string($connection, $data['no_ktpa']);
    $namaa = mysqli_real_escape_string($connection, $data['namaa']);
    $tempat_lahira = mysqli_real_escape_string($connection, $data['tempat_lahira']);
    $tanggal_lahira = mysqli_real_escape_string($connection, $data['tanggal_lahira']);
    $kelamina = mysqli_real_escape_string($connection, $data['kelamina']);
    $alamata = mysqli_real_escape_string($connection, $data['alamata']);
    $emaila = mysqli_real_escape_string($connection, $data['emaila']);
    $no_tlpa = mysqli_real_escape_string($connection, $data['no_tlpa']);
    $jurusana = mysqli_real_escape_string($connection, $data['jurusana']);
    
            $cekuser = mysqli_query($connection, "SELECT * FROM pendaftaran WHERE username = '$username'");
            $hasil = mysqli_fetch_array($cekuser);
            $jumlah=0;
            $ceklengkap = mysqli_query($connection, "SELECT * FROM peserta WHERE id_daftar = '$daftar'");
            $jumlah = mysqli_num_rows($ceklengkap);
            
            if ($jumlah < $hasil['jml_peserta']) {
             $peserta= mysqli_query($connection,"update peserta set no_ktpa='$no_ktpa',namaa='$namaa',tempat_lahira='$tempat_lahira',tanggal_lahira='$tanggal_lahira',kelamina='$kelamina',alamata='$alamata',emaila='$emaila',no_tlpa='$no_tlpa',jurusana='$jurusana' where id_daftar='$daftar' AND no_ktpa='0'");
                return true;
            } else {
                $ubah= mysqli_query($connection,"update pendaftaran set status='Menunggu Konfirmasi Admin' where id_daftar='$daftar'");
                $peserta= mysqli_query($connection,"update peserta set no_ktpa='$no_ktpa',namaa='$namaa',tempat_lahira='$tempat_lahira',tanggal_lahira='$tanggal_lahira',kelamina='$kelamina',alamata='$alamata',emaila='$emaila',no_tlpa='$no_tlpa',jurusana='$jurusana' where id_daftar='$daftar' AND no_ktpa='0'");
                return true;
            }
        
    }

?>