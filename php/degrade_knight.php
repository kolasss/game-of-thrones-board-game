<? include 'database.php';
$terr = $_GET['table'];
$terr = mysql_real_escape_string($terr);
$target = $_GET['target'];
$target = mysql_real_escape_string($target);
$targetunit = $_GET['targetunit'];
$targetunit = mysql_real_escape_string($targetunit);

//update units in target zone
mysql_query("UPDATE $terr SET $targetunit='F1' WHERE `name` = '$target'");

