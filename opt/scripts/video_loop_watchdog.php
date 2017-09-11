<?php
$pid = exec("ps axf |grep \"sudo /usr/local/bin/video_loop\" | grep -v grep | awk '{print $1}'");
$sn = exec("cat /proc/cpuinfo | grep Serial | awk '{print $3}'");

$hdmi_control_result = exec("curl -sk ".$cloud_hostname."/api/api.php --data \"action=get_hdmi_control&sn=$sn\"");
$hdmi_control = explode("-", $hdmi_control_result);
$hdmi_timer = $hdmi_control[0];
$hdmi_status = explode(" ", exec("tvservice -s"));

$current_time = date("H:i:s");

if($pid != " " && $pid != ""){
  echo "Video loop running.\n";
}else{
  exec("sudo /usr/local/bin/video_loop > /dev/null 2>&1 &");
  echo "Player not running. Starting Video loop...\n";
}


?>
