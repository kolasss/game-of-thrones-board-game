<? include 'database.php';
$id = $_GET['id'];
$id = mysql_real_escape_string($id);
$terr = $_GET['table'];
$terr = mysql_real_escape_string($terr);

//получение данных игры
$result = mysql_query("SELECT * FROM game where id=$id");
$row = mysql_fetch_assoc($result);

if ($row['faza'] == 3) {
	echo json_encode($row['faza']);
} else if ($row['faza'] == 4) {
	
	$result = mysql_query("SELECT name, prikaz FROM $terr");

	$i=0;
	while ($array = mysql_fetch_assoc($result))
	{
		$row2[$array['name']] = $array;
		$i++;
	};
	$row2['faza'] = $row['faza'];
	echo json_encode($row2);
}
?>