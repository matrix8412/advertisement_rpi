<?php
include("/opt/cron/config.php");

$sn = exec("cat /proc/cpuinfo | grep Serial | awk '{print $3}'");

$current_time = date("H:i");
$hdmi_control_result = exec("curl -sk ".$cloud_hostname."/api/api.php --data \"action=get_hdmi_control&sn=$sn\"");
$hdmi_control = explode("-", $hdmi_control_result);

$current_time = date("H:i:s");

if($current_time > $hdmi_control[1] && $current_time < $hdmi_control[2]){
  exec("/opt/vc/bin/tvservice -p");
  echo "Turning on HDMI...\n";
}else{
  exec("/opt/vc/bin/tvservice -o");
  echo "Turning off HDMI...\n";
}

?>

