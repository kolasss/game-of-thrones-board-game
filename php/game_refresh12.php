<? include 'database.php';
$id = $_GET['id'];
$id = mysql_real_escape_string($id);

//получение данных игры
$result = mysql_query("SELECT faza, throne1, throne2, throne3, throne4, throne5, throne6, fiefdom1, fiefdom2, fiefdom3, fiefdom4, fiefdom5, fiefdom6, court1, court2, court3, court4, court5, court6, Blade FROM game where id=$id");
$row = mysql_fetch_assoc($result);

$result = mysql_query("SELECT * FROM battle where id=$id");
$row2 = mysql_fetch_assoc($result);

$row3 = $row + $row2;

echo json_encode($row3);
?>