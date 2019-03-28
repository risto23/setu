<?php

include "fungsi/config.php";

if(isset($_POST['inputartikel']))
{
	$img_artikel = $_FILES['img_artikel']['name'];
	$judul_artikel = $_POST['judul_artikel'];
	$date_artikel = $_POST['date_artikel'];
	$id_login = $_POST['id_login'];
	$artikel =  $_POST['artikel'];

	$data = mysqli_query($koneksi,"insert into artikel (gambar,judul_artikel,tanggal,id_login,deskripsi) values ('$img_artikel','$judul_artikel','$date_artikel','$id_login','$artikel')");

	if ($data)
	{
		move_uploaded_file($_FILES['img_artikel']['tmp_name'], "artikel/".$_FILES['img_artikel']['name']);
		echo"<script> alert('artikel Berhasil Diinput') ; window.location.href='artikel.php'; </script>";
	}
	else {
		echo"<script> alert('artikel Gagal Diinput, Silahkan ulangi lagi') ; window.location.href='artikel.php'; </script>";
	}
}
else if(isset($_POST['editartikel']))
{
	$img_artikel = $_FILES['img_artikel']['name'];
	$img_artikel_old = $_POST['img_artikel_old'];
	$judul_artikel = $_POST['judul_artikel'];
	$date_artikel = $_POST['date_artikel'];
	$id_login = $_POST['id_login'];
	$artikel =  $_POST['artikel'];
	$id_artikel = $_POST['id_artikel'];

	if(!empty($img_artikel))
	{
		$data = mysqli_query($koneksi,"UPDATE artikel SET id_login='$id_login',judul_artikel='$judul_artikel',gambar='$img_artikel',deskripsi='$artikel',tanggal='$date_artikel', WHERE id_artikel='$id_artikel'");
		if ($data)
		{
			unlink("artikel/$img_artikel_old");
			move_uploaded_file($_FILES['img_artikel']['tmp_name'], "artikel/".$_FILES['img_artikel']['name']);
			echo"<script> alert('artikel Berhasil Diinput') ; window.location.href='artikel.php'; </script>";
		}
		else {
			echo"<script> alert('artikel Gagal Diinput, Silahkan ulangi lagi') ; window.location.href='artikel.php'; </script>";
		}	
	}
	else {
		$data = mysqli_query($koneksi,"update artikel set judul_artikel ='$judul_artikel', tanggal='$date_artikel', id_login='$id_login', deskripsi ='$artikel' where id_artikel ='$id_artikel'");
		if ($data)
		{
			echo"<script> alert('artikel Berhasil Diinput') ; window.location.href='artikel.php'; </script>";
		}
		else {
			echo"<script> alert('artikel Gagal Diinput, Silahkan ulangi lagi1') ; window.location.href='artikel.php'; </script>";
		}
	}
	
}
else if (isset($_GET['id_hapus']))
{
	$id = $_GET['id_hapus'];
	$data = mysqli_query($koneksi,"select * from artikel where id_artikel = '$id'");
	while ($hasil = mysqli_fetch_array($data))
	{
		$foto = $hasil['img_artikel'];
	}
	if($foto)
	{
		$proses = mysqli_query($koneksi,"delete from artikel where id_artikel = '$id'");
		if($proses)
		{
			unlink("artikel/$foto");
			echo"<script> alert('artikel Berhasil Dihapus') ; window.location.href='artikel.php'; </script>";
		}
		else {
			echo"<script> alert('artikel Gagal Dihapus, Silahkan Ulangi') ; window.location.href='artikel.php'; </script>";
		}
	}
	else {
		echo"<script> alert('artikel Gagal Dihapus, Silahkan Ulangi') ; window.location.href='artikel.php'; </script>";
	}
}

