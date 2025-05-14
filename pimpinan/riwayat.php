<?php 
require_once("../pegawai/connect.php");
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['usernameadmin'])) {
    header('location:login.php');
} else {
    $username=$_SESSION['usernameadmin'];    
}
$user=$_GET["user"];
$cekuser = mysqli_query($connection, "SELECT * FROM pendaftaran WHERE username = '$user'");
$jumlah = mysqli_num_rows($cekuser);
$hasil = mysqli_fetch_array($cekuser);
$result = mysqli_query($connection, "SELECT * FROM riwayat_revisi WHERE id_daftar = '$user'");
?>

<div class="modal-body">
	<table class="table table-striped table-bordered text-center">
                <thead class="thead-dark">
                  <tr>
                    <th>Tanggal
                    <th>Oleh
                    <th>Keterangan
                    </th>                    
                  </tr>
                </thead>
                                    
                  <?php
                    while($row=mysqli_fetch_array($result)){
                  ?>
                <tbody style="text-align: left;">
                  <tr>
                    <td><?php echo $row['tanggal']; ?></td>
                    <td><?php echo $row['oleh']; ?></td>
                    <td><?php echo $row['ket']; ?></td>
                  </tr>
                </tbody>
                  <?php                      
                    }
                    ?>
              </table></br>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>