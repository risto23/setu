<?php
include "fungsi/config.php";

if(isset($_POST['inputpengumuman']))
{
	$date_pengumuman = $_POST['date_pengumuman'];
	$id_login = $_POST['id_login'];
	$judul_pengumuman = $_POST['judul_pengumuman'];
	$pdf_pengumuman = $_FILES['pdf_pengumuman']['name'];


	$data = mysqli_query($koneksi,"insert into Pengumuman (date_pengumuman,id_login,judul_pengumuman,pdf_pengumuman) values ('$date_pengumuman','$id_login','$judul_pengumuman','$pdf_pengumuman')");
	if($data)
	{
		move_uploaded_file($_FILES['pdf_pengumuman']['tmp_name'], "news/pdf/".$_FILES['pdf_pengumuman']['name']);
		echo"<script> alert('Data Berhasil Diinput') ; window.location.href='pengumuman.php'; </script>";
	}
	else {
		echo"<script> alert('Data Gagal Diinput, Silahkan ulangi lagi') ; window.location.href='pengumuman.php'; </script>";
	}
}
else if (isset($_POST['editpengumuman']))
{
	$date_pengumuman = $_POST['date_pengumuman'];
	$id_login = $_POST['id_login'];
	$judul_pengumuman = $_POST['judul_pengumuman'];
	$pdf_pengumuman = $_FILES['pdf_pengumuman']['name'];
	$id_pengumuman = $_POST['id_pengumuman'];
	$pdf_pengumuman_old = $_POST['pdf_pengumuman_old'];

	if(!empty($pdf_pengumuman))
	{
		$data = mysqli_query($koneksi,"update Pengumuman set date_pengumuman='$date_pengumuman', id_login='$id_login',judul_pengumuman='$judul_pengumuman',pdf_pengumuman='$pdf_pengumuman' where id_pengumuman ='$id_pengumuman'");
		if ($data)
		{
			unlink("news/pdf/$pdf_pengumuman_old");
			move_uploaded_file($_FILES['pdf_pengumuman']['tmp_name'], "news/pdf/".$_FILES['pdf_pengumuman']['name']);
			echo"<script> alert('Data Berhasil Diinput') ; window.location.href='pengumuman.php'; </script>";
		}
		else {
			echo"<script> alert('Data Gagal Diinput, Silahkan ulangi lagi') ; window.location.href='pengumuman.php'; </script>";
		}	
	}
	else {
		$data = mysqli_query($koneksi,"update Pengumuman set date_pengumuman='$date_pengumuman', id_login='$id_login',judul_pengumuman='$judul_pengumuman' where id_pengumuman ='$id_pengumuman'");
		if ($data)
		{
			echo"<script> alert('Data Berhasil Diinput') ; window.location.href='pengumuman.php' </script>";
		}
		else {
			echo"<script> alert('Data Gagal Diinput, Silahkan ulangi lagi') ; window.location.href='pengumuman.php'; </script>";
		}
	}
}
else if (isset($_GET['id']))
{
	$id = $_GET['id'];
	$data = mysqli_query($koneksi,"select * from Pengumuman where id_pengumuman ='$id'");
	while ($datapdf = mysqli_fetch_array($data)) {
		$pdf = $datapdf['pdf_pengumuman'];
	}
	$hapusdata= mysqli_query($koneksi,"delete from Pengumuman where id_pengumuman = '$id'");

	if($hapusdata)
	{
		unlink("news/pdf/$pdf");
		echo"<script> alert('Data Berhasil Dihapus') ; window.location.href='pengumuman.php'; </script>";
	}
	else
	{
		echo"<script> alert('Data Gagal Dihapus, Silahkan ulangi lagi') ; window.location.href='pengumuman.php'; </script>";
	}
}
?>