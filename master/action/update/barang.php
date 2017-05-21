<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <label>Edit Barang</label>
            </div>

            <?php
              include_once '../../../setting/koneksi.php';
              $sql=("SELECT * FROM tb_det_barang
                        INNER JOIN tb_barang
                        ON tb_det_barang.`id_barang` = tb_barang.`id_barang`
                        INNER JOIN tb_web
                        ON tb_det_barang.`id_web` = tb_web.`id_web`
                        INNER JOIN tb_kategori
                        ON tb_barang.`id_kategori` = tb_kategori.`id_kategori`
                        WHERE tb_det_barang.`id_barang` = '$_GET[id]'
                        GROUP BY nama_barang;");
              $result = mysqli_query($con,$sql);
              $baris=mysqli_fetch_array($result);
            ?>

            <div class="panel-body">
              <form class="form-horizontal" action="update_barang.php" method="post">
                <div class="container-fluid">
                  <div class="form-group">
                    <input type="hidden" class="form-control" name="id_barang" value="<?php echo $baris['id_barang'];?>">
                    <input type="hidden" class="form-control" name="id_det_barang" value="<?php echo $baris['id_det_barang'];?>">
                    <label for="nama">Nama Barang</label>
                    <input type="text" class="form-control" name="nama" value="<?php echo $baris['nama_barang'];?>">
                  </div>
                  <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <?php
                      include_once '../../../setting/koneksi.php';
                      $query=("SELECT * FROM tb_kategori");
                      $hasil = mysqli_query($con,$query);
                      $select= '<select name="kategori" class="form-control">';
                      while($row=mysqli_fetch_array($hasil))
                        {
                          if ($baris['id_kategori']==$row['id_kategori']) {
                            $select.='<option selected="selected" value="'.$row['id_kategori'].'">'.$row['kategori'].'</option>';
                          }else {
                            $select.='<option value="'.$row['id_kategori'].'">'.$row['kategori'].'</option>';
                          }
                        }
                      $select.='</select>';
                      echo $select;
                    ?>
                  </div>
                  <div class="form-group">
                    <label for="link">Link Barang</label>
                    <input type="text" class="form-control" name="link" value="<?php echo $baris['link_barang'];?>">
                  </div>
                  <div class="form-group">
                    <label for="toko">Toko</label>
                    <?php
                      include_once '../../../setting/koneksi.php';
                      $query=("SELECT * FROM tb_web");
                      $hasil = mysqli_query($con,$query);
                      $select= '<select name="toko" class="form-control">';
                      while($row=mysqli_fetch_array($hasil))
                        {
                          if ($baris['id_web']==$row['id_web']) {
                            $select.='<option selected="selected" value="'.$row['id_web'].'">'.$row['nama_web'].'</option>';
                          }else {
                            $select.='<option value="'.$row['id_web'].'">'.$row['nama_web'].'</option>';
                          }
                        }
                      $select.='</select>';
                      echo $select;
                    ?>
                  </div>
                  <div class="form-group">
                    <label for="harga">Harga Barang</label>
                    <input type="text" class="form-control" name="harga" value="<?php echo $baris['harga'];?>">
                  </div>
                  <!-- <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea class="form-control" name="deskripsi" rows="8" cols="80"><?php echo $baris['deskripsi_kingdom'];?></textarea>
                  </div> -->
                </div>
                <input type="submit" name="submit" class="btn btn-primary" value="Save">
                <a href="<?php echo $_SERVER['HTTP_REFERER'] ?>" class="btn btn-primary" role="button">Back</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
