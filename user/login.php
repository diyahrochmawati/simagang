<?php
include "connect.php";
include "fungsi.php";
$reg="";
if (isset($_POST['register'])) {
    if (daftar($_POST)) {
        $reg='sukses';
    } else {
        $reg='gagal';
    }
}
if (isset($_POST['login'])) {
    if(login($_POST)){
        ?>
        <script type="text/javascript">
        window.history.go(-2);
        </script>
<?php
    }
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

</head>
<body>
    <div class="container" style="margin-top:7rem;">
        <?php if($reg=='sukses'){
                    echo "<div class='alert alert-success position-relative'>Registrasi Sukses! Silahkan Login</div>";
                } else if ($reg=='gagal'){
                    echo "<div class='alert alert-danger position-relative'>Registrasi Gagal! Silahkan Cobalagi.</div>";
                }
        ?>
            <div class="row" style="padding-left: 230px;">
                <div class="col-3 offset-0">
                    <h4 class="text-drak text-center roboto-font font-weight-bold mb-4 badge-light p-2 rounded bg-2">Login Disini!</h2>
                </div>
                <div class="col-3 offset-1">
                    <h4 class="text-drak text-center roboto-font font-weight-bold mb-4 badge-light p-2 rounded bg-2 ">Daftar Disini!</h2>
                </div>
            </div>
            <div class="row" style="padding-left: 230px;">
            <div class="col-3 offset-0 border-right border-left rounded p-4 mb-5">
                <form action="" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" name='username' placeholder="E-mail">
                        </div>
                        <div class="form-group">
                            <input type="password" name='password' class="form-control" placeholder="Password">
                        </div>
                        <button type="submit" name='login' class="btn bg-2 text-light border-0 pr-4 pl-4 pt-2 pb-2">Login</button>
                        <small>Lupa Password ? Klik <a href="lupapassword.php">Disini</a></small>
                    </form>
            </div>
                <div class="col-3 offset-1 border-left border-right rounded p-4 mb-5">
                    <form method="POST" action="" onsubmit="return validasi()" name="register">
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input required="yes" type="email" name="username" id="username" class="form-control" placeholder="E-mail">
                            <div class="text-danger" id="email_invalid"></div>
                        </div>
                        <div class="form-group">
                            <label for="Password">Password</label>
                            <input type="password" id="Password" name="password" class="form-control" placeholder="Password">
                            <div class="text-danger" id="password_invalid"></div>
                        </div>
                         <div class="form-group">
                            <label for="Password1">Ulang Password</label>
                            <input type="password" id="Password1" name="password1" class="form-control" placeholder="Ulang Password">
                            <div class="text-danger" id="password1_invalid"></div>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama">
                            <div class="text-danger" id="nama_invalid"></div>
                        </div>
                        <div class="form-group">
                        <label for="kelamin">Jenis Kelamin</label><br/>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input checked="yes" type="radio" name="kelamin" id="KelaminL" class="custom-control-input" value="L">
                                <label for="KelaminL" class="custom-control-label">Laki-laki</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="kelamin" id="KelaminP" class="custom-control-input" value="P">
                                <label for="KelaminP" class="custom-control-label">Perempuan</label>
                            </div>
                            <div class="text-danger" id="kelamin_invalid"></div>
                        </div>
                        <div class="form-group">
                            <label for="no_hp">Nomer HP</label>
                            <input type="text" name="no_hp" id="no_hp" class="form-control" placeholder="Nomer Handphone">
                            <div class="text-danger" id="no_hp_invalid"></div>
                        </div>
                        <div class="form-group">
                            <label for="instansi">Sekolah/Universitas</label>
                            <input type="text" name="instansi" class="form-control" placeholder="Sekolah/Universitas">
                            <div class="text-danger" id="instansi_invalid"></div>
                        </div>
                        <button type="submit" name="register" class="btn bg-2 text-light border-0 pr-4 pl-4 pt-2 pb-2">Daftar</button>
                        <button type="reset" class="btn bg-2 text-light border-0 pr-4 pl-4 pt-2 pb-2">Reset</button>
                    </form>
                </div>
            </div>
        </div>
    
    <script src="../js/popper.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script type="text/javascript">
        var username = document.forms["register"]["username"];
        var password = document.forms["register"]["password"];
        var password1 = document.forms["register"]["password1"];
        var nama = document.forms["register"]["nama"];
        var kelamin = document.forms["register"]["kelamin"];
        var email = document.forms["register"]["email"];
        var no_hp = document.forms["register"]["no_hp"];
        var instansi = document.forms["register"]["instansi"];

        //display
        var username_invalid = document.getElementById("username_invalid");
        var password_invalid = document.getElementById("password_invalid");
        var password1_invalid = document.getElementById("password1_invalid");
        var nama_invalid = document.getElementById("nama_invalid");
        var kelamin_invalid = document.getElementById("kelamin_invalid");
        var email_invalid = document.getElementById("email_invalid");
        var no_hp_invalid = document.getElementById("no_hp_invalid");
        var instansi_invalid = document.getElementById("instansi_invalid");

        //listen
        username.addEventListener('blur', usernamevalid, true);
        password.addEventListener('blur', passwordvalid, true);
        password1.addEventListener('blur', password1valid, true);
        nama.addEventListener('blur', namavalid, true);
        kelamin.addEventListener('blur', kelaminvalid, true);
        email.addEventListener('blur', emailvalid, true);
        no_hp.addEventListener('blur', no_hpvalid, true);
        instansi.addEventListener('blur', instansivalid, true);

        function validasi(){
            //username
            if(username.value==""){
                username_invalid.textContent = "Masukan Username!";
                username.focus();
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
            for (var i = 0; i < password.value.length; i ++){
				var ch = password.value.charAt(i);
				if(((ch < "A") || (ch > "Z")) && ((ch < "a") || (ch > "z")) && ((ch < "0") || (ch > "9"))){
					password_invalid.textContent = "Password tidak boleh mengandung symbol !";
					return false;
				}
			}
            if(password1.value==""){
                password1_invalid.textContent = "Masukan Ulang Password Anda !";
                password1.focus();
                return false;
            }else if(password.value != password1.value ){
                password1_invalid.textContent = "Password Tidak sama !";
                password1.focus();
                return false;
            }
            //nama lengkap
            if(nama.value==""){
                nama_invalid.textContent = "Masukan Nama Lengkap Anda!";
                nama.focus();
                return false;
            }

            //kelamin
            if(kelamin.value==""){
                kelamin_invalid.textContent = "Masukan Jenis Kelamin Anda!";
                kelamin.focus();
                return false;
            }
            //email
            if(email.value==""){
                email_invalid.textContent = "Masukan Alamat Email Anda!";
                email.focus();
                return false;
            }
            //no HP
            if(no_hp.value==""){
                no_hp_invalid.textContent = "Masukan Nomer Handphone Anda!";
                no_hp.focus();
                return false;
            }else if(isNaN(no_hp.value)){
                no_hp_invalid.textContent = "No HP harus angka !";
                no_hp.focus();
                return false;
            }
            //alamat
            if(instansi.value==""){
                instansi_invalid.textContent = "Masukan Nama Instansi Anda!";
                instansi.focus();
                return false;
            }

        }

        function usernamevalid(){
            if(!username.value==""){
                username_invalid.textContent = "";
                return true;
            }
        }
        function passwordvalid(){
            if(!password.value==""){
                password_invalid.textContent = "";
                return true;
            }
        }
        function namavalid(){
            if(!nama.value==""){
                nama_invalid.textContent = "";
                return true;
            }
        }
        function kelaminvalid(){
            if(!kelamin.value==""){
                kelamin_invalid.textContent = "";
                return true;
            }
        }
        function emailvalid(){
            if(!email.value==""){
                email_invalid.textContent = "";
                return true;
            }
        }
        function nohpvalid(){
            if(!no_hp.value==""){
                no_hp_invalid.textContent = "";
                return true;
            }
        }
        function instansivalid(){
            if(!instansi.value==""){
                instansi_invalid.textContent = "";
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