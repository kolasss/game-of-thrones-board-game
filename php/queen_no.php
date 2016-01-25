<? include 'database.php';
$terr = $_GET['terr'];
$terr = mysql_real_escape_string($terr);
$game_id = $_GET['id'];
$game_id = mysql_real_escape_string($game_id);

mysql_query("UPDATE `battle` SET currentplayer = '0' WHERE `id` = $game_id");

//получение данных игры
$result = mysql_query("SELECT acard, dcard, attacker, defender FROM battle WHERE id=$game_id");
$battle = mysql_fetch_assoc($result);

//if second player have Doran
if ($battle['acard'] == 'Queen' && $battle['dcard'] == 'Doran') {
	mysql_query("UPDATE `battle` SET currentplayer = '".$battle['defender']."' WHERE `id` = $game_id");
} else {
    include 'battle_recount.php';
}
?>