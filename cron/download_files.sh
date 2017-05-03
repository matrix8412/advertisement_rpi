#!/bin/bash

mkdir -p "/opt/cron"

wget -q --no-check-certificate "https://homepi.org/download_devices_files/advertisements_cron_files.zip" -O "/opt/advertisements_cron_files.zip"
wget -q --no-check-certificate "https://homepi.org/download_devices_files/advertisements_web_files.zip" -O "/opt/advertisements_web_files.zip"
unzip -q -o "/opt/advertisements_cron_files.zip" -d "/opt/cron"
unzip -q -o "/opt/advertisements_web_files.zip" -d "/var/www/html"
