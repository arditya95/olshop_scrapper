<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    session_start();
    if(!isset($_SESSION['username'])) {
       header('location: app/login/login.php');
    }
    // include 'setting/koneksi.php';
    include 'template/head.php';
    // include 'template/navbar.php';
    // include 'template/navhome.php';
    // include 'template/jumbotron.php';
    // include 'template/content.php';
    // include 'template/script.php';
    // include 'template/footer.php';
    ?>
    <div id="wrapper">
  		<?php include 'template/navbar.php'; ?>
  		<div id="page-wrapper">
  			<div class="row">
  				<div class="col-lg-12">
  					<h1 class="page-header"><i class="fa fa-dashboard"></i> Dashboard</h1>
  				</div>
  			</div>
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6">
              <!-- KOLOM 1 -->
                <div class="panel panel-primary">
                  <div class="panel-heading">
                    <label>Ambil Data</label>
                  </div>
                    <div class="panel-body">
                      <form class="form-horizontal" action="app\scrap\get_info_manual.php" method="post">
                        <div class="container-fluid">
                          <div class="form-group">
                            <label for="link">Link Barang</label>
                            <input type="text" class="form-control" name="link" placeholder="Input Link Barang Disini">
                          </div>
                        </div>
                        <input type="submit" name="submit" class="btn btn-primary" value="Get Data">
                        <!-- <a href="app\scrap\get_link.php" class="btn btn-primary" role="button">Proses Get Link</a> -->
                        <!-- <a href="app\scrap\get_info.php" class="btn btn-primary" role="button">Proses Get Info</a> -->
                        <!-- <a href="app\scrap\filter.php" class="btn btn-primary" role="button">Proses Filtering</a> -->
                      </form>
                    </div>
                </div>
              <!-- /KOLOM 1 -->
            </div>
          </div>
        </div>
      </div>
    </div>
<?php
include 'template/script.php';
include 'template/footer.php';
?>
  </body>
</html>
