<? include 'database.php';
$game_id = $_GET['id'];
$game_id = mysql_real_escape_string($game_id);
$myhouse = $_GET['myhouse'];
$myhouse = mysql_real_escape_string($myhouse);

//получение данных игры
$result = mysql_query("SELECT court1, court2, court3, court4, court5, court6 FROM game WHERE id=$game_id");
$game = mysql_fetch_assoc($result);

if ($game['court1'] == $myhouse) {
    mysql_query("UPDATE game SET `court1`='".$game['court2']."', `court2`='".$game['court3']."', `court3`='".$game['court4']."', `court4`='".$game['court5']."', `court5`='".$game['court6']."', `court6`='".$game['court1']."' WHERE id=$game_id");
} else if ($game['court2'] == $myhouse) {
    mysql_query("UPDATE game SET `court2`='".$game['court3']."', `court3`='".$game['court4']."', `court4`='".$game['court5']."', `court5`='".$game['court6']."', `court6`='".$game['court2']."' WHERE id=$game_id");
} else if ($game['court3'] == $myhouse) {
    mysql_query("UPDATE game SET `court3`='".$game['court4']."', `court4`='".$game['court5']."', `court5`='".$game['court6']."', `court6`='".$game['court3']."' WHERE id=$game_id");
} else if ($game['court4'] == $myhouse) {
    mysql_query("UPDATE game SET `court4`='".$game['court5']."', `court5`='".$game['court6']."', `court6`='".$game['court4']."' WHERE id=$game_id");
} else if ($game['court5'] == $myhouse) {
    mysql_query("UPDATE game SET `court5`='".$game['court6']."', `court6`='".$game['court5']."' WHERE id=$game_id");
};

$result = mysql_query("SELECT currentplayer FROM game WHERE id=$game_id");
$curr = mysql_fetch_assoc($result);

if ($curr['currentplayer'] < 5) {
    mysql_query("UPDATE `game` SET currentplayer=currentplayer+1 WHERE `id` = $game_id");
} else {
    $house = $_GET['house'];
    $house = mysql_real_escape_string($house);

    $result = mysql_query("SELECT WildPower FROM game WHERE id = $game_id");
    $WP = mysql_fetch_assoc($result);

    $WPower = $WP['WildPower'] - 2;
    if ($WPower < 0) {$WPower = 0;};

    mysql_query("UPDATE `game` SET currentplayer='0', WildPower='$WPower', WildCard1=WildCard2, WildCard2=WildCard3, WildCard3=WildCard4, WildCard4=WildCard5, WildCard5=WildCard6, WildCard6=WildCard7, WildCard7=WildCard8, WildCard8=WildCard9 WHERE `id` = $game_id");

    include 'end_wild.php';
}
?>