<?php if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['usernameadmin'])) {
    header('location:login.php');
} else {
    $username=$_SESSION['usernameadmin'];    
}
?>
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
        img{
            width: 300px;
        }
        
    </style>
</head>
<body>

    <?php
    $user=$_GET['act'];
?>
<h3 class="text-dark p-3 border-bottom mt-2"><i class="fas fa-file-archive fa-lg"></i> PROPOSAL</h3>
    <embed style="width: 100%; height: 700px;"  src="../user/dokumen/proposal/<?php echo $user;?>" type="application/pdf" width="100%" height="1180px"></embed>


   <!-- Bootstrap core JavaScript-->
  <script src="csstable/vendor/jquery/jquery.min.js"></script>
  <script src="csstable/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="csstable/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="csstable/vendor/datatables/jquery.dataTables.js"></script>
  <script src="csstable/vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="csstable/js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="csstable/js/demo/datatables-demo.js"></script>  
</center>
</body>
</html>