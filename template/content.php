<style media="screen">
.thumbnail{
  width: 400px;
  // or you could use percentage values for responsive layout
  // width : 100%;
  height: 400px;
  overflow: auto;
}

/*.thumbnail img{
  // your styles for the image
  width: 100%;
  height: auto;
  display: block;
}*/
</style>
<div class="container-fluid">
<!-- START -->
<?php
  include_once 'setting/koneksi.php';
  // include_once '../setting/koneksi.php';
  // $type = $_GET['type'];
  // $val = $_GET['val'];

  $query = "SELECT * FROM tb_det_barang
            INNER JOIN tb_barang
            ON tb_det_barang.`id_barang` = tb_barang.`id_barang`
            INNER JOIN tb_web
            ON tb_det_barang.`id_web` = tb_web.`id_web`
            INNER JOIN tb_kategori
            ON tb_barang.`id_kategori` = tb_kategori.`id_kategori`
            ORDER BY RAND() LIMIT 10;";
  $result = mysqli_query($con,$query);
  $row_cek=mysqli_num_rows($result);
  // echo $row_cek;
?>
<div class="row" >
<?php while($row = mysqli_fetch_assoc($result)):?>
  <?php
    $angka = "$row[harga]";
    $jumlah_desimal ="2";
    $pemisah_desimal =",";
    $pemisah_ribuan =".";
    $linkweb= "https://" . $row['nama_web'];
  ?>
    <div class="col-sm-6 col-md-4">
      <div class="thumbnail">
        <img src="<?php echo $row['gambar']; ?>" height="150" width="150" class="img-rounded">
        <div class="caption">
          <a href="<?php echo $row['link_barang']; ?>" target="_blank"> <h3> <?php echo $row['nama_barang']; ?> </h3> </a>
          <h3> <?php echo "Rp. " .number_format($angka, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan); ?> </h3>
          <p>From : <a href="<?php echo $row['link_barang']; ?>" target="_blank"> <?= $row['nama_web']; ?> </p>
            <a href="<?php echo $linkweb; ?>" target="_blank" class="btn btn-primary"> Go Buy 2</a>
          <a href="<?php echo $row['link_barang']; ?>" target="_blank" class="btn btn-primary"> Go Buy </a>
        </div>
      </div>
    </div>
<?php endwhile; ?>
</div>
<!-- END -->
</div>
