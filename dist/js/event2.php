<?php
	// session_start();
	$host = "localhost"; 
	$user = "postgres"; 
	$pass = "admin"; 
	$db = "hrwom"; 

	$con = pg_connect("host=$host dbname=$db  port=5432 user=$user password=$pass")
    or die ("Could not connect to server\n"); 
 
		
$result = pg_query($con, " SELECT * FROM m_events");
//$data = pg_fetch_array($result, NULL, PGSQL_ASSOC);
$calendar = array(); 
while($data=pg_fetch_assoc($result)){
	// convert  date to milliseconds
	$start = strtotime($data['start_date']) * 1000;
	$end = strtotime($data['end_date']) * 1000;	
	$calendar[] = array(
        'id' =>$data['id'],
        'title' => $data['title'],
        'url' => "#",
		"class" => 'event-important',
        'start' => "$start",
        'end' => "$end"
    ); 
}
$calendarData = array(
	"success" => 1,	
    "result"=>$calendar);
echo json_encode($calendarData);
?>