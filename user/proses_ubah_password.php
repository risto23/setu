<?php

include "fungsi/config.php";


if (isset($_POST['edituser']))
{
	$username = $_POST['username'];
	$password = $_POST['password'];
	$id_user = $_POST['id'];

	$cekuser = mysqli_num_rows(mysqli_query($koneksi,"select * from user where username ='$username'"));
	if($cekuser <= 1)
	{
		if (!empty($password))
		{
			$password_new = md5($password);
			$data = mysqli_query($koneksi,"update user set username='$username',password='$password_new' where id_user ='$id_user'");
			if($data)
			{
				
					echo"<script> alert('Data berhasil diinput') ; window.location.href='ubah_password.php'; </script>";
			}
			else
			{
				$hapus = mysqli_query($koneksi,"delete from user where username ='$username' AND password='$password'");
					echo"<script> alert('Data gagal diinput, Harap ulangi lagi') ; window.location.href='ubah_password.php'; </script>";
			}
		}
		else{
			$data = mysqli_query($koneksi,"update user set nama='$nama', username='$username' where id_user ='$id_user'");
		}


			
			
		
	}
	else {
		echo"<script> alert('Username sudah ada, username harus diganti') ; window.location.href='user.php'; </script>";
	}
}