<? include 'database.php';
$house = $_GET['table'];
$house = mysql_real_escape_string($house);

$result = mysql_query("SELECT name, tokih, tokob, zamki, bochki, HC1, HC2, HC3, HC4, HC5, HC6, HC7, ready FROM $house");

while ($array = mysql_fetch_assoc($result))
{
	$row[$array['name']] = $array;
};

echo json_encode ($row);
?>