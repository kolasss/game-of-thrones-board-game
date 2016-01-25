<? include 'database.php';
$id = $_GET['id'];
$id = mysql_real_escape_string($id);

//получение данных игры
$result = mysql_query("SELECT faza, currentplayer, throne1, throne2, throne3, throne4, throne5, throne6, fiefdom1, fiefdom2, fiefdom3, fiefdom4, fiefdom5, fiefdom6, court1, court2, court3, court4, court5, court6, win, Blade FROM game where id=$id");
$row = mysql_fetch_assoc($result);

if ($row['faza'] == 6) {
	$temp = $row['currentplayer']+1;
	$row['currentplayer'] = $row['throne'.$temp];
} else {$row['currentplayer'] = 'updating...';}

echo json_encode($row);
?>