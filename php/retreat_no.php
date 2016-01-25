<? include 'database.php';
$terr = $_GET['terr'];
$terr = mysql_real_escape_string($terr);
$game_id = $_GET['id'];
$game_id = mysql_real_escape_string($game_id);

mysql_query("UPDATE `battle` SET currentplayer = '0' WHERE `id` = $game_id");

//next phase
include 'battle_cleanup.php';
?>