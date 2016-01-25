<? include 'database.php';
$game_id = $_GET['id'];
$game_id = mysql_real_escape_string($game_id);
$hero = $_GET['hero'];
$hero = mysql_real_escape_string($hero);
$housetable = $_GET['table'];
$housetable = mysql_real_escape_string($housetable);

mysql_query("UPDATE `battle` SET currentplayer = '0' WHERE `id` = $game_id");

$result = mysql_query("SELECT attacker, defender, acard, dcard FROM battle where id=$game_id");
$row = mysql_fetch_assoc($result);

if ($row['acard'] == 'Tyrion') {
	mysql_query("UPDATE `battle` SET `dcard`='$hero' WHERE `id` = '$game_id'");
	$result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $housetable where name='".$row['defender']."'");
	$hcs = mysql_fetch_assoc($result);
	if ($hcs['HC1'] == '2') {
		mysql_query("UPDATE $housetable SET `HC1`=1 WHERE `name` = '".$row['defender']."'");
	} else if ($hcs['HC2'] == '2') {
		mysql_query("UPDATE $housetable SET `HC2`=1 WHERE `name` = '".$row['defender']."'");
	} else if ($hcs['HC3'] == '2') {
		mysql_query("UPDATE $housetable SET `HC3`=1 WHERE `name` = '".$row['defender']."'");
	} else if ($hcs['HC4'] == '2') {
		mysql_query("UPDATE $housetable SET `HC4`=1 WHERE `name` = '".$row['defender']."'");
	} else if ($hcs['HC5'] == '2') {
		mysql_query("UPDATE $housetable SET `HC5`=1 WHERE `name` = '".$row['defender']."'");
	} else if ($hcs['HC6'] == '2') {
		mysql_query("UPDATE $housetable SET `HC6`=1 WHERE `name` = '".$row['defender']."'");
	} else if ($hcs['HC7'] == '2') {
		mysql_query("UPDATE $housetable SET `HC7`=1 WHERE `name` = '".$row['defender']."'");
	};
} else if ($row['dcard'] == 'Tyrion') {
	mysql_query("UPDATE `battle` SET `acard`='$hero' WHERE `id` = '$game_id'");
	$result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $housetable where name='".$row['attacker']."'");
	$hcs = mysql_fetch_assoc($result);
	if ($hcs['HC1'] == '2') {
		mysql_query("UPDATE $housetable SET `HC1`=1 WHERE `name` = '".$row['attacker']."'");
	} else if ($hcs['HC2'] == '2') {
		mysql_query("UPDATE $housetable SET `HC2`=1 WHERE `name` = '".$row['attacker']."'");
	} else if ($hcs['HC3'] == '2') {
		mysql_query("UPDATE $housetable SET `HC3`=1 WHERE `name` = '".$row['attacker']."'");
	} else if ($hcs['HC4'] == '2') {
		mysql_query("UPDATE $housetable SET `HC4`=1 WHERE `name` = '".$row['attacker']."'");
	} else if ($hcs['HC5'] == '2') {
		mysql_query("UPDATE $housetable SET `HC5`=1 WHERE `name` = '".$row['attacker']."'");
	} else if ($hcs['HC6'] == '2') {
		mysql_query("UPDATE $housetable SET `HC6`=1 WHERE `name` = '".$row['attacker']."'");
	} else if ($hcs['HC7'] == '2') {
		mysql_query("UPDATE $housetable SET `HC7`=1 WHERE `name` = '".$row['attacker']."'");
	};
}

//получение данных игры
$result = mysql_query("SELECT acard, dcard, attacker, defender, 1ready FROM battle where id=$game_id");
$row = mysql_fetch_assoc($result);

//if Tyrion versus Aeron
if ($row['acard'] == 'Aeron' && $row['1ready'] == '1') {
	mysql_query("UPDATE `battle` SET currentplayer = '".$row['attacker']."' WHERE `id` = $game_id");
} else if ($row['dcard'] == 'Aeron' && $row['1ready'] == '1') {
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