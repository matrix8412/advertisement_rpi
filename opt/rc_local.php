<?php
exec("sudo /usr/local/bin/disable_console");
sleep(2);
exec("sudo /etc/cron.daily/download_files.sh");
sleep(2);
exec("sudo /usr/local/bin/video_loop > /dev/null 2>&1 &");
sleep(2);

?>
