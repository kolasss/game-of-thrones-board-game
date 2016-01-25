<? include 'database.php';
$house = $_GET['table'];
$house = mysql_real_escape_string($house);
$raider = $_GET['raider'];
$raider = mysql_real_escape_string($raider);
$victim = $_GET['victim'];
$victim = mysql_real_escape_string($victim);

//houses names
if ($raider == 'B') {
	$raider = 'Baratheon';
} else if ($raider == 'G') {
	$raider = 'Greyjoy';
} else if ($raider == 'L') {
	$raider = 'Lannister';
} else if ($raider == 'S') {
	$raider = 'Stark';
} else if ($raider == 'M') {
	$raider = 'Martell';
} else if ($raider == 'T') {
	$raider = 'Tyrell';
}

if ($victim == 'B') {
	$victim = 'Baratheon';
} else if ($victim == 'G') {
	$victim = 'Greyjoy';
} else if ($victim == 'L') {
	$victim = 'Lannister';
} else if ($victim == 'S') {
	$victim = 'Stark';
} else if ($victim == 'M') {
	$victim = 'Martell';
} else if ($victim == 'T') {
	$victim = 'Tyrell';
}

//select info from house
$result = mysql_query("SELECT name, tokih, tokob FROM $house WHERE name='$raider' OR name='$victim'");

$i=0;
while ($array = mysql_fetch_assoc($result))
{
	$row[$array['name']] = $array;
	$i++;
};

//update tokens in hand
if ($row[$raider]['tokih']+1 < 21-$row[$raider]['tokob']) {
	mysql_query("UPDATE $house SET tokih = tokih+1 WHERE name='$raider'");
}

if ($row[$victim]['tokih']-1 >= 0) {
	mysql_query("UPDATE $house SET tokih = tokih-1 WHERE name='$victim'");
}
?>