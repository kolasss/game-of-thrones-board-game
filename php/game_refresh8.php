<? include 'database.php';
$id = $_GET['id'];
$id = mysql_real_escape_string($id);

//получение данных игры
$result = mysql_query("SELECT faza FROM game where id=$id");
$row = mysql_fetch_assoc($result);

$result = mysql_query("SELECT * FROM battle where id=$id");
$row2 = mysql_fetch_assoc($result);


$row2['faza'] = $row['faza'];

echo json_encode($row2);

?>