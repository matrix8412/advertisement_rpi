<?php
include("/opt/cron/config.php");

$sn = exec("cat /proc/cpuinfo | grep Serial | awk '{print $3}'");

$current_time = date("H:i");
$hdmi_control = explode("-", exec("curl -sk ".$cloud_hostname."/api/api.php --data \"action=get_hdmi_control&sn=$sn\""));

$date1 = DateTime::createFromFormat('H:i', $current_time);
$date2 = DateTime::createFromFormat('H:i', $hdmi_control[1]);
$date3 = DateTime::createFromFormat('H:i', $hdmi_control[2]);


if($date1 > $date2 && $date1 < $date3){
  exec("/opt/vc/bin/tvservice -M");
  echo "Turning on HDMI...\n";
}else{
  exec("/opt/vc/bin/tvservice -o");
  echo "Turning off HDMI...\n";
}

?>
