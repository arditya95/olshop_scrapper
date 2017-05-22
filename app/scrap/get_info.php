<?php
include_once '../../setting/koneksi.php';
// $url="https://www.tokopedia.com/cahayasteel/xiaomi-mi-max-3gb32gb-lte-4g-gold?trkid=f=Ca0000L000P0W0S0Sh00Co0Po0Fr0Cb0_src=catalog-product_page=1_ob=14_q=_catid=24_po=1&src=catalog";
$url="https://item.blanja.com/item/jual-beli-samsung-galaxy-s8-plus-garansi-resmi-sein-1th-15726427";
$host= parse_url($url, PHP_URL_HOST);
// echo $host;
$count=0;
$img=0;
//========================================================================================================================================
if ($host=="www.tokopedia.com") {
  include_once("../../setting/simple_html_dom.php");
  $html = file_get_html($url);

  //NGAMBIL NAMA BARANG
  foreach($html->find('h1 text') as $e)
    {
      $hasil =$e->innertext;
      var_dump($hasil);
      echo "<br>";
      $query = "INSERT INTO tmp (th,td) VALUES ('url', '$url')";
      mysqli_query($con,$query);
      $query = "INSERT INTO tmp (th,td) VALUES ('nama', '$hasil')";
      mysqli_query($con,$query);
    }
  //NGAMBIL NAMA BARANG

  //NGAMBIL GAMBAR
  foreach($html->find('div[class="product-imagebig"] img') as $e)
    {
      // $count = $count+1;
      $hasil =$e->src;
      if(ctype_space($hasil)){
      }
      else {
        var_dump($hasil);
        echo "<br>";
        $query = "INSERT INTO tmp (th,td) VALUES ('img', '$hasil')";
        mysqli_query($con,$query);
      }
    }
  //NGAMBIL GAMBAR

  //NGAMBIL HARGA
  foreach($html->find('div[class="product-pricetag p-0 mt-10 text-center"] text') as $e)
    {
      $hasil =$e->innertext;
      if(ctype_space($hasil) || preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $hasil)){
        // echo "Data Kosong" . "<br>";
      }
      elseif ($count<2){
      if (trim($hasil)=="Rp") {
        $trim=trim($hasil);
        var_dump(trim($trim));
        echo "<br>";
        $query = "INSERT INTO tmp (th) VALUES ('$trim')";
        mysqli_query($con,$query);
        $last_id = mysqli_insert_id($con);
        $count = $count+1;
      }
      elseif (preg_match('/[.]/', $hasil)) {
        $trim=trim($hasil);
        $preg=preg_replace('/[.]/', '', $trim);
        var_dump($preg);
        echo "<br>";
        $query = "UPDATE tmp SET td='$preg' WHERE id=$last_id";
        mysqli_query($con,$query);
        $count = $count+1;
      }
    }
    }
    //NGAMBIL HARGA

    //NGAMBIL DESKRIPSI TOKO
  //foreach($html->find('div[id="b-p-info-penjual"] text') as $e)
    //{
      //$hasil =$e->innertext;
      // if(ctype_space($hasil) || preg_match('/[KOSONG]/', $hasil)){
        // echo "Data Kosong" . "<br>";
      //}
      //else {
        //var_dump($hasil) ;
        //echo "<br>";
      //}
    //}
    //NGAMBIL DESKRIPSI TOKO
  echo "FINISH";
}

//========================================================================================================================================
elseif ($host=="item.blanja.com" || $host=="www.blanja.com") {
  include("../../setting/simple_html_dom.php");
  $html = file_get_html($url);

  //NGAMBIL NAMA BARANG
  foreach($html->find('h1[class="title fSize-18 fWeight-bold mb10"] text') as $e)
    {
      $hasil =$e->innertext;
      var_dump($hasil) ;
      echo "<br>";
      $query = "INSERT INTO tmp (th,td) VALUES ('url', '$url')";
      mysqli_query($con,$query);
      $query = "INSERT INTO tmp (th,td) VALUES ('nama', '$hasil')";
      mysqli_query($con,$query);
    }
  //NGAMBIL NAMA BARANG

  //NGAMBIL GAMBAR
  foreach($html->find('div[class="image-showcase tAlign-center pRelative"] img') as $e)
    {
      if ($img<1) {
        $hasil =$e->src;
        var_dump($hasil) ;
        echo "<br>";
        $query = "INSERT INTO tmp (th,td) VALUES ('img', '$hasil')";
        mysqli_query($con,$query);
        $img=+1;
      }
    }
  //NGAMBIL GAMBAR

  //NGAMBIL HARGA
  foreach($html->find('div[class="product-item-price mt10 pt10"] text') as $e)
    {
      $hasil =$e->innertext;
      if(ctype_space($hasil) || preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $hasil)){
        // echo "Data Kosong" . "<br>";
      }
        elseif ($count<2){
        if (trim($hasil)=="Rp") {
          $trim=trim($hasil);
          var_dump(trim($trim));
          echo "<br>";
          $query = "INSERT INTO tmp (th) VALUES ('$trim')";
          mysqli_query($con,$query);
          $last_id = mysqli_insert_id($con);
          $count = $count+1;
        }
        elseif (preg_match('/[.]/', $hasil)) {
          $trim=trim($hasil);
          $preg=preg_replace('/[.]/', '', $trim);
          var_dump($preg);
          echo "<br>";
          $query = "UPDATE tmp SET td='$preg' WHERE id=$last_id";
          mysqli_query($con,$query);
          $count = $count+1;
        }
      }
    }
  //NGAMBIL HARGA

  echo "FINISH";
}
//========================================================================================================================================
?>
