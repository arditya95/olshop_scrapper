<?php
include("../../setting/simple_html_dom.php");
$html = file_get_html("https://www.tokopedia.com/p/handphone-tablet");
// $html->save('result.htm');
$count=1;
foreach($html->find(a) as $e)
  {
    $count = $count+1;
    $hasil =$e->innertext;
    echo $hasil . "<br>";
    // var_dump($hasil);
    // print_r($hasil);
  }
echo "FINISH";
?>
