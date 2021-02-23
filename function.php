<?php  session_start();

$_SESSION['gorgorothAdultRate'] = 1800;
$_SESSION['gorgorothChildRate'] = 800;

$_SESSION['budapestAdultRate'] = 3000;
$_SESSION['budapestChildRate'] = 2000;

$_SESSION['transylvaniaAdultRate'] = 2200;
$_SESSION['transylvaniaChildRate'] = 1300;

$_SESSION['overlookAdultRate'] = 2500;
$_SESSION['overlookDayChildRate'] = 1500;


function dateDiffInDays($date1, $date2) { 
    $diff = strtotime($date2) - strtotime($date1); 
    return (abs(round($diff / 86400))) + 1; // 86400 is the number of seconds in the day. Adding 1 includes the day booked
} 

?>