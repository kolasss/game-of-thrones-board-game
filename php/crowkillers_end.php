<? include 'database.php';
$house = $_GET['house'];
$house = mysql_real_escape_string($house);
$myhouse = $_GET['myhouse'];
$myhouse = mysql_real_escape_string($myhouse);
$game_id = $_GET['id'];
$game_id = mysql_real_escape_string($game_id);

mysql_query("UPDATE $house SET `ready` = '0' WHERE `name` = '$myhouse'");

mysql_query("UPDATE `game` SET WildPower=0, WildCard1=WildCard2, WildCard2=WildCard3, WildCard3=WildCard4, WildCard4=WildCard5, WildCard5=WildCard6, WildCard6=WildCard7, WildCard7=WildCard8, WildCard8=WildCard9 WHERE `id` = $game_id");

include 'end_wild.php';
?>