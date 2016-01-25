<? include 'database.php';
$terr = $_GET['terr'];
$terr = mysql_real_escape_string($terr);
$mesto = $_GET['mesto'];
$mesto = mysql_real_escape_string($mesto);
$game_id = $_GET['id'];
$game_id = mysql_real_escape_string($game_id);
//delete order
mysql_query("UPDATE `$terr` SET `prikaz` = '0' WHERE `name` = '$mesto'");

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