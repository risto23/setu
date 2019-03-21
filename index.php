<?php
include ('admin/fungsi/config.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
      <title>Beranda</title>
      <link rel="icon" type="image" href="Images/icon.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
      <!--Font Bootstrap-->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel=" stylesheet">
    <!--Menghubungkan Css-->
    <link href="css/style.css" rel="stylesheet" type="text/css">
  </head>
    
<body>
         

 <?php
 include "header.php";
include "menu.php";
 ?>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100 img-responsive" src="Images/upload5.jpg" alt="First slide">
         <!--<div class="carousel-caption d-none d-md-block">
             <p>Kunjungan yang dilakukan ITI</p>
             </div>-->
    </div>
    <div class="carousel-item">
      <img class="d-block w-100 img-responsive" src="Images/upload41.jpg" alt="Second slide" style="height : 100%;">
         <!--<div class="carousel-caption d-none d-md-block">
             <p>Kunjungan yang dilakukan ITI</p>
             </div>-->
    </div>
    <div class="carousel-item">
      <img class="d-block w-100 img-responsive" src="Images/kunjungan%20(2).jpg" alt="Third slide">
        <!--<div class="carousel-caption d-none d-md-block">
            <p>Kunjungan yang dilakukan ITI</p>
            </div>-->
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>  

      
      <!-- Berita Kampus -->
     <!-- Berita Kampus -->
      <section>
      
    <div class="container">
      
            <div class="row justify-content-md-center gambar">
             <?php
             $kueri = mysqli_query($koneksi," SELECT * FROM Artikel where konfirmasi='1' ");
              while ($baris=mysqli_fetch_array($kueri)) {
                $gambar=$baris['gambar'];
                $judul=$baris['judul_artikel'];
                $isi=$baris['isi_artikel'];
                ?>
              <div class="col-md-3 mobile">
                  <div class="isi text-center">
                      <a href="artikel_detail.php?id=<?php echo $baris['id']; ?>" ><img src="admin/news/<?php echo $gambar ;?>" width="100px" class="img-responsive"> <h4><?php echo $judul;?></h4></a>
                      <div>
                     <?php
                     echo substr($isi, 0,100);
                      ?>
                      </div>
                  </div>
                </div>
               
                <?php 
              }
                ?>   
                </div>

                </div>
</section>
                        

<section style="margin:30px 0 80px 0;">
      <h3 class="text-center" style="padding:20px 0 10px 0; color:black;">Video Testimoni</h3>
        <div class="main-content">
        <div class="video-responsive">
           <iframe width="560" height="315" src="https://www.youtube.com/embed/wq7A1Iby__I" frameborder="0" allowfullscreen></iframe>
          </div>
         </div>
</section>        
 
<!-- SECTION -->
<div class="section" style="padding-top:0; margin-top:0;">
      <!-- CONTAINER -->
      <div class="container">
        <!-- ROW -->
        <div class="row">
          <!-- Main Column -->
          <div class="col-md-12">
            <!-- row -->
            <div class="row">
              <!-- Column 1 -->
              <div class="col-md-4 col-sm-4 col-lg-4">
                <!-- section title -->
                <div class="section-title">
                  <h2 class="title" ">PELAYANAN ONLINE</h2>
                </div>
                <!-- /section title -->
                <div class="container" style="margin-left: 1em;">
                  <div class="row">
<div class="col-md-6 text-left " style="padding: .5em; ">
  <i class="fa fa-address-card-o"></i>&nbsp;&nbsp;&nbsp;<a href="http://siakcapil.tangerangselatankota.go.id/" target="_blank">PENCATATAN SIPIL</a>
</div>
<div class="col-md-6 text-left " style="padding: .5em; ">
  <i class="fa fa-institution"></i>&nbsp;&nbsp;&nbsp;<a href="https://simponie.tangerangselatankota.go.id/" target="_blank">PERIZINAN</a>
</div>
<div class="col-md-6 text-left" style="padding: .5em; ">
  <i class="fa fa-legal"></i>&nbsp;&nbsp;&nbsp;<a href="http://jdih.tangerangselatankota.go.id/" target="_blank">INFO PRODUK HUKUM</a>
</div>
<div class="col-md-6 text-left " style="padding: .5em; ">
  <i class="fa fa-percent"></i>&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://pbb-bphtb.tangerangselatankota.go.id/pbb-pelayanan/" target="_blank">PBB</a>
</div>

                  </div>
                </div>
              </div>

<div class="col-md-4 col-sm-4 col-lg-4">
                <!-- section title -->
                <div class="section-title">
                  <h2 class="title"">PUBLIKASI</h2>
                </div>
                <!-- /section title -->
                Artikel Belum Tersedia ...                            
            </div>
<div class="col-md-4 col-sm-4 col-lg-4">
                <!-- section title -->
                <div class="section-title">
                  <h2 class="title" ">PENGUMUMAN</h2>
                </div>
                <!-- /section title -->
                Artikel Belum Tersedia ...                            
            </div>
            <!-- /row -->
            
          </div>
          <!-- /Main Column -->
          
                  </div>
        <!-- /ROW -->
      </div>
      <!-- /CONTAINER -->
    </div>
    <!-- /SECTION -->      
      
<?php 
include "footer.php";
 ?>
<!-- footer -->
  <!--/footer-->
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <script>document.write('<script src="http://' + (location.host || '${1:localhost}').split(':')[0] + ':${2:35729}/livereload.js?snipver=1"></' + 'script>')</script>

</body>
</html>