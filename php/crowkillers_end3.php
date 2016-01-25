<? include 'database.php';
$house = $_GET['house'];
$house = mysql_real_escape_string($house);
$game_id = $_GET['id'];
$game_id = mysql_real_escape_string($game_id);

$result = mysql_query("SELECT currentplayer FROM game WHERE id=$game_id");
$curr = mysql_fetch_assoc($result);

if ($curr['currentplayer'] < 5) {
    mysql_query("UPDATE `game` SET currentplayer=currentplayer+1 WHERE `id` = $game_id");
} else {
    mysql_query("UPDATE $house SET `ready` = '0'");

    $result = mysql_query("SELECT WildPower FROM game WHERE id = $game_id");
    $WP = mysql_fetch_assoc($result);

    $WPower = $WP['WildPower'] - 2;
    if ($WPower < 0) {$WPower = 0;};

    mysql_query("UPDATE `game` SET currentplayer='0', WildPower='$WPower', WildCard1=WildCard2, WildCard2=WildCard3, WildCard3=WildCard4, WildCard4=WildCard5, WildCard5=WildCard6, WildCard6=WildCard7, WildCard7=WildCard8, WildCard8=WildCard9 WHERE `id` = $game_id");

    include 'end_wild.php';
}

?>