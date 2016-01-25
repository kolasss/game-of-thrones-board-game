<? include 'database.php';
$id = $_GET['id'];
$win = $_GET['win'];
$id = mysql_real_escape_string($id);
$win = mysql_real_escape_string($win);
$result = mysql_query("UPDATE game set winner = $win where id=$id");
?>