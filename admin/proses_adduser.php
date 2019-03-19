<?php

include "fungsi/config.php";

if (isset($_POST['inputuser']))
{
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$status =  $_POST['izin'];
	$nama = $_POST['namalengkap'];
	
	$cekuser = mysqli_num_rows(mysqli_query($koneksi,"select * from login where username ='$username'"));
	if($cekuser == 0)
	{
		$data = mysqli_query($koneksi,"Insert (nama,username,password,izin) into login Values ('$nama','$username','$password','$status')");
		if($data)
		{
				echo"<script> alert('Data berhasil diinput') ; window.location.href='user.php'; </script>";

		}
		else
		{	
				$hapus = mysqli_query($koneksi,"delete from login where username ='$username' AND password='$password'");
				echo"<script> alert('Data gagal diinput, Harap ulangi lagi') ; window.location.href='user.php'; </script>";
		}
	}
	else {
		echo"<script> alert('Username sudah ada, username harus diganti') ; window.location.href='user.php'; </script>";
	}
}
else if (isset($_POST['edituser']))
{
	$username = $_POST['username'];
	$password = $_POST['password'];
	$status =  $_POST['izin'];
	$nama = $_POST['namalengkap'];
	$id_login = $_POST['id_login'];

	$cekuser = mysqli_num_rows(mysqli_query($koneksi,"select * from login where username ='$username'"));
	if($cekuser <= 1)
	{
		if (!empty($password))
		{
			$password_new = md5($password);
			$data = mysqli_query($koneksi,"update login set nama='$nama', username='$username',password='$password_new',izin='$status' where id_login ='$id_login'");
			if($data)
			{
				
					echo"<script> alert('Data berhasil diinput') ; window.location.href='user.php'; </script>";
			}
			else
			{
				$hapus = mysqli_query($koneksi,"delete from login where username ='$username' AND password='$password'");
					echo"<script> alert('Data gagal diinput, Harap ulangi lagi') ; window.location.href='user.php'; </script>";
			}
		}
		else{
			$data = mysqli_query($koneksi,"update login set nama='$nama', username='$username',status='$status' where id_login ='$id_login'");
		}


			
			
		
	}
	else {
		echo"<script> alert('Username sudah ada, username harus diganti') ; window.location.href='user.php'; </script>";
	}
}
else if(isset($_GET['proses_hapus']))
{
	$id = $_GET['proses_hapus'];

	$deletelogin = mysqli_query($koneksi,"delete from login where id_login ='$id'");
	if( $deletelogin)
	{
		echo"<script> alert('Data berhasil dihapus') ; window.location.href='user.php'; </script>";
	}
	else {
	echo"<script> alert('Data gagal dihapus, silahkan ulangi') ; window.location.href='user.php'; </script>";
	}
}