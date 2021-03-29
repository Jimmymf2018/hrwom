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
		$username = pg_escape_string($_POST['username']); 
		$email = pg_escape_string($_POST['email']); 
		$departemen = pg_escape_string($_POST['departemen']);  
		$jabatan = pg_escape_string($_POST['jabatan']);  
		$password = pg_escape_string($_POST['password']);  
		$level = pg_escape_string($_POST['level']); 
		//$image = pg_escape_string($_POST['hasil']); 
		$filename = $nik.'.jpg'; 
		
		$sql2 = "INSERT INTO m_users(nik, username,email, departemen, jabatan, password, level,imagefile)			  
				VALUES ('$nik','$username','$email','$departemen','$jabatan',md5('$password'),'$level','$filename');";  
		 
		 
		if($result = pg_query($con, $sql2)){
				echo "Data Added Successfully.";
				header ("location:../pages/employee/data_user.php");
			 }
			 else{
				echo "Error.";
			 } 
		pg_close($con);
	}	 
?> 
