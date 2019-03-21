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
         
<header>
       <?php
      include "header.php";
      ?>
</header>
           
 <?php
include "menu.php";
 ?>
 
<section class="isi-softskill">
      <div class="container">
      <?php 
 $id_artikel=$_GET['id'];
 $sql=mysqli_query($koneksi,"select * from Artikel where id='$id_artikel'");
 while($row=mysqli_fetch_array($sql))
 {
  $judul=$row['judul_artikel'];
  $isi=$row['isi_artikel'];
  $gambar=$row['gambar'];
 ?>
          <h3 class="text-center  " style="margin:50px 0 80px 0;"><?php echo $judul; ?></h3>

          <div class="row justify-content-md-center">
             <img src="admin/news/<?php echo $gambar; ?>" align="left" height="500px">
          <div class="col-md-12">
           
          <p class=" text-justify">
          <?php
          echo $isi;
          ?>
            </p>
             
          </div>
        </div>  
        <?php 
      }
        ?>     
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

</body>
</html>