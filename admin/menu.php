<header class="main-header">
    <!-- Logo -->
    <a href="beranda.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Web</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Web</b> Akademik</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

    
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/avatar.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php// echo $namalengkap; ?></p>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="beranda.php">
            <i class="fa fa-home fa-home"></i> <span>Home</span>
          </a>
        </li>
        <li>
          <a href="data_mahasiswa.php">
            <i class="fa fa-table fa-fw"></i> <span>Tabel</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit fa-fw"></i> <span>Form</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="form_edit_berita.php"><i class="fa fa-circle-o"></i>Berita</a></li>
            <li><a href="pengumuman.php"><i class="fa fa-circle-o"></i>Pengumuman</a></li>
          </ul>
        <li>
          <a href="user.php">
            <i class="fa fa-users"></i> <span>User</span>
          </a>
        </li>
        <li>
          <a href="logout.php">
            <i class="fa fa-sign-out"></i> <span>Logout</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>