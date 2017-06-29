<?php include_once 'konfirmasi.php'; ?>
<!-- Animalia -->
<div class="panel panel-primary">
  <div class="panel-heading">
    <label>Data Barang</label>
  </div>
  <div class="panel-body">
    <a href="master\action\insert\barang.php" class="btn btn-primary" role="button"><i class="fa fa-plus-circle" aria-hidden="true"></i>
  Tambah Data</a>
      <table id="dataTables" class="table table-striped table-bordered table-hover">
        <thead>
          <th style="text-align:center;" class="text-uppercase">No</th>
          <th style="text-align:center;" class="text-uppercase">Barang</th>
          <th style="text-align:center;" class="text-uppercase">Toko</th>
          <th style="text-align:center;" class="text-uppercase">Harga</th>
          <th style="text-align:center;" class="text-uppercase">Action</th>
        </thead>
          <tbody class="table table-striped table-bordered table-hover">
            <?php
              include_once 'setting/koneksi.php';
              $no=1;
              $query = "SELECT * FROM tb_det_barang
                        INNER JOIN tb_barang
                        ON tb_det_barang.`id_barang` = tb_barang.`id_barang`
                        INNER JOIN tb_web
                        ON tb_det_barang.`id_web` = tb_web.`id_web`
                        INNER JOIN tb_kategori
                        ON tb_barang.`id_kategori` = tb_kategori.`id_kategori`
                        GROUP BY nama_barang;";
              $result = mysqli_query($con,$query);
              //var_dump($result);
              while ($row = mysqli_fetch_array($result))
              {
                echo "
                <tr>
                   <td style='text-align:center;' >".$no."</td>
                   <td style='text-align:left;'>".$row['nama_barang']."</td>
                   <td style='text-align:left;'>".$row['nama_web']."</td>
                   <td style='text-align:center;'>".$row['harga']."</td>
                   <td style='text-align:center;'>
                   <a href='master\action\update\barang.php?id=$row[id_barang]'>
                   <i class='fa fa-pencil-square-o' aria-hidden='true'></i>Edit</a> |
                   <a href='master\action\delete\delete_barang.php?id=$row[id_barang]' class='delete'>
                   <i class='fa fa-times' aria-hidden='true'></i>Delete</a></td>
                </tr>
                ";
                $no++;
              }
            ?>
          </tbody>
      </table>
  </div>
</div>
<!-- Animalia -->
