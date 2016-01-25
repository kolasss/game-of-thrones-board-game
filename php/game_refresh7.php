<? include 'database.php';
$id = $_GET['id'];
$id = mysql_real_escape_string($id);

//получение данных игры
$result = mysql_query("SELECT faza, throne1, throne2, throne3, throne4, throne5, throne6 FROM game where id=$id");
$row = mysql_fetch_assoc($result);

$result = mysql_query("SELECT * FROM battle where id=$id");
$row2 = mysql_fetch_assoc($result);


$row2['faza'] = $row['faza'];
if ($row['faza'] == 7) {
	$temp = $row2['currentplayer']+1;
	$row2['currentplayer'] = $row['throne'.$temp];
} else {$row2['currentplayer'] = 'Attacking and defending lords';}

echo json_encode($row2);

?>