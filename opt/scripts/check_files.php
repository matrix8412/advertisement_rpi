<?php
include("/opt/cron/config.php");

exec("mkdir -p /mnt/videos");

$cloud_key_file = "/var/www/html/config/cloud_settings.xml";
$sn = exec("cat /proc/cpuinfo | grep Serial | awk '{print $3}'");

if(file_exists($cloud_key_file)){
  $xml_cloud = simplexml_load_file($cloud_key_file);
  $cloud_key = $xml_cloud->cloud_device_auth_key;
}else{
  $cloud_key = "";
}

if($cloud_key != ""){
  $customer_id = exec("curl -sk \"".$cloud_hostname."api/api.php\" --data \"action=get_customer_id&cloud_device_auth_key=$cloud_key\"");
  $output_dir = "/mnt/videos";
  $localfiles = scandir($output_dir); // Or any other directory
  $local_files_array = array_diff($localfiles, array('.', '..'));
  $remote_files = exec("curl -sk \"".$cloud_hostname."api/api.php\" --data \"action=get_files&cloud_device_auth_key=$cloud_key&sn=$sn\"");
  $remote_files_array = explode(" ", $remote_files);

  foreach ($remote_files_array as $remote_file){
    if(in_array($remote_file, $local_files_array)){
      $local_file_modify_date = filemtime($output_dir."/".$remote_file);
      $remote_file_modify_date = exec("curl -sk \"".$cloud_hostname."\"api/api.php --data \"action=get_modify_date\"");
      if($local_file_modify_date < $remote_file_modify_date){
        echo "File $remote_file is old. Downloading actual file\n";
        exec("wget --no-check-certificate ".$cloud_video_storage_url."".$customer_id."/".$remote_file." -O /mnt/videos/".$remote_file."");
      }else{
        echo "File $remote_file is actual.\n";
      }
    }else{
      echo "File $remote_file does not exist in local file system. Downloading File...\n";
      exec("wget --no-check-certificate ".$cloud_video_storage_url."".$customer_id."/".$remote_file." -O /mnt/videos/".$remote_file."");
    }
  }

  foreach ($local_files_array as $local_file){
    if(!in_array($local_file, $remote_files_array)){
      echo "File $local_file is removed from Cloud. Removing local file.";
      unlink($output_dir."/".$local_file);
    }
 }
}



?>
