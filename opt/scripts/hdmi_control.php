<?php
include("/opt/cron/config.php");

$sn = exec("cat /proc/cpuinfo | grep Serial | awk '{print $3}'")
$time_on = "";
$time_off = "";

$current_time = date("H:i");
$hdmi_control = explode("-", exec("curl -sk ".$cloud_hotname."/api/api.php --data \"action=get_hdmi_control&sn=$sn\""));

$date1 = DateTime::createFromFormat('H:i', $hdmi_control[0]);
$date2 = DateTime::createFromFormat('H:i', $hdmi_control[1]);
$date3 = DateTime::createFromFormat('H:i', $hdmi_control[2]);


if($date1 > $date2 && $date1 < $date3){
  exec("/opt/vc/bin/tvservice -M");
}else{
  exec("/opt/vc/bin/tvservice -o");
}

?>