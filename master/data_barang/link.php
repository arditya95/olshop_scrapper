<?php include_once 'konfirmasi.php'; ?>
<!-- Animalia -->
<div class="panel panel-primary">
  <div class="panel-body">
  <!-- START -->
  <table id="dataTables" class="table table-striped table-bordered table-hover">
    <thead>
      <th style="text-align:center;" class="text-uppercase">No</th>
      <th style="text-align:center;" class="text-uppercase">Link</th>
      <th style="text-align:center;" class="text-uppercase">Toko</th>
      <th style="text-align:center;" class="text-uppercase">Status</th>
      <th style="text-align:center;" class="text-uppercase">Action</th>
    </thead>
     <tbody class="table table-striped table-bordered table-hover">
          <?php
            include_once 'setting\koneksi.php';
            $query = "SELECT * FROM tb_link";
            $result = mysqli_query($con,$query);
            $no=1;
            while ($row = mysqli_fetch_array($result))
            {
              if ($row['label']==1) {
                 $flag="Checked";
                 $warna="success";
              }
              if ($row['label']==0) {
                 $flag="Uncheked";
                 $warna="danger";
              }

              $url=$row['link'];
              $host= parse_url($url, PHP_URL_HOST);
              if (!strcmp($host,"item.blanja.com")) {
                $host="www.blanja.com";
              }
              echo "
              <tr>
                 <td style='text-align:center;' >".$no."</td>
                 <td> <a href=$row[link]>$row[link]</a></td>
                 <td style='text-align:center;' >".$host."</td>
                 <td class=$warna style='text-align:center;'>$flag</td>
                 <td style='text-align:center;'>
                 <a href='master\action\delete\delete_link.php?id=$row[id_link]' class='delete'>
                 <i class='fa fa-times' aria-hidden='true'></i>Delete</a>
                 </td>
              </tr>
              ";

              $no++;
            }
           ?>
     </tbody>
  </table>
  <!-- END -->
  </div>
</div>
<!-- Animalia -->
