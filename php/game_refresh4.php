<? include 'database.php';
$id = $_GET['id'];
$id = mysql_real_escape_string($id);
$terr = $_GET['table'];
$terr = mysql_real_escape_string($terr);

//получение данных игры
$result = mysql_query("SELECT faza, throne1, throne2, throne3, throne4, throne5, throne6 FROM game where id=$id");
$row = mysql_fetch_assoc($result);

$result = mysql_query("SELECT name, prikaz FROM $terr");

$i=0;
while ($array = mysql_fetch_assoc($result))
{
	$row2[$array['name']] = $array;
	$i++;
};
$row2['faza'] = $row['faza'];
echo json_encode($row2);

?>