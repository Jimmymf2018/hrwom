<?php
include "../config/config.php";
	$host = "localhost"; 
	$user = "postgres"; 
	$pass = "admin"; 
	$db = "hrwom"; 

	$con = pg_connect("host=$host dbname=$db  port=5432 user=$user password=$pass")
    or die ("Could not connect to server\n");  

			$nik = pg_escape_string($_POST['nik']);
			$email = pg_escape_string($_POST['email']);
			
			$sql2 = pg_query($con, "SELECT * FROM m_users WHERE nik='".$nik."' and email='".$email."'");  
			$data = pg_fetch_array($sql2, NULL, PGSQL_ASSOC);
						$nik2= $data['nik'];
						$email2= $data['email'];
						 if($email!=$email2 && $nik!=$nik2)
						 {
								echo "<script>alert('NIK atau Email tidak terdaftar'); window.location = 'lupapassword.php'</script>"; 
						 }
						 else
						 ( 
							header("location:lupa_password.php?nik=$nik&email=$email")
						 )
				 
				 ?>