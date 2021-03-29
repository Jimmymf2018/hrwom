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
		$nik = $_POST['nik'];
		$nama = pg_escape_string($_POST['nama']); 
		$keterangan = pg_escape_string($_POST['keterangan']); 
		$jenis_cuti = pg_escape_string($_POST['jenis_cuti']); 
		$jumlah = $_POST['jumlah']; 
		$created = pg_escape_string($_POST['created']);  
		$tgl_awal = strtr($_REQUEST['tgl_awal'], '/', '-');
		$t_awal = date('Y-m-d', strtotime($tgl_awal)); 
		$tgl_akhir = strtr($_REQUEST['tgl_akhir'], '/', '-');
		$t_akhir = date('Y-m-d', strtotime($tgl_akhir));
 
		
		$sql2 = "INSERT INTO tr_cuti(nik, nama,jenis_cuti,tgl_awal,tgl_akhir,jumlah,keterangan,status)			  
				VALUES ( '$nik','$nama','$jenis_cuti','".$tgl_awal."','".$tgl_akhir."','".$jumlah."','".$keterangan."',0);";  
		 
		 
		if($result = pg_query($con, $sql2)){
				echo "Data Added Successfully.";
				header ("location:../pages/employee/tr_data_cuti.php");
			 }
			 else{
				echo "Error.";
			 }
		 
		 
		pg_close($con);
	}	 
?> 
