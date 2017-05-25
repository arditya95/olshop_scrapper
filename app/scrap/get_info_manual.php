<?php
include_once '../../setting/koneksi.php';
include_once("../../setting/simple_html_dom.php");

if (isset($_POST['submit'])) {
  $link = $_POST['link'];
  $sql_link="SELECT * from tb_link where link='$link'";
  $hasil_cek_link = mysqli_query($con,$sql_link);
  $row_cek_link=mysqli_num_rows($hasil_cek_link);
  if ($row_cek_link==0){
    $sql="INSERT INTO tb_link (link) VALUES ('$link');";
    echo $sql;
    mysqli_query($con,$sql);
  }
}

$pilih = "SELECT * FROM tb_link WHERE label=0";
$hasil_link = mysqli_query($con,$pilih);
while ($row_link = mysqli_fetch_array($hasil_link))
 {
   exec('php -q filter.php');
   $url=$row_link['link'];
   $link_id = $row_link['id_link'];
   echo $row_link['link'] . "<br>";
   $host= parse_url($url, PHP_URL_HOST);
   echo $host . "<br>";
   $count=0;
   $img=0;
   //========================================================================================================================================
   if ($host=="www.tokopedia.com") {
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
     echo "FINISH" . "<br>";
   }

   //========================================================================================================================================
   elseif ($host=="item.blanja.com" || $host=="www.blanja.com") {
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

     //NGAMBIL DESKRIPSI TOKO
     // foreach($html->find('div[class="seller-info clearfix p15"] text') as $e)
     //   {
     //     $hasil =$e->innertext;
     //     if(ctype_space($hasil)){
     //       // echo "Data Kosong" . "<br>";
     //     }
     //     else {
     //       var_dump($hasil) ;
     //       echo "<br>";
     //     }
     //     // var_dump($hasil) ;
     //     // echo "<br>";
     //   }
     //NGAMBIL DESKRIPSI TOKO
     echo "FINISH" . "<br>";
   }
   //========================================================================================================================================
   $query = "UPDATE tb_link SET label=1 WHERE id_link = $link_id";
   mysqli_query($con,$query);
  exec('php -q filter.php');
 }
 header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
