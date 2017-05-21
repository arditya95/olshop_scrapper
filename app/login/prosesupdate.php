<?php
   require_once("../../setting/koneksi.php");
   $username = $_POST['username'];
   $pass = md5($_POST['password']);
   $id = $_POST['id'];
   $sql = "SELECT * FROM tb_user WHERE username = '$username'";
   $query = $con->query($sql);
    if(!$username || !$pass) {
      echo "<div align='center'>Masih ada data yang kosong! <a href='daftar.php'>Back</a>";
    } else {
      $data = "UPDATE tb_user SET password = '$pass' WHERE id_user = '$id';";
      $simpan = $con->query($data);
      if($simpan) {
        echo "<div align='center'>Update Sukses, Silahkan ke <a href='index.php'>Halaman Utama</a></div>";
      } else {
        echo "<div align='center'>Proses Gagal!</div>";
      }
    }
?>
