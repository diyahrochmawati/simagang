<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width-device-width, initial-scale=1, shrink-to-">
    <title>SIMAGANG</title>
    <link rel="stylesheet" href="../fontawesome/css/all.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/simple-sidebar.css">
    <script src="../js/jquery-3.3.1.js"></script>
    <script src="../js/script.js"></script>
    <script src="../js/Chart.bundle.min.js"></script>
    <style>
        .judul{
            margin-left: 10px;
            text-align: center;
            font-family: Gill Sans MT Condensed;
            font-size: 40px;
            font-weight: bold;
        }
        .artikel {
            margin-left: 10px;
            margin-right: 120px;
        }
        p{
            font-family: calibri;
            text-align: justify;
            padding: 0px 10px 0px 10px;
            font-size: 17px;
        }
        .icon{
            float: left;
            width: 200px;
        }
        .navbar{
            margin-top: 40px;

            
        }
        #produk:focus {
            transform: scale(1.1);
            transition-property: transform;
            transition-duration: .5s;
            color: blue;
            
        }
    </style>
</head>
<body>
<header>
<div class="row">
    <div class="col-10 offset-1">
    <h3 class="text-dark p-3 border-bottom mt-2"><i class="fas fa-user fa-lg"></i> PROFILE</h3>    
            <header>
            <div class="container">
                <div class="row">
                    <div class="col-8">
                        <div id="demo" class="carousel slide border" data-ride="carousel">
                            <ul class="carousel-indicators ">
                                <li data-target="#demo" data-slide-to="0" class="active"></li>
                                <li data-target="#demo" data-slide-to="1"></li>
                                <li data-target="#demo" data-slide-to="2"></li>
                            </ul>
                            <div class="carousel-inner shadow rounded">
                                <div class="carousel-item active">
                                    <a href="#">
                                        <img src="img/slide_1.jpg" class="w-100" alt="buku1">
                                    </a>
                                </div>
                                <div class="carousel-item">
                                    <a href="#">
                                        <img src="img/slide_2.jpg" class="w-100" alt="buku2">
                                    </a>
                                </div>
                                <div class="carousel-item">
                                    <a href="#">
                                        <img src="img/slide_3.jpg" class="w-100" alt="buku3">
                                    </a>
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                            </a>
                            <a class="carousel-control-next" href="#demo" data-slide="next">
                                <span class="carousel-control-next-icon"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
            <div class="navbar" style="margin-top: 5px;">
                <a  id="produk" href="?page=profile&halaman=visimisi" ><img class="icon" src="img/tombolvisimisi.png"/></a>
                <a  id="produk" href="?page=profile&halaman=sejarah" ><img class="icon" src="img/tombolsejarah.png"/></a>
                <a  id="produk" href="?page=profile&halaman=kontakperson" ><img class="icon" src="img/tombolcp.png"/></a>
                <a  id="produk" href="?page=profile&halaman=susunanorganisasi" ><img class="icon" src="img/tombolso.png"/></a>
                
            </div> 
        
    </div>
    </div>
       
    <div style="background-color: none; width: auto; padding-left: 100px;">
                    <?php
                    isset($_GET["halaman"])? $halaman=$_GET["halaman"]:$halaman="";
                    if ($halaman=="visimisi"){
                        require_once "visimisi.php";
                    } elseif ($halaman=="sejarah"){ 
                        require_once "sejarah.php";
                    } elseif ($halaman=="kontakperson") {
                        require_once "kontakperson.php";
                    } elseif ($halaman=="susunanorganisasi"){ 
                        require_once "susunanorganisasi.php";
                    } else {
                        require_once "visimisi.php";
                    }
                    ?>
    </div>
</header>
</body>
</html>               