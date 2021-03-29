<?php
 
	include "../config/config.php";
	session_start();
	 
	$username = $_POST['username']; 
	$password =  md5($_POST['password']) ;
	 
	 $result = pg_query($con, " SELECT * FROM m_users a 
								LEFT JOIN m_cabang b ON a.kode_cabang = b.kode_cabang  
								LEFT JOIN m_departemen c ON c.id_dept=a.departemen  
								LEFT JOIN m_jabatan d ON d.id_jabatan=a.jabatan
								LEFT JOIN m_level e ON e.id_departemen =c.id_dept and  e.id_jabatan=d.id_jabatan and e.id_cabang = b.kode_cabang 
								WHERE a.nik='".$username."' AND a.password='".$password."'");
		 
	 $jumlah = pg_num_rows($result);  
	 $data = pg_fetch_array($result, NULL, PGSQL_ASSOC); 
	if ($jumlah > 0){
	 session_start(); 
	$_SESSION['nik'] = $data['nik'];
	$_SESSION['username'] = $data['username'];
	$_SESSION['password'] = $data['password'];
	$_SESSION['departemen'] = $data['departemen']; 
	$_SESSION['jabatan'] = $data['jabatan'];
	$_SESSION['nama_jabatan'] = $data['nama_jabatan'];
	$_SESSION['kode_cabang'] = $data['kode_cabang'];
	$_SESSION['imagefile'] = $data['imagefile'];  
	$_SESSION["last_login_time"] = time();  
	$_SESSION['nama_cabang'] = $data['nama_cabang']; 
	$_SESSION['nama_level'] = $data['nama_level']; 
	$cab= $data['kode_cabang'];
	 
	 
	if($_SESSION['nama_level']=='Administrator')
	{		
	header('location:../pages/container.php'); 
	}
	else if($_SESSION['nama_level']=='User')
	{
	header('location:../pages/container_user.php'); 		
	}
	
		define('LOG','log.txt');
		function write_log($log){  
		 $time = @date('[Y-d-m:H:i:s]');
		 $op=$time.' '.'Action for '.$_SESSION['nik'].'-'.$_SESSION['username'].'-'.$log."\n".PHP_EOL;
		 $fp = @fopen(LOG, 'a');
		 $write = @fwrite($fp, $op);
		 @fclose($fp);
		}
		if($jumlah > 0){
		write_log("login success");
		}else{
		write_log("login fail");
		}
		 
		 
		} 
	else{
	 echo "<script>alert('Login Gagal, username atau password tidak cocok sama sekali'); window.location = '../index.php'</script>";
	
	} 
?>