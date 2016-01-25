<? include 'database.php';
$game_id = $_GET['id'];
$game_id = mysql_real_escape_string($game_id);
$unit1 = $_GET['unit1'];
$unit1 = mysql_real_escape_string($unit1);
$unit2 = $_GET['unit2'];
$unit2 = mysql_real_escape_string($unit2);
$unit3 = $_GET['unit3'];
$unit3 = mysql_real_escape_string($unit3);
$unit4 = $_GET['unit4'];
$unit4 = mysql_real_escape_string($unit4);

//delete units
mysql_query("UPDATE battle SET $unit1='0' WHERE id = '$game_id'");
mysql_query("UPDATE battle SET $unit2='0' WHERE id = '$game_id'");
mysql_query("UPDATE battle SET $unit3='0' WHERE id = '$game_id'");
mysql_query("UPDATE battle SET $unit4='0' WHERE id = '$game_id'");

//sorting units in battle zone
$result = mysql_query("SELECT attacker, defender, winner, acard, dcard FROM `battle` WHERE `id` = '$game_id'");
$battle = mysql_fetch_assoc($result);

if ($battle['attacker'] == $battle['winner']) {
	$result = mysql_query("SELECT dunit1, dunit2, dunit3, dunit4 FROM `battle` WHERE `id` = '$game_id'");
	$units = mysql_fetch_assoc($result);
	rsort($units);
	mysql_query("UPDATE `battle` SET `dunit1`='$units[0]', `dunit2`='$units[1]', `dunit3`='$units[2]', `dunit4`='$units[3]', 1ready='0', currentplayer='0' WHERE `id` = '$game_id'");
} else {
	$result = mysql_query("SELECT aunit1, aunit2, aunit3, aunit4 FROM `battle` WHERE `id` = '$game_id'");
	$units = mysql_fetch_assoc($result);
	rsort($units);
	mysql_query("UPDATE `battle` SET `aunit1`='$units[0]', `aunit2`='$units[1]', `aunit3`='$units[2]', `aunit4`='$units[3]', 1ready='0', currentplayer='0' WHERE `id` = '$game_id'");
}

//Retreat phase
mysql_query("UPDATE `game` SET faza = 12 WHERE `id` = $game_id");
$terr = $_GET['terr'];
$terr = mysql_real_escape_string($terr);
$housetable = $_GET['house'];
$housetable = mysql_real_escape_string($housetable);
$kills = 0;

include 'battle_retreat.php';

//next phase
$result = mysql_query("SELECT currentplayer FROM battle WHERE id=$game_id");
$curr = mysql_fetch_assoc($result);
if ($curr['currentplayer'] == '0') {
    include 'battle_cleanup.php';
};
?>