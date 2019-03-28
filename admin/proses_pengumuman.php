<?php

include "fungsi/config.php";

if(isset($_POST['inputpengumuman']))
{
	$img_pengumuman = $_FILES['img_pengumuman']['name'];
	$judul_pengumuman = $_POST['judul_pengumuman'];
	$date_pengumuman = $_POST['date_pengumuman'];
	$id_login = $_POST['id_login'];
	$pengumuman =  addslashes($_POST['pengumuman']);

	$data = mysqli_query($koneksi,"insert into pengumuman (gambar,judul_pengumuman,tanggal,id_login,deskripsi) values ('$img_pengumuman','$judul_pengumuman','$date_pengumuman','$id_login','$pengumuman')");

	if ($data)
	{
		move_uploaded_file($_FILES['img_pengumuman']['tmp_name'], "pengumuman/".$_FILES['img_pengumuman']['name']);
		echo"<script> alert('Pengumuman Berhasil Diinput') ; window.location.href='pengumuman.php'; </script>";
	}
	else {
		echo"<script> alert('Pengumuman Gagal Diinput, Silahkan ulangi lagi') ; window.location.href='pengumuman.php'; </script>";
	}
}
else if(isset($_POST['editpengumuman']))
{
	$img_pengumuman = $_FILES['img_pengumuman']['name'];
	$img_pengumuman_old = $_POST['img_pengumuman_old'];
	$judul_pengumuman = $_POST['judul_pengumuman'];
	$date_pengumuman = $_POST['date_pengumuman'];
	$id_login = $_POST['id_login'];
	$pengumuman =  addslashes($_POST['pengumuman']);
	$id_pengumuman = $_POST['id_pengumuman'];

	if(!empty($img_pengumuman))
	{
		$data = mysqli_query($koneksi,"UPDATE pengumuman SET id_login='$id_login',judul_pengumuman='$judul_pengumuman',gambar='$img_pengumuman',deskripsi='$pengumuman',tanggal='$date_pengumuman', WHERE id_pengumuman='$id_pengumuman'");
		if ($data)
		{
			unlink("pengumuman/$img_pengumuman_old");
			move_uploaded_file($_FILES['img_pengumuman']['tmp_name'], "pengumuman/".$_FILES['img_pengumuman']['name']);
			echo"<script> alert('Pengumuman Berhasil Diinput') ; window.location.href='pengumuman.php'; </script>";
		}
		else {
			echo"<script> alert('Pengumuman Gagal Diinput, Silahkan ulangi lagi') ; window.location.href='pengumuman.php'; </script>";
		}	
	}
	else {
		$data = mysqli_query($koneksi,"update pengumuman set judul_pengumuman ='$judul_pengumuman', tanggal='$date_pengumuman', id_login='$id_login', deskripsi ='$pengumuman' where id_pengumuman ='$id_pengumuman'");
		if ($data)
		{
			echo"<script> alert('Pengumuman Berhasil Diinput') ; window.location.href='pengumuman.php'; </script>";
		}
		else {
			echo"<script> alert('Pengumuman Gagal Diinput, Silahkan ulangi lagi1') ; window.location.href='pengumuman.php'; </script>";
		}
	}
	
}
else if (isset($_GET['id_hapus']))
{
	$id = $_GET['id_hapus'];
	$data = mysqli_query($koneksi,"select * from pengumuman where id_pengumuman = '$id'");
	while ($hasil = mysqli_fetch_array($data))
	{
		$foto = $hasil['img_pengumuman'];
	}
	if($foto)
	{
		$proses = mysqli_query($koneksi,"delete from pengumuman where id_pengumuman = '$id'");
		if($proses)
		{
			unlink("pengumuman/$foto");
			echo"<script> alert('Pengumuman Berhasil Dihapus') ; window.location.href='pengumuman.php'; </script>";
		}
		else {
			echo"<script> alert('Pengumuman Gagal Dihapus, Silahkan Ulangi') ; window.location.href='pengumuman.php'; </script>";
		}
	}
	else {
		echo"<script> alert('Pengumuman Gagal Dihapus, Silahkan Ulangi') ; window.location.href='pengumuman.php'; </script>";
	}
}

