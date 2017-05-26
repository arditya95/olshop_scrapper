<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">
          #imaginary_container{
          margin-bottom: 5%; /* Don't copy this */
      }
      .stylish-input-group .input-group-addon{
        background: white !important;
      }
      .stylish-input-group .form-control{
      border-right:0;
      box-shadow:0 0 0;
      border-color:#ccc;
      }
      .stylish-input-group button{
        border:0;
        background:transparent;
      }
    </style>
  </head>
  <body>
    <?php
    // include 'setting/koneksi.php';
    include 'template/head.php';
    // include 'template/navbar.php';
    include 'template/navhome.php';
    // include 'template/jumbotron.php';
    // include 'template/content.php';
    // include 'template/footer.php';
    // include 'template/script.php';
    ?>

    <!-- <input type="text" class="search form-control" id="searchInput" placeholder="Cari Barang...">
    <input type="button" class="btn btn-primary" value="Cari" onclick="getDataBarang('search',$('#searchInput').val())"/> -->

    <div class="container">
    	<div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <div id="imaginary_container">
                    <div class="input-group stylish-input-group">
                        <input type="text" class="search form-control" id="searchInput" placeholder="Cari Barang..." >
                        <span class="input-group-addon" onclick="getDataBarang('search',$('#searchInput').val())">
                          <!-- <input type="button" class="btn btn-primary" value="Cari" onclick="getDataBarang('search',$('#searchInput').val())"/> -->
                            <button type="submit" value="Cari" onclick="getDataBarang('search',$('#searchInput').val())">
                                <span class="glyphicon glyphicon-search" onclick="getDataBarang('search',$('#searchInput').val())"></span>
                            </button>
                        </span>
                    </div>
                </div>
            </div>
    	</div>
    </div>

    <div id="txtHint">
      <?php
        include 'template/jumbotron.php';
        include 'template/content.php';
      ?>
    </div>
    <?php
      include 'template/script.php';
      // include 'template/footer.php';
    ?>
  </body>
</html>
