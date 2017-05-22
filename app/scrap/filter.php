<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Cek Filter</title>
  </head>
  <body>
    <?php
    error_reporting(0);
    set_time_limit(0);
    $start = microtime(true);
    include_once '../../setting/koneksi.php';
    $pilih = "SELECT * FROM tmp";
    $hasil = mysqli_query($con,$pilih);
    while ($row = mysqli_fetch_array($hasil))
    {
//========================================================================================================================================
        if ($row['th']=="nama"){
          if ($row_cek_url==0){
              $sql_input = "INSERT INTO tb_barang (nama_barang,id_kategori) SELECT td, 1 FROM tmp WHERE tmp.`id`=$row[id];";
              $new_input = mysqli_query($con,$sql_input);
              $use_id_barang = mysqli_insert_id($con);
              $sql_input = "UPDATE tb_det_barang SET id_barang = ($use_id_barang) WHERE id_det_barang=$use_id_detail;";
              $new_input = mysqli_query($con,$sql_input);
              echo "[BARANG] Print SQL New Input : ".$sql_input . "<br>";
              echo "[BARANG] Last ID yang Diambil : ". $use_id_barang. "<br>";
              $use_id_barang=0;
            }
          }
//========================================================================================================================================
        elseif ($row['th']=="url"){
              $sql_url="SELECT td FROM tmp WHERE tmp.`id`=$row[id];";
              $hasil_url = mysqli_query($con,$sql_url);
              while ($row_url = mysqli_fetch_array($hasil_url)){
                  $url_cek=$row_url['td'];
                  $host= parse_url($row_url['td'], PHP_URL_HOST);
                  // echo $url_cek . " => " . $host . "<br>";
                  $sql_cek_url="SELECT link_barang from tb_det_barang where link_barang='$url_cek'";
                  $hasil_cek_url = mysqli_query($con,$sql_cek_url);
                  $row_cek_url=mysqli_num_rows($hasil_cek_url);
                  if ($row_cek_url==0){
                    $sql_cek="SELECT * from tb_web where nama_web='$host'";
                    $hasil_cek = mysqli_query($con,$sql_cek);
                    $row_coun=mysqli_num_rows($hasil_cek);
                    if ($row_coun==1){
                      while ($rowid = mysqli_fetch_array($hasil_cek))
                      {
                        $use_id_url = $rowid['id_web'];
                        echo "[WEB] ID yang Diambil : ". $use_id_url. "<br>";
                      }
                    }
                    else {
                      $sql_input = "INSERT INTO tb_web (nama_web) VALUES ('$host');";
                      $new_input = mysqli_query($con,$sql_input);
                      $use_id_url = mysqli_insert_id($con);
                      echo "[WEB] Print SQL New Input : ".$sql_input . "<br>";
                      // echo "[WEB] Last ID yang Diambil : ". $use_id_url. "<br>";
                    }
                  }
              }
              $sql_input = "INSERT INTO tb_det_barang (link_barang, id_web) SELECT td, $use_id_url FROM tmp WHERE tmp.`id`=$row[id];";
              $new_input = mysqli_query($con,$sql_input);
              $use_id_detail = mysqli_insert_id($con);
              echo "[URL] Print SQL New Input : ".$sql_input . "<br>";
              echo "[URL] Last ID yang Diambil : ". $use_id_detail. "<br>";
              $use_id_url=0;
          }
//========================================================================================================================================
        elseif ($row['th']=="img"){
              $sql_input = "UPDATE tb_det_barang SET gambar = (SELECT td FROM tmp WHERE tmp.`id`=$row[id]) WHERE id_det_barang=$use_id_detail;";
              $new_input = mysqli_query($con,$sql_input);
              echo "[GAMBAR] Print SQL New Input : ".$sql_input . "<br>";
              echo "[GAMBAR] Last ID yang Diambil : ". $use_id_detail. "<br>";
          }
//========================================================================================================================================
        elseif ($row['th']=="Rp"){
              $sql_input = "UPDATE tb_det_barang SET harga = (SELECT td FROM tmp WHERE tmp.`id`=$row[id]) WHERE id_det_barang=$use_id_detail;";
              $new_input = mysqli_query($con,$sql_input);
              echo "[HARGA] Print SQL New Input : ".$sql_input . "<br>";
              echo "[HARGA] Last ID yang Diambil : ". $use_id_detail. "<br>";
              $use_id_detail=0;
          }
//========================================================================================================================================
      // $sql .= "TRUNCATE TABLE tmp;";
    }
      // $time_elapsed_secs = microtime(true) - $start;
      // $duration = $time_elapsed_secs;
      // $hours = (int)($duration/60/60);
      // $minutes = (int)($duration/60)-$hours*60;
      // $seconds = $duration-$hours*60*60-$minutes*60;
      // $sec = number_format((float)$seconds, 2, '.', '');
      // // echo "Total execution time in seconds : " . $time_elapsed_secs;
      // $message = 'Proses Selesai dengan waktu ' . $sec . ' detik';
      //     echo "<SCRIPT type='text/javascript'> //not showing me this
      //         alert('$message');
      //         window.location.replace(\"index.php\");
      //     </SCRIPT>";
    ?>

  </body>
</html>
