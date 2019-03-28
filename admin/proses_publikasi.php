<?php

include "fungsi/config.php";

if(isset($_POST['inputpublikasi']))
{
	$img_publikasi = $_FILES['img_publikasi']['name'];
	$judul_publikasi = $_POST['judul_publikasi'];
	$date_publikasi = $_POST['date_publikasi'];
	$id_login = $_POST['id_login'];
	$publikasi =  $_POST['publikasi'];

	$data = mysqli_query($koneksi,"insert into publikasi (gambar,judul_publikasi,tanggal,id_login,deskripsi) values ('$img_publikasi','$judul_publikasi','$date_publikasi','$id_login','$publikasi')");

	if ($data)
	{
		move_uploaded_file($_FILES['img_publikasi']['tmp_name'], "publikasi/".$_FILES['img_publikasi']['name']);
		echo"<script> alert('publikasi Berhasil Diinput') ; window.location.href='publikasi.php'; </script>";
	}
	else {
		echo"<script> alert('publikasi Gagal Diinput, Silahkan ulangi lagi') ; window.location.href='publikasi.php'; </script>";
	}
}
else if(isset($_POST['editpublikasi']))
{
	$img_publikasi = $_FILES['img_publikasi']['name'];
	$img_publikasi_old = $_POST['img_publikasi_old'];
	$judul_publikasi = $_POST['judul_publikasi'];
	$date_publikasi = $_POST['date_publikasi'];
	$id_login = $_POST['id_login'];
	$publikasi =  $_POST['publikasi'];
	$id_publikasi = $_POST['id_publikasi'];

	if(!empty($img_publikasi))
	{
		$data = mysqli_query($koneksi,"UPDATE publikasi SET id_login='$id_login',judul_publikasi='$judul_publikasi',gambar='$img_publikasi',deskripsi='$publikasi',tanggal='$date_publikasi', WHERE id_publikasi='$id_publikasi'");
		if ($data)
		{
			unlink("publikasi/$img_publikasi_old");
			move_uploaded_file($_FILES['img_publikasi']['tmp_name'], "publikasi/".$_FILES['img_publikasi']['name']);
			echo"<script> alert('publikasi Berhasil Diinput') ; window.location.href='publikasi.php'; </script>";
		}
		else {
			echo"<script> alert('publikasi Gagal Diinput, Silahkan ulangi lagi') ; window.location.href='publikasi.php'; </script>";
		}	
	}
	else {
		$data = mysqli_query($koneksi,"update publikasi set judul_publikasi ='$judul_publikasi', tanggal='$date_publikasi', id_login='$id_login', deskripsi ='$publikasi' where id_publikasi ='$id_publikasi'");
		if ($data)
		{
			echo"<script> alert('publikasi Berhasil Diinput') ; window.location.href='publikasi.php'; </script>";
		}
		else {
			echo"<script> alert('publikasi Gagal Diinput, Silahkan ulangi lagi1') ; window.location.href='publikasi.php'; </script>";
		}
	}
	
}
else if (isset($_GET['id_hapus']))
{
	$id = $_GET['id_hapus'];
	$data = mysqli_query($koneksi,"select * from publikasi where id_publikasi = '$id'");
	while ($hasil = mysqli_fetch_array($data))
	{
		$foto = $hasil['img_publikasi'];
	}
	if($foto)
	{
		$proses = mysqli_query($koneksi,"delete from publikasi where id_publikasi = '$id'");
		if($proses)
		{
			unlink("publikasi/$foto");
			echo"<script> alert('publikasi Berhasil Dihapus') ; window.location.href='publikasi.php'; </script>";
		}
		else {
			echo"<script> alert('publikasi Gagal Dihapus, Silahkan Ulangi') ; window.location.href='publikasi.php'; </script>";
		}
	}
	else {
		echo"<script> alert('publikasi Gagal Dihapus, Silahkan Ulangi') ; window.location.href='publikasi.php'; </script>";
	}
}

