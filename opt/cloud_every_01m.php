<?php
exec("sudo mkdir -p /run/advrpi_files");
exec("sudo mkdir -p /run/advrpi_files/xml");

exec("sudo php /opt/cron/scripts/device_stats.php");
#exec("sudo php /opt/cron/scripts/network_stats.php");
#exec("sudo php /opt/cron/scripts/play_watchdog.php");

?>

