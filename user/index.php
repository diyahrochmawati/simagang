<?php 
require_once("connect.php");
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['username'])) {
    header('location:login.php');
} else {
    $username=$_SESSION['username'];    
}

$username=$_SESSION['username'];
$status = mysqli_query($connection, "SELECT * FROM pendaftaran WHERE username='$username'");
$ada = mysqli_num_rows($status);
$hasil = mysqli_fetch_array($status);

 if (    ($hasil['username'] != null)  && ($hasil['no_ktp'] != 0) && ($hasil['kartu_identitas'] != null) ){
      $userada='ada';
 }else {  
      $userada='tidakada';
  }
        $daftar=$hasil['id_daftar'];
        $jumlah=0;
        $ceklengkap = mysqli_query($connection, "SELECT * FROM peserta WHERE id_daftar = '$daftar'");
        $jumlah = mysqli_num_rows($ceklengkap);
        if ($jumlah < $hasil['jml_peserta']) {
            $lengkap="sudah";
            } else {
                $lengkap="belum";
            }
?>
<!DOCTYPE html>
<html>

<head>
<link rel="shortcut icon" href="../img/x.ico"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width-device-width, initial-scale=1, shrink-to-">
    <title>SIMAGANG</title>
    <link rel="stylesheet" href="../fontawesome/css/all.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/simple-sidebar.css">
    <script src="../js/jquery-3.3.1.js"></script>
    <script src="../js/script.js"></script>
    <script src="../js/Chart.bundle.min.js"></script>
    
    
    <style>
    #produk:hover {
            transform: scale(1.1);
            transition-property: transform;
            transition-duration: .5s;
        }
    </style>
</head>

<body>
    <div id="wrapper">
        <!-- <div class="container-fluid bg-light content-main"> -->
        <!-- <div class="row"> -->
        <!-- sidebar -->
        <div class="bg-2 shadow position-fixed" id="sidebar-wrapper">
            <!-- <div class="text-light navbar-brand ml-2 mr-0 mt-3 font-weight-bold">
                <a href="?page=dashboard" class="text-light" style="text-decoration: none;"><i class="fas fa-book-open"></i> BUKULAPAK</a>
            </div> -->
            <ul class="nav flex-column">
               <li id="produk" class="nav-item mt-4 nav-font border-bottom  ">
                    <a class="nav-link text-light p-2" href="?page=home"><i class="fas fa-home fa-lg"></i>&nbsp&nbsp&nbspHome</a>
                </li>
                <li  id="produk" class="nav-item mt-3 nav-font border-bottom">
                    <a class="nav-link text-light p-2" href="?page=profile"><i class="fas fa-user  fa-lg"></i>&nbsp&nbsp&nbspProfile</a>
                </li>
                <li  id="produk" class="nav-item mt-3 nav-font border-bottom ">
                    <a class="nav-link text-light p-2" href="?page=dokumenuser"><i class="fas fa-file-archive fa-lg"></i></i>&nbsp&nbsp&nbspDokumen Saya</a>
            </ul>
        </div>
        <!-- content -->
        <!-- <div class="col badge-info p-3 shadow"> -->
            <nav class="nav bg-2 shadow p-3 fixed-top" id="navbar-top">
            
                <i class="fa fa-arrow-circle-right text-light fa-3x col-auto" href="#menu-toggle" id="menu-toggle"></i>
                <a  id="produk" href="?page=home" class="text-light font-weight-bold text-center col" style="text-decoration: none; font-size: 26px;"><i class="fas fa-briefcase"></i></i> SIMAGANG</a>
                <!-- <h2 class="nav-link text-light nav-font text-center font-weight-bold"></h2> -->
                <a class="nav-link text-light nav-font col-auto btn btn-outline-light mr-3" href="#">Hei,<?= $username ?></a>
                <a class="nav-link text-light nav-font col-auto btn btn-outline-light" href="logout.php">Logout <i class="fas fa-sign-out-alt fa-lg"></i></a>
        <!-- </div> -->
</nav>
        <!-- <div id="page-content-wrapper"> -->
            <div class="container-fluid" style="margin-top: 4.6em;">
                <div class="row">
                    <div class="col">
                        <?php
                    isset($_GET["page"])? $page=$_GET["page"]:$page="";
                    if ($page=="home") {
                        require_once "home.php";
                    } elseif ($page=="profile") {
                        require_once "profile.php";
                    } elseif ($page=="dokumenuser") {
                        require_once "dokumenuser.php";
                    } elseif ($page=="daftar") {
                        if($hasil['proposal']!='' && $hasil['kartu_identitas']!=''){
                            echo "<div class='alert alert-danger position-relative container' style='top: 60px;'>Anda Sudah Mendaftar </br>Tunggu hingga status anda Magang diterima</div></br></br>";
                        }else{
                            require_once "formdaftar.php";
                            }
                    } elseif ($page=="input") {
                        if(($hasil['status']=='Belum Daftar' || $hasil['status']=='Menunggu Konfirmasi Admin') && $lengkap=='sudah'){
                            require_once "inputanggota.php";
                        }else if ($ada==0){
                            echo "<div class='alert alert-danger position-relative container' style='top: 60px;'>Silahkan Lakukan STEP 1</div></br></br>";
                        }else{
                            echo "<div class='alert alert-danger position-relative container' style='top: 60px;'>Data Anda Sudah Kami Proses Lihat pada menu <strong>Profil</strong></br>Tunggu hingga status anda Magang diterima</div></br></br>";
                            
                            }
                        
                    } elseif ($page=="editdaftar") {
                        
                         if($hasil['status'] == 'Belum Daftar' || $hasil['status'] == 'Menunggu Konfirmasi Admin'){
                            require_once "editdaftar.php";
                        }else{
                            echo "<div class='alert alert-danger position-relative container' style='top: 60px;'>Anda Sudah Mendaftar, Data tidak dapat di ubah</div></br></br>";
                            }
                    } else {
                        require_once "home.php";
                    }
                    
                    ?>
                    </div>
                </div>
<footer class="bg-2 text-white text-center py-4 mt-5 shadow-lg" style="height: 150px;">
        <div class="container">
            <div style="padding-left: 20px;"class="row">
                <div>
                    <img id="zooming" style="width: 300px;" src="../img/logo1.png">
                </div>
                <div class="col-3 text-left">
                    <h5><b>SIMAGANG</b> (Sistem Informasi Magang)</h5>
                    Website resmi dari PG. Rajawali 1 yang digunakan untuk sistem informasi khusus program magang.
                    <small></br>&copy; DEDIKARYA 2019</small>
                </div>
                <div class="text-left col-3">
                    <h5>Hubungi Kami</h5>
                    <div><i class="fas fa-envelope fa-fw mr-3"></i>pgkrebet@pgrajawali1co.id</div>
                    <div><i class="fas fa-phone fa-fw mr-3"></i>0341-833185</div>
                    <div><i class="fas fa-globe fa-fw mr-3"></i>pgrajawali.co.id</div>
                </div>
            </div>
        </div>
    </footer>
            </div>
        </div>
        <!-- </div> -->
        <!-- </div> -->
    
    <script src="../js/popper.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script>
        window.onload = function(){
            var button = document.getElementById('menu-toggle');
            button.click();
            // $("#menu-toggle").addClass('putar');
            // button.
        }
        $("#menu-toggle").click(function(e) {
            // $("#menu-toggle").addClass('putar');
            e.preventDefault();
            
            if($("#wrapper").toggleClass("toggled").hasClass('toggled')){
                $("#menu-toggle").addClass('putar');
            }else{
                $("#menu-toggle").removeClass('putar'); 
                // $("#menu-toggle").addClass('putarBack'); 
            }
            // if($("#wrapper").toggleClass("toggled", function () {
            //     if($(this).is('true')){
            //         alert('hahaha');
            //         $("#menu-toggle").addClass('putar');
            //     }else{
            //         $("#menu-toggle").removeClass('putar');
            //     }
            // }));
            // $("#menu-toggle").removeClass('putar');
        });
    </script>
</body>

</html>