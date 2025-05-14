<!DOCTYPE html>
<html>

<head>
<link rel="shortcut icon" href="img/x.ico"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width-device-width, initial-scale=1, shrink-to-">
    <title> SIMAGANG</title>
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/simple-sidebar.css">
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/script.js"></script>
    <script src="js/Chart.bundle.min.js"></script>
    
    
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
                    <a class="nav-link text-light p-2" href="?page=home"><i class="fas fa-home fa-lg"></i>&nbsp&nbsp&nbspHome</a>
                </li>
                <li  id="produk" class="nav-item mt-3 nav-font border-bottom">
                    <a class="nav-link text-light p-2" href="?page=profile"><i class="fas fa-user  fa-lg"></i>&nbsp&nbsp&nbspProfile</a>
                </li>
                <li  id="produk" class="nav-item mt-3 nav-font border-bottom ">
                    <a class="nav-link text-light p-2" href="?page=programmagang"><i class="fas fa-list  fa-lg"></i>&nbsp&nbsp&nbspProgram Magang</a>
                </li>
                <li  id="produk" class="nav-item mt-3 nav-font border-bottom ">
                    <a class="nav-link text-light p-2" href="?page=petunjuk"><i class="fas fa-question-circle fa-lg"></i></i>&nbsp&nbsp&nbspPetunjuk</a>
                </li>
            </ul>
        </div>

            <nav class="nav bg-2 shadow p-3 fixed-top" id="navbar-top">
            
                <i class="fa fa-arrow-circle-right text-light fa-3x col-auto" href="#menu-toggle" id="menu-toggle"></i>
                <a  id="produk" href="?page=home" class="text-light font-weight-bold text-center col" style="text-decoration: none; font-size: 26px;"><i class="fas fa-briefcase"></i></i> SIMAGANG</a>
               
                <a class="nav-link text-light nav-font col-auto btn btn-outline-light" href="user/login.php">Login  <i class="fas fa-sign-in-alt  fa-lg"></i></a>
            </nav>

            <div class="container-fluid" style="margin-top: 4.6em;">
                <div class="row">
                    <div class="col">
                        <?php
                    isset($_GET["page"])? $page=$_GET["page"]:$page="";
                    if ($page=="home") {
                        require_once "home.php";
                    } elseif ($page=="profile") {
                        require_once "profile.php";
                    } elseif ($page=="programmagang") {
                        require_once "programmagang.php";
                    } elseif ($page=="petunjuk") {
                        require_once "petunjuk.php";
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
                    <img id="zooming" style="width: 300px;" src="img/logo1.png">
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
    
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.js"></script>
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