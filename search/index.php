<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script>
    function getDataBarang(typ, value) {
       if (typ == "" || value == "") {
           document.getElementById("txtHint").innerHTML = "";
           return;
       } else {
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
           xmlhttp.open("GET","getData.php?type="+typ+ "&val="+value,true);
           xmlhttp.send();
       }
    }
    </script>
  </head>
  <body>
    <div class="container">
        <h2>Search & Filter</h2>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group pull-left">
              <input type="text" class="search form-control" id="searchInput" placeholder="Searching Text Here..">
            </div>
            <div class="form-group">
              <input type="button" class="btn btn-primary" value="Search" onclick="getDataBarang('search',$('#searchInput').val())"/>
              <!-- <div class="form-group pull-right">
                <select class="form-control" onchange="getDataBarang('sort',this.value)">
                  <option value="">Sort By</option>
                  <option value="new">Newest</option>
                  <option value="asc">Ascending</option>
                  <option value="desc">Descending</option>
                  <option value="active">Active</option>
                  <option value="inactive">Inactive</option>
                </select>
              </div> -->
            </div>
          </div>
        </div>
        <div class="loading-overlay" style="display: none;">
          <div class="overlay-content">Loading.....</div>
        </div>
        <div id="txtHint"></div>
    </div>
    <?php //https://www.codexworld.com/server-side-filtering-jquery-ajax-php-mysql/ ?>
  </body>
</html>
