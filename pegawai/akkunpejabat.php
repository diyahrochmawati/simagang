<?php
include "connect.php";
include "prosesakunpejabat.php";
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['usernameadmin'])) {
    header('location:login.php');
} else {
    $username=$_SESSION['usernameadmin'];    
}
$akun="";
if (isset($_POST['akun_pejabat'])) {
    if (akun_pejabat($_POST)) {
        $akun='sukses';
    } else {
        $akun='gagal';
    }
}
if (isset($_POST['login'])) {
    if(login($_POST)){
        // header("location: keranjang.php");
        // echo "<script>
        // window.history.go(-2);
        // <script>";
        ?>
        <script type="text/javascript">
        window.history.go(-2);
        </script>
<?php
    }
}
?>

<!DOCTYPE HTML>
<html>
<head>
     <meta charset="utf-8">
    <meta name="viewport" content="width-device-width, initial-scale=1, shrink-to-">
    <title>.: SIMAGANG :.</title>
    <link rel="stylesheet" href="fontawesomescss/all.css">
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
</head>
<body>
  <div class="row">
    <div class="col-11">
        <h3 class="text-dark p-3 border-bottom mt-2"><i class="fas fa-user-tie fa-lg"></i> AKUN PEJABAT </h3> 
        </br><section class="popular-courses-area section-padding-100">
        
        <div class="container">
            <div class="row" style="padding-left: 20px;" >
              <div class="col-3 border-left border-right">      
        <?php if($akun=='sukses'){
            echo "<div class='alert alert-success position-relative'>Registrasi Sukses!</div>";
        } else if ($akun=='gagal'){
            echo "<div class='alert alert-danger position-relative'>Registrasi Gagal! Silahkan Cobalagi.</div>";
        }
        ?>
        <form method="POST" action="" onsubmit="return validasi()" name="akun_pejabat">
                          <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" id="usernamepejabat" name="usernamepejabat" class="form-control" placeholder="Email">
                            <div class="text-danger" id="email_invalid"></div>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                            <div class="text-danger" id="password_invalid"></div>
                        </div>
                        <div class="form-group">
                            <label for="jabatan">Jabatan</label>
                            <select name='jabatan' class="form-control">
                                <option value='Admin'>Admin</option>
                                <option value='Staff'>Staff SDM</option>
                                <option value='Kabag_SDM'>Kabag SDM</option>
                                <option value='Pimpinan_Bagian'>Pimpinan Bagian</option>
                            </select>
                            <div class="text-danger" id="jabatan_invalid"></div>
                        </div>
                        <div class="form-group">
                            <label for="posisi">Posisi</label>
                            <select name='posisi' class="form-control">
                                <option value='AK. '>Akutansi & Keuangan</option>
                                <option value='SU. ' selected="yes">SDM & Umum</option>
                                <option value='QC. '>Quality Control</option>
                                <option value='P1. '>Pabrikasi KB I</option>
                                <option value='I1. '>Instalasi KB I</option>
                                <option value='P2. '>Pabrikasi KB II</option>
                                <option value='I2. '>Instalasi KB II</option>
                                <option value='TN. '>Tanaman</option>
                            </select>
                            <div class="text-danger" id="posisi_invalid"></div>
                        </div>                        
                        <button type="submit" name="akun_pejabat" class="btn bg-2 text-light border-0 pr-4 pl-4 pt-2 pb-2">Buat Akun</button>
                        
                    </form>
                    <br/>
                    <a type="submit" href="?page=tampilpejabat" class="btn">Tampil Data Akun</a>
                </div>
            </div>
        </div>
    </div>
 </div>
          
    </section>
     <script src="../js/popper.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script type="text/javascript">
        var usernamepejabat = document.forms["akun_pejabat"]["usernamepejabat"];
        var email = document.forms["akun_pejabat"]["email"];
        var password = document.forms["akun_pejabat"]["password"];
        var jabatan = document.forms["akun_pejabat"]["jabatan"];
        var posisi = document.forms["akun_pejabat"]["posisi"];
      
 //display
        var usernamepejabat_invalid = document.getElementById("usernamepejabat_invalid");
        var email_invalid = document.getElementById("email_invalid");
        var password_invalid = document.getElementById("password_invalid");
        var jabatan_invalid = document.getElementById("jabatan_invalid");
        var posisi_invalid = document.getElementById("posisi_invalid");
//listen
        usernamepejabat.addEventListener('blur', usernamepejabatvalid, true);
        password.addEventListener('blur', passwordvalid, true);
        email.addEventListener('blur', emailvalid, true);
        jabatan.addEventListener('blur', jabatanvalid, true);
        jabatan.addEventListener('blur', posisivalid, true);

         function validasi(){
            //username
            if(usernamepejabat.value==""){
                usernamepejabat_invalid.textContent = "Masukan Username!";
                usernamepejabat.focus();
                return false;
            }
              //email
            if(email.value==""){
                email_invalid.textContent = "Masukan Alamat Email Anda!";
                email.focus();
                return false;
            }
            //password
            if(password.value==""){
                password_invalid.textContent = "Masukan Password!";
                password.focus();
                return false;
            }else if(password.value.length < 8 ){
                password_invalid.textContent = "Masukan Password Minimal 8 Karakter!";
                password.focus();
                return false;
            }
            if(jabatan.value==""){
                jabatan_invalid.textContent = "Masukan Nama Instansi Anda!";
                jabatan.focus();
                return false;
            }

        }

 function usernamepejabatvalid(){
            if(!usernamepejabat.value==""){
                usernamepejabat_invalid.textContent = "";
                return true;
            }
        }
           function emailvalid(){
            if(!email.value==""){
                email_invalid.textContent = "";
                return true;
            }
        }
        function passwordvalid(){
            if(!password.value==""){
                password_invalid.textContent = "";
                return true;
            }
        }
        function posisivalid(){
            if(!posisi.value==""){
                posisi_invalid.textContent = "";
                return true;
            }
        }
     
        function jabatanvalid(){
            if(!jabatan.value==""){
                jabatan_invalid.textContent = "";
                return true;
            }
        }
  </script>       
</body>
</html>