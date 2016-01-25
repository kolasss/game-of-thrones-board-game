<? include 'database.php';
$terr = $_GET['table'];
$terr = mysql_real_escape_string($terr);
$mesto = $_GET['mesto'];
$mesto = mysql_real_escape_string($mesto);

mysql_query("UPDATE $terr SET `prikaz` = '0' WHERE `name` = '$mesto'");
?>