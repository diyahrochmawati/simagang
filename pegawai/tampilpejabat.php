 <?php
//ambil data
require_once("connect.php");
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['usernameadmin'])) {
    header('location:login.php');
} else {
    $username=$_SESSION['usernameadmin'];    
}
$result= mysqli_query ($connection,"SELECT * from akun_pejabat ")
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width-device-width, initial-scale=1, shrink-to-">
    <title>.: SIMAGANG :.</title>
    <link rel="stylesheet" href="../fontawesome/css/all.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/simple-sidebar.css">
    <script src="../js/jquery-3.3.1.js"></script>
    <script src="../js/script.js"></script>
    <script src="../js/Chart.bundle.min.js"></script>
    
    <style type="text/css">

    #produk:hover {
            transform: scale(1.1);
            transition-property: transform;
            transition-duration: .5s;
        }
  .judul{
            margin-left: 10px;
            text-align: center;
            font-family: Gill Sans MT Condensed;
            font-size: 40px;
            font-weight: bold;
        }

  </style>
  <script type="text/javascript">
function hapus(username){
    var jawab=confirm("Anda yakin menghapus "+username+" ?");
    if(jawab==true){
        document.location="proses_hapus.php?username="+username;
    }
}
</script>
</head>
<body>  
    <div class="col-13 offset 1">      
        <h3 class="text-dark p-3 border-bottom mt-2"><i class="fas fa-user-tie fa-lg"></i> AKUN PEJABAT </h3>
    </div>
    <div>
        <h1 class="judul">Data Akun Terdaftar</h1>
    </div>
              <table class="table table-striped table-bordered text-center">
                <thead class="thead-dark">
                  <tr>
                    <th>Email
                    <th>Jabatan
                    <th>Posisi
                    <th>Hapus</th>                    
                  </tr>
                </thead>
                                    
                  <?php
                    while($row=mysqli_fetch_array($result)){
                  ?>
                <tbody style="text-align: left;">
                  <tr>
                    <td><?php echo $row['usernamepejabat']; ?></td>
                    <td><?php echo $row['jabatan']; ?></td>
                    <td><?php echo $row['posisi']; ?></td>
                    <td style="text-align: center;"><button class="btn badge-info" onclick="hapus(<?php echo"'$row[usernamepejabat]'";  ?>)">Hapus</button></td>
                  </tr>
                </tbody>
                  <?php                      
                    }
                    ?>
              </table></br>
               <a type="submit" href="?page=home" class="btn bg-2 text-light border-0 pr-4 pl-4 pt-2 pb-2">Kembali</a> 
</body>
</html> 
 

