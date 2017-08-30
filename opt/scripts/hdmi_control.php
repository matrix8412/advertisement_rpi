<?php
include("/opt/cron/config.php");

$hdmi_state_on = "0x12000a";
$hdmi_state_off = "0x120002";

$sn = exec("cat /proc/cpuinfo | grep Serial | awk '{print $3}'");

$hdmi_control_result = exec("curl -sk ".$cloud_hostname."/api/api.php --data \"action=get_hdmi_control&sn=$sn\"");
$hdmi_control = explode("-", $hdmi_control_result);
$hdmi_timer = $hdmi_control[0];
$hdmi_status = explode(" ", exec("tvservice -s"));

$current_time = date("H:i:s");

echo $hdmi_status[1]."\n";
if($current_time > $hdmi_control[1] && $current_time < $hdmi_control[2]){
    if($hdmi_status[1] == $hdmi_state_off){
        echo "HDMI status is OFF\n";
        exec("/opt/vc/bin/tvservice -p");
        echo "Turning on HDMI...\n";
    }else{
        echo "HDMI status is ON\n";
    }
}else{
    if($hdmi_status[1] == $hdmi_state_on){
        echo "HDMI status is OFF\n";
    }else{
        echo "HDMI status is ON\n";
        exec("/opt/vc/bin/tvservice -o");
        echo "Turning off HDMI...\n";
    }
}

?>

