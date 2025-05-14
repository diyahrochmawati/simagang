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
            text-align: center;
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
        .w-400{
            float: left;
            width: 400px;
        }
        #zooming:hover {
            transform: scale(1.1);
            transition-property: transform;
            transition-duration: .5s;
        }
    </style>
</head>
<body>
<div class="row">
    <div class="col-10 offset-1">
            <h3 class="text-dark p-3 border-bottom mt-2"><i class="fas fa-home fa-lg"></i> HOME</h3>
    
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
                                        <img src="img/slide1.jpg" class="w-100" alt="buku1">
                                    </a>
                                </div>
                                <div class="carousel-item">
                                    <a href="#">
                                        <img src="img/slide2.jpg" class="w-100" alt="buku2">
                                    </a>
                                </div>
                                <div class="carousel-item">
                                    <a href="#">
                                        <img src="img/slide3.jpg" class="w-100" alt="buku3">
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
    
<div style="margin-top: 30px;"><img class="w-400" id="zooming" src="img/tanya.png"/>
        <div id="zooming" class="judul">APA ITU PROGRAM MAGANG ?</div>
            <p>Apa ada Undang-Undang atau peraturan khusus yang mengatur mengenai magang?
            Masalah magang telah diatur dalam Undang-Undang No.13 tahun 2003 tentang Ketenagakerjaan khususnya 
            pasal 21-30. Spesifiknya diatur dalam Peraturan Menteri Tenaga Kerja dan Transmigrasi 
            no.Per.22/Men/IX/2009 tentang Penyelenggaraan Pemagangan di Dalam Negeri.
            Dalam Peraturan Menteri tersebut, Pemagangan diartikan sebagai bagian dari sistem pelatihan kerja 
            yang diselenggarakan secara terpadu antara pelatihan di lembaga pelatihan dengan bekerja secara langsung 
            di bawah bimbingan dan pengawasan instruktur atau pekerja yang lebih berpengalaman dalam proses produksi 
            barang dan/atau jasa di perusahaan, dalam rangka menguasai keterampilan atau keahlian tertentu.
            </p>
</div>
<div style="margin-top: 100px;"><img id="zooming" class="w-400" style="float: right;margin-top: 50px;"src="img/pabrik.png"/>
        <div id="zooming" class="judul"><br />APA ITU PG. RAJAWALI 1 ?</div>
            <p>PT Pabrik Gula Rajawali I merupakan anak perusahaan PT PPEN Rajawali Nusantara Indonesia (Persero) 
            yang bergerak di bidang agro industri berbasis tebu. Didirikan Tanggal 19 September 1995. 
            Berlokasi di 3 kota besar Jawa Timur yakni Surabaya, Malang dan Madiun. Memiliki Jumlah Pegawai
             hingga 3.306 Orang PT PG Rajawali I mempunyai budaya perusahaan yang sangat kuat yakni PINTER 
             (Professionalisme INtregity Teamwork Excellence Respect).


            </p>
</div>
</div>
</div>
</body>
</html>