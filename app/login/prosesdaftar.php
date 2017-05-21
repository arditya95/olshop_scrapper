<?php
   require_once("../../setting/koneksi.php");
   $username = $_POST['username'];
   $pass = $_POST['password'];
   $sql = "SELECT * FROM tb_user WHERE username = '$username'";
   $query = $con->query($sql);
   if($query->num_rows != 0) {
     echo "<div align='center'>Username Sudah Terdaftar! <a href='daftar.php'>Back</a></div>";
   } else {
     if(!$username || !$pass) {
       echo "<div align='center'>Masih ada data yang kosong! <a href='daftar.php'>Back</a>";
     } else {
       $data = "INSERT INTO tb_user VALUES (NULL, '$username','" .md5($pass). "', NULL)";
       $simpan = $con->query($data);
       if($simpan) {
         echo "<div align='center'>Pendaftaran Sukses, Silahkan <a href='login.php'>Login</a></div>";
       } else {
         echo "<div align='center'>Proses Gagal!</div>";
       }
     }
   }
?>
