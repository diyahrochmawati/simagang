<?php 
include "../pegawai/connect.php";
require_once '../pegawai/connect.php';
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['usernamestaff'])) {
    header('location:../pegawai/login.php');
} else {
    $username=$_SESSION['usernamestaff'];    
}
$id_daftar=$_GET['user'];
?>
<div class="modal-body">
    <form action="proses_confirm.php" method="post" class="form-group" id="formkonfirmasi">
        <label for=""><b>ID Pendaftaran</b></label>
        <input type="text" class="form-control" name="id_daftar" value="<?= $id_daftar; ?>" readonly>
        <label for=""><b>Status</b></label>
        <select class="custom-select" name="status" id="">
            <option disabled selected>Select one</option>
            <option value="Menunggu Konfirm KABAG SDM">Konfirmasi</option>
            <option value="Ditolak">Ditolak</option>
        </select>
        <label for=""><b>Posisi</b></label><br/>
        <select class="custom-select" name="posisi" id="">
            <option disabled="yes" selected>Select one</option>
            <option value="Tidak Diterima"><strong>TIDAK DITERIMA</strong></option>
            <optgroup label="Akuntansi & Keu">
                <option value="AK. APK"> - APK</option>
                <option value="Ak. ATR"> - ATR</option>
                <option value="AK. Akuntansi"> - Akuntansi</option>
                <option value="AK. EDP"> - EDP</option>
                <option value="AK. Gudang ATK"> - Gudang ATK</option>
                <option value="AK. Gudang Gula KB I"> - Gudang Gula KB I </option>
                <option value="AK. Gudang Gula KB II"> - Gudang Gula KB II </option>
                <option value="AK. Gudang Material"> - Gudang Material</option>
                <option value="AK. Keuangan"> - Keuangan</option>
                <option value="AK. Timbangan"> - Timbangan</option>
                <option value="AK. PUKK"> - PUKK</option>
            <optgroup label="SDM & Umum">
                <option value="SU. SDM"> - SDM</option>
                <option value="SU. Umum"> - Umum</option>
                <option value="SU. Poliklinik"> - Poliklinik</option>
                <option value="SU. Pembelian"> - Pembelian</option>
                <option value="SU. Kendaraan"> - Kendaraan</option>
                <option value="SU. Keamanan"> - Keamanan</option>
                <option value="SU. K3 Lingkungan"> - K3 Lingkungan</option>
                <option value="SU. ISO"> - ISO</option>
                <option value="SU. Bangunan Sipil"> - Bangunan Sipil</option>
            <optgroup label="Quality Control">
                <option value="QC. On Farm"> - On Farm</option>
                <option value="QC. Off Farm"> - Off Farm</option>
                <option value="QC. Instrumen"> - Instrumen</option>
                <option value="QC. Instrumen KB I"> - Instrumen KB I</option>
                <option value="QC. Instrumen KB II"> - Instrumen KB II</option>
                <option value="QC. Sari Tebu"> - Sari Tebu</option>
            <optgroup label="Pabrikasi KB I">
                <option value="P1. Pabrikasi KB I"> - Pabrikasi KB I</option>
                <option value="P1. P.Tengah KB I"> - P.Tengah KB I</option>
                <option value="P1. Puteran KB I"> - Puteran KB I</option>
             <optgroup label="Instalasi KB I">
                <option value="I1. Kantor Instalasi KB I"> - Kantor Instalasi KB I</option>
                <option value="I1. Gilingan KB I"> - Gilingan KB I</option>
                <option value="I1. Ketel KB I"> - Ketel KB I</option>
                <option value="I1. Besali KB I"> - Besali KB I</option>
                <option value="I1. Listrik KB I"> - Listrik KB I</option>
            <optgroup label="Pabrikasi KB II">
                <option value="P2. Pabrikasi KB II"> - Pabrikasi KB I</option>
                <option value="P2. Tengah KB II"> - P.Tengah KB I</option>
                <option value="P2. Puteran KB II"> - Puteran KB I</option>
            <optgroup label="Instalasi KB II">
                <option value="I2. TU Tanaman"> - TU Tanaman</option>
                <option value="I2. PLPG"> -PLPG</option>
                <option value="I2. BST Gondanglegi"> - BST Gondanglegi</option>
                <option value="I2. Mekanisasi"> - Mekanisasi</option>
                <option value="I2. Tebang Angkut"> - Tebang Angkut</option>
            <optgroup label="Tanaman">
                <option value=""> - Kantor Instalasi KB I</option>
                <option value="TN. Gilingan KB I"> - Gilingan KB I</option>
                <option value="TN. Ketel KB I"> - Ketel KB I</option>
                <option value="TN. Besali KB I"> - Besali KB I</option>
                <option value="TN. Listrik KB I"> - Listrik KB I</option>
        </select>
    </form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" form="formkonfirmasi" name="konfirmasi" class="btn bg-info text-light">Konfirmasi</button>
</div>