﻿<? include 'database.php';
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
$aorder = $_GET['order'];
$aorder = mysql_real_escape_string($aorder);

//select info from target zone
$result = mysql_query("SELECT unit1, unit2, unit3, unit4, control, prikaz, garrison, castle FROM $terr where `name` = '$target'");
$targetinfo = mysql_fetch_assoc($result);

//select info from starting zone
$result = mysql_query("SELECT $unit1, $unit2, $unit3, $unit4, control FROM $terr where `name` = '$starting'");
$startinginfo = mysql_fetch_assoc($result);
$startinginfo['0'] = 0;

//update units in starting zone
mysql_query("UPDATE `$terr` SET `$unit1`='0' WHERE `name` = '$starting'");
mysql_query("UPDATE `$terr` SET `$unit2`='0' WHERE `name` = '$starting'");
mysql_query("UPDATE `$terr` SET `$unit3`='0' WHERE `name` = '$starting'");
mysql_query("UPDATE `$terr` SET `$unit4`='0' WHERE `name` = '$starting'");

//sorting units in starting zone
$result = mysql_query("SELECT unit1, unit2, unit3, unit4 FROM $terr where `name` = '$starting'");
$startingunits = mysql_fetch_assoc($result);
rsort($startingunits);
mysql_query("UPDATE `$terr` SET `unit1`='$startingunits[0]', `unit2`='$startingunits[1]', `unit3`='$startingunits[2]', `unit4`='$startingunits[3]' WHERE `name` = '$starting'");

//attacker and defender names
if ($startinginfo['control'] == 'G') {
	$attacker = 'Greyjoy';
} else if ($startinginfo['control'] == 'S') {
	$attacker = 'Stark';
} else if ($startinginfo['control'] == 'B') {
	$attacker = 'Baratheon';
} else if ($startinginfo['control'] == 'L') {
	$attacker = 'Lannister';
} else if ($startinginfo['control'] == 'T') {
	$attacker = 'Tyrell';
} else if ($startinginfo['control'] == 'M') {
	$attacker = 'Martell';
}

if ($targetinfo['control'] == 'G') {
	$defender = 'Greyjoy';
} else if ($targetinfo['control'] == 'S') {
	$defender = 'Stark';
} else if ($targetinfo['control'] == 'B') {
	$defender = 'Baratheon';
} else if ($targetinfo['control'] == 'L') {
	$defender = 'Lannister';
} else if ($targetinfo['control'] == 'T') {
	$defender = 'Tyrell';
} else if ($targetinfo['control'] == 'M') {
	$defender = 'Martell';
}

//battle phase
mysql_query("UPDATE `game` SET faza=7 WHERE `id` = $game_id");
//update battle table
mysql_query("UPDATE `battle` SET `starting`='$starting', `target`='$target', `attacker`='$attacker', `defender`='$defender', `aorder`='$aorder', `dorder`='".$targetinfo['prikaz']."', `aunit1`='$startinginfo[$unit1]', `aunit2`='$startinginfo[$unit2]', `aunit3`='$startinginfo[$unit3]', `aunit4`='$startinginfo[$unit4]', `dunit1`='".$targetinfo['unit1']."', `dunit2`='".$targetinfo['unit2']."', `dunit3`='".$targetinfo['unit3']."', `dunit4`='".$targetinfo['unit4']."', `garrison`='".$targetinfo['garrison']."', `castle`='".$targetinfo['castle']."', `asup1`='0', `asup2`='0', `asup3`='0', `asup4`='0', `asup5`='0', `asup6`='0', `asup7`='0', `dsup1`='0', `dsup2`='0', `dsup3`='0', `dsup4`='0', `dsup5`='0', `dsup6`='0', `dsup7`='0', `aCS`='0', `dCS`='0', `acard`='0', `dcard`='0', `winner`='0', `currentplayer`='0' WHERE `id` = '$game_id'");

//prepare call support phase
$result = mysql_query("SELECT throne1, throne2, throne3, throne4, throne5, throne6 FROM game where id=$game_id");
$row = mysql_fetch_assoc($result);

$result = mysql_query("SELECT * FROM `karta` where `id` = '$target'");
$targetmap = mysql_fetch_assoc($result);

$orders = array(
	'G' => 0,
	'B' => 0,
	'L' => 0,
	'S' => 0,
	'T' => 0,
	'M' => 0,
);
$result2 = mysql_query("SELECT name, control, prikaz FROM $terr");		  

while ($array2 = mysql_fetch_assoc($result2))
{
	if (($array2['prikaz'] == 5 || $array2['prikaz'] == 10) && ($targetmap[$array2['name']] == 1 || $targetmap[$array2['name']] == 2 || $targetmap[$array2['name']] == 5)) {
		$orders[$array2['control']]++; 
	}
};
$orders2 = array(
	'Greyjoy' => $orders['G'],
	'Baratheon' => $orders['B'],
	'Lannister' => $orders['L'],
	'Stark' => $orders['S'],
	'Tyrell' => $orders['T'],
	'Martell' => $orders['M'],
);

if ($orders2[$row['throne1']] == 0) {
	mysql_query("UPDATE `battle` SET currentplayer = currentplayer+1 WHERE `id` = $game_id");
	if ($orders2[$row['throne2']] == 0) {
		mysql_query("UPDATE `battle` SET currentplayer = currentplayer+1 WHERE `id` = $game_id");
		if ($orders2[$row['throne3']] == 0) {
			mysql_query("UPDATE `battle` SET currentplayer = currentplayer+1 WHERE `id` = $game_id");
			if ($orders2[$row['throne4']] == 0) {
				mysql_query("UPDATE `battle` SET currentplayer = currentplayer+1 WHERE `id` = $game_id");
				if ($orders2[$row['throne5']] == 0) {
					mysql_query("UPDATE `battle` SET currentplayer = currentplayer+1 WHERE `id` = $game_id");
					if ($orders2[$row['throne6']] == 0) {
						mysql_query("UPDATE `game` SET faza = 8 WHERE `id` = $game_id");
						mysql_query("UPDATE `battle` SET currentplayer = 0 WHERE `id` = $game_id");
					}
				}
			}
		}
	}
}
?>