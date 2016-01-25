<? include 'database.php';
$game_id = $_GET['id'];
$game_id = mysql_real_escape_string($game_id);

//получение данных игры
$result = mysql_query("SELECT dsup1 FROM battle WHERE id=$game_id");
$battle = mysql_fetch_assoc($result);
$result = mysql_query("SELECT fiefdom1, fiefdom2, fiefdom3, fiefdom4, fiefdom5, fiefdom6 FROM game WHERE id=$game_id");
$game = mysql_fetch_assoc($result);

if ($game['fiefdom6'] == $battle['dsup1']) {
    mysql_query("UPDATE game SET `fiefdom1`='".$game['fiefdom6']."', `fiefdom2`='".$game['fiefdom1']."', `fiefdom3`='".$game['fiefdom2']."', `fiefdom4`='".$game['fiefdom3']."', `fiefdom5`='".$game['fiefdom4']."', `fiefdom6`='".$game['fiefdom5']."' WHERE id=$game_id");
} else if ($game['fiefdom5'] == $battle['dsup1']) {
    mysql_query("UPDATE game SET `fiefdom1`='".$game['fiefdom5']."', `fiefdom2`='".$game['fiefdom1']."', `fiefdom3`='".$game['fiefdom2']."', `fiefdom4`='".$game['fiefdom3']."', `fiefdom5`='".$game['fiefdom4']."' WHERE id=$game_id");
} else if ($game['fiefdom4'] == $battle['dsup1']) {
    mysql_query("UPDATE game SET `fiefdom1`='".$game['fiefdom4']."', `fiefdom2`='".$game['fiefdom1']."', `fiefdom3`='".$game['fiefdom2']."', `fiefdom4`='".$game['fiefdom3']."' WHERE id=$game_id");
} else if ($game['fiefdom3'] == $battle['dsup1']) {
    mysql_query("UPDATE game SET `fiefdom1`='".$game['fiefdom3']."', `fiefdom2`='".$game['fiefdom1']."', `fiefdom3`='".$game['fiefdom2']."' WHERE id=$game_id");
} else if ($game['fiefdom2'] == $battle['dsup1']) {
    mysql_query("UPDATE game SET `fiefdom1`='".$game['fiefdom2']."', `fiefdom2`='".$game['fiefdom1']."' WHERE id=$game_id");
};

mysql_query("UPDATE `game` SET WildPower=0, WildCard1=WildCard2, WildCard2=WildCard3, WildCard3=WildCard4, WildCard4=WildCard5, WildCard5=WildCard6, WildCard6=WildCard7, WildCard7=WildCard8, WildCard8=WildCard9 WHERE `id` = $game_id");

include 'end_wild.php';
?>