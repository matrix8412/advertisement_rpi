#!/bin/sh

cp -f /cron/cloud_cron /etc/cron.d/cloud_cron

/etc/init.d/cron restart


mkdir -p /opt/cron/scripts

cp -f opt/scripts/device_discovery.php /opt/cron/scripts/
cp -f opt/scripts/device_stats.php /opt/cron/scripts/
cp -f opt/scripts/check_files.php /opt/cron/scripts/
cp -f opt/scripts/network_stats.php /opt/cron/scripts/

cp -f opt/cloud_every_01d.php /opt/cron/
cp -f opt/cloud_every_12h.php /opt/cron/
cp -f opt/cloud_every_06h.php /opt/cron/
cp -f opt/cloud_every_02h.php /opt/cron/
cp -f opt/cloud_every_01h.php /opt/cron/
cp -f opt/cloud_every_30m.php /opt/cron/
cp -f opt/cloud_every_15m.php /opt/cron/
cp -f opt/cloud_every_05m.php /opt/cron/
cp -f opt/cloud_every_01m.php /opt/cron/
cp -f opt/config.php /opt/cron/
cp -f opt/rc_local.php /opt/cron/

cp -f bin/video_loop /usr/local/bin/
chmod +x /usr/local/bin/video_loop
