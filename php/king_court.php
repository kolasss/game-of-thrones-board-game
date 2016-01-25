<? include 'database.php';
$game_id = $_GET['id'];
$game_id = mysql_real_escape_string($game_id);

//получение данных игры
$result = mysql_query("SELECT dsup1 FROM battle WHERE id=$game_id");
$battle = mysql_fetch_assoc($result);
$result = mysql_query("SELECT court1, court2, court3, court4, court5, court6 FROM game WHERE id=$game_id");
$game = mysql_fetch_assoc($result);

if ($game['court6'] == $battle['dsup1']) {
    mysql_query("UPDATE game SET `court1`='".$game['court6']."', `court2`='".$game['court1']."', `court3`='".$game['court2']."', `court4`='".$game['court3']."', `court5`='".$game['court4']."', `court6`='".$game['court5']."' WHERE id=$game_id");
} else if ($game['court5'] == $battle['dsup1']) {
    mysql_query("UPDATE game SET `court1`='".$game['court5']."', `court2`='".$game['court1']."', `court3`='".$game['court2']."', `court4`='".$game['court3']."', `court5`='".$game['court4']."' WHERE id=$game_id");
} else if ($game['court4'] == $battle['dsup1']) {
    mysql_query("UPDATE game SET `court1`='".$game['court4']."', `court2`='".$game['court1']."', `court3`='".$game['court2']."', `court4`='".$game['court3']."' WHERE id=$game_id");
} else if ($game['court3'] == $battle['dsup1']) {
    mysql_query("UPDATE game SET `court1`='".$game['court3']."', `court2`='".$game['court1']."', `court3`='".$game['court2']."' WHERE id=$game_id");
} else if ($game['court2'] == $battle['dsup1']) {
    mysql_query("UPDATE game SET `court1`='".$game['court2']."', `court2`='".$game['court1']."' WHERE id=$game_id");
};

mysql_query("UPDATE `game` SET WildPower=0, WildCard1=WildCard2, WildCard2=WildCard3, WildCard3=WildCard4, WildCard4=WildCard5, WildCard5=WildCard6, WildCard6=WildCard7, WildCard7=WildCard8, WildCard8=WildCard9 WHERE `id` = $game_id");

include 'end_wild.php';
?>