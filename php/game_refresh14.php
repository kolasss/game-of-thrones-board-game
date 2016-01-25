<? include 'database.php';
$id = $_GET['id'];
$id = mysql_real_escape_string($id);
$terr = $_GET['table'];
$terr = mysql_real_escape_string($terr);
$house = $_GET['house'];
$house = mysql_real_escape_string($house);

//получение данных игры
$result = mysql_query("SELECT faza, currentplayer, throne1, throne2, throne3, throne4, throne5, throne6 FROM game where id=$id");
$row = mysql_fetch_assoc($result);

//получение количества токенов в руке
$result = mysql_query("SELECT name, tokih FROM $house");

while ($array = mysql_fetch_assoc($result))
{
	$row2[$array['name']] = $array;
};

$row2['faza'] = $row['faza'];
if ($row['faza'] == 14) {
	$temp = $row['currentplayer']+1;
	$row2['currentplayer'] = $row['throne'.$temp];
} else {$row2['currentplayer'] = 'updating...';}

echo json_encode($row2);

?>