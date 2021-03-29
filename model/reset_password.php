<?php
include "../config/config.php";
	$host = "localhost"; 
	$user = "postgres"; 
	$pass = "admin"; 
	$db = "hrwom"; 

	$con = pg_connect("host=$host dbname=$db  port=5432 user=$user password=$pass")
    or die ("Could not connect to server\n");  
			$nik = pg_escape_string($_POST['nik']);
			$password1 = pg_escape_string($_POST['password']);
			$password2 = pg_escape_string($_POST['password2']);
			
			$uppercase = preg_match('@[A-Z]@', $password1);
			$lowercase = preg_match('@[a-z]@', $password1);
			$number    = preg_match('@[0-9]@', $password1);
			$specialChars = preg_match('@[^\w]@', $password1);
			
			if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password1) < 8) {
				echo "<script>alert('Masukkan Kata Sandi 6 hingga 20 karakter yang berisi setidaknya satu digit angka, satu huruf besar dan satu huruf kecil dan special karakter'); window.location = 'lupa_password.php'</script>";
			}else{
				echo 'Strong password.';
				
		if ($password1 == $password2)
			{	
			$sql2 = "UPDATE m_users SET password=md5('$password1') WHERE nik='$nik'";  
			if($result = pg_query($con, $sql2))
				{ 
					echo "<script>alert('Ubah Password Sukses'); window.location = '../login.php'</script>";  
				}
				else{
				echo "Tidak bisa simpan.";
				} 
				pg_close($con);
			}
			else echo "<script>alert('Ganti Password Gagal, password tidak sama'); window.location = '../lupa_password.php'</script>"; 
			}
			
			?>