<? include 'database.php';
$game_id = $_GET['id'];
$game_id = mysql_real_escape_string($game_id);
$card = $_GET['card'];
$card = mysql_real_escape_string($card);

//current turn
$result = mysql_query("SELECT turn FROM game where id=$game_id");
$curr = mysql_fetch_assoc($result);

if ($card == 2 || $card == 4) {//Rains of Autumn or Storm of Swords
    mysql_query("UPDATE game SET WC3_".$curr['turn']." = '$card' WHERE id = $game_id");
}
mysql_query("UPDATE game SET faza=3 WHERE id = $game_id");
?>