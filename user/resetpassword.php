<?php
include "connect.php";
$username=$_GET['username'];
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
    <div class="container" style="margin-top:6rem; margin-bottom: -3.5rem;">
            <div class="row" style="padding-left: 460px;">
                <div class="col-4 offset-0">
                    <h4 class="text-drak text-center roboto-font font-weight-bold mb-4 badge-light p-2 rounded bg-2">Reset Password Anda!</h2>
                </div>
            </div>
            <div class="row" style="padding-left: 460px;">
            <div class="col-4 offset-0 border-right border-left rounded p-4 mb-5">
                <form action="proses_resetpassword.php" method="POST" onsubmit="return validasi()" name="btnReset">
                  <div class="form-group">
                   <input class="form-control" type="text" name="username" value="<?php echo $username?>">
                  </div>
                  <div class="form-group">
                   <label>Password Baru</label></br>
                   <input  class="form-control" type="password" id="password" name="password" required="">
                   <div class="text-danger" id="password_invalid"></div>
                  </div>
                  <div class="form-group">
                   <label>Konfirmasi Password Baru</label></br>
                   <input class="form-control" type="password" id="repassword" name="repassword" required="">
                   <div class="text-danger" id="repassword_invalid"></div>
                  </div>
                  <input type="submit" class="btn bg-2 text-light border-0 pr-4 pl-4 pt-2 pb-2" name="btnReset" value="Reset">
               </form>
            </div>
            </div>
        </div>

<script src="../js/popper.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script type="text/javascript">
        var password = document.forms["btnReset"]["password"];
        var repassword = document.forms["btnReset"]["repassword"];

        //display
        var password_invalid = document.getElementById("password_invalid");
        var repassword_invalid = document.getElementById("repassword_invalid");

        //listen
        password.addEventListener('blur', passwordvalid, true);
        repassword.addEventListener('blur', repasswordvalid, true);

        function validasi(){
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
            for (var i = 0; i < password.value.length; i ++){
				var ch = password.value.charAt(i);
				if(((ch < "A") || (ch > "Z")) && ((ch < "a") || (ch > "z")) && ((ch < "0") || (ch > "9"))){
					password_invalid.textContent = "Password tidak boleh mengandung symbol !";
					return false;
				}
			}
            if(repassword.value==""){
                repassword_invalid.textContent = "Masukan Ulang Password Anda !";
                repassword.focus();
                return false;
            }else if(password.value != repassword.value ){
                repassword_invalid.textContent = "Password Tidak sama !";
                repassword.focus();
                return false;
            }
   }
        function passwordvalid(){
            if(!password.value==""){
                password_invalid.textContent = "";
                return true;
            }
        }
    </script>
    
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