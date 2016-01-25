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

mysql_query("UPDATE `battle` SET currentplayer = '0' WHERE `id` = $game_id");

//select info from target zone
$result = mysql_query("SELECT unit1, unit2, unit3 FROM $terr WHERE `name` = '$target'");
$targetunits = mysql_fetch_assoc($result);

//select info from starting zone
$result = mysql_query("SELECT $unit1, $unit2, $unit3, $unit4, defender FROM battle WHERE id = '$game_id'");
$startingunits = mysql_fetch_assoc($result);

if ($startingunits['defender'] == 'Baratheon') {
	$dcontrol = 'B';
} else if ($startingunits['defender'] == 'Stark') {
	$dcontrol = 'S';
} else if ($startingunits['defender'] == 'Greyjoy') {
	$dcontrol = 'G';
} else if ($startingunits['defender'] == 'Tyrell') {
	$dcontrol = 'T';
} else if ($startingunits['defender'] == 'Lannister') {
	$dcontrol = 'L';
} else if ($startingunits['defender'] == 'Martell') {
	$dcontrol = 'M';
};

//update units in target zone
if ($targetunits['unit1'] == '0') {
	mysql_query("UPDATE `$terr` SET `unit1`='$startingunits[$unit1]', `unit2`='$startingunits[$unit2]', `unit3`='$startingunits[$unit3]', `unit4`='$startingunits[$unit4]', `control`='$dcontrol' WHERE `name` = '$target'");
} else if ($targetunits['unit2'] == '0') {
	mysql_query("UPDATE `$terr` SET `unit2` = '$startingunits[$unit1]', `unit3` = '$startingunits[$unit2]', `unit4` = '$startingunits[$unit3]', `control`='$dcontrol' WHERE `name` = '$target'");
} else if ($targetunits['unit3'] == '0') {
	mysql_query("UPDATE `$terr` SET `unit3` = '$startingunits[$unit1]', `unit4` = '$startingunits[$unit2]', `control`='$dcontrol' WHERE `name` = '$target'");
} else {
	mysql_query("UPDATE `$terr` SET `unit4` = '$startingunits[$unit1]', `control`='$dcontrol' WHERE `name` = '$target'");
};

//next phase
include 'battle_cleanup.php';
?>