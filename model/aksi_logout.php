
 <?php
session_start();
unset($_SESSION["nik"]);
unset($_SESSION["username"]);
session_destroy();  
	echo "<script>alert('Anda telah keluar,Terima kasih telah mengunjungi HR Fast'); window.location ='../login.php'</script>";

  
define('LOG','log.txt');
		function write_log($log){  
		 $time = @date('[Y-d-m:H:i:s]');
		 $op=$time.' '.'Action for '.$_SESSION['nik'].'-'.$_SESSION['username'].'-'.$log."\n".PHP_EOL;
		 $fp = @fopen(LOG, 'a');
		 $write = @fwrite($fp, $op);
		 @fclose($fp);
		}
		if($jumlah > 0){
		write_log("login success");
		}else{
		write_log("login fail");
		}	
?> 
