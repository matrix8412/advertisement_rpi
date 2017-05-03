<?php
exec("sudo php /opt/cron/scripts/device_discovery.php");
exec("sudo php /opt/cron/scripts/check_files.php");
?>
