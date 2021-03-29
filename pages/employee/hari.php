<?php

function hari(){
$hari = date ("D");

switch($hari){
    case 'Sunday':
        $hari = "Minggu";
    break;

    case 'Monday':         
        $hari = "Senin";
    break;

    case 'Tuesday':
        $hari = "Selasa";
    break;

    case 'Wednesday':
        $hari = "Rabu";
    break;

    case 'Thursday':
        $hari = "Kamis";
    break;

    case 'Friday':
        $hari = "Jumat";
    break;

    case 'Saturday':
        $hari = "Sabtu";
    break;
    
    default:
        $hari = "Tidak di ketahui";     
    break;
}
return;
} 
?>