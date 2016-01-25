<? include 'database.php';
$id = $_GET['id'];
$id = mysql_real_escape_string($id);
$house = $_GET['house'];
$house = mysql_real_escape_string($house);

//получение данных игры
$result = mysql_query("SELECT faza, WildCard1 FROM game WHERE id=$id");
$row = mysql_fetch_assoc($result);

$result = mysql_query("SELECT name, bid FROM $house");

while ($array = mysql_fetch_assoc($result))
{
    $row2[$array['name']] = $array['bid'];
};

$row2 = $row2 + $row;

echo json_encode($row2);
?>