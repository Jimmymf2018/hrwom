<?php
	include "../config/config.php";
	$host = "localhost"; 
	$user = "postgres"; 
	$pass = "admin"; 
	$db = "hrwom"; 

	$con = pg_connect("host=$host dbname=$db  port=5432 user=$user password=$pass")
    or die ("Could not connect to server\n");  
	
	if(isset($_POST['submit']))
	{	   
		$id_jabatan = pg_escape_string($_POST['id_jabatan']); 
		$nama_jabatan = pg_escape_string($_POST['nama_jabatan']); 
		$status = 1;  
 
		
		$sql2 = "INSERT INTO m_jabatan(id_jabatan,nama_jabatan,status)			  
				VALUES ( '".$id_jabatan."','".$nama_jabatan."',1);";  
		 
		 
		if($result = pg_query($con, $sql2)){
				echo "Data Added Successfully.";
				header ("location:../pages/employee/data_jabatan.php");
			 }
			 else{
				echo "Error.";
			 } 
		pg_close($con);
	}	 
?> 
