<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
      <title>Pendafataran Online</title>
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
          
  <header>    
      <div id="test" class="container">       
          <div class="img-responsive" id="atas1">
              <img src="Images/iti-transp3.png" alt="institut teknologi indonesia">
          </div>       
          <div id="atas1">
          <h1>Institut Teknologi Indonesia</h1>
          </div>       
            <nav id="atas2">
            <div class="soscon" >           
                <ul>                    
                    <li> <a href="https://id-id.facebook.com/" target="_blank" > <i class="fa fa-sqaure fa-facebook  fa-1x"  ></i> </a> </li> 
                    <li><a href="https://twitter.com/login?lang=id" target="_blank" > <i class="fa fa-twitter fa-1x" ></i> </a> </li>
                    <li> <a href="https://plus.google.com/discover?hl=id" target="_blank" > <i class="fa fa-google-plus fa-1x"  ></i> </a> </li> 
                    <li> <a href="https://www.instagram.com/accounts/login/" target="_blank" > <i class="fa fa-instagram fa-1x"  ></i> </a> </li> 
                    </ul>              
                </div>
            </nav>
      </div> 
</header>
            
 <?php
 include "menu.php"; 
 ?>                 
<section class="form" style="margin: 40px 0 40px 0;">
    <div class="container">
        <h3 class="text-center" style="margin:50px 0 80px 0;">Pendaftaran Online</h3>
        <div class="respon-form row" >
          <div class="col-md-4">
            <div class="data-pribadi">
                <h5 class="text-center" style="margin-bottom: 40px;">Biodata Diri</h5>
              <label>Program Studi</label><br>
                <select name="studi" class="form-control gap" required>
                <option></option>
                <option>Teknik Industri</option>
                <option>Teknik Mesin</option>
                <option>Teknik Sipil</option>
                <option>Teknik Kimia</option>
                <option>Informatika</option>
                <option>Manajemen</option>
                <option>Elektronika</option>
                <option>Perencanaan Wilayah & Kota</option>
                <option>Otomotif</option>
                </select>
              <label>Program Pilihan</label> <br>
                <select name="program" class="form-control gap" required>
                <option></option>
                <option>Regular</option>
                <option>P2k</option>
                </select>
              <label>Nama Lengkap</label><br>
                <input type="text" class="form-control gap" placeholder="Isi Nama Lengkap anda" required>
              <label>Tempat Lahir</label><br>
                <input type="text" class="form-control gap" required>
              <label>Tanggal Lahir</label><br>
                <input type="date" class="form-control gap" required>
              <label>Alamat Lengkap</label><br>
                <textarea class="form-control gap" rows="5" required></textarea>
              <label>Jenis Kelamin</label><br>
                <select name="gender" class="form-control gap" required>
                <option></option>
                <option>Laki - Laki</option>
                <option>Perempuan</option>
                </select>
              <label>Agama</label><br>
                <select name="agama" class="form-control gap" required>
                <option></option>
                <option>Islam</option>
                <option>Kristen</option>
                <option>Protestan</option>
                <option>Hindu</option>
                <option>Budha</option>
                </select>
              <label>Handphone</label><br>
                <input type="tel" class="form-control gap" required>
              <label>Email</label><br>
                <input type="email" class="form-control gap" required>
              </div>
            </div>
          
          <div class="col-md-4">
              <div class="sekolah">
              <h5 class="text-center">Data Sekolah</h5>
              <label>Nama Sekolah Asal</label>
                  <input type="text" class="form-control gap" required>
              <label>Alamat Sekolah</label><br>
                  <textarea class="form-control gap" rows="5" required></textarea>
              <label>Provinsi Sekolah Asal</label><br>
                  <input type="text" class="form-control gap" required>
              <label>Jenis Sekolah</label><br>
                  <select name="jenis" class="form-control gap" required>
                  <option></option>
                  <option>SMA/SMU</option>
                  <option>SMK/Kejuruan</option>
                  </select>
               <label>Jurusan</label> <br>
                  <select name="jurusan" class="form-control gap" required>
                  <option></option>
                  <option>SMA IPA</option>
                  <option>SMA IPS</option>
                  <option>SMA Bahasa</option>
                  <option>SMK Teknik</option>
                  <option>SMK Pertanian</option>
                  </select>
              <label>Tahun Lulus</label><br>
                  <input type="text" class="form-control gap" required>
              <label>Nilai Nem</label><br>
                  <input type="text" class="form-control gap" required>
              <label>No.Ijazah</label><br>
                  <input type="text" class="form-control gap" required>
                  
              <label>Prestasi yang diraih</label>
                  <textarea class="form-control gap" rows="5" required></textarea>
              </div>
            </div>
        
            <div class="col-md-4">
            <div class="data-ortu">
                <h5 class="text-center">Data Orang Tua</h5>
                <label>Nama Ayah</label><br>
                    <input type="text" class="form-control gap" required>
                <label>Tanggal Lahir Ayah</label><br>
                    <input type="date" class="form-control gap" required>
                <label>Pekerjaan Ayah</label><br>
                    <input type="text" class="form-control gap" required>
                <label>Handphone Ayah</label><br>
                    <input type="tel" class="form-control gap" required>
                <label>Nama Ibu</label><br>
                    <input type="text" class="form-control gap" required>
                <label>Tanggal Lahir Ibu</label><br>
                    <input type="date" class="form-control gap" required>
                <label>Pekerjaan Ibu</label><br>
                    <input type="text" class="form-control gap" required>
                <label>Handphone Ibu</label><br>
                    <input type="tel" class="form-control gap" required>
                <label>Alamat Orang Tua</label><br>
                    <textarea class="form-control gap" rows="5" required></textarea>
                <label>Penghasilan Orang Tua</label><br>
                    <select name="gaji" class="form-control gap" required>
                <option></option>
                <option> <2 Juta </option>
                <option> 2 Juta - 5 Juta</option>
                <option> 5 Juta - 10 Juta</option>
                <option> >10 Juta</option>
                </select>
                </div>
            </div>
            <div class="col-md-12">
            <button class="btn-form" type="submit" name="kirim" value="Daftar">Submit</button>
            <button class="btn-form" type="submit" name="kirim" value="Daftar">Reset</button>
            </div>
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
  </body>
</html>