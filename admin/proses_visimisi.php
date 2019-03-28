<?php

include "fungsi/config.php";

if(isset($_POST['inputvisimisi']))
{
	$img_visimisi = $_FILES['img_visimisi']['name'];
	$judul_visimisi = $_POST['judul_visimisi'];
	$date_visimisi = $_POST['date_visimisi'];
	$id_login = $_POST['id_login'];
	$visimisi =  $_POST['visimisi'];

	$data = mysqli_query($koneksi,"insert into visimisi (gambar,judul_visimisi,tanggal,id_login,deskripsi) values ('$img_visimisi','$judul_visimisi','$date_visimisi','$id_login','$visimisi')");

	if ($data)
	{
		move_uploaded_file($_FILES['img_visimisi']['tmp_name'], "visimisi/".$_FILES['img_visimisi']['name']);
		echo"<script> alert('visimisi Berhasil Diinput') ; window.location.href='visimisi.php'; </script>";
	}
	else {
		echo"<script> alert('visimisi Gagal Diinput, Silahkan ulangi lagi') ; window.location.href='visimisi.php'; </script>";
	}
}
else if(isset($_POST['editvisimisi']))
{
	$img_visimisi = $_FILES['img_visimisi']['name'];
	$img_visimisi_old = $_POST['img_visimisi_old'];
	$judul_visimisi = $_POST['judul_visimisi'];
	$date_visimisi = $_POST['date_visimisi'];
	$id_login = $_POST['id_login'];
	$visimisi =  $_POST['visimisi'];
	$id_visimisi = $_POST['id_visimisi'];

	if(!empty($img_visimisi))
	{
		$data = mysqli_query($koneksi,"UPDATE visimisi SET id_login='$id_login',judul_visimisi='$judul_visimisi',gambar='$img_visimisi',deskripsi='$visimisi',tanggal='$date_visimisi', WHERE id_visimisi='$id_visimisi'");
		if ($data)
		{
			unlink("visimisi/$img_visimisi_old");
			move_uploaded_file($_FILES['img_visimisi']['tmp_name'], "visimisi/".$_FILES['img_visimisi']['name']);
			echo"<script> alert('visimisi Berhasil Diinput') ; window.location.href='visimisi.php'; </script>";
		}
		else {
			echo"<script> alert('visimisi Gagal Diinput, Silahkan ulangi lagi') ; window.location.href='visimisi.php'; </script>";
		}	
	}
	else {
		$data = mysqli_query($koneksi,"update visimisi set judul_visimisi ='$judul_visimisi', tanggal='$date_visimisi', id_login='$id_login', deskripsi ='$visimisi' where id_visimisi ='$id_visimisi'");
		if ($data)
		{
			echo"<script> alert('visimisi Berhasil Diinput') ; window.location.href='visimisi.php'; </script>";
		}
		else {
			echo"<script> alert('visimisi Gagal Diinput, Silahkan ulangi lagi1') ; window.location.href='visimisi.php'; </script>";
		}
	}
	
}
else if (isset($_GET['id_hapus']))
{
	$id = $_GET['id_hapus'];
	$data = mysqli_query($koneksi,"select * from visimisi where id_visimisi = '$id'");
	while ($hasil = mysqli_fetch_array($data))
	{
		$foto = $hasil['img_visimisi'];
	}
	if($foto)
	{
		$proses = mysqli_query($koneksi,"delete from visimisi where id_visimisi = '$id'");
		if($proses)
		{
			unlink("visimisi/$foto");
			echo"<script> alert('visimisi Berhasil Dihapus') ; window.location.href='visimisi.php'; </script>";
		}
		else {
			echo"<script> alert('visimisi Gagal Dihapus, Silahkan Ulangi') ; window.location.href='visimisi.php'; </script>";
		}
	}
	else {
		echo"<script> alert('visimisi Gagal Dihapus, Silahkan Ulangi') ; window.location.href='visimisi.php'; </script>";
	}
}

