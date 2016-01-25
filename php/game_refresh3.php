<? include 'database.php';
$id = $_GET['id'];
$id = mysql_real_escape_string($id);

//получение данных игры
$result = mysql_query("SELECT faza FROM game where id=$id");
$row = mysql_fetch_assoc($result);

echo json_encode($row['faza']);

?>