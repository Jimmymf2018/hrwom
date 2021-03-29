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
		$tgl1 =  date('Y-m-d');  
		$tglfoto =  date('Y-m-d'); 
		$jam_absen=isset($_POST['jam_absen']) ? $_POST['jam_absen'] : ''; 
		$in =  date('Y-m-d H:i:s');  
		$in2=  date('Y-m-d H:i:s');  
		$in3 =  date('Y-m-d H:i:s'); 
		   
		//$filename = $_SESSION['nik'].'-'.$tglfoto.'-'.time().'.jpg'; 
		if(date("H")< 12)
		{ 
		$filename = $_SESSION['nik'].'-'.$tglfoto.'-IN.jpg'; 
		}
		else
		{
		$filename = $_SESSION['nik'].'-'.$tglfoto.'-OUT.jpg'; 
		}
		
		
		$keterangan = "-";  
		$latitude = pg_escape_string($_POST['latitude2']);  
		$longitude = pg_escape_string($_POST['longitude2']);  
		$kota = pg_escape_string($_POST['kota']);  
		$propinsi = pg_escape_string($_POST['propinsi']);  
 
		//$a = mt_rand(100000,999999); 
		$image = isset($_POST['hasil']); 
		
		$result = pg_query($con, "SELECT COUNT(*) AS total FROM m_absen WHERE nik='".$_SESSION['nik']."' and tgl='".$tgl1."' GROUP BY nik,tgl "); 
    	$data = pg_fetch_array($result, NULL, PGSQL_ASSOC); 
	    $total=$data['total'];   
		 
		$result2 = pg_query($con, "SELECT * FROM m_absen WHERE nik='".$_SESSION['nik']."' and tgl='".$tgl1."' "); 
		$data = pg_fetch_array($result2, NULL, PGSQL_ASSOC); 
		$jam_pulang=$data['pulang'];  
		$tgl=$data['tgl'];  
		 
		$jam = date("H");
		if(empty($tgl) && date("H")< 12)
		{ 
				$sql = "INSERT INTO m_absen(nik, nama, tgl, masuk, pulang, keterangan, status, latitude, longitude, kota, propinsi, foto, latitude2, longitude2, kota2, propinsi2, foto2)			  
				VALUES ( '".$_SESSION['nik']."','".$_SESSION['username']."','".$tgl1."','".$in."','00:00:00','".$keterangan."','1','".$latitude."','".$longitude."','".$kota."','".$propinsi."','".$filename."','-','-','-','-','-');";   
			 
				if($result = pg_query($con, $sql)){
					echo "Data Absen Masuk Successfully."; 
					header ("location:../pages/employee/absen.php");
				 }
				 else
				 {
					echo "Error.";
				 }
		}
		 else if( date("H")>12 && empty($tgl) )
		{   
			$sql2 = "INSERT INTO m_absen(nik, nama, tgl, masuk, pulang, keterangan, status, latitude, longitude, kota, propinsi, foto, latitude2, longitude2, kota2, propinsi2, foto2)			  
			VALUES ( '".$_SESSION['nik']."','".$_SESSION['username']."','".$tgl1."','00:00:00','".$in3."','".$keterangan."','1','-','-','-','-','-','".$latitude."','".$longitude."', '".$kota."', '".$propinsi."','".$filename."');";   
				
				if($result = pg_query($con, $sql2)){
					echo "Data Absen Pulang Successfully."; 
					header ("location:../pages/employee/absen.php");
				 } 
		 }
		else if(date("H")>12 &&  $tgl==$tgl1 &&  $jam_pulang=='00:00:00' )
		{ 
			$sql3 = "UPDATE m_absen SET pulang='".$in3."',latitude2='".$latitude."', longitude2='".$longitude."', kota2='".$kota."', propinsi2='".$propinsi."' ,foto2='".$filename."' WHERE nik ='".$_SESSION['nik']."' and nama='".$_SESSION['username']."' and tgl='".$tgl1."'" ;			    
			if($result = pg_query($con, $sql3))
			{
				echo "Data Absen pulang Successfully."; 
				header ("location:../pages/employee/absen.php");
			 }
			 else
			 {
				echo "Error.";
			 } 
		} 
		 else
		 {  
				//if(date("H")>12 && $jam_pulang>0)
				//{
					echo "<script>alert('Anda sudah absen pulang');window.location.href='../pages/employee/data_absen.php';</script>";
					header ("location:../pages/employee/data_absen.php");
				//}   
		 } 
		 
		 define('LOG','log.txt');
		function write_log($log){  
		 $time = @date('[Y-d-m:H:i:s]');
		 $op=$time.' '.'Absen pada tanggal '.$tgl1.'-'.$_SESSION['nik'].'-'.$_SESSION['username'].'-'.$log."\n".PHP_EOL;
		 $fp = @fopen(LOG, 'a');
		 $write = @fwrite($fp, $op);
		 @fclose($fp);
		}
		if($jumlah > 0){
		write_log("login success");
		}else{
		write_log("login fail");
		}
		
		pg_close($con);
	}
?> 
