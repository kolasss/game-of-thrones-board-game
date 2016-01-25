<? include 'database.php';
$terr = $_GET['table'];
$terr = mysql_real_escape_string($terr);
$mycontrol = $_GET['mycontrol'];
$mycontrol = mysql_real_escape_string($mycontrol);
$id = $_GET['id'];
$id = mysql_real_escape_string($id);

$result = mysql_query("SELECT * FROM $terr");


while ($array = mysql_fetch_assoc($result))
{
	$row[$array['name']] = $array;
	$row[$array['name']]['prikaz'] = 0;
};

$query = mysql_query("SELECT faza FROM game where id=$id");
$faza = mysql_fetch_assoc($query);
if ($faza['faza'] == 3) {
	$result = mysql_query("SELECT name, prikaz FROM $terr WHERE control = '$mycontrol'");
} else {
	$result = mysql_query("SELECT name, prikaz FROM $terr");
};

while ($array = mysql_fetch_assoc($result))
{
	$row[$array['name']]['prikaz'] = $array['prikaz'];
};

echo json_encode ($row);
?>