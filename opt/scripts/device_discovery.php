<?php
include("/opt/cron/config.php");
$cloud_key_file = "/var/www/html/config/cloud_settings.xml";

if(file_exists($cloud_key_file)){
  $xml_cloud = simplexml_load_file($cloud_key_file);
  $cloud_key = $xml_cloud->cloud_device_auth_key;
}else{
  $cloud_key = "";
}

$hardware = exec("cat /proc/cpuinfo | grep Hardware | awk '{print $3}'");
$revision = exec("cat /proc/cpuinfo | grep Revision | awk '{print $3}'");
$sn = exec("cat /proc/cpuinfo | grep Serial | awk '{print $3}'");

$result =  exec("curl -sk ".$cloud_hostname."api/api.php --data \"action=device_discovery_rpi&hardware=$hardware&revision=$revision&sn=$sn&cloud_device_auth_key=$cloud_key\"");
echo "Hardware: ".$hardware."\n";
echo "Revision: ".$revision."\n";
echo "S/N: ".$sn."\n";
echo "Action: ".$result."\n";




?>
