<?php
function addBusinessDays($date,$numDays,$holidays='')
{
    if ($holidays==='')
$holidays = 'https://www.officeholidays.com/ics/ics_country_code.php?iso=ID';

    if (!is_array($holidays)) {
        $ch = curl_init($holidays);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        $ics = curl_exec($ch);
        curl_close($ch);
        $ics = explode("\n",$ics);
        $ics = preg_grep('/^DTSTART;/',$ics);
        $holidays = preg_replace('/^DTSTART;VALUE=DATE:(\\d{4})(\\d{2})(\\d{2}).*/s','$1-$2-$3',$ics);
    }

    $addDay = 0;
    while ($numDays--) {
        while (true) {
            $addDay++;
            $newDate = date('Y-m-d', strtotime("$date +$addDay Days"));
            $newDayOfWeek = date('w', strtotime($newDate));
            if ( $newDayOfWeek>0 && $newDayOfWeek<6 && !in_array($newDate,$holidays)) break;
        }
    }

    return $newDate;
}

$startdate = '2018-07-18';
$businessdays = 10; //lama jatuh tempo dari tanggal nota penjualan

$a = addBusinessDays($startdate, $businessdays);

echo $a;
?>