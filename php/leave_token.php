<? include 'database.php';
$terr = $_GET['table'];
$terr = mysql_real_escape_string($terr);
$mesto = $_GET['mesto'];
$mesto = mysql_real_escape_string($mesto);
$token = $_GET['token'];
$token = mysql_real_escape_string($token);
$house = $_GET['house'];
$house = mysql_real_escape_string($house);
$myhouse = $_GET['myhouse'];
$myhouse = mysql_real_escape_string($myhouse);

if ($token == 1 ) {
	mysql_query("UPDATE `$terr` SET `prikaz` = '0', `token` = '1' WHERE `name` = '$mesto'");
	mysql_query("UPDATE $house SET `tokih` = tokih-1, `tokob` = tokob+1 WHERE name='$myhouse'");
} else {
	if ($mesto == 'Winterfell') {
		mysql_query("UPDATE `$terr` SET `control`='S', `prikaz`='0' WHERE `name` = '$mesto'");
	} else if ($mesto == 'Pyke') {
		mysql_query("UPDATE `$terr` SET `control`='G', `prikaz`='0' WHERE `name` = '$mesto'");
	} else if ($mesto == 'Dragonstone') {
		mysql_query("UPDATE `$terr` SET `control`='B', `prikaz`='0' WHERE `name` = '$mesto'");
	} else if ($mesto == 'Lannisport') {
		mysql_query("UPDATE `$terr` SET `control`='L', `prikaz`='0' WHERE `name` = '$mesto'");
	} else if ($mesto == 'Highgarden') {
		mysql_query("UPDATE `$terr` SET `control`='T', `prikaz`='0' WHERE `name` = '$mesto'");
	} else if ($mesto == 'Sunspear') {
		mysql_query("UPDATE `$terr` SET `control`='M', `prikaz`='0' WHERE `name` = '$mesto'");
	} else {
		mysql_query("UPDATE `$terr` SET `prikaz` = '0', `token` = '0', `control` = '0' WHERE `name` = '$mesto'");
	}
}
?>