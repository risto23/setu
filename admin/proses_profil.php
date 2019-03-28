<?php

include "fungsi/config.php";

if(isset($_POST['inputprofil']))
{
	$img_profil = $_FILES['img_profil']['name'];
	$judul_profil = $_POST['judul_profil'];
	$date_profil = $_POST['date_profil'];
	$id_login = $_POST['id_login'];
	$profil =  $_POST['profil'];

	$data = mysqli_query($koneksi,"insert into profil (gambar,judul_profil,tanggal,id_login,deskripsi) values ('$img_profil','$judul_profil','$date_profil','$id_login','$profil')");

	if ($data)
	{
		move_uploaded_file($_FILES['img_profil']['tmp_name'], "profil/".$_FILES['img_profil']['name']);
		echo"<script> alert('profil Berhasil Diinput') ; window.location.href='profil.php'; </script>";
	}
	else {
		echo"<script> alert('profil Gagal Diinput, Silahkan ulangi lagi') ; window.location.href='profil.php'; </script>";
	}
}
else if(isset($_POST['editprofil']))
{
	$img_profil = $_FILES['img_profil']['name'];
	$img_profil_old = $_POST['img_profil_old'];
	$judul_profil = $_POST['judul_profil'];
	$date_profil = $_POST['date_profil'];
	$id_login = $_POST['id_login'];
	$profil =  $_POST['profil'];
	$id_profil = $_POST['id_profil'];

	if(!empty($img_profil))
	{
		$data = mysqli_query($koneksi,"UPDATE profil SET id_login='$id_login',judul_profil='$judul_profil',gambar='$img_profil',deskripsi='$profil',tanggal='$date_profil', WHERE id_profil='$id_profil'");
		if ($data)
		{
			unlink("profil/$img_profil_old");
			move_uploaded_file($_FILES['img_profil']['tmp_name'], "profil/".$_FILES['img_profil']['name']);
			echo"<script> alert('profil Berhasil Diinput') ; window.location.href='profil.php'; </script>";
		}
		else {
			echo"<script> alert('profil Gagal Diinput, Silahkan ulangi lagi') ; window.location.href='profil.php'; </script>";
		}	
	}
	else {
		$data = mysqli_query($koneksi,"update profil set judul_profil ='$judul_profil', tanggal='$date_profil', id_login='$id_login', deskripsi ='$profil' where id_profil ='$id_profil'");
		if ($data)
		{
			echo"<script> alert('profil Berhasil Diinput') ; window.location.href='profil.php'; </script>";
		}
		else {
			echo"<script> alert('profil Gagal Diinput, Silahkan ulangi lagi1') ; window.location.href='profil.php'; </script>";
		}
	}
	
}
else if (isset($_GET['id_hapus']))
{
	$id = $_GET['id_hapus'];
	$data = mysqli_query($koneksi,"select * from profil where id_profil = '$id'");
	while ($hasil = mysqli_fetch_array($data))
	{
		$foto = $hasil['img_profil'];
	}
	if($foto)
	{
		$proses = mysqli_query($koneksi,"delete from profil where id_profil = '$id'");
		if($proses)
		{
			unlink("profil/$foto");
			echo"<script> alert('profil Berhasil Dihapus') ; window.location.href='profil.php'; </script>";
		}
		else {
			echo"<script> alert('profil Gagal Dihapus, Silahkan Ulangi') ; window.location.href='profil.php'; </script>";
		}
	}
	else {
		echo"<script> alert('profil Gagal Dihapus, Silahkan Ulangi') ; window.location.href='profil.php'; </script>";
	}
}

