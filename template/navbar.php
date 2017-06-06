<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php"><i class="fa fa-cloud"></i> Compare IT</a>
    </div>
    <!-- /.navbar-header -->
    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
            <a href="app/login/logout.php">
                <i class="fa fa-cogs fa-fw"></i>  Logout
            </a>
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="admin.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                </li>
                <li>
                    <a href="link.php"><i class="fa fa-link"></i> Web Link</a>
                </li>

                <!-- <li>
                    <a href="view_data.php"><i class="fa fa-eye"></i> View Data</a>
                </li> -->

                <li>
                    <a href="#"><i class="fa fa-table"></i> Master Data<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="route.php?kode=1.php"><i class="fa fa-table"></i> Data Barang</a>
                        </li>
                        <li>
                            <a href="route.php?kode=2.php"><i class="fa fa-table"></i> Data Toko</a>
                        </li>
                        <li>
                            <a href="route.php?kode=3.php"><i class="fa fa-table"></i> Data Kategori</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>
