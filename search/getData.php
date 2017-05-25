<!-- START -->
<?php
  include_once '../setting/koneksi.php';
  $type = $_GET['type'];
  $val = $_GET['val'];

  $query = "SELECT * FROM tb_det_barang
            INNER JOIN tb_barang
            ON tb_det_barang.`id_barang` = tb_barang.`id_barang`
            INNER JOIN tb_web
            ON tb_det_barang.`id_web` = tb_web.`id_web`
            INNER JOIN tb_kategori
            ON tb_barang.`id_kategori` = tb_kategori.`id_kategori`
            WHERE nama_barang LIKE '%$val%'
            ORDER BY harga ASC;";
  $result = mysqli_query($con,$query);
  $row_cek=mysqli_num_rows($result);
  echo $row_cek;
?>
<?php
  if ($row_cek===0) {
    echo '<div class="row" >';
    echo 'Barang yang anda cari tidak saat ini belum tersedia..';
    echo '</div>';
  }
  else {
    echo '<div class="row" >';
    while($row = mysqli_fetch_assoc($result)){
      $angka = "$row[harga]";
      $jumlah_desimal ="2";
      $pemisah_desimal =",";
      $pemisah_ribuan =".";
      $harga = number_format($angka, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan);
      echo '<div class="col-sm-6 col-md-4">';
      echo '<div class="thumbnail">';
      echo "<img src='$row[gambar]' height='150' width='150' class='img-rounded>'";
      echo '<div class="caption">';
      echo "<a href='$row[link_barang]' target='_blank'> <h3> $row[nama_barang]</h3> </a>";
      echo "<h3> Rp. $harga</h3>";
      echo "<p>From : <a href='$row[link_barang]' target='_blank'> $row[nama_web] </p>";
      echo "<a href='$row[link_barang]' target='_blank' class='btn btn-primary'> Go Buy </a>";
      echo '</div>';
      echo '</div>';
      echo '</div>';

    }
    echo '</div>';
  }
?>
<!-- END -->
