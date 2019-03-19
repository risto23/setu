<?php
include ('fungsi/config.php');
$id_hapus=$_GET['id'];
$sql="DELETE FROM artikel WHERE id='$id_hapus'";
$Result=mysqli_query($koneksi,$sql);
header("location: form_edit_berita.php");
?> 