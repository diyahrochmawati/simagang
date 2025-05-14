<?php
include "connect.php";

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

</head>
<body>
    <div class="container" style="margin-top:9.5rem;">
            <div class="row" style="padding-left: 460px;">
                <div class="col-4 offset-0">
                    <h4 class="text-drak text-center roboto-font font-weight-bold mb-4 badge-light p-2 rounded bg-2">Masukan Identitas Anda!</h2>
                </div>
            </div>
            <div class="row" style="padding-left: 460px;">
            <div class="col-4 offset-0 border-right border-left rounded p-4 mb-5">
                <form action="proseslupa.php" method="post">
                        <div class="form-group">
                            <input type="email" class="form-control" name='username' placeholder="E-mail">
                        </div>
                        <div class="form-group">
                            <input type="text" name='no_hp' class="form-control" placeholder="No HP">
                        </div>
                        <button type="submit" name='login' class="btn bg-2 text-light border-0 pr-4 pl-4 pt-2 pb-2">Input</button>
                    </form>
            </div>
            </div>
        </div>
    <nav class="nav bg-2 shadow p-3 fixed-top" id="navbar-top">
        <a  id="produk" href="../index.php" class="text-light font-weight-bold text-center col" style="text-decoration: none; font-size: 26px;"><i class="fas fa-briefcase"></i> SIMAGANG</a>        
    </nav>
            
    <footer class="bg-2 text-white text-center py-4 mt-5 shadow-lg" style="height: 150px;">
        <div class="container">
            <div style="padding-left: 100px;"class="row">
                <div>
                    <img id="zooming" style="width: 300px;" src="../img/logo1.png">
                </div>
                <div class="col-4 text-left">
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
</body>
</html>