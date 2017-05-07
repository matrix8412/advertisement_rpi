<?php
$webif_config_dir = "/var/www/html/config";

if(!file_exists($webif_config_dir)){
  exec("mkdir -p /var/www/html/config");
}

exec("sudo mkdir -p /run/advrpi_files");
exec("sudo mkdir -p /run/advrpi_files/xml");

exec("sudo php /opt/cron/scripts/device_stats.php");
exec("sudo php /opt/cron/scripts/video_loop_watchdog.php");
#exec("sudo php /opt/cron/scripts/network_stats.php");

?>

