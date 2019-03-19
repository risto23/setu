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
      <section>
      
    <div class="container">
      
            <div class="row justify-content-md-center gambar">
             <?php
             $kueri = mysqli_query($koneksi," SELECT * FROM Artikel ");
              while ($baris=mysqli_fetch_array($kueri)) {
                $gambar=$baris['gambar'];
                $judul=$baris['judul_artikel'];
                $isi=$baris['isi_artikel'];
                ?>
              <div class="col-md-3 mobile">
                  <div class="isi text-center">
                      <a href="artikel_detail.php?id=<?php $baris['id']; ?>" ><img src="admin/news/<?php echo $gambar ;?>" width="100px" class="img-responsive"> <h4><?php echo $judul;?></h4></a>
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
        
<section class=" video" style="margin:30px 0 80px 0;">
      <h3 class="text-center" style="padding:20px 0 10px 0; color:white;">Video Testimoni</h3>
        <div class="main-content">
        <div class="video-responsive">
           <iframe width="560" height="315" src="https://www.youtube.com/embed/wq7A1Iby__I" frameborder="0" allowfullscreen></iframe>
          </div>
         </div>
</section>        
      
<div class="sticky-footer">
    <div class="container">
    <div class="row text-center">
        <div class="col-md-4 footer">
         <h5>Alamat Kampus</h5>
             <ul class="anak"> 
                 <li><i class="fa fa-map-marker" aria-hidden="true"></i> Jl. Raya Puspiptek Serpong, Tangerang Selatan - Banten</li>
                 <li><i class="fa fa-phone" aria-hidden="true"></i>(021)7560542</li>
                 <li><i class="fa fa-phone" aria-hidden="true"></i>(021) 756054</li>
             </ul>
        </div>
        <div class="col-md-4 footer">
             <h5>Fasilitas</h5>
        <ul >
                    <li>Fasilitas Akademik</li>
                    <li>Fasilitas Kemahasiswaan</li>
                    <li>Fasilitas Umum</li>
                </ul>
        </div>
        <div class="col-md-4 footer">
        <h5>Kemahasiswaan</h5>
        <ul >
                    <li>DPKM</li>
                    <li>CDC</li>
                    <li>Beasiswa</li>
                    <li>Prestasi Mahasiswa</li>
                    <li>Kalender Akademik</li>
                    <li>Galeri</li>
                </ul>
        </div>
        <div class="col-md-12 copyright">
            <p>Hak Cipta &copy;Yes Man</p>
        </div>
           
    </div>  
      
    </div>
 </div>
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