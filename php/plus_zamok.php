<? include 'database.php';
$house = $_GET['house'];
$house = mysql_real_escape_string($house);
$victim = $_GET['victim'];
$victim = mysql_real_escape_string($victim);

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

mysql_query("UPDATE $house SET `zamki` = zamki+1 WHERE name='$victim'");
?>