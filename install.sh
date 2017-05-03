$!/bin/sh

mkdir -p /opt/cron/scripts

cp -f scripts/device_discovery.php /opt/cron/scripts/
cp -f scripts/device_stats.php /opt/cron/scripts/
cp -f scripts/check_files.php /opt/cron/scripts/
cp -f scripts/network_stats.php /opt/cron/scripts/

cp -f cloud_every_01d.php /opt/cron/
cp -f cloud_every_12h.php /opt/cron/
cp -f cloud_every_06h.php /opt/cron/
cp -f cloud_every_02h.php /opt/cron/
cp -f cloud_every_01h.php /opt/cron/
cp -f cloud_every_30m.php /opt/cron/
cp -f cloud_every_15m.php /opt/cron/
cp -f cloud_every_05m.php /opt/cron/
cp -f cloud_every_01m.php /opt/cron/
cp -f config.php /opt/cron/
cp -f rc_local.php /opt/cron/


