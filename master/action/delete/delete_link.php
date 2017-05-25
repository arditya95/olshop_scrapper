<?php
		include_once '../../../setting/koneksi.php';
    $query=("DELETE FROM tb_link WHERE id_link='$_GET[id]'");
    $hasil = mysqli_query($con,$query);
		header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
