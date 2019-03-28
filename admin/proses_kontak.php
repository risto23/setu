<?php

include "fungsi/config.php";

if(isset($_POST['inputkontak']))
{
	$img_kontak = $_FILES['img_kontak']['name'];
	$judul_kontak = $_POST['judul_kontak'];
	$date_kontak = $_POST['date_kontak'];
	$id_login = $_POST['id_login'];
	$kontak =  $_POST['kontak'];

	$data = mysqli_query($koneksi,"insert into kontak (gambar,judul_kontak,tanggal,id_login,deskripsi) values ('$img_kontak','$judul_kontak','$date_kontak','$id_login','$kontak')");

	if ($data)
	{
		move_uploaded_file($_FILES['img_kontak']['tmp_name'], "kontak/".$_FILES['img_kontak']['name']);
		echo"<script> alert('kontak Berhasil Diinput') ; window.location.href='kontak.php'; </script>";
	}
	else {
		echo"<script> alert('kontak Gagal Diinput, Silahkan ulangi lagi') ; window.location.href='kontak.php'; </script>";
	}
}
else if(isset($_POST['editkontak']))
{
	$img_kontak = $_FILES['img_kontak']['name'];
	$img_kontak_old = $_POST['img_kontak_old'];
	$judul_kontak = $_POST['judul_kontak'];
	$date_kontak = $_POST['date_kontak'];
	$id_login = $_POST['id_login'];
	$kontak =  $_POST['kontak'];
	$id_kontak = $_POST['id_kontak'];

	if(!empty($img_kontak))
	{
		$data = mysqli_query($koneksi,"UPDATE kontak SET id_login='$id_login',judul_kontak='$judul_kontak',gambar='$img_kontak',deskripsi='$kontak',tanggal='$date_kontak', WHERE id_kontak='$id_kontak'");
		if ($data)
		{
			unlink("kontak/$img_kontak_old");
			move_uploaded_file($_FILES['img_kontak']['tmp_name'], "kontak/".$_FILES['img_kontak']['name']);
			echo"<script> alert('kontak Berhasil Diinput') ; window.location.href='kontak.php'; </script>";
		}
		else {
			echo"<script> alert('kontak Gagal Diinput, Silahkan ulangi lagi') ; window.location.href='kontak.php'; </script>";
		}	
	}
	else {
		$data = mysqli_query($koneksi,"update kontak set judul_kontak ='$judul_kontak', tanggal='$date_kontak', id_login='$id_login', deskripsi ='$kontak' where id_kontak ='$id_kontak'");
		if ($data)
		{
			echo"<script> alert('kontak Berhasil Diinput') ; window.location.href='kontak.php'; </script>";
		}
		else {
			echo"<script> alert('kontak Gagal Diinput, Silahkan ulangi lagi1') ; window.location.href='kontak.php'; </script>";
		}
	}
	
}
else if (isset($_GET['id_hapus']))
{
	$id = $_GET['id_hapus'];
	$data = mysqli_query($koneksi,"select * from kontak where id_kontak = '$id'");
	while ($hasil = mysqli_fetch_array($data))
	{
		$foto = $hasil['img_kontak'];
	}
	if($foto)
	{
		$proses = mysqli_query($koneksi,"delete from kontak where id_kontak = '$id'");
		if($proses)
		{
			unlink("kontak/$foto");
			echo"<script> alert('kontak Berhasil Dihapus') ; window.location.href='kontak.php'; </script>";
		}
		else {
			echo"<script> alert('kontak Gagal Dihapus, Silahkan Ulangi') ; window.location.href='kontak.php'; </script>";
		}
	}
	else {
		echo"<script> alert('kontak Gagal Dihapus, Silahkan Ulangi') ; window.location.href='kontak.php'; </script>";
	}
}

