<?php
include("../../setting/simple_html_dom.php");
$html = file_get_html("https://www.tokopedia.com/jakartaacc/powerbank-solar-kompas-real-10000mah-solar-kompas-pow-berkualitas-powe?src=topads");
// $html->save('result.htm');
// $count=1;
foreach($html->find('h1 text') as $e)
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

foreach($html->find('div[class="product-imagebig"] img') as $e)
  {
    // $count = $count+1;
    $hasil =$e->src;
    if(ctype_space($hasil)){
      // echo "Data Kosong" . "<br>";
    }
    else {
      // echo $hasil . "<br>";
      var_dump($hasil) ;
      echo "<br>";
      // print_r($hasil);
    }

  }

foreach($html->find('div[class="product-pricetag p-0 mt-10 text-center"] text') as $e)
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

foreach($html->find('div[id="b-p-info-penjual"] text') as $e)
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

?>
