<?php

function gen_cloud_config($cloud_device_auth_key){
    $xml = "";
    $xml .= "<?xml version=\"1.0\" encoding=\"UTF-8\"?> \n";
    $xml .= "<cloud_settings> \n";
    $xml .= "   <cloud_device_auth_key>$cloud_device_auth_key</cloud_device_auth_key> \n";
    $xml .= "</cloud_settings> \n";

    $fp = fopen("/var/www/html/config/cloud_settings.xml", "w");
    fwrite($fp, $xml);
    fclose($fp);
}

?>
