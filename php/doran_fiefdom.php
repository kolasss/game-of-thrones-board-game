<? include 'database.php';
$game_id = $_GET['id'];
$game_id = mysql_real_escape_string($game_id);

mysql_query("UPDATE `battle` SET currentplayer = '0' WHERE `id` = $game_id");
//получение данных игры
$result = mysql_query("SELECT acard, dcard, attacker, defender FROM battle WHERE id=$game_id");
$battle = mysql_fetch_assoc($result);
$result = mysql_query("SELECT fiefdom1, fiefdom2, fiefdom3, fiefdom4, fiefdom5, fiefdom6 FROM game WHERE id=$game_id");
$game = mysql_fetch_assoc($result);

//if Doran attacker
if ($battle['acard'] == 'Doran') {
	if ($game['fiefdom1'] == $battle['defender']) {
		mysql_query("UPDATE game SET `fiefdom1`='".$game['fiefdom2']."', `fiefdom2`='".$game['fiefdom3']."', `fiefdom3`='".$game['fiefdom4']."', `fiefdom4`='".$game['fiefdom5']."', `fiefdom5`='".$game['fiefdom6']."', `fiefdom6`='".$game['fiefdom1']."' WHERE id=$game_id");
	} else if ($game['fiefdom2'] == $battle['defender']) {
		mysql_query("UPDATE game SET `fiefdom2`='".$game['fiefdom3']."', `fiefdom3`='".$game['fiefdom4']."', `fiefdom4`='".$game['fiefdom5']."', `fiefdom5`='".$game['fiefdom6']."', `fiefdom6`='".$game['fiefdom2']."' WHERE id=$game_id");
	} else if ($game['fiefdom3'] == $battle['defender']) {
		mysql_query("UPDATE game SET `fiefdom3`='".$game['fiefdom4']."', `fiefdom4`='".$game['fiefdom5']."', `fiefdom5`='".$game['fiefdom6']."', `fiefdom6`='".$game['fiefdom3']."' WHERE id=$game_id");
	} else if ($game['fiefdom4'] == $battle['defender']) {
		mysql_query("UPDATE game SET `fiefdom4`='".$game['fiefdom5']."', `fiefdom5`='".$game['fiefdom6']."', `fiefdom6`='".$game['fiefdom4']."' WHERE id=$game_id");
	} else if ($game['fiefdom5'] == $battle['defender']) {
		mysql_query("UPDATE game SET `fiefdom5`='".$game['fiefdom6']."', `fiefdom6`='".$game['fiefdom5']."' WHERE id=$game_id");
	};
} else
//if Doran defender
if ($battle['dcard'] == 'Doran') {
	if ($game['fiefdom1'] == $battle['attacker']) {
		mysql_query("UPDATE game SET `fiefdom1`='".$game['fiefdom2']."', `fiefdom2`='".$game['fiefdom3']."', `fiefdom3`='".$game['fiefdom4']."', `fiefdom4`='".$game['fiefdom5']."', `fiefdom5`='".$game['fiefdom6']."', `fiefdom6`='".$game['fiefdom1']."' WHERE id=$game_id");
	} else if ($game['fiefdom2'] == $battle['attacker']) {
		mysql_query("UPDATE game SET `fiefdom2`='".$game['fiefdom3']."', `fiefdom3`='".$game['fiefdom4']."', `fiefdom4`='".$game['fiefdom5']."', `fiefdom5`='".$game['fiefdom6']."', `fiefdom6`='".$game['fiefdom2']."' WHERE id=$game_id");
	} else if ($game['fiefdom3'] == $battle['attacker']) {
		mysql_query("UPDATE game SET `fiefdom3`='".$game['fiefdom4']."', `fiefdom4`='".$game['fiefdom5']."', `fiefdom5`='".$game['fiefdom6']."', `fiefdom6`='".$game['fiefdom3']."' WHERE id=$game_id");
	} else if ($game['fiefdom4'] == $battle['attacker']) {
		mysql_query("UPDATE game SET `fiefdom4`='".$game['fiefdom5']."', `fiefdom5`='".$game['fiefdom6']."', `fiefdom6`='".$game['fiefdom4']."' WHERE id=$game_id");
	} else if ($game['fiefdom5'] == $battle['attacker']) {
		mysql_query("UPDATE game SET `fiefdom5`='".$game['fiefdom6']."', `fiefdom6`='".$game['fiefdom5']."' WHERE id=$game_id");
	};
}


//if second player have Queen
if ($battle['acard'] == 'Doran' && $battle['dcard'] == 'Queen') {
	mysql_query("UPDATE `battle` SET currentplayer = '".$battle['defender']."' WHERE `id` = $game_id");
} else {
    include 'battle_recount.php';
}
?>