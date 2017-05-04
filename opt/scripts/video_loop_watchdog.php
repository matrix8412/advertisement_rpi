<?php
$pid = exec("ps axf |grep \"sudo /usr/local/bin/video_loop\" | grep -v grep | awk '{print $1}'");

if($pid != " " && $pid != ""){
  echo "Video loop running.\n";
}else{
  exec("sudo /usr/local/bin/video_loop > /dev/null 2>&1 &");
  echo "Player not running. Starting Video loop...\n";
}


?>
