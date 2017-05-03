<?php

echo "<table id=\"menu\"> \n";
echo "  <tr> \n";
echo "    <td><a onclick=\"window.open('index.php','_self');\">Status</a></td> \n";
echo "    <td><a onclick=\"window.open('index.php?action=cloud','_self');\"";if($action=="cloud"){echo " id=\"active\"";}echo ">Cloud</a></td> \n";
echo "    <td><a onclick=\"window.open('index.php?action=settings','_self');\"";if($action=="settings"){echo " id=\"active\"";}echo ">Settings</a></td> \n";
echo "    <td><a onclick=\"window.open('index.php?action=account','_self');\"";if($action=="account"){echo " id=\"active\"";}echo ">Your Account</a></td> \n";
echo "  </tr> \n";
echo "</table>";
echo "<hr></hr>\n";

echo "<audio>";
echo "  <source src=\"click.mp3\"></source>";
echo "  <source src=\"click.ogg\"></source>";
echo "</audio>";


?>
