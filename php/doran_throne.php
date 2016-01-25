<? include 'database.php';
$game_id = $_GET['id'];
$game_id = mysql_real_escape_string($game_id);

mysql_query("UPDATE `battle` SET currentplayer = '0' WHERE `id` = $game_id");
//получение данных игры
$result = mysql_query("SELECT acard, dcard, attacker, defender FROM battle WHERE id=$game_id");
$battle = mysql_fetch_assoc($result);
$result = mysql_query("SELECT throne1, throne2, throne3, throne4, throne5, throne6 FROM game WHERE id=$game_id");
$game = mysql_fetch_assoc($result);

//if Doran attacker
if ($battle['acard'] == 'Doran') {
	if ($game['throne1'] == $battle['defender']) {
		mysql_query("UPDATE game SET `throne1`='".$game['throne2']."', `throne2`='".$game['throne3']."', `throne3`='".$game['throne4']."', `throne4`='".$game['throne5']."', `throne5`='".$game['throne6']."', `throne6`='".$game['throne1']."' WHERE id=$game_id");
	} else if ($game['throne2'] == $battle['defender']) {
		mysql_query("UPDATE game SET `throne2`='".$game['throne3']."', `throne3`='".$game['throne4']."', `throne4`='".$game['throne5']."', `throne5`='".$game['throne6']."', `throne6`='".$game['throne2']."' WHERE id=$game_id");
	} else if ($game['throne3'] == $battle['defender']) {
		mysql_query("UPDATE game SET `throne3`='".$game['throne4']."', `throne4`='".$game['throne5']."', `throne5`='".$game['throne6']."', `throne6`='".$game['throne3']."' WHERE id=$game_id");
	} else if ($game['throne4'] == $battle['defender']) {
		mysql_query("UPDATE game SET `throne4`='".$game['throne5']."', `throne5`='".$game['throne6']."', `throne6`='".$game['throne4']."' WHERE id=$game_id");
	} else if ($game['throne5'] == $battle['defender']) {
		mysql_query("UPDATE game SET `throne5`='".$game['throne6']."', `throne6`='".$game['throne5']."' WHERE id=$game_id");
	};
} else
//if Doran defender
if ($battle['dcard'] == 'Doran') {
	if ($game['throne1'] == $battle['attacker']) {
		mysql_query("UPDATE game SET `throne1`='".$game['throne2']."', `throne2`='".$game['throne3']."', `throne3`='".$game['throne4']."', `throne4`='".$game['throne5']."', `throne5`='".$game['throne6']."', `throne6`='".$game['throne1']."' WHERE id=$game_id");
	} else if ($game['throne2'] == $battle['attacker']) {
		mysql_query("UPDATE game SET `throne2`='".$game['throne3']."', `throne3`='".$game['throne4']."', `throne4`='".$game['throne5']."', `throne5`='".$game['throne6']."', `throne6`='".$game['throne2']."' WHERE id=$game_id");
	} else if ($game['throne3'] == $battle['attacker']) {
		mysql_query("UPDATE game SET `throne3`='".$game['throne4']."', `throne4`='".$game['throne5']."', `throne5`='".$game['throne6']."', `throne6`='".$game['throne3']."' WHERE id=$game_id");
	} else if ($game['throne4'] == $battle['attacker']) {
		mysql_query("UPDATE game SET `throne4`='".$game['throne5']."', `throne5`='".$game['throne6']."', `throne6`='".$game['throne4']."' WHERE id=$game_id");
	} else if ($game['throne5'] == $battle['attacker']) {
		mysql_query("UPDATE game SET `throne5`='".$game['throne6']."', `throne6`='".$game['throne5']."' WHERE id=$game_id");
	};
}


//if second player have Queen
if ($battle['acard'] == 'Doran' && $battle['dcard'] == 'Queen') {
	mysql_query("UPDATE `battle` SET currentplayer = '".$battle['defender']."' WHERE `id` = $game_id");
} else {
    include 'battle_recount.php';
}
?>