<?php
include("/opt/cron/config.php");

$sn = exec("cat /proc/cpuinfo | grep Serial | awk '{print $3}'");
$dir_net = "/sys/class/net";
$dirs = array_diff(scandir($dir_net), array('..', '.'));
$net_ifaces = "";
foreach($dirs as $dir){
    $net_ifaces .= $dir." ";
    $tx_bytes = exec("cat /sys/class/net/$dir/statistics/tx_bytes");
    $rx_bytes = exec("cat /sys/class/net/$dir/statistics/rx_bytes");
    $link_speed = exec("cat /sys/class/net/$dir/speed");


    exec("curl -sk ".$cloud_hostname."api/api.php --data \"action=device_network_activity&sn=$sn&net_interface=$dir&tx_bytes=$tx_bytes&rx_bytes=$rx_bytes&link_speed=$link_speed\"");
}
?>
