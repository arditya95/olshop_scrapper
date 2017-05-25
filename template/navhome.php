<nav class="navbar navbar-inverse">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#target-list">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a href="#" class="navbar-brand">Compare IT</a>
  </div>
  <div class="collapse navbar-collapse" id="target-list">
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="#">About</a></li>
      <li><a href="app\login\login.php">Login</a></li>
    </ul>
    <form role="search" class="navbar-form navbar-right">
      <div class="form-group">
        <input type="text" class="search form-control" id="searchInput" placeholder="Cari Barang...">
        <input type="button" class="btn btn-primary" value="Cari" onclick="getDataBarang('search',$('#searchInput').val())"/>
        <!-- <input type="text" name="" class="form-control" placeholder="Cari Barang...">
        <button type="submit" name="button" class="btn btn-primary">Cari</button> -->
      </div>
    </form>
  </div>
</nav>
