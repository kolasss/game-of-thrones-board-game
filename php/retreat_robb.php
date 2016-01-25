<? include 'database.php';
$terr = $_GET['terr'];
$terr = mysql_real_escape_string($terr);
$game_id = $_GET['id'];
$game_id = mysql_real_escape_string($game_id);
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
$control = $_GET['control'];
$control = mysql_real_escape_string($control);

mysql_query("UPDATE `battle` SET currentplayer = '0' WHERE `id` = $game_id");

//select info from target zone
$result = mysql_query("SELECT unit1, unit2, unit3 FROM $terr WHERE `name` = '$target'");
$targetunits = mysql_fetch_assoc($result);

//update units in target zone
if ($targetunits['unit1'] == '0') {
	mysql_query("UPDATE `$terr` SET `unit1`='$unit1', `unit2`='$unit2', `unit3`='$unit3', `unit4`='$unit4', `control`='$control' WHERE `name` = '$target'");
	
} else if ($targetunits['unit2'] == '0') {
	mysql_query("UPDATE `$terr` SET `unit2`='$unit1', `unit3`='$unit2', `unit4`='$unit3', `control`='$control' WHERE `name` = '$target'");
} else if ($targetunits['unit3'] == '0') {
	mysql_query("UPDATE `$terr` SET `unit3`='$unit1', `unit4`='$unit2', `control`='$control' WHERE `name` = '$target'");
} else {
	mysql_query("UPDATE `$terr` SET `unit4`='$unit1', `control`='$control' WHERE `name` = '$target'");
};

//next phase
include 'battle_cleanup.php';
?>