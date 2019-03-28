<?php

include "fungsi/config.php";

if(isset($_POST['inputstruktur']))
{
	$img_struktur = $_FILES['img_struktur']['name'];
	$judul_struktur = $_POST['judul_struktur'];
	$date_struktur = $_POST['date_struktur'];
	$id_login = $_POST['id_login'];
	$struktur =  $_POST['struktur'];

	$data = mysqli_query($koneksi,"insert into struktur (gambar,judul_struktur,tanggal,id_login,deskripsi) values ('$img_struktur','$judul_struktur','$date_struktur','$id_login','$struktur')");

	if ($data)
	{
		move_uploaded_file($_FILES['img_struktur']['tmp_name'], "struktur/".$_FILES['img_struktur']['name']);
		echo"<script> alert('struktur Berhasil Diinput') ; window.location.href='struktur.php'; </script>";
	}
	else {
		echo"<script> alert('struktur Gagal Diinput, Silahkan ulangi lagi') ; window.location.href='struktur.php'; </script>";
	}
}
else if(isset($_POST['editstruktur']))
{
	$img_struktur = $_FILES['img_struktur']['name'];
	$img_struktur_old = $_POST['img_struktur_old'];
	$judul_struktur = $_POST['judul_struktur'];
	$date_struktur = $_POST['date_struktur'];
	$id_login = $_POST['id_login'];
	$struktur =  $_POST['struktur'];
	$id_struktur = $_POST['id_struktur'];

	if(!empty($img_struktur))
	{
		$data = mysqli_query($koneksi,"UPDATE struktur SET id_login='$id_login',judul_struktur='$judul_struktur',gambar='$img_struktur',deskripsi='$struktur',tanggal='$date_struktur', WHERE id_struktur='$id_struktur'");
		if ($data)
		{
			unlink("struktur/$img_struktur_old");
			move_uploaded_file($_FILES['img_struktur']['tmp_name'], "struktur/".$_FILES['img_struktur']['name']);
			echo"<script> alert('struktur Berhasil Diinput') ; window.location.href='struktur.php'; </script>";
		}
		else {
			echo"<script> alert('struktur Gagal Diinput, Silahkan ulangi lagi') ; window.location.href='struktur.php'; </script>";
		}	
	}
	else {
		$data = mysqli_query($koneksi,"update struktur set judul_struktur ='$judul_struktur', tanggal='$date_struktur', id_login='$id_login', deskripsi ='$struktur' where id_struktur ='$id_struktur'");
		if ($data)
		{
			echo"<script> alert('struktur Berhasil Diinput') ; window.location.href='struktur.php'; </script>";
		}
		else {
			echo"<script> alert('struktur Gagal Diinput, Silahkan ulangi lagi1') ; window.location.href='struktur.php'; </script>";
		}
	}
	
}
else if (isset($_GET['id_hapus']))
{
	$id = $_GET['id_hapus'];
	$data = mysqli_query($koneksi,"select * from struktur where id_struktur = '$id'");
	while ($hasil = mysqli_fetch_array($data))
	{
		$foto = $hasil['img_struktur'];
	}
	if($foto)
	{
		$proses = mysqli_query($koneksi,"delete from struktur where id_struktur = '$id'");
		if($proses)
		{
			unlink("struktur/$foto");
			echo"<script> alert('struktur Berhasil Dihapus') ; window.location.href='struktur.php'; </script>";
		}
		else {
			echo"<script> alert('struktur Gagal Dihapus, Silahkan Ulangi') ; window.location.href='struktur.php'; </script>";
		}
	}
	else {
		echo"<script> alert('struktur Gagal Dihapus, Silahkan Ulangi') ; window.location.href='struktur.php'; </script>";
	}
}

