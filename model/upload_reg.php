 <?php
	include "../config/config.php";
	$host = "localhost"; 
	$user = "postgres"; 
	$pass = "admin"; 
	$db = "hrwom"; 

	$con = pg_connect("host=$host dbname=$db  port=5432 user=$user password=$pass")
    or die ("Could not connect to server\n");  
	
	function compress($source, $destination, $quality)
	 {
		 $info = getimagesize($source);
		 if ($info['mime'] == 'image/jpeg') $image = imagecreatefromjpeg($source);
		 elseif ($info['mime'] == 'image/gif') $image = imagecreatefromgif($source);
		 elseif ($info['mime'] == 'image/png') $image = imagecreatefrompng($source);
		 imagejpeg($image, $destination, $quality);
		 return $destination;
	 } 
  
	$direktori = 'foto_user/';   
	$sql2 = "SELECT count(*) as total FROM m_users";
	$query = pg_query($sql2);
	while($row = pg_fetch_array($query)){
	$total = $row["total"]; 
	
	$filename = $direktori.$total .'.jpg';  
	move_uploaded_file(compress($_FILES['webcam']['tmp_name'], $filename, 35));  
	}
?>