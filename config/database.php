 
<?php
/*
$servername = "localhost";
$username = "root";
$password = ""; 
$db_base = "hris";
// Create connection
$conn = mysqli_connect($servername, $username, $password,$db_base);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "Connect*/
?>
<?php 
 /* $pdoString = "pgsql:host=localhost dbname=hrwom user=postgres password=admin";
  $pdo = new PDO($pdoString);
  if (!$pdo) {
    die("Could not connect");
  } */
  
    $host = "localhost"; 
	$user = "postgres"; 
	$pass = "admin"; 
	$db = "hrwom"; 

	$con = pg_connect("host=$host dbname=$db  port=5432 user=$user password=$pass")
    or die ("Could not connect to server\n"); 
	
 /* 
$host = "localhost";
$port = "5432";
$dbname = "hrwom";
$user = "postgres";
$password = "admin";
$pg_options = "--client_encoding=UTF8";

$connection_string = "host={$host} port={$port} dbname={$dbname} user={$user} password={$password} options='{$pg_options}'";
$dbconn = pg_connect($connection_string);


if($dbconn){
    echo "Connected to ". pg_host($dbconn); 
}else{
    echo "Error in connecting to database.";
}

echo "<br />";*/
?>