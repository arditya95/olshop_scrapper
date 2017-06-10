<?php
// [SERVER] KONFIGURASI DATABASE
$db_host="mysql.idhostinger.com";
$db_user="u294221690_toko";
$db_pass="compareit";
$db_name="u294221690_toko";

// [LOCAL] KONFIGURASI DATABASE
// $db_host="localhost";
// $db_user="root";
// $db_pass="";
// $db_name="compare_it";

$con = mysqli_connect($db_host,$db_user,$db_pass,$db_name);

if (mysqli_connect_errno()) {
  	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
// else {
//    echo "Connection Successful \n";
//    echo '<br>';
// }
?>
