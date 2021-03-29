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
		$tgl = strtr($_REQUEST['tgl'], '/', '-');
		$keterangan = pg_escape_string($_POST['keterangan']); 
		$status = 1;  
 
		
		$sql2 = "INSERT INTO m_libur(tgl,keterangan,status)			  
				VALUES ( '".$tgl."','".$keterangan."',1);";  
		 
		 
		if($result = pg_query($con, $sql2)){
				echo "Data Added Successfully.";
				header ("location:../pages/employee/data_libur.php");
			 }
			 else{
				echo "Error.";
			 }
		 
		 
		pg_close($con);
	}	 
?> 
