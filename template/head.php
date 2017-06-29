<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">

<!-- Bootstrap Core CSS -->
<link href="dist/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!-- MetisMenu CSS -->
<link href="dist/metisMenu/metisMenu.min.css" rel="stylesheet">
<!-- Timeline CSS -->
<link href="dist/bootstrap/css/timeline.css" rel="stylesheet">
<!-- Custom CSS -->
<link href="dist/bootstrap/css/sb-admin-2.css" rel="stylesheet">
<!-- Morris Charts CSS -->
<link href="dist/morrisjs/morris.css" rel="stylesheet">
<!-- Custom Fonts -->
<link href="dist/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
 <!-- DataTables CSS -->
<link href="dist/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
<!-- DataTables Responsive CSS -->
<link href="dist/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

<style>
    .show-left{right: 0; left: auto;}
    a{cursor: pointer;}
</style>

<script>
function getDataBarang(typ, value) {
  //  if (typ == "" || value == "") {
  //      document.getElementById("txtHint").innerHTML = "Barang yang anda cari tidak saat ini belum tersedia..";
  //      return;
  //  } else {
       if (window.XMLHttpRequest) {
           // code for IE7+, Firefox, Chrome, Opera, Safari
           xmlhttp = new XMLHttpRequest();
       } else {
           // code for IE6, IE5
           xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
       }
       xmlhttp.onreadystatechange = function() {
           if (this.readyState == 4 && this.status == 200) {
               document.getElementById("txtHint").innerHTML = this.responseText;
           }
       };
       xmlhttp.open("GET","search/getData.php?type="+typ+ "&val="+value,true);
       xmlhttp.send();
  //  }
}
</script>
