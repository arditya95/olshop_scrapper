<?php
include_once '../../../setting/koneksi.php';
if (isset($_POST['submit'])) {
  $link = $_POST['link'];
  // $deskripsi = $_POST['deskripsi'];
  $sql="INSERT INTO tb_link (link) VALUES ('$link');";
  echo $sql;
  mysqli_query($con,$sql);
}
header("Location: ../../../admin.php");
?>
