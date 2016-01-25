<? include 'database.php';
$id = $_GET['id'];
$n = $_GET['n'];
$turn = $_GET['turn'];
$id = mysql_real_escape_string($id);
$n = mysql_real_escape_string($n);
$turn = mysql_real_escape_string($turn);
$len = strlen ($n);
$result = mysql_query("SELECT turn FROM game where id=$id");
$row = mysql_fetch_array($result);
$turnbd = $row[0];
if(($turn ==0 || $turn == 1) && $len == 2 && $turn != $turnbd){
	$result = mysql_query("UPDATE game set $n = $turn+1, turn = $turn where id=$id");
};
?>