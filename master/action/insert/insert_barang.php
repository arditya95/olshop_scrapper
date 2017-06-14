<?php
include_once '../../../setting/koneksi.php';
if (isset($_POST['submit'])) {
  $nama = $_POST['nama'];
  $kategori = $_POST['kategori'];
  $link = $_POST['link'];
  $toko = $_POST['toko'];
  $harga = $_POST['harga'];
  // $deskripsi = $_POST['deskripsi'];
  $sql_barang="INSERT INTO tb_barang (nama_barang, id_kategori) VALUES ('$nama','$kategori');";
  mysqli_query($con,$sql_barang);
  $use_id_barang = mysqli_insert_id($con);
  $sql_det_barang="INSERT INTO tb_det_barang (id_barang, id_web, harga, link_barang) VALUES ('$use_id_barang','$toko','$harga','$link');";
  mysqli_query($con,$sql_det_barang);
}
header("Location: ../../../route.php?kode=1.php");
?>
