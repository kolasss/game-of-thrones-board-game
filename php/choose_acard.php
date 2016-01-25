<? include 'database.php';
$game_id = $_GET['id'];
$game_id = mysql_real_escape_string($game_id);
$hero = $_GET['hero'];
$hero = mysql_real_escape_string($hero);

mysql_query("UPDATE `battle` SET `acard`='$hero' WHERE `id` = '$game_id'");

//получение данных игры
$result = mysql_query("SELECT acard, dcard, attacker, defender FROM battle where id=$game_id");
$row = mysql_fetch_assoc($result);

if ($row['acard'] != '0' && $row['dcard'] != '0') {
	//reveal HC phase
	mysql_query("UPDATE `game` SET faza = 9 WHERE `id` = $game_id");
	
	//if Tyrion versus Aeron
	if (($row['acard'] == 'Tyrion' || $row['acard'] == 'Aeron') && ($row['dcard'] == 'Tyrion' || $row['dcard'] == 'Aeron')) {
		//determine 1st to play
		$result = mysql_query("SELECT throne1, throne2, throne3, throne4, throne5, throne6 FROM game where id=$game_id");
		$game = mysql_fetch_assoc($result);
		if ($game['throne1'] == $row['attacker'] || $game['throne1'] == $row['defender']) {
			mysql_query("UPDATE `battle` SET currentplayer = '".$game['throne1']."' WHERE `id` = $game_id");
		} else if ($game['throne2'] == $row['attacker'] || $game['throne2'] == $row['defender']) {
			mysql_query("UPDATE `battle` SET currentplayer = '".$game['throne2']."' WHERE `id` = $game_id");
		} else if ($game['throne3'] == $row['attacker'] || $game['throne3'] == $row['defender']) {
			mysql_query("UPDATE `battle` SET currentplayer = '".$game['throne3']."' WHERE `id` = $game_id");
		} else if ($game['throne4'] == $row['attacker'] || $game['throne4'] == $row['defender']) {
			mysql_query("UPDATE `battle` SET currentplayer = '".$game['throne4']."' WHERE `id` = $game_id");
		} else {
			mysql_query("UPDATE `battle` SET currentplayer = '".$game['throne5']."' WHERE `id` = $game_id");
		};
	//if one player have Tyrion or Aeron
	} else if ($row['acard'] == 'Tyrion' || $row['acard'] == 'Aeron') {
		mysql_query("UPDATE `battle` SET currentplayer = '".$row['attacker']."' WHERE `id` = $game_id");
	} else if ($row['dcard'] == 'Tyrion' || $row['dcard'] == 'Aeron') {
		mysql_query("UPDATE `battle` SET currentplayer = '".$row['defender']."' WHERE `id` = $game_id");
	} else if ($row['acard'] == 'Doran' || $row['acard'] == 'Queen') {
		mysql_query("UPDATE `battle` SET currentplayer = '".$row['attacker']."' WHERE `id` = $game_id");
	} else if ($row['dcard'] == 'Doran' || $row['dcard'] == 'Queen') {
		mysql_query("UPDATE `battle` SET currentplayer = '".$row['defender']."' WHERE `id` = $game_id");
	} else {
        include 'battle_recount.php';
	};
}

?>