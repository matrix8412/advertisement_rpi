<?php
include("/opt/cron/config.php");

function get_server_memory_usage(){
 
	$free = shell_exec('free');
	$free = (string)trim($free);
	$free_arr = explode("\n", $free);
	$mem = explode(" ", $free_arr[1]);
	$mem = array_filter($mem);
	$mem = array_merge($mem);
	$memory_usage = $mem[2]/$mem[1]*100;
 
	return $memory_usage;
}



$cpu_model = explode(": ", exec("cat /proc/cpuinfo | grep \"model name\""));
$cpu_model = $cpu_model[1];
$hardware = exec("cat /proc/cpuinfo | grep Hardware | awk '{print $3}'");
$revision = exec("cat /proc/cpuinfo | grep Revision | awk '{print $3}'");
$sn = exec("cat /proc/cpuinfo | grep Serial | awk '{print $3}'");
$cpuCoreVolts = exec("/opt/vc/bin/vcgencmd measure_volts core");
$cpuCoreVolts = str_replace("volt=", "", $cpuCoreVolts);
$cpuCoreVolts = str_replace("V", "", $cpuCoreVolts);
$cpuCurFreq = exec("cat /sys/devices/system/cpu/cpu0/cpufreq/cpuinfo_cur_freq");
$cpuTemp0 = exec("cat /sys/class/thermal/thermal_zone0/temp");
$cpuTemp1 = $cpuTemp0/1000;
$cpuTemp2 = $cpuTemp0/100;
$cpuTempM = $cpuTemp2 % $cpuTemp1;
$cpuTemp = $cpuTemp1.$cpuTempM;

$gpuTemp0 = exec("/opt/vc/bin/vcgencmd measure_temp");
$gpuTemp1 = str_replace("temp=", "", $gpuTemp0);
$gpuTemp = str_replace("'C", "", $gpuTemp1);

$sdram_c_volts = exec("/opt/vc/bin/vcgencmd measure_volts sdram_c");
$sdram_c_volts = str_replace("volt=", "", $sdram_c_volts);
$sdram_c_volts = str_replace("V", "", $sdram_c_volts);

$sdram_i_volts = exec("/opt/vc/bin/vcgencmd measure_volts sdram_i");
$sdram_i_volts = str_replace("volt=", "", $sdram_i_volts);
$sdram_i_volts = str_replace("V", "", $sdram_i_volts);

$sdram_p_volts = exec("/opt/vc/bin/vcgencmd measure_volts sdram_p");
$sdram_p_volts = str_replace("volt=", "", $sdram_p_volts);
$sdram_p_volts = str_replace("V", "", $sdram_p_volts);


$uptime = explode(" ", exec("cat /proc/uptime"));
$idle_time = $uptime[1];
$sysuptime = $uptime[0];


$load_average = explode(" ", exec("cat /proc/loadavg"));
$load_average1 = $load_average[0];
$load_average5 = $load_average[1];
$load_average15 = $load_average[2];

$disk_total_space = disk_total_space("/");
$disk_free_space = disk_free_space("/");

$memory_usage = get_server_memory_usage();

$dir_net = "/sys/class/net";
$dirs = array_diff(scandir($dir_net), array('..', '.'));
$net_ifaces = "";
foreach($dirs as $dir){
    $net_ifaces .= $dir." ";
}

echo "Hardware: ".$hardware."\n";
echo "Revision: ".$revision."\n";
echo "S/N: ".$sn."\n\n";

echo "CPU model: ".$cpu_model."\n";

$aaa = exec("curl -sk ".$cloud_hostname."api/api.php --data \"action=device_keepalive_rpi&hardware=$hardware&revision=$revision&sn=$sn&cpu_model=$cpu_model&cpuCoreVolts=$cpuCoreVolts&cpuCurFreq=$cpuCurFreq&cpuTemp=$cpuTemp&gpuTemp=$gpuTemp&sdram_c_volts=$sdram_c_volts&sdram_i_volts=$sdram_i_volts&sdram_p_volts=$sdram_p_volts&sysuptime=$sysuptime&loadavg1=$load_average1&loadavg5=$load_average5&loadavg15=$load_average15&net_ifaces=$net_ifaces&memory_usage=$memory_usage&disk_free_space=$disk_free_space&disk_total_space=$disk_total_space\"");
?>
