<?php

include "fungsi/config.php";

if(isset($_POST['inputsambutan']))
{
	$img_sambutan = $_FILES['img_sambutan']['name'];
	$judul_sambutan = $_POST['judul_sambutan'];
	$date_sambutan = $_POST['date_sambutan'];
	$id_login = $_POST['id_login'];
	$sambutan =  $_POST['sambutan'];

	$data = mysqli_query($koneksi,"insert into sambutan (gambar,judul_sambutan,tanggal,id_login,deskripsi) values ('$img_sambutan','$judul_sambutan','$date_sambutan','$id_login','$sambutan')");

	if ($data)
	{
		move_uploaded_file($_FILES['img_sambutan']['tmp_name'], "sambutan/".$_FILES['img_sambutan']['name']);
		echo"<script> alert('sambutan Berhasil Diinput') ; window.location.href='sambutan.php'; </script>";
	}
	else {
		echo"<script> alert('sambutan Gagal Diinput, Silahkan ulangi lagi') ; window.location.href='sambutan.php'; </script>";
	}
}
else if(isset($_POST['editsambutan']))
{
	$img_sambutan = $_FILES['img_sambutan']['name'];
	$img_sambutan_old = $_POST['img_sambutan_old'];
	$judul_sambutan = $_POST['judul_sambutan'];
	$date_sambutan = $_POST['date_sambutan'];
	$id_login = $_POST['id_login'];
	$sambutan =  $_POST['sambutan'];
	$id_sambutan = $_POST['id_sambutan'];

	if(!empty($img_sambutan))
	{
		$data = mysqli_query($koneksi,"UPDATE sambutan SET id_login='$id_login',judul_sambutan='$judul_sambutan',gambar='$img_sambutan',deskripsi='$sambutan',tanggal='$date_sambutan', WHERE id_sambutan='$id_sambutan'");
		if ($data)
		{
			unlink("sambutan/$img_sambutan_old");
			move_uploaded_file($_FILES['img_sambutan']['tmp_name'], "sambutan/".$_FILES['img_sambutan']['name']);
			echo"<script> alert('sambutan Berhasil Diinput') ; window.location.href='sambutan.php'; </script>";
		}
		else {
			echo"<script> alert('sambutan Gagal Diinput, Silahkan ulangi lagi') ; window.location.href='sambutan.php'; </script>";
		}	
	}
	else {
		$data = mysqli_query($koneksi,"update sambutan set judul_sambutan ='$judul_sambutan', tanggal='$date_sambutan', id_login='$id_login', deskripsi ='$sambutan' where id_sambutan ='$id_sambutan'");
		if ($data)
		{
			echo"<script> alert('sambutan Berhasil Diinput') ; window.location.href='sambutan.php'; </script>";
		}
		else {
			echo"<script> alert('sambutan Gagal Diinput, Silahkan ulangi lagi1') ; window.location.href='sambutan.php'; </script>";
		}
	}
	
}
else if (isset($_GET['id_hapus']))
{
	$id = $_GET['id_hapus'];
	$data = mysqli_query($koneksi,"select * from sambutan where id_sambutan = '$id'");
	while ($hasil = mysqli_fetch_array($data))
	{
		$foto = $hasil['img_sambutan'];
	}
	if($foto)
	{
		$proses = mysqli_query($koneksi,"delete from sambutan where id_sambutan = '$id'");
		if($proses)
		{
			unlink("sambutan/$foto");
			echo"<script> alert('sambutan Berhasil Dihapus') ; window.location.href='sambutan.php'; </script>";
		}
		else {
			echo"<script> alert('sambutan Gagal Dihapus, Silahkan Ulangi') ; window.location.href='sambutan.php'; </script>";
		}
	}
	else {
		echo"<script> alert('sambutan Gagal Dihapus, Silahkan Ulangi') ; window.location.href='sambutan.php'; </script>";
	}
}

