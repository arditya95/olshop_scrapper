<?php include_once 'konfirmasi.php'; ?>
<!-- Animalia -->
<div class="panel panel-primary">
  <div class="panel-heading">
    <label>Data Kategori</label>
  </div>
  <div class="panel-body">
    <a href="master\action\insert\kategori.php" class="btn btn-primary" role="button"><i class="fa fa-plus-circle" aria-hidden="true"></i>
  Tambah Data</a>
      <table id="example" class="table table-striped table-bordered table-hover">
          <tbody class="table table-striped table-bordered table-hover">
            <th style="text-align:center;" class="text-uppercase">No</th>
            <th style="text-align:center;" class="text-uppercase">Kategori</th>
            <th style="text-align:center;" class="text-uppercase">Action</th>
            <?php
              include_once 'setting/koneksi.php';
              $no=1;
              $query = "SELECT * FROM tb_kategori GROUP BY kategori;";
              $result = mysqli_query($con,$query);
              //var_dump($result);
              while ($row = mysqli_fetch_array($result))
              {
                echo "
                <tr>
                   <td style='text-align:center;' >".$no."</td>
                   <td style='text-align:center;'>".$row['kategori']."</td>
                   <td style='text-align:center;'>
                   <a href='master\action\update/kategori.php?id=$row[id_kategori]'>
                   <i class='fa fa-pencil-square-o' aria-hidden='true'>Edit</a> |
                   <a href='master\action\delete\delete_kategori.php?id=$row[id_kategori]' class='delete'>
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
