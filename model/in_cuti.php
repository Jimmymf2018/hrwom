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
		$id_cuti = $_POST['id_cuti'];
		$jenis_cuti = pg_escape_string($_POST['jenis_cuti']);  
		$jumlah = $_POST['jumlah'];  
  
		$sql2 = "INSERT INTO m_cuti(id_cuti, jenis_cuti, jumlah,status)			  
				VALUES ( '$id_cuti','$jenis_cuti','".$jumlah."',0);";   
		 
		if($result = pg_query($con, $sql2)){
				echo "Data Added Successfully.";
				header ("location:../pages/employee/data_cuti.php");
			 }
			 else{
				echo "Error.";
			 } 
		 
		pg_close($con);
	}	 
?> 
