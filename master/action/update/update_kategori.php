<?php
include_once("../../../setting/koneksi.php");
if (isset($_POST['submit'])) {
  $nama = $_POST['nama'];
  $id = $_POST['id'];
  $sql="UPDATE tb_kategori SET kategori = '$nama' WHERE id_kategori = '$id';";
  // echo $sql;
  mysqli_query($con,$sql);
  header("Location: ../../../route.php?kode=3.php");
}
?>
