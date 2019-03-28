<?php

include "fungsi/config.php";

if(isset($_POST['inputsyarat']))
{
	$img_syarat = $_FILES['img_syarat']['name'];
	$judul_syarat = $_POST['judul_syarat'];
	$date_syarat = $_POST['date_syarat'];
	$id_login = $_POST['id_login'];
	$syarat = addslashes( $_POST['syarat']);

	$data = mysqli_query($koneksi,"insert into syarat (gambar,judul_syarat,tanggal,id_login,deskripsi) values ('$img_syarat','$judul_syarat','$date_syarat','$id_login','$syarat')");

	if ($data)
	{
		move_uploaded_file($_FILES['img_syarat']['tmp_name'], "syarat/".$_FILES['img_syarat']['name']);
		echo"<script> alert('syarat Berhasil Diinput') ; window.location.href='syarat.php'; </script>";
	}
	else {
		echo"<script> alert('syarat Gagal Diinput, Silahkan ulangi lagi') ; window.location.href='syarat.php'; </script>";
	}
}
else if(isset($_POST['editsyarat']))
{
	$img_syarat = $_FILES['img_syarat']['name'];
	$img_syarat_old = $_POST['img_syarat_old'];
	$judul_syarat = $_POST['judul_syarat'];
	$date_syarat = $_POST['date_syarat'];
	$id_login = $_POST['id_login'];
	$syarat =  addslashes($_POST['syarat']);
	$id_syarat = $_POST['id_syarat'];

	if(!empty($img_syarat))
	{
		$data = mysqli_query($koneksi,"UPDATE syarat SET id_login='$id_login',judul_syarat='$judul_syarat',gambar='$img_syarat',deskripsi='$syarat',tanggal='$date_syarat', WHERE id_syarat='$id_syarat'");
		if ($data)
		{
			unlink("syarat/$img_syarat_old");
			move_uploaded_file($_FILES['img_syarat']['tmp_name'], "syarat/".$_FILES['img_syarat']['name']);
			echo"<script> alert('syarat Berhasil Diinput') ; window.location.href='syarat.php'; </script>";
		}
		else {
			echo"<script> alert('syarat Gagal Diinput, Silahkan ulangi lagi') ; window.location.href='syarat.php'; </script>";
		}	
	}
	else {
		$data = mysqli_query($koneksi,"update syarat set judul_syarat ='$judul_syarat', tanggal='$date_syarat', id_login='$id_login', deskripsi ='$syarat' where id_syarat ='$id_syarat'");
		if ($data)
		{
			echo"<script> alert('syarat Berhasil Diinput') ; window.location.href='syarat.php'; </script>";
		}
		else {
			echo"<script> alert('syarat Gagal Diinput, Silahkan ulangi lagi1') ; window.location.href='syarat.php'; </script>";
		}
	}
	
}
else if (isset($_GET['id_hapus']))
{
	$id = $_GET['id_hapus'];
	$data = mysqli_query($koneksi,"select * from syarat where id_syarat = '$id'");
	while ($hasil = mysqli_fetch_array($data))
	{
		$foto = $hasil['img_syarat'];
	}
	if($foto)
	{
		$proses = mysqli_query($koneksi,"delete from syarat where id_syarat = '$id'");
		if($proses)
		{
			unlink("syarat/$foto");
			echo"<script> alert('syarat Berhasil Dihapus') ; window.location.href='syarat.php'; </script>";
		}
		else {
			echo"<script> alert('syarat Gagal Dihapus, Silahkan Ulangi') ; window.location.href='syarat.php'; </script>";
		}
	}
	else {
		echo"<script> alert('syarat Gagal Dihapus, Silahkan Ulangi') ; window.location.href='syarat.php'; </script>";
	}
}

