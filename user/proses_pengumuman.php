<?php
include "fungsi/config.php";

$id=$_POST['id'];
$sql=mysqli_query($koneksi,"select * from Pengumuman where id='$id");
$data=mysqli_fetch_array($sql){
	$pdf=$data['file'];
		if ($data)
		{
			unlink("news/pdf/$pdf");
			echo"<script> alert('Data Berhasil Didownload') ; window.location.href='pengumuman.php'; </script>";
		}
		else {
			echo"<script> alert('Data Gagal Didownload, Silahkan ulangi lagi') ; window.location.href='pengumuman.php'; </script>";
		}	
	}
?>