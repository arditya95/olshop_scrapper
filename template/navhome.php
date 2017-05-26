<nav class="navbar navbar-inverse">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#target-list">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a href="index.php" class="navbar-brand">Compare IT</a>
  </div>
  <div class="collapse navbar-collapse" id="target-list">
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Home</a></li>
      <li><a href="#">About</a></li>
      <?php
      session_start();
      if(!isset($_SESSION['username'])) {
        echo '<li><a href="app\login\login.php">Login</a></li>';
      }
      else {
        echo '<li><a href="admin.php">Halaman Admin</a></li>';
      }
      ?>
    </ul>
    <form role="search" class="navbar-form navbar-right">
      <div class="form-group">
        <!-- <input type="text" class="search form-control" id="searchInput" placeholder="Cari Barang...">
        <input type="button" class="btn btn-primary" value="Cari" onclick="getDataBarang('search',$('#searchInput').val())"/> -->
      </div>
    </form>
  </div>
</nav>
