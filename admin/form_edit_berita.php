<?php
date_default_timezone_set('Asia/Jakarta');
include ('fungsi/config.php');
//include ('fungsi/fungsi_hitungvisitor.php');
include ('fungsi/fungsi_tanggal.php');
session_start();
 $date = date('Y-m-d');
 if(isset($_SESSION['user'])){
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Web Akademik | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <style>
    .slimScrollDiv , .box-body{
      height: 500px !important;
    }
  </style>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <?php
  include "menu.php";
  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-13 col-xs-12">
          <!-- Input addon -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">News</h3>
            </div>
            <div class="box-body">
              <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#input">Input</a></li>
                <li><a data-toggle="tab" href="#news">News</a></li>
              </ul>
              <div class="tab-content">
                <div id="input" class="tab-pane fade in active">
                  <?php
                  if(isset($_GET['id']))
                  {
                    $id_news = $_GET['id'];
                    $datalist = mysqli_query($koneksi,"select * from Artikel where id = '$id_news' ");
                    while($datanews = mysqli_fetch_array($datalist))
                    {
                  ?>
                    <form action="proses_news.php" method="post" enctype="multipart/form-data">
                      <div class="input-group">
                        <span class="input-group-addon">
                          <i class="fa fa-camera" title="Foto Berita"> </i>
                        </span>
                        <input name="img_news" type="file" class="form-control" placeholder="Foto Artikel" accept="image/x-png,image/gif,image/jpeg">
                        <input type="text" class="form-control" value="Jika tidak ingin mengganti foto, biarkan form kosong" readonly="">
                        <input name="img_news_old" type="hidden" class="form-control" placeholder="Foto Artikel" value="<?php echo $datanews['gambar'];?>">
                        <input type="hidden" name="id_news" value="<?php echo $datanews['id'];?>">
                      </div>
                      <div class="input-group">
                        <span class="input-group-addon">
                          <i class="fa fa-book" title="Judul Berita"> </i>
                        </span>
                        <input name="judul_news" type="text" class="form-control" placeholder="Judul News" value="<?php echo $datanews['judul_artikel'];?>">
                      </div>
                      <div class="input-group">
                        <span class="input-group-addon">
                          <i class="fa fa-calendar" title="Tanggal Berita"> </i>
                        </span>
                        <input name="date_news" type="date" class="form-control" placeholder="Tanggal Artikel" value="<?php echo date('Y-m-d');?>" readonly>
                      </div>
                     <div class="input-group">
                        <span class="input-group-addon">
                          <i class="fa fa-user" title="Penulis Berita"> </i>
                        </span>
                        <select name="id_login" class="form-control">
                          <?php
                          $dataprofil = mysqli_query($koneksi,"select * from login INNER JOIN Artikel ON Artikel.id_login=login.id_login");
                          while ($data=mysqli_fetch_array($dataprofil)) {
                            if($data['id_login'] == $datanews['id_login'] )
                            {
                          ?>
                            <option selected value="<?php echo $data['id_login']; ?>"><?php echo $data['nama'] ?></option>
                          <?php
                            }
                          }
                          ?>
                        </select>
                      </div>
                      <textarea class="textarea" name="news" placeholder="Berita apa hari ini?" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px;border: 1px solid #dddddd; padding: 10px;"><?php echo $datanews['isi_artikel'];?></textarea>
                      <a href="news.php" class="btn btn-default" style="float: right; margin-left: 10px;"> Batal </a>
                      <button type="submit" name="editnews" class="btn btn-info " style="float: right;">Simpan</button>
                    </form>
                  <?php
                    }
                  }
                  else
                  {
                  ?>
                    <form action="proses_news.php" method="post" enctype="multipart/form-data">
                      <div class="input-group">
                        <span class="input-group-addon">
                          <i class="fa fa-camera" title="Foto Berita"> </i>
                        </span>
                        <input name="img_news" type="file" class="form-control" placeholder="Foto Artikel" accept="image/x-png,image/gif,image/jpeg">
                      </div>
                      <div class="input-group">
                        <span class="input-group-addon">
                          <i class="fa fa-book" title="Judul Berita"> </i>
                        </span>
                        <input name="judul_news" type="text" class="form-control" placeholder="Judul Artikel" value="">
                      </div>
                      <div class="input-group">
                        <span class="input-group-addon">
                          <i class="fa fa-calendar" title="Tanggal Berita"> </i>
                        </span>
                        <input name="date_news" type="date" class="form-control" placeholder="Tanggal Artikel" value="<?php echo date('Y-m-d');?>" readonly>
                      </div>
                      <div class="input-group">
                        <span class="input-group-addon">
                          <i class="fa fa-user" title="Penulis Berita"> </i>
                        </span>
                      </div>
                      <textarea class="textarea" name="news" placeholder="Berita apa hari ini?" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px;border: 1px solid #dddddd; padding: 10px;"></textarea>
                      <a href="news.php" class="btn btn-default" style="float: right; margin-left: 10px;"> Batal </a>
                      <button type="submit" name="inputnews" class="btn btn-info " style="float: right;">Simpan</button>
                    </form>
                  <?php
                  }
                  ?>
                </div>
                <div id="news" class="tab-pane fade">
                  <table id="table_news" class="table table-bordered table-striped" width="100%">
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>Tanggal Artikel</th>
                      <th>Gambar</th>
                      <th>Judul Artikel</th>
                      <th>Isi Artikel</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no = 1;
                    $data = mysqli_query($koneksi,"select * from Artikel");
                    while($datanews = mysqli_fetch_array($data))
                    {
                    ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo fungsi_tgl($datanews['tanggal']); ?></td>
                        <td><img src="news/<?php echo $datanews['gambar']; ?>" width="100px"></td>
                        <td><?php echo $datanews['judul_artikel']; ?></td>
                        <td><?php echo $datanews['isi_artikel'];?></td>
                        <td>
                          <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                              Action <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                              <li>
                                <a href="form_edit_berita.php?id=<?php echo $datanews['id']; ?>">Edit</a>
                              </li>
                              <li>
                                <a href="hapus.php?id_hapus=<?php echo $datanews['id']; ?>">Hapus</a>
                              </li>
                            </ul>
                            </div>
                          </td>
                      </tr>
                    <?php
                    $no++;
                    }
                    ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <!-- /input-group -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- ./col -->
      </div>
  </div>
  
  <!-- /.content-wrapper -->
  <?php
 // include 'footer.php';
  ?>
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script>
  $(function () {
    $('.example1').DataTable()
      CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>
</body>
</html>
<?php
}
else{
     header("Location:index.php");
}
?>