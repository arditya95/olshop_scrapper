<?php
include_once("../../../setting/koneksi.php");
if (isset($_POST['submit'])) {
  $nama = $_POST['nama'];
  $link = $_POST['link'];
  $id = $_POST['id'];
  $sql="UPDATE tb_web SET nama_web = '$nama', link_toko = '$link' WHERE id_web = '$id';";
  // echo $sql;
  mysqli_query($con,$sql);
  header("Location: ../../../master.php?kode=2.php");
}
?>
