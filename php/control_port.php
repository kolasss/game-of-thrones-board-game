<? include 'database.php';
$terr = $_GET['table'];
$terr = mysql_real_escape_string($terr);
$target = $_GET['target'];
$target = mysql_real_escape_string($target);
$mycontrol = $_GET['control'];
$mycontrol = mysql_real_escape_string($mycontrol);


//update control in target zone
mysql_query("UPDATE $terr SET `control`='$mycontrol' WHERE `name` = '$target'");

