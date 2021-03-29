<?php 
    session_start();
	include "../config/config.php";
	$host = "localhost"; 
	$user = "postgres"; 
	$pass = "admin"; 
	$db = "hrwom"; 

	$con = pg_connect("host=$host dbname=$db  port=5432 user=$user password=$pass")
    or die ("Could not connect to server\n");  
	
	if(isset($_POST['submit']))
	{	 
			
			$nik = pg_escape_string($_POST['nik']);
			$password1 = pg_escape_string($_POST['password']);
			$password2 = pg_escape_string($_POST['password2']); 
			
			
			$uppercase = preg_match('@[A-Z]@', $password1);
			$lowercase = preg_match('@[a-z]@', $password1);
			$number    = preg_match('@[0-9]@', $password1);
			$specialChars = preg_match('@[^\w]@', $password1);
			
			if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password1) < 8) {
				echo "<script>alert('Masukkan Kata Sandi 6 hingga 20 karakter yang berisi setidaknya satu digit angka, satu huruf besar dan satu huruf kecil dan special karakter'); window.location = 'register.php'</script>";
			}else{
				//echo 'ok password.';
			if($_SESSION["code"] != $_POST["kode"]){
				echo "<script>alert('captcha yang anda masukkan salah');window.history.go(-1);</script>"; 
				}
				else
				{
						if ($password1 == $password2)
						{ 	
							$username  = pg_escape_string($_POST['nama']);
							$email = pg_escape_string($_POST['email']);
							$nik = pg_escape_string($_POST['nik']);
							$departemen = pg_escape_string($_POST['departemen']);
							$jabatan = pg_escape_string($_POST['jabatan']); 
							$cabang = pg_escape_string($_POST['kode_cabang']); 
				  
							 
							 $sql2 = "SELECT count(*) as total FROM m_users";
							 $query = pg_query($sql2);
							 $row = pg_fetch_array($query); 
							 $total = $row["total"]; 
						
							$filename = $total.'.jpg';   
							$sql2 = "INSERT INTO m_users(nik, username,email, departemen, jabatan, password, imagefile,kode_cabang)			  
									VALUES ('$nik','$username','$email','$departemen','$jabatan',md5('$password1'),'$filename','$cabang');";  
							if($result = pg_query($con, $sql2)){ 
							
							
							echo "<script>alert('Register Sukses'); window.location = '../login.php'</script>"; 
							//header ("location:../login.php");
							}
							else{
							echo "Tidak bisa simpan.";
							} 
							pg_close($con);
						
						}
						else echo "<script>alert('Register Gagal, password tidak sama'); window.location = '../register.php'</script>"; 
				}
			} 
		
		
?> 