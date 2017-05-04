#!/bin/sh

echo "Creating directories...\n"
mkdir -p /opt/cron/scripts

echo "Copying PHP scripts...\n"
cp -u opt/scripts/* /opt/cron/scripts/

echo "Copying BIN scripts...\n"
cp -u bin/video_loop /usr/local/bin/
chmod +x /usr/local/bin/video_loop

echo "Copying CRON scripts...\n"
cp -u opt/* /opt/cron/

cp -f cron/advertisements_cron /etc/cron.d/advertisements_cron
/etc/init.d/cron restart

apt-get install apache2 -y;
apt-get install php5 libapache2-mod-php5 -y;
rm /var/www/html/index.html

cp -u -R --recursive web/* /var/www/html/
chown -R www-data:www-data /var/www/html

apt-get -y install libpcre3 fonts-freefont-ttf;
apt-get -y install fbset;

dpkg -i omxplayer_*_armhf.deb
apt-get -y install -f
dpkg -i omxplayer_*_armhf.deb

