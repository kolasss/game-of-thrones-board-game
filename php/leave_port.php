<? include 'database.php';
$terr = $_GET['table'];
$terr = mysql_real_escape_string($terr);
$target = $_GET['target'];
$target = mysql_real_escape_string($target);

//update units and control in target zone
mysql_query("UPDATE `$terr` SET `unit1`='0', `unit2`='0', `unit3`='0', `unit4`='0', `control`='0' WHERE `name` = '$target'");

