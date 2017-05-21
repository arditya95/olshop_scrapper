<!DOCTYPE html>
<html lang="en">
   <head>
     <meta charset="utf-8">
     <title>Compare IT</title>
     <?php require_once 'template/head.php'; ?>
   </head>
   <body>
      <div id="wrapper">
         <?php require_once 'template/navbar.php'; ?>
         <div id="page-wrapper">
            <!-- START -->
            <?php
              if (isset($_GET['kode'])) {
                if ($_GET['kode']==1) {
                  require_once 'master/data_barang/barang.php';
                }
                elseif ($_GET['kode']==2) {
                  require_once 'master/data_barang/toko.php';
                }
                elseif ($_GET['kode']==3) {
                  require_once 'master/data_barang/kategori.php';
                }
                elseif ($_GET['kode']==4) {
                  require_once 'master/data_barang/user.php';
                }
                else {
                  require_once 'master/data_barang/pilih.php';
                }
              }
              else {
                require_once 'master/data_barang/pilih.php';
              }
            ?>
            <!-- END -->
         </div>
         </div>

      <?php require_once 'template/script.php'; ?>
      <?php require_once 'template/footer.php'; ?>
   </body>
</html>
