<?php
include_once("../../../setting/koneksi.php");
if (isset($_POST['submit'])) {
  $nama = $_POST['nama'];
  $kategori = $_POST['kategori'];
  $link = $_POST['link'];
  $toko = $_POST['toko'];
  $harga = $_POST['harga'];
  $id_barang = $_POST['id_barang'];
  $id_det_barang = $_POST['id_det_barang'];
  //$deskripsi = $_POST['deskripsi'];
  $sql_barang="UPDATE tb_barang SET nama_barang = '$nama', id_kategori = '$kategori' WHERE id_barang = '$id_barang';";
  mysqli_query($con,$sql_barang);
  // echo $sql_barang;
  $sql_det_barang="UPDATE tb_det_barang SET id_barang = '$id_barang', id_web = '$toko' , harga = '$harga' , link_barang = '$link' WHERE id_det_barang = '$id_det_barang';";
  mysqli_query($con,$sql_det_barang);
  // echo $sql_det_barang;
  header("Location: ../../../route.php?kode=1.php");
}
?>
