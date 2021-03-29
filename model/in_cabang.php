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
		$kode_cabang = $_POST['kode_cabang'];
		$nama_cabang = pg_escape_string($_POST['nama_cabang']); 
		$alamat = pg_escape_string($_POST['alamat']);  
		$kota = pg_escape_string($_POST['kota']);  
		$propinsi = pg_escape_string($_POST['propinsi']);  
		$telp = pg_escape_string($_POST['telp']);  
		 
 
		
		$sql2 = "INSERT INTO m_cabang(kode_cabang, nama_cabang, alamat, kota, propinsi,telp, status)			  
				VALUES ( '$kode_cabang','$nama_cabang','$alamat','$kota','$propinsi','$telp','1');";  
		 
		 
		if($result = pg_query($con, $sql2)){
				echo "Data Added Successfully.";
				header ("location:../pages/employee/data_cabang.php");
			 }
			 else{
				echo "Error.";
			 }
		 
		 
		pg_close($con);
	}	 
?> 
