<?php
$pid = exec("ps axf |grep \"sudo /usr/local/bin/video_loop\" | grep -v grep | awk '{print $1}'");

if($pid != ""){
  exec("sudo /usr/local/bin/video_loop > /dev/null 2>&1 &);
  echo "Player not running. Starting Video loop...";
}else{
  echo "Video loop running.";
}


?>
