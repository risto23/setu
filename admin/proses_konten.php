<?php

include "fungsi/config.php";

if(isset($_POST['inputkonten']))
{
	$judul_konten = $_POST['judul_konten'];
	$date_konten = $_POST['date_konten'];
	$id_login = $_POST['id_login'];
	$konten =  addslashes($_POST['konten']);

	$data = mysqli_query($koneksi,"insert into konten (judul_konten,tanggal,id_login,deskripsi) values ('$judul_konten','$date_konten','$id_login','$konten')");

	if ($data)
	{
		$last_id = mysqli_insert_id($koneksi)
		$url="post/".$last_id;
		$konten=$judul_konten;

		$query = mysqli_query($koneksi,"insert into menu_konten (konten_menu,url,id_konten) values ('$konten','$url','$last_id')");
		if ($query) {
			echo"<script> alert('konten 1 Berhasil Diinput') ; window.location.href='content.php'; </script>";
		}
		else
		{
			echo"<script> alert('konten Berhasil Diinput') ; window.location.href='content.php'; </script>";
		}
		
	}
	else {
		echo"<script> alert('konten Gagal Diinput, Silahkan ulangi lagi') ; window.location.href='content.php'; </script>";
	}
}
else if(isset($_POST['editkonten']))
{
	
	$judul_konten = $_POST['judul_konten'];
	$date_konten = $_POST['date_konten'];
	$id_login = $_POST['id_login'];
	$konten = addslashes ( $_POST['konten']);
	$id_konten = $_POST['id_konten'];


		$data = mysqli_query($koneksi,"update konten set judul_konten ='$judul_konten', tanggal='$date_konten', id_login='$id_login', deskripsi ='$konten' where id_konten ='$id_konten'");
		if ($data)
		{
			echo"<script> alert('konten Berhasil Diinput') ; window.location.href='content.php'; </script>";
		}
		else {
			echo"<script> alert('konten Gagal Diinput, Silahkan ulangi lagi1') ; window.location.href='content.php'; </script>";
		}
	
	
}
else if (isset($_GET['id_hapus']))
{
	$id = $_GET['id_hapus'];
	$proses = mysqli_query($koneksi,"delete from konten where id_konten = '$id'");
		if($proses)
		{
			unlink("konten/$foto");
			echo"<script> alert('konten Berhasil Dihapus') ; window.location.href='content.php'; </script>";
		}
		
	else {
		echo"<script> alert('konten Gagal Dihapus, Silahkan Ulangi') ; window.location.href='content.php'; </script>";
	}
}

