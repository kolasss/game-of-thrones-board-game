<? include 'database.php';
$terr = $_GET['terr'];
$terr = mysql_real_escape_string($terr);
$game_id = $_GET['id'];
$game_id = mysql_real_escape_string($game_id);
$target = $_GET['target'];
$target = mysql_real_escape_string($target);
$house = $_GET['house'];
$house = mysql_real_escape_string($house);
$myhouse = $_GET['myhouse'];
$myhouse = mysql_real_escape_string($myhouse);

$result = mysql_query("SELECT power FROM $terr WHERE `name` = '$target'");
$power = mysql_fetch_assoc($result);

$addpower = 1 + $power['power'];

$result = mysql_query("SELECT tokih, tokob FROM $house WHERE `name` = '$myhouse'");
$tokens = mysql_fetch_assoc($result);

$sum = $tokens['tokih'] + $tokens['tokob'] + $addpower;
while ($sum > 20) {
	$addpower--;
	$sum = $tokens['tokih'] + $tokens['tokob'] + $addpower;
};

mysql_query("UPDATE $house SET `tokih` = tokih+$addpower WHERE `name` = '$myhouse'");

mysql_query("UPDATE $terr SET `prikaz` = '0' WHERE `name` = '$target'");
mysql_query("UPDATE `game` SET currentplayer = currentplayer+1 WHERE `id` = $game_id");


//prepare consolidate phase
$result = mysql_query("SELECT currentplayer, throne1, throne2, throne3, throne4, throne5, throne6 FROM game where id=$game_id");
$row = mysql_fetch_assoc($result);

$orders = array(
	'G' => 0,
	'B' => 0,
	'L' => 0,
	'S' => 0,
	'T' => 0,
	'M' => 0,
);
$result = mysql_query("SELECT name, control, prikaz FROM $terr");		  

while ($array = mysql_fetch_assoc($result))
{
	if ($array['prikaz'] == 6 || $array['prikaz'] == 11) {
		$orders[$array['control']]++; 
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

for ($i=1; $i<8; $i++) {
	if ($i == 7) {
		cleanup($game_id, $terr);
		break;
	};
	$temp = $row['currentplayer']+$i;
	if ($temp < 7) {
		if ($orders2[$row['throne'.$temp]] == 0) {
			mysql_query("UPDATE `game` SET currentplayer = currentplayer+1 WHERE `id` = $game_id");
		} else {break;}
	} else {
		$temp = $row['currentplayer']+$i-6;
		if ($temp == 1) {
			mysql_query("UPDATE `game` SET currentplayer = 0 WHERE `id` = $game_id");
		}
		if ($orders2[$row['throne'.$temp]] == 0) {
			mysql_query("UPDATE `game` SET currentplayer = currentplayer+1 WHERE `id` = $game_id");
		} else {break;}
	};
};

function cleanup($game_id, $terr) {
	include 'cleanup.php';
};
?>