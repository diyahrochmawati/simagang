<?php 
include "../pegawai/connect.php";
require_once '../pegawai/connect.php';
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['usernamepimpinan'])) {
    header('location:../pegawai/login.php');
} else {
    $username=$_SESSION['usernamepimpinan'];
    $posisipimpinan=$_SESSION['posisipimpinan'];     
}
$id_daftar=$_GET['user'];
?>

<div class="modal-body">
    <form action="prosesverifikasilaporan.php" method="post" class="form-group" id="formverifikasi" name="verifikasi" >
        <label for="">ID Pendaftaran</label>
        <input type="text" class="form-control" name="id_daftar" value="<?= $id_daftar; ?>" readonly>
        <label for="">Status</label>
        <select class="custom-select" name="status" id="">
            <option disabled="yes" selected>Select one</option>
            <option value="Menunggu Nilai">Laporan Diterima</option>
            <option value="Silahkan Revisi Laporan">Silahkan Revisi Laporan</option> 
        </select>
        <label for="">Keterangan Revisi</label><br/>
        <textarea name="ket_revisi" rows="5" cols="40" class="form-control"></textarea>
    </form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" form="formverifikasi" name="verifikasi" class="btn bg-info text-light">Verifikasi</button>
</div>

