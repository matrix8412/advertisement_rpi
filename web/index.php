<?php
include('function.php');

if(isset($_REQUEST['alert'])){$alert = $_REQUEST['alert'];}else{$alert = "";}
if(isset($_REQUEST['action'])){$action = $_REQUEST['action'];}else{$action = "";}
if(isset($_REQUEST['form_action'])){$form_action = $_REQUEST['form_action'];}else{$form_action = "";}


echo "<!DOCTYPE html> \n";
echo "<head> \n";
echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"theme.css\"> \n";
echo "<title>Raspberry Transcoder</title> \n";
echo "</head> \n";
echo "<body> \n";

include('menu.php');

if($action == "" || $action == "status"){
    include('status.php');
}
if($action == "cloud"){
    include('cloud.php');
}
if($action == "settings"){
    include('settings.php');
}
if($action == "account"){
    include('account.php');
}

echo "<body>";
echo "</html>";
?>
