<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
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
                    <label>Pilih Website</label>
                  </div>
                    <div class="panel-body">
                      <form class="form-horizontal" action="#" method="post">
                        <table class="table table-striped table-bordered">
                          <?php
                            include_once 'setting/koneksi.php';
                            $query=("SELECT id_web, nama_web FROM tb_web");
                            $hasil = mysqli_query($con,$query);
                            $select= '<select name="website" class="form-control" onchange="showUser(this.value)">';
                            while($row=mysqli_fetch_array($hasil))
                              {
                                  $select.='<option selected="selected" value="'.$row['id_web'].'">'.$row['nama_web'].'</option>';
                              }
                            $select.='</select>';
                            echo $select;
                          ?>
                          <div id="txtHint"></div>
                        </table>
                        <a href="get_link.php" class="btn btn-primary" role="button">Proses Get Link</a>
                        <a href="get_fact.php" class="btn btn-primary" role="button">Proses Get Fact</a>
                        <a href="filter.php" class="btn btn-primary" role="button">Proses Filtering</a>
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
