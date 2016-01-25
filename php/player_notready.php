<? include 'database.php';
$house = $_GET['table'];
$house = mysql_real_escape_string($house);
$myhouse = $_GET['myhouse'];
$myhouse = mysql_real_escape_string($myhouse);
$game_id = $_GET['id'];
$game_id = mysql_real_escape_string($game_id);

$result = mysql_query("SELECT faza, currentplayer FROM game WHERE id=$game_id");
$array = mysql_fetch_assoc($result);

if ($array['faza'] == 3) {
	if ($array['currentplayer'] <= 5) {
		mysql_query("UPDATE $house SET `ready` = '0' WHERE `name` = '$myhouse'");
		mysql_query("UPDATE `game` SET currentplayer=currentplayer-1 WHERE `id` = $game_id");
	}
} else if ($array['faza'] == 6 || $array['faza'] == 14) {
	mysql_query("UPDATE $house SET `ready` = '0' WHERE `name` = '$myhouse'");
}

?>