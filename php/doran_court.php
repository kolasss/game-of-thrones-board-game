<? include 'database.php';
$game_id = $_GET['id'];
$game_id = mysql_real_escape_string($game_id);

mysql_query("UPDATE `battle` SET currentplayer = '0' WHERE `id` = $game_id");
//получение данных игры
$result = mysql_query("SELECT acard, dcard, attacker, defender FROM battle WHERE id=$game_id");
$battle = mysql_fetch_assoc($result);
$result = mysql_query("SELECT court1, court2, court3, court4, court5, court6 FROM game WHERE id=$game_id");
$game = mysql_fetch_assoc($result);

//if Doran attacker
if ($battle['acard'] == 'Doran') {
	if ($game['court1'] == $battle['defender']) {
		mysql_query("UPDATE game SET `court1`='".$game['court2']."', `court2`='".$game['court3']."', `court3`='".$game['court4']."', `court4`='".$game['court5']."', `court5`='".$game['court6']."', `court6`='".$game['court1']."' WHERE id=$game_id");
	} else if ($game['court2'] == $battle['defender']) {
		mysql_query("UPDATE game SET `court2`='".$game['court3']."', `court3`='".$game['court4']."', `court4`='".$game['court5']."', `court5`='".$game['court6']."', `court6`='".$game['court2']."' WHERE id=$game_id");
	} else if ($game['court3'] == $battle['defender']) {
		mysql_query("UPDATE game SET `court3`='".$game['court4']."', `court4`='".$game['court5']."', `court5`='".$game['court6']."', `court6`='".$game['court3']."' WHERE id=$game_id");
	} else if ($game['court4'] == $battle['defender']) {
		mysql_query("UPDATE game SET `court4`='".$game['court5']."', `court5`='".$game['court6']."', `court6`='".$game['court4']."' WHERE id=$game_id");
	} else if ($game['court5'] == $battle['defender']) {
		mysql_query("UPDATE game SET `court5`='".$game['court6']."', `court6`='".$game['court5']."' WHERE id=$game_id");
	};
} else
//if Doran defender
if ($battle['dcard'] == 'Doran') {
	if ($game['court1'] == $battle['attacker']) {
		mysql_query("UPDATE game SET `court1`='".$game['court2']."', `court2`='".$game['court3']."', `court3`='".$game['court4']."', `court4`='".$game['court5']."', `court5`='".$game['court6']."', `court6`='".$game['court1']."' WHERE id=$game_id");
	} else if ($game['court2'] == $battle['attacker']) {
		mysql_query("UPDATE game SET `court2`='".$game['court3']."', `court3`='".$game['court4']."', `court4`='".$game['court5']."', `court5`='".$game['court6']."', `court6`='".$game['court2']."' WHERE id=$game_id");
	} else if ($game['court3'] == $battle['attacker']) {
		mysql_query("UPDATE game SET `court3`='".$game['court4']."', `court4`='".$game['court5']."', `court5`='".$game['court6']."', `court6`='".$game['court3']."' WHERE id=$game_id");
	} else if ($game['court4'] == $battle['attacker']) {
		mysql_query("UPDATE game SET `court4`='".$game['court5']."', `court5`='".$game['court6']."', `court6`='".$game['court4']."' WHERE id=$game_id");
	} else if ($game['court5'] == $battle['attacker']) {
		mysql_query("UPDATE game SET `court5`='".$game['court6']."', `court6`='".$game['court5']."' WHERE id=$game_id");
	};
}


//if second player have Queen
if ($battle['acard'] == 'Doran' && $battle['dcard'] == 'Queen') {
	mysql_query("UPDATE `battle` SET currentplayer = '".$battle['defender']."' WHERE `id` = $game_id");
} else {
    include 'battle_recount.php';
}
?>