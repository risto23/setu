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
  <title>Kelurahan Setu | Dashboard</title>
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
              <h3 class="box-title">Syarat</h3>
            </div>
            <div class="box-body">
              <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#input">Input</a></li>
                <li><a data-toggle="tab" href="#syarat">Syarat</a></li>
              </ul>
              <div class="tab-content">
                <div id="input" class="tab-pane fade in active">

                  <?php
                  if(isset($_GET['id']))
                  {
                    $id_syarat = $_GET['id'];
                    $datalist = mysqli_query($koneksi,"select * from syarat where id_syarat='$id_syarat' ");
                    while($datasyarat = mysqli_fetch_array($datalist))
                    { 
                      
                  ?>
                    <form action="proses_syarat.php" method="post" enctype="multipart/form-data">
                      <div class="input-group">
                        <span class="input-group-addon">
                          <i class="fa fa-camera" title="Foto"> </i>
                        </span>
                        <input name="img_syarat" type="file" class="form-control" placeholder="Foto" accept="image/x-png,image/gif,image/jpeg">
                        <input type="text" class="form-control" value="Jika tidak ingin mengganti foto, biarkan form kosong" readonly="">
                        <input name="img_syarat_old" type="hidden" class="form-control" placeholder="Foto" value="<?php echo $datasyarat['gambar'];?>">
                        <input type="hidden" name="id_syarat" value="<?php echo $datasyarat['id_syarat'];?>">
                        <input type="hidden" name="id_login" value="<?php echo $_SESSION['user']; ?>">
                      </div>
                      <div class="input-group">
                        <span class="input-group-addon">
                          <i class="fa fa-book" title="Judul Berita"> </i>
                        </span>
                        <input name="judul_syarat" type="text" class="form-control" placeholder="Judul syarat" value="<?php echo $datasyarat['judul_syarat'];?>">
                      </div>
                      <div class="input-group">
                        <span class="input-group-addon">
                          <i class="fa fa-calendar" title="Tanggal syarat"> </i>
                        </span>
                        <input name="date_syarat" type="date" class="form-control" placeholder="Tanggal syarat" value="<?php echo date('Y-m-d');?>" readonly>
                      </div>
                     <div class="input-group">
                        <span class="input-group-addon">
                          <i class="fa fa-user" title="Penulis"> </i>
                        </span>
                          <?php
                          $dataprofil = mysqli_query($koneksi,"select * from login INNER JOIN syarat ON syarat.id_login=login.id_login");
                          while ($data=mysqli_fetch_array($dataprofil)) {
                            $nama=$data['nama'];
                           }
                          ?>
                           <input type="text" name="izin" value="<?php echo $nama; ?>" class="form-control" readonly>         
                      </div>
                      <?php 
                      include "konfirmasi.php";
                       ?>
                      <textarea class="textarea" name="syarat" placeholder="Silahkan tulis disini" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px;border: 1px solid #dddddd; padding: 10px;"><?php echo $datasyarat['deskripsi'];?></textarea>
                      <a href="syarat.php" class="btn btn-default" style="float: right; margin-left: 10px;"> Batal </a>
                      <button type="submit" name="editsyarat" class="btn btn-info " style="float: right;">Simpan</button>
                    </form>
                  <?php
                    }
                  }
                  else
                  {
                  ?>
                    <form action="proses_syarat.php" method="post" enctype="multipart/form-data">
                      <div class="input-group">
                        <span class="input-group-addon">
                          <i class="fa fa-camera" title="Foto syarat"> </i>
                        </span>
                        <input name="img_syarat" type="file" class="form-control" placeholder="Foto" accept="image/x-png,image/gif,image/jpeg">
                        <input type="hidden" name="id_login" value="<?php echo $_SESSION['user']; ?>">
                      </div>
                      <div class="input-group">
                        <span class="input-group-addon">
                          <i class="fa fa-book" title="Judul syarat"> </i>
                        </span>
                        <input name="judul_syarat" type="text" class="form-control" placeholder="Judul" value="">
                      </div>
                      <div class="input-group">
                        <span class="input-group-addon">
                          <i class="fa fa-calendar" title="Tanggal syarat"> </i>
                        </span>
                        <input name="date_syarat" type="date" class="form-control" placeholder="Tanggal syarat" value="<?php echo date('Y-m-d');?>" readonly>
                      </div>
                      <div class="input-group">
                        <span class="input-group-addon">
                          <?php 
                          $login=$_SESSION['user'];
                            $sql=mysqli_query($koneksi,"select * from login where id_login=$login");
                            while ($hasil=mysqli_fetch_array($sql)) {
                              $nama=$hasil['nama'];
                            }
                           ?>
                          <i class="fa fa-user" title="Penulis"> </i>
                        </span>
                         <input type="text" name="izin" value="<?php echo $nama; ?>" class="form-control" readonly>
                      </div>
                     
                       <?php 
                       include "konfirmasi.php";
                        ?>
                      <textarea class="textarea" name="syarat" placeholder="Silahkan tulis disini" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px;border: 1px solid #dddddd; padding: 10px;"></textarea>
                      <a href="syarat.php" class="btn btn-default" style="float: right; margin-left: 10px;"> Batal </a>
                      <button type="submit" name="inputsyarat" class="btn btn-info " style="float: right;">Simpan</button>
                    </form>
                  <?php
                  }
                  ?>
                </div>
                <div id="syarat" class="tab-pane fade">
                  <table id="table_syarat" class="table table-bordered table-striped" width="100%">
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>Tanggal syarat</th>
                      <th>Gambar</th>
                      <th>Judul syarat</th>
                      <th>Isi syarat</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no = 1;
                    $data = mysqli_query($koneksi,"select * from syarat");
                    while($datasyarat = mysqli_fetch_array($data))
                    {
                    ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo fungsi_tgl($datasyarat['tanggal']); ?></td>
                        <td><img src="syarat/<?php echo $datasyarat['gambar']; ?>" width="100px"></td>
                        <td><?php echo $datasyarat['judul_syarat']; ?></td>
                        <td><?php echo $datasyarat['deskripsi'];?></td>
                        <?php 

                        $status=$datasyarat['konfirmasi'];
                        if($status==1)
                        {
                          $konfirmasi="OK";
                        }
                        elseif($status==0)
                        {
                          $konfirmasi="Pending";
                        }
                        ?>
                        <td><?php echo $konfirmasi;?></td>
                        <td>
                          <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                              Action <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                              <li>
                                <a href="syarat.php?id=<?php echo $datasyarat['id_syarat']; ?>">Edit</a>
                              </li>
                              <?php 
                                 $login=$_SESSION['user'];
                                 if($login==6)
                                 {
                                  ?>
                                  <li>
                                <a href="syarat.php?id=<?php echo $datasyarat['id_syarat']; ?>">Konfirmasi</a>
                                </li>
                                <?php
                                 }
                               ?>
                              <li>
                                <a href="hapus.php?id_hapus=<?php echo $datasyarat['id_syarat']; ?>">Hapus</a>
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