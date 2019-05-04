<?php 
include ('admin/fungsi/config.php');
?>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color:#37474F; color:white">
    <div class="container">
        
        <button  class="text-white navbar-toggler" type="text-white button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="text-white navbar-toggler-icon" ></span>
            
        </button>
      <div class="text-white collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item ">
            <a class="nav-link" href="index.php">Beranda</a>
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Profil
            </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="profil.php">Profil Kelurahan</a>
           <a class="dropdown-item" href="visimisi.php">Visi & Misi</a>
          <a class="dropdown-item" href="struktur.php">Struktur Organisasi</a>
           <a class="dropdown-item" href="kontak.php">Kontak</a>
          
        </div>
            </li>
<?php 
 $sql=mysqli_query($koneksi,"select * from menu ");
 while($row=mysqli_fetch_array($sql))
 {
  $menu=$row['menu_utama'];
  $url=$row['url'];
  
 ?> 
            <li class="nav-item ">
            <a class="nav-link" href=<?php echo "$url"; ?>><?php echo "$menu"; ?></a>
            </li>

           
<?php 
}
?>
         <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Kelurahan
            </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="profil.php">Profil Kelurahan</a>
           <a class="dropdown-item" href="visimisi.php">Visi & Misi</a>
          <a class="dropdown-item" href="struktur.php">Struktur Organisasi</a>
           <a class="dropdown-item" href="kontak.php">Kontak</a>
          
        </div>
            </li>
        </ul>
     </div>
  </div>
</nav>
      

      
      