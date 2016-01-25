<? include 'database.php';
$terr = $_GET['table'];
$terr = mysql_real_escape_string($terr);
$game_id = $_GET['id'];
$game_id = mysql_real_escape_string($game_id);
$starting = $_GET['starting'];
$starting = mysql_real_escape_string($starting);
$target = $_GET['target'];
$target = mysql_real_escape_string($target);
$unit1 = $_GET['unit1'];
$unit1 = mysql_real_escape_string($unit1);
$unit2 = $_GET['unit2'];
$unit2 = mysql_real_escape_string($unit2);
$unit3 = $_GET['unit3'];
$unit3 = mysql_real_escape_string($unit3);
$unit4 = $_GET['unit4'];
$unit4 = mysql_real_escape_string($unit4);

//select info from target zone
$result = mysql_query("SELECT unit1, unit2, unit3 FROM $terr where `name` = '$target'");
$targetunits = mysql_fetch_assoc($result);

//select info from starting zone
$result = mysql_query("SELECT $unit1, $unit2, $unit3, $unit4, control FROM $terr where `name` = '$starting'");
$startingunits = mysql_fetch_assoc($result);

//update units in target zone
if ($targetunits['unit1'] == '0') {
	mysql_query("UPDATE `$terr` SET `unit1`='$startingunits[$unit1]', `unit2`='$startingunits[$unit2]', `unit3`='$startingunits[$unit3]', `unit4`='$startingunits[$unit4]', `control`='$startingunits[control]' WHERE `name` = '$target'");
	mysql_query("UPDATE `$terr` SET `$unit1`='0' WHERE `name` = '$starting'");
	mysql_query("UPDATE `$terr` SET `$unit2`='0' WHERE `name` = '$starting'");
	mysql_query("UPDATE `$terr` SET `$unit3`='0' WHERE `name` = '$starting'");
	mysql_query("UPDATE `$terr` SET `$unit4`='0' WHERE `name` = '$starting'");
	
} else if ($targetunits['unit2'] == '0') {
	mysql_query("UPDATE `$terr` SET `unit2` = '$startingunits[$unit1]', `unit3` = '$startingunits[$unit2]', `unit4` = '$startingunits[$unit3]', `control`='$startingunits[control]' WHERE `name` = '$target'");
	mysql_query("UPDATE `$terr` SET `$unit1`='0' WHERE `name` = '$starting'");
	mysql_query("UPDATE `$terr` SET `$unit2`='0' WHERE `name` = '$starting'");
	mysql_query("UPDATE `$terr` SET `$unit3`='0' WHERE `name` = '$starting'");
} else if ($targetunits['unit3'] == '0') {
	mysql_query("UPDATE `$terr` SET `unit3` = '$startingunits[$unit1]', `unit4` = '$startingunits[$unit2]', `control`='$startingunits[control]' WHERE `name` = '$target'");
	mysql_query("UPDATE `$terr` SET `$unit1`='0' WHERE `name` = '$starting'");
	mysql_query("UPDATE `$terr` SET `$unit2`='0' WHERE `name` = '$starting'");
} else {
	mysql_query("UPDATE `$terr` SET `unit4` = '$startingunits[$unit1]', `control`='$startingunits[control]' WHERE `name` = '$target'");
	mysql_query("UPDATE `$terr` SET `$unit1`='0' WHERE `name` = '$starting'");
}
//sorting units in starting zone
$result = mysql_query("SELECT unit1, unit2, unit3, unit4 FROM $terr where `name` = '$starting'");
$startingunits = mysql_fetch_assoc($result);
rsort($startingunits);
mysql_query("UPDATE `$terr` SET `unit1`='$startingunits[0]', `unit2`='$startingunits[1]', `unit3`='$startingunits[2]', `unit4`='$startingunits[3]' WHERE `name` = '$starting'");


?>