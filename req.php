<?php
  $url = "https://ace.tokopedia.com/search/v1/catalog?nref=chome&sc=65&rows=30&start=0&terms=true&ob=1&full_domain=www.tokopedia.com&scheme=https&device=desktop&source=directory";

//==============================================================================
  // //  Initiate curl
  // $ch = curl_init();
  // // Disable SSL verification
  // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  // // Will return the response, if false it print the response
  // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  // // Set the url
  // curl_setopt($ch, CURLOPT_URL,$url);
  // // Execute
  // $result=curl_exec($ch);
  // // Closing
  // curl_close($ch);
  //
  // // Will dump a beauty json :3
  // var_dump(json_decode($result, true));
//==============================================================================
  $result = file_get_contents($url);
  // Will dump a beauty json :3
  // var_dump(json_decode($result, true));

  $json=json_decode($result, true);
  $count=1;
  foreach ($json as $value) {
      foreach($value as $value_detail) {
          echo '<div>' .$count. " => " .$value_detail['name']. " Harga : " .$value_detail['price_min'].'</div>';
          $count++;
      }
  }
//==============================================================================


?>
