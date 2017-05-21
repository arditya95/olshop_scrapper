<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <script src="https://use.fontawesome.com/2aef8f5aac.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <?php include '../../template/head.php'; ?>
  </head>
  <body>
    <div id="wrapper">
       <?php include '../../template/navbar.php'; ?>
       <div id="page-wrapper">
         <!-- START -->
  <?php
    require_once 'koneksi.php';
    if (isset($_GET['kode'])) {
      if ($_GET['kode']==1) {
        require_once 'barang.php';
      }
      elseif ($_GET['kode']==2) {
        require_once 'toko.php';
      }
      else {
        require_once 'pilih.php';
      }
    }
    else {
      require_once 'pilih.php';
    }
  ?>
    <!-- END -->
</div>
</div>
<?php include '../../template/script.php'; ?>
<?php include '../../template/footer.php'; ?>
  </body>
</html>
