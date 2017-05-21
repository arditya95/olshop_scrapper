<?php
session_start();
if(!isset($_SESSION['username'])) {
   header('location:login.php');
} else {
   $username = $_SESSION['username'];
   $id_user = $_SESSION['id_user'];
}
?>

<title>Halaman Sukses Login</title>
<div align='center'>
   Selamat Datang, <b><?php echo $username;?></b> <?php echo "<a href=update.php?id=$id_user><b>Update</b></a>"; ?> <a href="logout.php"><b>Logout</b></a>
</div>
