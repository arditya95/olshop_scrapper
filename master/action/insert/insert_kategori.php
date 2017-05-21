<?php
include_once '../../../setting/koneksi.php';
if (isset($_POST['submit'])) {
  $nama = $_POST['nama'];
  // $deskripsi = $_POST['deskripsi'];
  $sql="INSERT INTO tb_kategori (kategori) VALUES ('$nama');";
  echo $sql;
  mysqli_query($con,$sql);
}
header("Location: ../../../master.php?kode=3.php");
?>
