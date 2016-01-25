<? include 'database.php';
$game_id = $_GET['id'];
$game_id = mysql_real_escape_string($game_id);

//получение данных игры
$result = mysql_query("SELECT dsup1 FROM battle WHERE id=$game_id");
$battle = mysql_fetch_assoc($result);
$result = mysql_query("SELECT throne1, throne2, throne3, throne4, throne5, throne6 FROM game WHERE id=$game_id");
$game = mysql_fetch_assoc($result);

if ($game['throne6'] == $battle['dsup1']) {
    mysql_query("UPDATE game SET `throne1`='".$game['throne6']."', `throne2`='".$game['throne1']."', `throne3`='".$game['throne2']."', `throne4`='".$game['throne3']."', `throne5`='".$game['throne4']."', `throne6`='".$game['throne5']."' WHERE id=$game_id");
} else if ($game['throne5'] == $battle['dsup1']) {
    mysql_query("UPDATE game SET `throne1`='".$game['throne5']."', `throne2`='".$game['throne1']."', `throne3`='".$game['throne2']."', `throne4`='".$game['throne3']."', `throne5`='".$game['throne4']."' WHERE id=$game_id");
} else if ($game['throne4'] == $battle['dsup1']) {
    mysql_query("UPDATE game SET `throne1`='".$game['throne4']."', `throne2`='".$game['throne1']."', `throne3`='".$game['throne2']."', `throne4`='".$game['throne3']."' WHERE id=$game_id");
} else if ($game['throne3'] == $battle['dsup1']) {
    mysql_query("UPDATE game SET `throne1`='".$game['throne3']."', `throne2`='".$game['throne1']."', `throne3`='".$game['throne2']."' WHERE id=$game_id");
} else if ($game['throne2'] == $battle['dsup1']) {
    mysql_query("UPDATE game SET `throne1`='".$game['throne2']."', `throne2`='".$game['throne1']."' WHERE id=$game_id");
};

mysql_query("UPDATE `game` SET WildPower=0, WildCard1=WildCard2, WildCard2=WildCard3, WildCard3=WildCard4, WildCard4=WildCard5, WildCard5=WildCard6, WildCard6=WildCard7, WildCard7=WildCard8, WildCard8=WildCard9 WHERE `id` = $game_id");

include 'end_wild.php';
?>