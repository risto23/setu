<?php

include "fungsi/config.php";

if(isset($_POST['inputnews']))
{
	$img_news = $_FILES['img_news']['name'];
	$judul_news = $_POST['judul_news'];
	$date_news = $_POST['date_news'];
	$id_login = $_POST['id_login'];
	$news =  $_POST['news'];

	$data = mysqli_query($koneksi,"insert into Artikel (gambar,judul_artikel,tanggal,id_login,isi_artikel) values ('$img_news','$judul_news','$date_news','$id_login','$news')");

	if ($data)
	{
		move_uploaded_file($_FILES['img_news']['tmp_name'], "news/".$_FILES['img_news']['name']);
		echo"<script> alert('Berita Berhasil Diinput') ; window.location.href='form_edit_berita.php.php'; </script>";
	}
	else {
		echo"<script> alert('Berita Gagal Diinput, Silahkan ulangi lagi') ; window.location.href='form_edit_berita.php.php'; </script>";
	}
}
else if(isset($_POST['id']))
{
	$img_news = $_FILES['img_news']['name'];
	$img_news_old = $_POST['img_news_old'];
	$judul_news = $_POST['judul_news'];
	$date_news = $_POST['date_news'];
	$id_login = $_POST['id_login'];
	$news =  $_POST['news'];
	$id_news = $_POST['id_news'];

	if(!empty($img_news))
	{
		$data = mysqli_query($koneksi,"update Artikel set judul_artikel ='$judul_news', isi_artikel ='$news', gambar='$img_news' , tanggal='$date_news', id_login='$id_login'  where id ='$id_news'");
		if ($data)
		{
			unlink("news/$img_news_old");
			move_uploaded_file($_FILES['img_news']['tmp_name'], "news/".$_FILES['img_news']['name']);
			echo"<script> alert('Berita Berhasil Diinput') ; window.location.href='form_edit_berita.php'; </script>";
		}
		else {
			echo"<script> alert('Berita Gagal Diinput, Silahkan ulangi lagi') ; window.location.href='form_edit_berita.php'; </script>";
		}	
	}
	else {
		$data = mysqli_query($koneksi,"update Artikel set judul_news ='$judul_news', date_news='$date_news', id_login='$id_login', news ='$news' where id ='$id_news'");
		if ($data)
		{
			echo"<script> alert('Berita Berhasil Diinput') ; window.location.href='form_edit_berita.php'; </script>";
		}
		else {
			echo"<script> alert('Berita Gagal Diinput, Silahkan ulangi lagi') ; window.location.href='form_edit_berita.php'; </script>";
		}
	}
	
}
else if (isset($_GET['id_hapus']))
{
	$id = $_GET['id_hapus'];
	$data = mysqli_query($koneksi,"select * from Artikel where id = '$id'");
	while ($hasil = mysqli_fetch_array($data))
	{
		$foto = $hasil['img_news'];
	}
	if($foto)
	{
		$proses = mysqli_query($koneksi,"delete from Artikel where id = '$id'");
		if($proses)
		{
			unlink("news/$foto");
			echo"<script> alert('Berita Berhasil Dihapus') ; window.location.href='form_edit_berita.php'; </script>";
		}
		else {
			echo"<script> alert('Berita Gagal Dihapus, Silahkan Ulangi') ; window.location.href='form_edit_berita.php'; </script>";
		}
	}
	else {
		echo"<script> alert('Berita Gagal Dihapus, Silahkan Ulangi') ; window.location.href='form_edit_berita.php'; </script>";
	}
}

