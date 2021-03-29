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
		$nama = $_POST['nama']; 
		$jenis_ijin = pg_escape_string($_POST['jenis_ijin']); 
		$keterangan = pg_escape_string($_POST['keterangan']);   
		$tgl_awal = strtr($_REQUEST['tgl_awal'], '/', '-');
		$t_awal = date('Y-m-d', strtotime($tgl_awal)); 
		$tgl_akhir = strtr($_REQUEST['tgl_akhir'], '/', '-');
		$t_akhir = date('Y-m-d', strtotime($tgl_akhir));
		$nik_atasan = $_POST['nik_atasan'];
		$tgl_approve = strtr($_REQUEST['tgl_approve'], '/', '-');
		$t_approve = date('Y-m-d', strtotime($tgl_approve));
 
		$sql2 = "INSERT INTO public.tr_ijin(nik, nama,  jenis_ijin, tgl_awal, tgl_akhir, keterangan, nik_atasan, tgl_approve, status)
			VALUES ('$nik','$nama','$jenis_ijin','".$tgl_awal."','".$tgl_akhir."','$keterangan','$nik_atasan','".$tgl_approve."',1);";   
		 
		if($result = pg_query($con, $sql2)){
				echo "Data Added Successfully.";
				header ("location:../pages/employee/tr_data_ijin.php");
			 }
			 else{
				echo "Error.";
			 }
		 
		 
		pg_close($con);
	}	 
?> 
