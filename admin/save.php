<?php
include ('fungsi/config.php');
$id=$_POST['id_artikel'];
$judul=$_POST['judul'];
$isi=$_POST['isi_artikel'];

echo $id;
echo $judul;
echo $isi;
$sql="Update ARTIKEL set judul_artikel='$judul',isi_artikel='$isi' Where id='$id'";
$Result=mysqli_query($koneksi,$sql);
header("location: form_edit_berita.php");
?> 