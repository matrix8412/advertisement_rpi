<?php
include("/opt/cron/config.php");

$sn = exec("cat /proc/cpuinfo | grep Serial | awk '{print $3}'")
$time_on = "";
$time_off = "";

$current_time = date("H:i");
$time_on = exec("curl -sk ".$cloud_hotname."/api/api.php --data \"action=get_time_on&sn=$sn\"");
$time_off = exec("curl -sk ".$cloud_hotname."/api/api.php --data \"action=get_time_off&sn=$sn\"");

$date1 = DateTime::createFromFormat('H:i', $current_time);
$date2 = DateTime::createFromFormat('H:i', $time_on);
$date3 = DateTime::createFromFormat('H:i', $time_off);


if($date1 > $date2 && $date1 < $date3){
  exec("/opt/vc/bin/tvservice -M");
}else{
  exec("/opt/vc/bin/tvservice -o");
}

?>
