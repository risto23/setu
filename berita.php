<?php
include ('admin/fungsi/config.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
      <title>Berita</title>
      <link rel="icon" type="image" href="Images/icon.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">   
      <!--Font Bootstrap-->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel=" stylesheet">  
    <link href="css/style.css" rel="stylesheet">   
  </head>
    
  <body>
      
   <?php
 include "header.php";
include "menu.php";
 ?>      
 <section>
      
    <div class="container">
       <h3 class="text-center" style="padding:20px 0 10px 0; color:black;">Berita</h3>
            <div class="row justify-content-lg-center gambar">
             <?php
             $kueri = mysqli_query($koneksi," SELECT * FROM Artikel where konfirmasi='1' ");
              while ($baris=mysqli_fetch_array($kueri)) {
                $gambar=$baris['gambar'];
                $judul=$baris['judul_artikel'];
                $isi=$baris['deskripsi'];
                ?>
              <div class="col-md-3 mobile">
                  <div class="isi text-center">
                      <a href="artikel_detail.php?id=<?php echo $baris['id_artikel']; ?>" ><img src="admin/artikel/<?php echo $gambar ;?>" width="100px" class="img-responsive"> <h4><?php echo $judul;?></h4></a>
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
                 
        

<?php 
include "footer.php"
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