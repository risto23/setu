<?php

include "fungsi/config.php";

if(isset($_POST['inputpelayanan']))
{
	$img_pelayanan = $_FILES['img_pelayanan']['name'];
	$judul_pelayanan = $_POST['judul_pelayanan'];
	$date_pelayanan = $_POST['date_pelayanan'];
	$id_login = $_POST['id_login'];
	$pelayanan =  $_POST['pelayanan'];

	$data = mysqli_query($koneksi,"insert into pelayanan (gambar,judul_pelayanan,tanggal,id_login,deskripsi) values ('$img_pelayanan','$judul_pelayanan','$date_pelayanan','$id_login','$pelayanan')");

	if ($data)
	{
		move_uploaded_file($_FILES['img_pelayanan']['tmp_name'], "pelayanan/".$_FILES['img_pelayanan']['name']);
		echo"<script> alert('pelayanan Berhasil Diinput') ; window.location.href='pelayanan.php'; </script>";
	}
	else {
		echo"<script> alert('pelayanan Gagal Diinput, Silahkan ulangi lagi') ; window.location.href='pelayanan.php'; </script>";
	}
}
else if(isset($_POST['editpelayanan']))
{
	$img_pelayanan = $_FILES['img_pelayanan']['name'];
	$img_pelayanan_old = $_POST['img_pelayanan_old'];
	$judul_pelayanan = $_POST['judul_pelayanan'];
	$date_pelayanan = $_POST['date_pelayanan'];
	$id_login = $_POST['id_login'];
	$pelayanan =  $_POST['pelayanan'];
	$id_pelayanan = $_POST['id_pelayanan'];

	if(!empty($img_pelayanan))
	{
		$data = mysqli_query($koneksi,"UPDATE pelayanan SET id_login='$id_login',judul_pelayanan='$judul_pelayanan',gambar='$img_pelayanan',deskripsi='$pelayanan',tanggal='$date_pelayanan', WHERE id_pelayanan='$id_pelayanan'");
		if ($data)
		{
			unlink("pelayanan/$img_pelayanan_old");
			move_uploaded_file($_FILES['img_pelayanan']['tmp_name'], "pelayanan/".$_FILES['img_pelayanan']['name']);
			echo"<script> alert('pelayanan Berhasil Diinput') ; window.location.href='pelayanan.php'; </script>";
		}
		else {
			echo"<script> alert('pelayanan Gagal Diinput, Silahkan ulangi lagi') ; window.location.href='pelayanan.php'; </script>";
		}	
	}
	else {
		$data = mysqli_query($koneksi,"update pelayanan set judul_pelayanan ='$judul_pelayanan', tanggal='$date_pelayanan', id_login='$id_login', deskripsi ='$pelayanan' where id_pelayanan ='$id_pelayanan'");
		if ($data)
		{
			echo"<script> alert('pelayanan Berhasil Diinput') ; window.location.href='pelayanan.php'; </script>";
		}
		else {
			echo"<script> alert('pelayanan Gagal Diinput, Silahkan ulangi lagi1') ; window.location.href='pelayanan.php'; </script>";
		}
	}
	
}
else if (isset($_GET['id_hapus']))
{
	$id = $_GET['id_hapus'];
	$data = mysqli_query($koneksi,"select * from pelayanan where id_pelayanan = '$id'");
	while ($hasil = mysqli_fetch_array($data))
	{
		$foto = $hasil['img_pelayanan'];
	}
	if($foto)
	{
		$proses = mysqli_query($koneksi,"delete from pelayanan where id_pelayanan = '$id'");
		if($proses)
		{
			unlink("pelayanan/$foto");
			echo"<script> alert('pelayanan Berhasil Dihapus') ; window.location.href='pelayanan.php'; </script>";
		}
		else {
			echo"<script> alert('pelayanan Gagal Dihapus, Silahkan Ulangi') ; window.location.href='pelayanan.php'; </script>";
		}
	}
	else {
		echo"<script> alert('pelayanan Gagal Dihapus, Silahkan Ulangi') ; window.location.href='pelayanan.php'; </script>";
	}
}

