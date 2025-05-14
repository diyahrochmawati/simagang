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
$hasil = mysqli_fetch_array($status);
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width-device-width, initial-scale=1, shrink-to-">
    <title>SIMAGANG</title>
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
    </style>
    <style>
        .judul{
            margin-left: 10px;
            font-family: Gill Sans MT Condensed;
            font-size: 40px;
            font-weight: bold;
        }
        .artikel {
            margin-left: 50px;
            margin-right: 120px;
        }
        p{
            font-family: calibri;
            text-align: justify;
            padding: 0px 10px 0px 10px;
            font-size: 17px;
        }
        img{
            width: 300px;
        }
        
    </style>
</head>
<body>
   <div>
            <h3 class="text-dark p-3 border-bottom mt-2"><i class="fas fa-file-archive fa-lg"></i> DOKUMEN ANDA</h3> 
            <div style="margin-top: 50px; justify-content: center;">
            <?php
            if($hasil['id_daftar']==null){
                echo "<script>alert('Anda belum daftar! Silahkan klik button DAFTAR');history.go(-1);</script>";
                echo "Anda belum mendaftar";
            }
            ?></div>
            
                            <div class="navbar" style="background-color: white; width: auto; padding-left: 50px; padding-right: 50px;  " >
                                <a  id="produk" href="?page=dokumenuser&hal=proposal" ><button style="width: 200px; height: 60px; background-color:silver;"><i class="fas fa-file-pdf fa-2x"><p class="text-dark">Proposal</p> </button></i></a>
                                <a  id="produk" href="?page=dokumenuser&hal=surat" ><button style="width: 200px; height: 60px; background-color:silver;"><i class="fas fa-file-pdf fa-2x"> <p class="text-dark">Surat ACC</p></button></i></a>
                                <a  id="produk" href="?page=dokumenuser&hal=laporan" ><button style="width: 200px; height: 60px; background-color:silver;"><i class="fas fa-file-pdf fa-2x"> <p class="text-dark">Laporan</p></button></i></a>
                                <a  id="produk" href="?page=dokumenuser&hal=nilai" ><button style="width: 200px; height: 60px; background-color:silver;"><i class="fas fa-file-word fa-2x"> <p class="text-dark">Nilai</p></button></i></a>
                            </div> 
                        
                    
                    
                       
                    <div style="background-color: #E6E6E6; width: auto; padding-left: 0px;">
                                    <?php
                                    isset($_GET["hal"])? $hal=$_GET["hal"]:$hal="";
                                    if ($hal=="proposal"){
                                        require_once "tampilproposal.php";
                                    } elseif ($hal=="surat"){ 
                                        require_once "tampilsurat.php";
                                    } elseif ($hal=="laporan"){
                                        require_once "tampillaporan.php";
                                    } elseif ($hal=="nilai"){
                                        require_once "uploadnilai.php";
                                    }
                                    else {
                                        require_once "tampilproposal.php";
                                    }
                                    ?>
                    </div>
                
   
            </div>           
</body>
</html>