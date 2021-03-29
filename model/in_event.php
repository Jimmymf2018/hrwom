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
		$title = $_POST['title'];
		$description = pg_escape_string($_POST['description']); 
		$created = pg_escape_string($_POST['created']);  
		$date1 = strtr($_REQUEST['start_date'], '/', '-');
		$tgl1 = date('Y-m-d', strtotime($date1)); 
		$date2 = strtr($_REQUEST['end_date'], '/', '-');
		$tgl2 = date('Y-m-d', strtotime($date2));
 
		
		$sql2 = "INSERT INTO m_events(title, description, start_date, end_date, created, status)			  
				VALUES ( '$title','$description','".$tgl1."','".$tgl2."','$created','1');";  
		 
		 
		if($result = pg_query($con, $sql2)){
				echo "Data Added Successfully.";
				header ("location:../pages/employee/data_event.php");
			 }
			 else{
				echo "Error.";
			 }
		 
		 
		pg_close($con);
	}	 
?> 
