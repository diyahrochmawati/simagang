<?php 
require_once("../pegawai/connect.php");
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['usernamekabag'])) {
    header('location:../pegawai/login.php');
} else {
    $username=$_SESSION['usernamekabag'];    
}

    $cekdaftar = mysqli_query($connection, "select * from pendaftaran where status='Menunggu Konfirm KABAG SDM'");
    $jumcekdaftar = mysqli_num_rows($cekdaftar);
    
    $ceksurat = mysqli_query($connection, "select * from pendaftaran where status='Menunggu ACC KABAG SDM'");
    $jumceksurat = mysqli_num_rows($ceksurat);
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
        <div class="bg-2 shadow position-fixed" id="sidebar-wrapper">
            <ul class="nav flex-column">
               <li id="produk" class="nav-item mt-4 nav-font border-bottom  ">
                    <a class="nav-link text-light p-2" href="?page=home"><i class="fas fa-home fa-lg"></i>&nbsp&nbsp&nbspData Pendaftaran 
                    <?php if( $jumcekdaftar != 0){ ?><label style="font-size: 13px; width: 20px; border-radius:50px; background-color: #D7D7D7; color: #2E5C5C; text-align: center;"><?php echo $jumcekdaftar; ?></label><?php } ?></a>
                </li>
                <li  id="produk" class="nav-item mt-3 nav-font border-bottom">
                    <a class="nav-link text-light p-2" href="?page=accadmin"><i class="fas fa-check fa-lg"></i>&nbsp&nbsp&nbspVerifikasi Surat 
                    <?php if( $jumceksurat != 0){ ?><label style="font-size: 13px; width: 20px; border-radius:50px; background-color: #D7D7D7; color: #2E5C5C; text-align: center;"><?php echo $jumceksurat; ?></label><?php } ?></a>
                </li>
                <li  id="produk" class="nav-item mt-3 nav-font border-bottom">
                    <a class="nav-link text-light p-2" href="?page=datakelompok"><i class="fas fa-user-friends fa-lg"></i>&nbsp&nbsp&nbspData Kelompok</a>
                </li>
                <li  id="produk" class="nav-item mt-3 nav-font border-bottom">
                    <a class="nav-link text-light p-2" href="?page=datapeserta"><i class="fas fa-user  fa-lg"></i>&nbsp&nbsp&nbspData Peserta</a>
                </li>
                <li  id="produk" class="nav-item mt-3 nav-font border-bottom ">
                    <a class="nav-link text-light p-2" href="?page=arsipdokumen"><i class="fas fa-folder fa-lg"></i>&nbsp&nbsp&nbspArsip Dokumen</a>
                </li>
            </ul>
        </div>
            <nav class="nav bg-2 shadow p-3 fixed-top" id="navbar-top">
            
                <i class="fa fa-arrow-circle-right text-light fa-3x col-auto" href="#menu-toggle" id="menu-toggle"></i>
                <a  id="produk" href="?page=home" class="text-light font-weight-bold text-center col" style="text-decoration: none; font-size: 26px;"><i class="fas fa-briefcase"></i></i> SIMAGANG</a>

                <a class="nav-link text-light nav-font col-auto btn btn-outline-light"><?php echo "Hy, ",$username; ?>  </a>&nbsp;&nbsp;&nbsp;
                <a class="nav-link text-light nav-font col-auto btn btn-outline-light" href="logout.php">Logout  <i class="fas fa-sign-out-alt  fa-lg"></i></a>
            </nav>
            </nav>
            <div class="container-fluid" style="margin-top: 4.6em;">
                <div class="row">
                    <div class="col">
                        <?php
                    isset($_GET["page"])? $page=$_GET["page"]:$page="";
                   if ($page=="home") {
                        require_once "home.php";
                    } elseif ($page=="tampilpejabat") {
                        require_once "tampilpejabat.php";
                    } elseif ($page=="accadmin") {
                        require_once "accadmin.php";
                    } elseif ($page=="arsipdokumen") {
                        require_once "arsipdokumen.php";
                    } elseif ($page=="datakelompok") {
                        require_once "datakelompok.php";
                    } elseif ($page=="datapeserta") {
                        require_once "datapeserta.php";
                    } elseif ($page=="konfirmasi") {
                        require_once "konfirmasi.php";
                    } elseif ($page=="tampilpejabat") {
                        require_once "tampilpejabat.php";
                    } elseif ($page=="lihatproposal"){
                        require_once "lihatproposal.php";
                    } elseif ($page=="lihatsurat"){
                        require_once "lihatsurat.php";
                    } elseif ($page=="lihatlaporan"){
                        require_once "lihatlaporan.php";
                    }else {
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
    <script src="../js/popper.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script>
        window.onload = function(){
            var button = document.getElementById('menu-toggle');
            button.click();
        }
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            
            if($("#wrapper").toggleClass("toggled").hasClass('toggled')){
                $("#menu-toggle").addClass('putar');
            }else{
                $("#menu-toggle").removeClass('putar'); 
            }
        });
    </script>
</body>

</html>