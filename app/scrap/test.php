<?php
$url="http://www.lazada.co.id/lenovo-k6-power-5-grey-21601846.html?spm=a2o4j.category-010100000000.0.0.02M2Pw&ff=1&sc=EXMN";
$host= parse_url($url, PHP_URL_HOST);
if ($host=="www.tokopedia.com") {
  include("../../setting/simple_html_dom.php");
  $html = file_get_html("https://item.blanja.com/item/jual-beli-samsung-galaxy-s8-plus-garansi-resmi-sein-1th-15726427");
  // $html->save('result.htm');
  // $count=1;
  foreach($html->find('h1ass="title fSize-18 fWeight-bold mb10" text') as $e)
    {
      // $count = $count+1;
      $hasil =$e->innertext;
      var_dump($hasil) ;
      echo "<br>";
    }
  foreach($html->find('div[class="product-item-price mt10 pt10"] text') as $e)
    {
      // $count = $count+1;
      $hasil =$e->innertext;
      if(ctype_space($hasil) || preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $hasil)){
        // echo "Data Kosong" . "<br>";
      }
      else {
        // echo $hasil . "<br>";
        var_dump($hasil) ;
        echo "<br>";
        // print_r($hasil);
      }
    }
  echo "FINISH";
}
?>
