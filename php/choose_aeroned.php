<? include 'database.php';
$game_id = $_GET['id'];
$game_id = mysql_real_escape_string($game_id);
$hero = $_GET['hero'];
$hero = mysql_real_escape_string($hero);
$housetable = $_GET['table'];
$housetable = mysql_real_escape_string($housetable);

mysql_query("UPDATE `battle` SET currentplayer = '0' WHERE `id` = $game_id");

$result = mysql_query("SELECT acard, dcard FROM battle where id=$game_id");
$row = mysql_fetch_assoc($result);

if ($row['acard'] == 'Aeron') {
	mysql_query("UPDATE `battle` SET `acard`='$hero', `1ready`=1ready+1 WHERE `id` = '$game_id'");
} else if ($row['dcard'] == 'Aeron') {
	mysql_query("UPDATE `battle` SET `dcard`='$hero', `1ready`=1ready+1 WHERE `id` = '$game_id'");
}

mysql_query("UPDATE $housetable SET `HC7`=0, `tokih`=tokih-2 WHERE `name` = 'Greyjoy'");

//получение данных игры
$result = mysql_query("SELECT acard, dcard, attacker, defender, 1ready FROM battle where id=$game_id");
$row = mysql_fetch_assoc($result);

//if Tyrion versus Aeron
if ($row['acard'] == 'Tyrion' && $row['1ready'] == '1') {
	mysql_query("UPDATE `battle` SET currentplayer = '".$row['attacker']."' WHERE `id` = $game_id");
} else if ($row['dcard'] == 'Tyrion' && $row['1ready'] == '1') {
	mysql_query("UPDATE `battle` SET currentplayer = '".$row['defender']."' WHERE `id` = $game_id");
//if one player have Doran or Queen
} else if ($row['acard'] == 'Doran' || $row['acard'] == 'Queen') {
	mysql_query("UPDATE `battle` SET currentplayer = '".$row['attacker']."' WHERE `id` = $game_id");
} else if ($row['dcard'] == 'Doran' || $row['dcard'] == 'Queen') {
	mysql_query("UPDATE `battle` SET currentplayer = '".$row['defender']."' WHERE `id` = $game_id");
} else {
    include 'battle_recount.php';
}

?>