<?php
   session_start();
  //  if(isset($_SESSION['username'])) {
  //  header('location:index.php'); }
   require_once("../../setting/koneksi.php");
   $sql=("SELECT * FROM tb_user WHERE id_user = '$_GET[id]'");
   $result = mysqli_query($con,$sql);
   $baris=mysqli_fetch_array($result);
?>

<title>Form Update Password</title>
<div align='center'>
  <form action="prosesupdate.php" method="post">
  <h1>Update Password</h1>
  <table>
  <tbody>
  <input type="hidden" class="form-control" name="id" value="<?php echo $baris['id_user'];?>">
  <tr><td>Username</td><td> : <input name="username" type="text" value="<?php echo $baris['username'];?>" readonly></td></tr>
  <tr><td>Password</td><td> : <input name="password" type="password"></td></tr>
  <tr><td colspan="2" align="right"><input value="Save" type="submit"> <input value="Batal" type="reset"></td></tr>
  <tr><td colspan="2" align="center">Belum Punya akun ? <a href="daftar.php"><b>Daftar</b></a></td></tr>
  </tbody>
  </table>
  </form>
</div>
