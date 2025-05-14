<?php 
include "connect.php";
include "fungsi.php";
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

if(isset($_POST["peserta"])) {
$target_dir = "dokumen/ktp/";
$temp = explode(".", $_FILES["kartu_identitas"]["name"]);//untuk mengambil nama file gambarnya saja tanpa format gambarnya
$nama_baru=round(microtime(true)) . '.' . end($temp);
$target_file = $target_dir . $nama_baru;
$uploadOk = 1;
$FileType = strtolower (end($temp));
        
// Check if image file is a actual image or fake image

// Check file size
if ($_FILES["kartu_identitas"]["size"] > 2000000) {
    echo "<div class='alert alert-danger position-relative'style='top:10px'>File terlalu besar maksimal 2MB !</div>";
    $uploadOk = 0;
}
// Allow certain file formats
if($FileType != "jpg"  ) {
    echo "<div class='alert alert-danger position-relative'style='top:10px'>Format file harus .JPG !</div>";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
        echo "<div class='alert alert-danger position-relative'style='top:10px'>Maaf file anda tidak ter upload. </div>";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["kartu_identitas"]["tmp_name"], $target_file)) {
        echo "<div class='alert alert-success position-relative' style='top: 20px'>Upload File Kartu identitas Sukses!, <strong>Silahkan mengisi formulir !</strong></div>";
        echo " Kartu Identitas anda ". basename( $_FILES["kartu_identitas"]["name"]). " sudah terUpload";
        echo "<div class='alert alert-success position-relative' style='top: 20px'><strong>Input Data berhasil</strong>, 
        lakukan ulang untuk anggota lainnya!</br></br><strong>- Lihat atau edit hasil</strong> 
        pada menu Profil, setelah data kami proses  maka anda <strong>tidak dapat mengedit 
        kembali</strong>.</br>- Data pendaftaran anda <strong>tidak dapat kami proses</strong> sebelum semua peserta ter input</div>";
        $daftar=$hasil['id_daftar'];
        mysqli_query($connection,"insert into peserta (id_daftar,uploadktp) VALUES ('$daftar','$nama_baru')");
       // mysqli_query($connection,"update pendaftaran set kartu_identitas='$nama_file' where username='$username'");
    } else {
            echo "<div class='alert alert-danger position-relative'style='top:10px'>Maaf, Tidak terupload</div>";
    }
}
}

if($hasil['status']==null){
    echo "<script>alert('Anda belum mendaftar! Silahkan daftar terlebih dahulu');history.go(-1);</script>";
    echo "Anda belum mendaftar";
    }

$reg="";
if (isset($_POST['peserta'])) {
            if (anggota($_POST)) {
            $reg='sukses';
    } else {
        $reg='gagal';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width-device-width, initial-scale=1, shrink-to-">
    <title>SIMAGANG</title>
    <link rel="stylesheet" href="../fontawesome/css/all.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/jquery-3.3.1.js"></script>
    <script src="../js/script.js"></script>
</head>
<body>

        <div style="margin-top: 40px;">
                    <h4 class="text-drak text-center roboto-font font-weight-bold ">Upload Data Anggota</h4>
        </div>
    <div <div class="col-5 border-left border-right" style="margin-top: 10px; margin-left: 300px" >
    <div>
            <div>
                    <h4 class="text-drak text-center roboto-font font-weight-bold mb-4 badge-light p-2 rounded bg-2 ">Input Data Anggota disini !</h4>
            </div>
                <div>
                    <form method="POST" action="" enctype="multipart/form-data" onsubmit="return validasi()" name="peserta">
                        <div class="form-group">
                            <label for="">Kartu Identitas (.jpg) :</label>
                            <input required="yes" type="file" name="kartu_identitas" id="kartu_identitas" class="form-control"/><br />
                        </div>                        
                        <div class="form-group">
                            <label for="no_ktpa">No KTP/NIM/NIS :</label>
                            <input type="text" id="no_ktpa" name="no_ktpa" class="form-control" placeholder="No KTP/NIM/NIS">
                            <div class="text-danger" id="no_ktpa_invalid"></div>
                        </div>
                        <div class="form-group">
                            <label for="namaa">Nama Anggota :</label>
                            <input type="text" id="namaa" name="namaa" class="form-control" placeholder="Nama Anggota">
                            <div class="text-danger" id="namaa_invalid"></div>
                        </div>
                        <div class="form-group">
                            <label for="tempat_lahira">Tempat Lahir :</label>
                            <input type="text" id="tempat_lahira" name="tempat_lahira" class="form-control" placeholder="Tempat Lahir">
                            <div class="text-danger" id="tempat_lahira_invalid"></div>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_lahira">Tanggal Lahir :</label>
                            <input type="date" id="tanggal_lahira" name="tanggal_lahira" class="form-control" placeholder="Tanggal Lahir">
                            <div class="text-danger" id="tanggal_lahira_invalid"></div>
                        </div>
                        <div class="form-group">
                        <label for="Kelamina">Jenis Kelamin :</label><br/>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input checked="yes" type="radio" name="kelamina" id="KelaminaL" class="custom-control-input" value="L">
                                <label for="KelaminaL" class="custom-control-label">Laki-laki</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="kelamina" id="KelaminaP" class="custom-control-input" value="P">
                                <label for="KelaminaP" class="custom-control-label">Perempuan</label>
                            </div>
                            <div class="text-danger" id="kelamina_invalid"></div>
                        </div>
                        <div class="form-group">
                            <label for="alamata">Alamat :</label>
                            <textarea name="alamata" rows="5" cols="40" class="form-control"></textarea>
                            <div class="text-danger" id="alamata_invalid"></div>
                        </div>
                        <div class="form-group">
                            <label for="emaila">E-mail :</label>
                            <input type="email" name="emaila" id="emaila" class="form-control" placeholder="Email">
                            <div class="text-danger" id="emaila_invalid"></div>
                        </div>
                        <div class="form-group">
                            <label for="no_tlpa">Nomer HP :</label>
                            <input type="text" name="no_tlpa" id="no_tlpa" class="form-control" placeholder="Nomer Handphone">
                            <div class="text-danger" id="no_tlpa_invalid"></div>
                        </div>
                        <div class="form-group">
                            <label for="jurusana">Jurusan :</label>
                            <input type="text" name="jurusana" id="jurusana" class="form-control" placeholder="Jurusan">
                            <div class="text-danger" id="jurusana_invalid"></div>
                        </div>
                        <button type="submit" name="peserta" class="btn bg-2 text-light border-0 pr-4 pl-4 pt-2 pb-2">Daftar</button>
                        <button type="reset" class="btn bg-2 text-light border-0 pr-4 pl-4 pt-2 pb-2">Reset</button>
                    </form>
                </div>
            </div>
        </div>
    
    <script src="../js/jquery-3.3.1.js"></script>
    <script src="../js/popper.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script type="text/javascript">
        var no_ktpa = document.forms["peserta"]["no_ktpa"];
        var namaa = document.forms["peserta"]["namaa"];
        var tempat_lahira = document.forms["peserta"]["tempat_lahira"];
        var tanggal_lahira = document.forms["peserta"]["tanggal_lahira"];
        var kelamina = document.forms["peserta"]["kelamina"];
        var alamata = document.forms["peserta"]["alamata"];
        var emaila = document.forms["peserta"]["emaila"];
        var no_tlpa = document.forms["peserta"]["no_tlpa"];
        var jurusana = document.forms["peserta"]["jurusana"];

        //display
        var no_ktpa_invalid = document.getElementById("no_ktpa_invalid");
        var namaa_invalid = document.getElementById("namaa_invalid");
        var tempat_lahira_invalid = document.getElementById("tempat_lahira_invalid");
        var tanggal_lahira_invalid = document.getElementById("tanggal_lahira_invalid");
        var kelamina_invalid = document.getElementById("kelamina_invalid");
        var alamata_invalid = document.getElementById("alamata_invalid");
        var emaila_invalid = document.getElementById("emaila_invalid");
        var no_tlpa_invalid = document.getElementById("no_tlpa_invalid");
        var jurusana_invalid = document.getElementById("jurusana_invalid");
       
        //listen
        no_ktpa.addEventListener('blur', no_ktpavalid, true);
        namaa.addEventListener('blur', namaavalid, true);
        tempat_lahira.addEventListener('blur', tempat_lahiravalid, true);
        tanggal_lahira.addEventListener('blur', tanggal_lahiravalid, true);
        kelamina.addEventListener('blur', kelaminavalid, true);
        alamata.addEventListener('blur', alamatavalid, true);
        emaila.addEventListener('blur', emailavalid, true);
        no_tlpa.addEventListener('blur', no_tlpavalid, true);
        jurusana.addEventListener('blur', jurusanavalid, true);


        function validasi(){
            //password
            if(no_ktpa.value==""){
                no_ktpa_invalid.textContent = "Masukan Nomer KTP!";
                no_ktpa.focus();
                return false;
            }else if(isNaN(no_ktpa.value)){
                no_ktpa_invalid.textContent = "Nomer KTP harus angka !";
                no_ktpa.focus();
                return false;
            
            }
            //nama
            if(namaa.value==""){
                namaa_invalid.textContent = "Masukan Nama Anggota!";
                namaa.focus();
                return false;
            }

            if(tempat_lahira.value==""){
                tempat_lahira_invalid.textContent = "Masukan Tempat Lahir Anda!";
                tempat_lahira.focus();
                return false;
            }


            if(tanggal_lahira.value==""){
                tanggal_lahira_invalid.textContent = "Masukan Tanggal Lahir Anda!";
                tanggal_lahira.focus();
                return false;
            }
            //kelamin
            if(kelamina.value==""){
                kelamina_invalid.textContent = "Masukan Jenis Kelamin Anda!";
                kelamina.focus();
                return false;
            }

            //ghj
            if(alamata.value==""){
                alamata_invalid.textContent = "Masukan Alamat Anda!";
                alamata.focus();
                return false;
            }
            //email
            if(emaila.value==""){
                emaila_invalid.textContent = "Masukan Alamat Email Anda!";
                emaila.focus();
                return false;
            }
            //no HP
            if(no_tlpa.value==""){
                no_tlpa_invalid.textContent = "Masukan Nomer Handphone Anda!";
                no_tlpa.focus();
                return false;
            }else if(isNaN(no_tlpa.value)){
                no_tlpa_invalid.textContent = "Jumlah peserta harus angka !";
                no_tlpa.focus();
                return false;
            }else if(no_tlpa.value.length < 11 ){
                no_tlpa_invalid.textContent = "Masukan No Hp Minimal 11 Angka!";
                no_tlpa.focus();
                return false;
            }

            if(jurusana.value==""){
                jurusana_invalid.textContent = "Masukan Jurusan Anda!";
                jurusana.focus();
                return false;
            }

        }


        
        function no_ktpavalid(){
            if(!no_ktpa.value==""){
                no_ktpa_invalid.textContent = "";
                return true;
            }
        }

        function namaavalid(){
            if(!namaa.value==""){
                namaa_invalid.textContent = "";
                return true;
            }
        }
        function tempat_lahiravalid(){
            if(!tempat_lahira.value==""){
                tempat_lahira_invalid.textContent = "";
                return true;
            }
        }
        function tanggal_lahiravalid(){
            if(!tempat_lahira.value==""){
                tanggal_lahira_invalid.textContent = "";
                return true;
            }
        }
        function kelaminavalid(){
            if(!kelamina.value==""){
                kelamina_invalid.textContent = "";
                return true;
            }
        }
        function alamatavalid(){
            if(!alamata.value==""){
                alamata_invalid.textContent = "";
                return true;
            }
        }
        function emailavalid(){
            if(!emaila.value==""){
                emaila_invalid.textContent = "";
                return true;
            }
        }
        function no_tlpavalid(){
            if(!no_tlpa.value==""){
                no_tlpa_invalid.textContent = "";
                return true;
            }
        }
        function jurusanavalid(){
            if(!jurusana.value==""){
                jurusana_invalid.textContent = "";
                return true;
            }
        }
    </script>
</body>
</html>