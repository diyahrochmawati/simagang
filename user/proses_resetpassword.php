<?php
 include 'connect.php';
 $username = $_POST['username'];
  $cek = mysqli_query($connection, "SELECT username from user where username='$username'");
  //$cek = mysqli_query($connection, "SELECT username FROM user WHERE username='$username'");
  if (mysqli_num_rows($cek) == 1 ) 
          {
           $password   = $_POST['password'];
           $repassword = $_POST['repassword'];
               if($password != $repassword)
               {
                    ?>
                     <script>
                      alert("Inputan password tidak sama");
                      window.location.href = 'lupapassword.php';
                     </script>
                    <?php
               }else
               {
                    $pwd = password_hash($password,PASSWORD_DEFAULT);
                    //$pwd = password_hash($password);
                    $sql = mysqli_query($connection, "UPDATE user SET password = '$pwd' WHERE username = '$username' ");
                    if ($sql) 
                    {
                     ?>
                      <script>
                       alert("Password telah di perbarui");
                       window.location.href = 'login.php';
                      </script>
                     <?php
                    }else
                    {
                     ?>
                      <script>
                       alert("Password gagal diperbaharui");
                       window.location.href = 'lupapassword.php';
                      </script>
                     <?php
                    }
               }
  }else
  {
   ?>
    <script>
     alert("Pastikan password yang anda masukan benar!");
     window.location.href = 'lupapassword.php';
    </script>
   <?php
  }
  
?>