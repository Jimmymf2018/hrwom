<?php

session_start();
function compress($source, $destination, $quality)
 {
     $info = getimagesize($source);
     if ($info['mime'] == 'image/jpeg') $image = imagecreatefromjpeg($source);
     elseif ($info['mime'] == 'image/gif') $image = imagecreatefromgif($source);
     elseif ($info['mime'] == 'image/png') $image = imagecreatefrompng($source);
     imagejpeg($image, $destination, $quality);
     return $destination;
 }
 
$nama_file = time().'.jpg';
$direktori = '../../model/foto/';
$target = $direktori.$nama_file;
 
		
$source_img = $_FILES['filename']['tmp_name'];
$tglfoto =  date('Y-m-d');


if(date("H")< 12)
		{ 
		$filename = $direktori.$_SESSION['nik'].'-'.$tglfoto.'-IN.jpg'; 
		move_uploaded_file(compress($_FILES['webcam']['tmp_name'], $filename, 35)); 
		}
		else
		{ 
		$filename = $direktori.$_SESSION['nik'].'-'.$tglfoto.'-OUT.jpg'; 
		move_uploaded_file(compress($_FILES['webcam']['tmp_name'], $filename, 35)); 
		}	

?>
 