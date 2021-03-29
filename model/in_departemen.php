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
		$id_dept = pg_escape_string($_POST['id_dept']); 
		$nama_dept = pg_escape_string($_POST['nama_dept']); 
		$status = 1;  
 
		
		$sql2 = "INSERT INTO m_departemen(id_dept,nama_dept,status)			  
				VALUES ( '".$id_dept."','".$nama_dept."',1);";  
		 
		 
		if($result = pg_query($con, $sql2)){
				echo "Data Added Successfully.";
				header ("location:../pages/employee/data_departemen.php");
			 }
			 else{
				echo "Error.";
			 } 
		pg_close($con);
	}	 
?> 
