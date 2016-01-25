<? include 'database.php';
$terr = $_GET['table'];
$terr = mysql_real_escape_string($terr);
$mesto = $_GET['mesto'];
$mesto = mysql_real_escape_string($mesto);
$prikaz = $_GET['prikaz'];
$prikaz = mysql_real_escape_string($prikaz);

mysql_query("UPDATE `$terr` SET `prikaz` = '$prikaz' WHERE `name` = '$mesto'");
?>