#!/bin/sh

echo "Creating directories...\n"
mkdir -p /opt/cron/scripts

echo "Copying PHP scripts...\n"
cp -f opt/scripts/* /opt/cron/scripts/

echo "Copying BIN scripts...\n"
cp -f bin/video_loop /usr/local/bin/
chmod +x /usr/local/bin/video_loop

echo "Copying CRON scripts...\n"
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

cp -f cron/advertisements_cron /etc/cron.d/advertisements_cron
/etc/init.d/cron restart

apt-get install apache2 -y;
apt-get install php5 libapache2-mod-php5 -y;
rm /var/www/html/index.html

cp -f -R web/* /var/www/html/
chown -R www-data:www-data /var/www/html

apt-get -y install libpcre3 fonts-freefont-ttf;
apt-get -y install fbset;
cd /tmp/
wget http://omxplayer.sconde.net/builds/omxplayer_0.3.6~git20150505~b1ad23e_armhf.deb
dpkg -i omxplayer_*_armhf.deb
