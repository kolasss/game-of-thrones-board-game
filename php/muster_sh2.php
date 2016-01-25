<? include 'database.php';
$terr = $_GET['table'];
$terr = mysql_real_escape_string($terr);
$target = $_GET['target'];
$target = mysql_real_escape_string($target);
$targetunit = $_GET['targetunit'];
$targetunit = mysql_real_escape_string($targetunit);
$mycontrol = $_GET['control'];
$mycontrol = mysql_real_escape_string($mycontrol);
$starting = $_GET['starting'];
$starting = mysql_real_escape_string($starting);

//update units in target zone
mysql_query("UPDATE $terr SET $targetunit='S1', control='$mycontrol' WHERE `name` = '$target'");
mysql_query("UPDATE $terr SET mustered=mustered+1 WHERE `name` = '$starting'");