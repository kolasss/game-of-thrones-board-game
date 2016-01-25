<? include 'database.php';
$game_id = $_GET['id'];
$game_id = mysql_real_escape_string($game_id);

mysql_query("UPDATE `game` SET currentplayer = 1 WHERE `id` = $game_id");
?>