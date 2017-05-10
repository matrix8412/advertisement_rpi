<?php
include("/opt/cron/config.php");

exec("curl -sk ".$cloud_hotname."/api/api.php --data \"action=get_time_on&sn=\"");


?>
