<? include 'database.php';
$game_id = $_GET['id'];
$game_id = mysql_real_escape_string($game_id);
$myhouse = $_GET['myhouse'];
$myhouse = mysql_real_escape_string($myhouse);
$track = $_GET['track'];
$track = mysql_real_escape_string($track);

if ($track == 'throne') {
    //получение данных игры
    $result = mysql_query("SELECT throne1, throne2, throne3, throne4, throne5, throne6 FROM game WHERE id=$game_id");
    $game = mysql_fetch_assoc($result);

    if ($game['throne1'] == $myhouse) {
        mysql_query("UPDATE game SET `throne1`='".$game['throne2']."', `throne2`='".$game['throne3']."', `throne3`='".$game['throne1']."' WHERE id=$game_id");
    } else if ($game['throne2'] == $myhouse) {
        mysql_query("UPDATE game SET `throne2`='".$game['throne3']."', `throne3`='".$game['throne4']."', `throne4`='".$game['throne2']."' WHERE id=$game_id");
    } else if ($game['throne3'] == $myhouse) {
        mysql_query("UPDATE game SET `throne3`='".$game['throne4']."', `throne4`='".$game['throne5']."', `throne5`='".$game['throne3']."' WHERE id=$game_id");
    } else if ($game['throne4'] == $myhouse) {
        mysql_query("UPDATE game SET `throne4`='".$game['throne5']."', `throne5`='".$game['throne6']."', `throne6`='".$game['throne4']."' WHERE id=$game_id");
    } else if ($game['throne5'] == $myhouse) {
        mysql_query("UPDATE game SET `throne5`='".$game['throne6']."', `throne6`='".$game['throne5']."' WHERE id=$game_id");
    };
} else if ($track == 'fiefdom') {
    //получение данных игры
    $result = mysql_query("SELECT fiefdom1, fiefdom2, fiefdom3, fiefdom4, fiefdom5, fiefdom6 FROM game WHERE id=$game_id");
    $game = mysql_fetch_assoc($result);

    if ($game['fiefdom1'] == $myhouse) {
        mysql_query("UPDATE game SET `fiefdom1`='".$game['fiefdom2']."', `fiefdom2`='".$game['fiefdom3']."', `fiefdom3`='".$game['fiefdom1']."' WHERE id=$game_id");
    } else if ($game['fiefdom2'] == $myhouse) {
        mysql_query("UPDATE game SET `fiefdom2`='".$game['fiefdom3']."', `fiefdom3`='".$game['fiefdom4']."', `fiefdom4`='".$game['fiefdom2']."' WHERE id=$game_id");
    } else if ($game['fiefdom3'] == $myhouse) {
        mysql_query("UPDATE game SET `fiefdom3`='".$game['fiefdom4']."', `fiefdom4`='".$game['fiefdom5']."', `fiefdom5`='".$game['fiefdom3']."' WHERE id=$game_id");
    } else if ($game['fiefdom4'] == $myhouse) {
        mysql_query("UPDATE game SET `fiefdom4`='".$game['fiefdom5']."', `fiefdom5`='".$game['fiefdom6']."', `fiefdom6`='".$game['fiefdom4']."' WHERE id=$game_id");
    } else if ($game['fiefdom5'] == $myhouse) {
        mysql_query("UPDATE game SET `fiefdom5`='".$game['fiefdom6']."', `fiefdom6`='".$game['fiefdom5']."' WHERE id=$game_id");
    };
} else if ($track == 'court') {
    //получение данных игры
    $result = mysql_query("SELECT court1, court2, court3, court4, court5, court6 FROM game WHERE id=$game_id");
    $game = mysql_fetch_assoc($result);

    if ($game['court1'] == $myhouse) {
        mysql_query("UPDATE game SET `court1`='".$game['court2']."', `court2`='".$game['court3']."', `court3`='".$game['court1']."' WHERE id=$game_id");
    } else if ($game['court2'] == $myhouse) {
        mysql_query("UPDATE game SET `court2`='".$game['court3']."', `court3`='".$game['court4']."', `court4`='".$game['court2']."' WHERE id=$game_id");
    } else if ($game['court3'] == $myhouse) {
        mysql_query("UPDATE game SET `court3`='".$game['court4']."', `court4`='".$game['court5']."', `court5`='".$game['court3']."' WHERE id=$game_id");
    } else if ($game['court4'] == $myhouse) {
        mysql_query("UPDATE game SET `court4`='".$game['court5']."', `court5`='".$game['court6']."', `court6`='".$game['court4']."' WHERE id=$game_id");
    } else if ($game['court5'] == $myhouse) {
        mysql_query("UPDATE game SET `court5`='".$game['court6']."', `court6`='".$game['court5']."' WHERE id=$game_id");
    };
}

$result = mysql_query("SELECT WildPower FROM game WHERE id = $game_id");
$WP = mysql_fetch_assoc($result);

$WPower = $WP['WildPower'] - 2;
if ($WPower < 0) {$WPower = 0;};

mysql_query("UPDATE `game` SET currentplayer='0', WildPower='$WPower', WildCard1=WildCard2, WildCard2=WildCard3, WildCard3=WildCard4, WildCard4=WildCard5, WildCard5=WildCard6, WildCard6=WildCard7, WildCard7=WildCard8, WildCard8=WildCard9 WHERE `id` = $game_id");

include 'end_wild.php';
?>