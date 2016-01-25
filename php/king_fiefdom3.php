<? include 'database.php';
$game_id = $_GET['id'];
$game_id = mysql_real_escape_string($game_id);
$myhouse = $_GET['myhouse'];
$myhouse = mysql_real_escape_string($myhouse);

//получение данных игры
$result = mysql_query("SELECT fiefdom1, fiefdom2, fiefdom3, fiefdom4, fiefdom5, fiefdom6 FROM game WHERE id=$game_id");
$game = mysql_fetch_assoc($result);

if ($game['fiefdom1'] == $myhouse) {
    mysql_query("UPDATE game SET `fiefdom1`='".$game['fiefdom2']."', `fiefdom2`='".$game['fiefdom3']."', `fiefdom3`='".$game['fiefdom4']."', `fiefdom4`='".$game['fiefdom5']."', `fiefdom5`='".$game['fiefdom6']."', `fiefdom6`='".$game['fiefdom1']."' WHERE id=$game_id");
} else if ($game['fiefdom2'] == $myhouse) {
    mysql_query("UPDATE game SET `fiefdom2`='".$game['fiefdom3']."', `fiefdom3`='".$game['fiefdom4']."', `fiefdom4`='".$game['fiefdom5']."', `fiefdom5`='".$game['fiefdom6']."', `fiefdom6`='".$game['fiefdom2']."' WHERE id=$game_id");
} else if ($game['fiefdom3'] == $myhouse) {
    mysql_query("UPDATE game SET `fiefdom3`='".$game['fiefdom4']."', `fiefdom4`='".$game['fiefdom5']."', `fiefdom5`='".$game['fiefdom6']."', `fiefdom6`='".$game['fiefdom3']."' WHERE id=$game_id");
} else if ($game['fiefdom4'] == $myhouse) {
    mysql_query("UPDATE game SET `fiefdom4`='".$game['fiefdom5']."', `fiefdom5`='".$game['fiefdom6']."', `fiefdom6`='".$game['fiefdom4']."' WHERE id=$game_id");
} else if ($game['fiefdom5'] == $myhouse) {
    mysql_query("UPDATE game SET `fiefdom5`='".$game['fiefdom6']."', `fiefdom6`='".$game['fiefdom5']."' WHERE id=$game_id");
};

$result = mysql_query("SELECT currentplayer FROM game WHERE id=$game_id");
$curr = mysql_fetch_assoc($result);

if ($curr['currentplayer'] < 4) {
    mysql_query("UPDATE `game` SET currentplayer=currentplayer+1 WHERE `id` = $game_id");
} else {
    mysql_query("UPDATE `game` SET currentplayer='0', WildPower=1, WildCard1=WildCard2, WildCard2=WildCard3, WildCard3=WildCard4, WildCard4=WildCard5, WildCard5=WildCard6, WildCard6=WildCard7, WildCard7=WildCard8, WildCard8=WildCard9 WHERE `id` = $game_id");

    include 'end_wild.php';
}
?>