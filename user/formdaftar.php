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

$cekuser = mysqli_query($connection, "SELECT * FROM pendaftaran WHERE username = '$username'");
$hasil = mysqli_fetch_array($cekuser);

if(isset($_POST["pendaftaran"])) {
$target_dir = "dokumen/proposal/";
$temp = explode(".", $_FILES["fileToUpload"]["name"]);//untuk mengambil nama file gambarnya saja tanpa format gambarnya
$hasil = mysqli_fetch_array($status);
$nama_baru=round(microtime(true)) . '.' . end($temp);
$target_file = $target_dir . $nama_baru;
$uploadOk = 1;
$imageFileType = strtolower (end($temp));
// Check if image file is a actual image or fake image
// Check file size
$ukuran=$_FILES["fileToUpload"]["size"];
if ($ukuran >= 2000000) {
    echo "<div class='alert alert-danger position-relative'style='top:10px'>besar!</div>";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "pdf") {
    echo "<div class='alert alert-danger position-relative'style='top:10px'>Format file harus .PDF !</div>";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
        echo "<div class='alert alert-danger position-relative'style='top:10px'>Maaf proposal anda tidak ter upload. <strong>Lakukan Registrasi ULANG</strong> </div>";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $nama_file=($_FILES["fileToUpload"]["name"]);
        echo "<div class='alert alert-success position-relative' style='top: 20px'>Upload File Proposal Sukses!</div>";
        mysqli_query($connection,"insert into pendaftaran (proposal,username) VALUES ('$nama_baru','$username')");
                        if(isset($_POST["pendaftaran"])) {
                        $target_dir = "dokumen/ktp/";
                        $temp = explode(".", $_FILES["kartu_identitas"]["name"]);//untuk mengambil nama file gambarnya saja tanpa format gambarnya
                        $hasil = mysqli_fetch_array($status);
                        $nama_baru=round(microtime(true)) . '.' . end($temp);
                        $target_file = $target_dir . $nama_baru;
                        $uploadOk = 1;
                        $imageFileType = strtolower (end($temp));
                        // Check if image file is a actual image or fake image
                        if (file_exists($target_file)) {
                           echo "<div class='alert alert-danger position-relative'style='top:10px'>File sudah ada !! Rename dokumen anda (Namaketua_instansi.jpg)!</div>";
                            $uploadOk = 0;
                        }
                        // Check file size
                        if ($_FILES["kartu_identitas"]["size"] > 2000000) {
                           echo "<script>alert('Upload ulang ktp ! Ukuran file terlalu besar Max 2mb'); window.location='index.php?page=daftar';</script>";
                            $uploadOk = 0;
                        }
                        // Allow certain file formats
                        if($imageFileType != "jpg") {
                            echo "<script>alert('Upload ulang ktp ! Format file salah. Harus .jpg'); window.location='index.php?page=daftar';</script>";
                            $uploadOk = 0;
                        }
                        // Check if $uploadOk is set to 0 by an error
                        if ($uploadOk == 0) {
                                echo "<div class='alert alert-danger position-relative'style='top:10px'>Maaf file anda tidak ter upload. </div>";
                        // if everything is ok, try to upload file
                        } else {
                            if (move_uploaded_file($_FILES["kartu_identitas"]["tmp_name"], $target_file)) {
                                $nama_file=($_FILES["kartu_identitas"]["name"]);
                                //echo "<div class='alert alert-success position-relative' style='top: 20px'>Upload File Kartu identitas Sukses! <strong>Silahkan isi form data diri</strong></div>";
                                //echo " Kartu Identitas anda ". basename( $_FILES["kartu_identitas"]["name"]). " sudah terUpload";
                                echo "<script>alert('Registrasi Berhasil, Lanjut STEP 2 !'); window.location='prosesketua.php';</script>";
                                mysqli_query($connection,"update pendaftaran set kartu_identitas='$nama_baru' where username='$username'");
                                
                            } else {
                                    echo "<div class='alert alert-danger position-relative'style='top:10px'>Maaf, Tidak terupload</div>";
                                    echo "<script>alert('Upload ulang ktp ! File terlalu besar'); window.location='index.php?page=daftar';</script>";
                            }
                        }
                        }
    } else {
            echo "<div class='alert alert-danger position-relative'style='top:10px'>Maaf, Tidak terupload</div>";
    }
}
}



if(isset($_POST["upload"])) {
$target_dir = "dokumen/ktp/";
$temp = explode(".", $_FILES["kartu_identitas"]["name"]);//untuk mengambil nama file gambarnya saja tanpa format gambarnya
$hasil = mysqli_fetch_array($status);
$nama_baru=round(microtime(true)) . '.' . end($temp);
$target_file = $target_dir . $nama_baru;
$uploadOk = 1;
$imageFileType = strtolower (end($temp));
// Check if image file is a actual image or fake image
if (file_exists($target_file)) {
   echo "<div class='alert alert-danger position-relative'style='top:10px'>File sudah ada !! Rename dokumen anda (Namaketua_instansi.jpg)!</div>";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["kartu_identitas"]["size"] > 2000000) {
    echo "<div class='alert alert-danger position-relative'style='top:10px'>File terlalu besar maksimal 2MB !</div>";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg") {
    echo "<div class='alert alert-danger position-relative'style='top:10px'>Format file harus .JPG !</div>";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
        echo "<div class='alert alert-danger position-relative'style='top:10px'>Maaf file anda tidak ter upload. </div>";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["kartu_identitas"]["tmp_name"], $target_file)) {
        $nama_file=($_FILES["kartu_identitas"]["name"]);
        echo "<script>alert('Registrasi Berhasil, Lanjut STEP 2 !'); window.location='prosesketua.php';</script>";
        mysqli_query($connection,"update pendaftaran set kartu_identitas='$nama_baru' where username='$username'");
    } else {
            echo "<div class='alert alert-danger position-relative'style='top:10px'>Maaf, Tidak terupload</div>";
    }
}
}


$reg="";
if (isset($_POST['pendaftaran'])) {
    if (registrasi($_POST)) {
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
    <div <div class="col-5 border-left border-right" style="margin-top: 80px; margin-left: 250px;">
    <div style="margin-top: 0px;" >

            <div>
                    <h4 class="text-drak text-center roboto-font font-weight-bold mb-4 badge-light p-2 rounded bg-2 ">Form Data Diri Ketua</h4>
            </div>
                <div>
                    <form method="POST" action="" enctype="multipart/form-data" onsubmit="return validasi()" name="pendaftaran">
                    <?php if ($hasil['proposal']=='' && $hasil['kartu_identitas']==null) { ?>
                        <div class="form-group">
                            <label for="">Upload Proposal (.pdf): </label>
                            <input required="yes" type="file" name="fileToUpload" id="fileToUpload" class="form-control" />
                        </div>
                        
                        <div class="form-group">
                            <label for="">Kartu Identitas (.jpg): </label>
                            <input required="yes" type="file" name="kartu_identitas" id="kartu_identitas" class="form-control" />
                        </div>
                        
                        <div class="form-group">
                            <label for="jml_peserta">Jumlah Peserta :</label>
                            <input type="text" id="jml_peserta" name="jml_peserta" class="form-control" placeholder="Jumlah Peserta">
                            <div class="text-danger" id="jml_peserta_invalid"></div>
                        </div>
                        <div class="form-group">
                            <label for="no_ktp">No KTP/NIM/NIS :</label>
                            <input type="text" id="no_ktp" name="no_ktp" class="form-control" placeholder="No KTP/NIM/NIS">
                            <div class="text-danger" id="no_ktp_invalid"></div>
                        </div>
                        <div class="form-group">
                            <label for="nama_ketua">Nama Ketua :</label>
                            <input type="text" id="nama_ketua" name="nama_ketua" class="form-control" placeholder="Nama Ketua">
                            <div class="text-danger" id="nama_ketua_invalid"></div>
                        </div>
                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir :</label>
                            <input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir">
                            <div class="text-danger" id="tempat_lahir_invalid"></div>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir :</label>
                            <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control" placeholder="Tanggal Lahir">
                            <div class="text-danger" id="tanggal_lahir_invalid"></div>
                        </div>
                        <div class="form-group">
                        <label for="Kelamin">Jenis Kelamin :</label><br/>
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
                            <label for="alamat">Alamat :</label>
                            <textarea name="alamat" rows="5" cols="40" class="form-control"></textarea>
                            <div class="text-danger" id="alamat_invalid"></div>
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail :</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                            <div class="text-danger" id="email_invalid"></div>
                        </div>
                        <div class="form-group">
                            <label for="no_tlp">Nomer HP :</label>
                            <input type="text" name="no_tlp" id="no_tlp" class="form-control" placeholder="Nomer Handphone">
                            <div class="text-danger" id="no_tlp_invalid"></div>
                        </div>
                        <label for="Jenjang">Jenjang :</label><br/>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input checked="yes" type="radio" name="jenjang" id="JenjangS" class="custom-control-input" value="SMK Sederajat">
                                <label for="JenjangS" class="custom-control-label">SMK Sederajat</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="jenjang" id="JenjangU" class="custom-control-input" value="Universitas Sederajat">
                                <label for="JenjangU" class="custom-control-label">Universitas Sederajat</label>
                            </div>
                            <div class="text-danger" id="jenjang_invalid"></div>
                        <div class="form-group">
                            <label for="instansi">Sekolah/Universitas :</label>
                            <input type="text" name="instansi" id="instansi" class="form-control" placeholder="Sekolah/Universitas">
                            <div class="text-danger" id="instansi_invalid"></div>
                        </div>
                        <div class="form-group">
                            <label for="jurusan">Jurusan :</label>
                            <input type="text" name="jurusan" id="jurusan" class="form-control" placeholder="Jurusan">
                            <div class="text-danger" id="jurusan_invalid"></div>
                        </div>
                        <div class="form-group">
                            <label for="tgl_masuk">Tanggal Masuk :</label>
                            <input type="date" name="tgl_masuk" id="tgl_masuk" class="form-control" placeholder="Tanggal Masuk">
                            <div class="text-danger" id="tgl_masuk_invalid"></div>
                        </div>
                        <div class="form-group">
                            <label for="tgl_selesai">Tanggal Selesai :</label>
                            <input type="date" name="tgl_selesai" id="tgl_selesai" class="form-control" placeholder="Tanggal Selesai">
                            <div class="text-danger" id="tgl_selesai_invalid"></div>
                        </div>
                        <button type="submit" name="pendaftaran" class="btn bg-2 text-light border-0 pr-4 pl-4 pt-2 pb-2">Daftar</button>
                        <button type="reset" class="btn bg-2 text-light border-0 pr-4 pl-4 pt-2 pb-2">Reset</button>
                        <?php } else if ($hasil['kartu_identitas']==''){ ?>
                        <div class="form-group">
                            <label for="" class="text-danger"><b>Upload Ulang File Anda, Lihat Kembali Format/Ukuran File Anda!</b></label></br>
                            <label for="">Kartu Identitas (.jpg): </label>
                            <input required="yes" type="file" name="kartu_identitas" id="kartu_identitas" class="form-control" />
                        </div>
                        <button type="submit" name="upload" class="btn bg-2 text-light border-0 pr-4 pl-4 pt-2 pb-2">Upload</button>
                        <button type="reset" class="btn bg-2 text-light border-0 pr-4 pl-4 pt-2 pb-2">Reset</button>
                        <?php } ?>
                       
                    </form>
                </div>
            </div>
        </div>
    
    <script src="../js/jquery-3.3.1.js"></script>
    <script src="../js/popper.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script type="text/javascript">
        var jml_peserta = document.forms["pendaftaran"]["jml_peserta"];
        var no_ktp = document.forms["pendaftaran"]["no_ktp"];
        var nama_ketua = document.forms["pendaftaran"]["nama_ketua"];
        var tempat_lahir = document.forms["pendaftaran"]["tempat_lahir"];
        var tanggal_lahir = document.forms["pendaftaran"]["tanggal_lahir"];
        var kelamin = document.forms["pendaftaran"]["kelamin"];
        var alamat = document.forms["pendaftaran"]["alamat"];
        var email = document.forms["pendaftaran"]["email"];
        var no_tlp = document.forms["pendaftaran"]["no_tlp"];
        var jenjang = document.forms["pendaftaran"]["jenjang"];
        var instansi = document.forms["pendaftaran"]["instansi"];
        var jurusan = document.forms["pendaftaran"]["jurusan"];
        var tgl_masuk = document.forms["pendaftaran"]["tgl_masuk"];
        var tgl_selesai= document.forms["pendaftaran"]["tgl_selesai"];

        //display
        var jml_peserta_invalid = document.getElementById("jml_peserta_invalid");
        var no_ktp_invalid = document.getElementById("no_ktp_invalid");
        var nama_ketua_invalid = document.getElementById("nama_ketua_invalid");
        var tempat_lahir_invalid = document.getElementById("tempat_lahir_invalid");
        var tanggal_lahir_invalid = document.getElementById("tanggal_lahir_invalid");
        var kelamin_invalid = document.getElementById("kelamin_invalid");
        var alamat_invalid = document.getElementById("alamat_invalid");
        var email_invalid = document.getElementById("email_invalid");
        var no_tlp_invalid = document.getElementById("no_tlp_invalid");
        var jenjang_invalid = document.getElementById("jenjang_invalid");
        var instansi_invalid = document.getElementById("instansi_invalid");
        var jurusan_invalid = document.getElementById("jurusan_invalid");
        var tgl_masuk_invalid = document.getElementById("tgl_masuk_invalid");
        var tgl_selesai_invalid = document.getElementById("tgl_selesai_invalid");
       
        //listen
        jml_peserta.addEventListener('blur', jml_pesertavalid, true);
        no_ktp.addEventListener('blur', no_ktpvalid, true);
        nama_ketua.addEventListener('blur', nama_ketuavalid, true);
        tempat_lahir.addEventListener('blur', tempat_lahirvalid, true);
        tanggal_lahir.addEventListener('blur', tanggal_lahirvalid, true);
        kelamin.addEventListener('blur', kelaminvalid, true);
        alamat.addEventListener('blur', alamatvalid, true);
        email.addEventListener('blur', emailvalid, true);
        no_tlp.addEventListener('blur', no_tlpvalid, true);
        jenjang.addEventListener('blur', jenjangvalid, true);
        instansi.addEventListener('blur', instansivalid, true);
        jurusan.addEventListener('blur', jurusanvalid, true);
        tgl_masuk.addEventListener('blur', tgl_masukvalid, true);
        tgl_selesai.addEventListener('blur', tgl_selesaivalid, true);


        function validasi(){
            //username
            if(jml_peserta.value==""){
                jml_peserta_invalid.textContent = "Masukan Jumlah Peserta!";
                jml_peserta.focus();
                return false;
            }else if(isNaN(jml_peserta.value)){
                jml_peserta_invalid.textContent = "Jumlah peserta harus angka !";
                jml_peserta.focus();
                return false;
            }

            //password
            if(no_ktp.value==""){
                no_ktp_invalid.textContent = "Masukan Nomer KTP/NIM/NIS!";
                no_ktp.focus();
                return false;
            }else if(isNaN(no_ktp.value)){
                no_ktp_invalid.textContent = "Nomor Identitas harus angka !";
                no_ktp.focus();
                return false;
            }

            //nama
            if(nama_ketua.value==""){
                nama_ketua_invalid.textContent = "Masukan Nama Ketua!";
                nama_ketua.focus();
                return false;
            }

            if(tempat_lahir.value==""){
                tempat_lahir_invalid.textContent = "Masukan Tempat Lahir Anda!";
                tempat_lahir.focus();
                return false;
            }

            if(tanggal_lahir.value==""){
                tanggal_lahir_invalid.textContent = "Masukan Tanggal Lahir Anda!";
                tanggal_lahir.focus();
                return false;
            }
            //kelamin
            if(kelamin.value==""){
                kelamin_invalid.textContent = "Masukan Jenis Kelamin Anda!";
                kelamin.focus();
                return false;
            }

            //ghj
            if(alamat.value==""){
                alamat_invalid.textContent = "Masukan Alamat Anda!";
                alamat.focus();
                return false;
            }
            //email
            if(email.value==""){
                email_invalid.textContent = "Masukan Alamat Email Anda!";
                email.focus();
                return false;
            }
            //no HP
            if(no_tlp.value==""){
                no_tlp_invalid.textContent = "Masukan Nomer Handphone Anda!";
                no_tlp.focus();
                return false;
            }else if(isNaN(no_tlp.value)){
                no_tlp_invalid.textContent = "No HP harus angka !";
                no_tlp.focus();
                return false;
            }else if(no_tlp.value.length < 11 ){
                no_tlp_invalid.textContent = "Masukan No Hp Minimal 11 Angka!";
                no_tlp.focus();
                return false;
            }
            //alamat
            if(jenjang.value==""){
                jenjang_invalid.textContent = "Pilih lah Jenjang Anda!";
                jenjang.focus();
                return false;
            }
            //fghj
            if(instansi.value==""){
                instansi_invalid.textContent = "Masukan Instansi Anda!";
                instansi.focus();
                return false;
            }

            if(jurusan.value==""){
                jurusan_invalid.textContent = "Masukan Jurusan Anda!";
                jurusan.focus();
                return false;
            }

            if(tgl_masuk.value==""){
                tgl_masuk_invalid.textContent = "Masukan Tanggal Masuk Anda!";
                tgl_masuk.focus();
                return false;
            }

            if(tgl_selesai.value==""){
                tgl_selesai_invalid.textContent = "Masukan Tanggal Selesai Anda!";
                tgl_selesai.focus();
                return false;
            }
        }


        function jml_pesertavalid(){
            if(!jml_peserta.value==""){
                jml_peserta_invalid.textContent = "";
                return true;
            }
        }
        
        function no_ktpvalid(){
            if(!no_ktp.value==""){
                no_ktp_invalid.textContent = "";
                return true;
            }
        }

        function nama_ketuavalid(){
            if(!nama_ketua.value==""){
                nama_ketua_invalid.textContent = "";
                return true;
            }
        }
        function tempat_lahirvalid(){
            if(!tempat_lahir.value==""){
                tempat_lahir_invalid.textContent = "";
                return true;
            }
        }
        function tanggal_lahirvalid(){
            if(!tempat_lahir.value==""){
                tanggal_lahir_invalid.textContent = "";
                return true;
            }
        }
        function kelaminvalid(){
            if(!kelamin.value==""){
                kelamin_invalid.textContent = "";
                return true;
            }
        }
        function alamatvalid(){
            if(!alamat.value==""){
                alamat_invalid.textContent = "";
                return true;
            }
        }
        function emailvalid(){
            if(!email.value==""){
                email_invalid.textContent = "";
                return true;
            }
        }
        function no_tlpvalid(){
            if(!no_tlp.value==""){
                no_tlp_invalid.textContent = "";
                return true;
            }
        }
        function jenjangvalid(){
            if(!jenjang.value==""){
                jenjang_invalid.textContent = "";
                return true;
            }
        }
        function instansivalid(){
            if(!instansi.value==""){
                instansi_invalid.textContent = "";
                return true;
            }
        }
        function jurusanvalid(){
            if(!jurusan.value==""){
                jurusan_invalid.textContent = "";
                return true;
            }
        }
        function tgl_masukvalid(){
            if(!tgl_masuk.value==""){
                tgl_masuk_invalid.textContent = "";
                return true;
            }
        }
        function tgl_selesaivalid(){
            if(!tgl_selesai.value==""){
                tgl_selesai_invalid.textContent = "";
                return true;
            }
        }
    </script>
</body>
</html>