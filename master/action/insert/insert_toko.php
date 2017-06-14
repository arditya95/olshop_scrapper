<?php
include_once '../../../setting/koneksi.php';
if (isset($_POST['submit'])) {
  $nama = $_POST['nama'];
  $link = $_POST['link'];
  // $deskripsi = $_POST['deskripsi'];
  $sql="INSERT INTO tb_web (nama_web, link_toko) VALUES ('$nama','$link');";
  echo $sql;
  mysqli_query($con,$sql);
}
header("Location: ../../../route.php?kode=2.php");
?>
