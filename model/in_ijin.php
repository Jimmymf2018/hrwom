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
		$id_ijin = $_POST['id_ijin'];
		$jenis_ijin = pg_escape_string($_POST['jenis_ijin']);  
		
		$sql2 = "INSERT INTO m_ijin(id_ijin,jenis_ijin,status)			  
				VALUES ( '$id_ijin','$jenis_ijin',1);";  
		 
		 
		if($result = pg_query($con, $sql2)){
				echo "Data Added Successfully.";
				header ("location:../pages/employee/data_ijin.php");
			 }
			 else{
				echo "Error.";
			 }
		 
		 
		pg_close($con);
	}	 
?> 
