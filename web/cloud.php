<?php
if($form_action == "change_cloud_settings") {
    gen_cloud_config($_REQUEST['cloud_device_auth_token']);
}

$xml = simplexml_load_file("/var/www/html/config/cloud_settings.xml");

$cloud_key = $xml->cloud_device_auth_key;


echo "<h2>Cloud settings</h2> \n";
echo "<div class=\"main_div\">";
echo "<form action=\"index.php\" method=\"get\"> \n";
echo "<input type=\"hidden\" name=\"action\" value=\"".$_REQUEST['action']."\"> \n";
echo "<input type=\"hidden\" name=\"form_action\" value=\"change_cloud_settings\"> \n";
echo "<table class=\"insert_table\"> \n"; 
echo "<thead> \n";
echo "  <tr> \n";
echo "      <th style=\"\">Cloud device auth token</th> \n";
echo "  </tr>\n";
echo "</thead>\n";
echo "<tbody> \n";
echo "  <tr> \n";
echo "    <td><input type=\"text\" name=\"cloud_device_auth_token\" placeholder=\"Your cloud device authorization token..\" value=\"$cloud_key\"/></td> \n";
echo "    <td><input type=\"submit\" value=\"Save\"></td> \n";
echo "  </tr> \n";
echo "</tbody> \n";
echo "</table> \n";
echo "</form> \n";
echo "</div>";



?>
