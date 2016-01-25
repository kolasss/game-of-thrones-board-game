<? include 'database.php';
$id = $_GET['id'];
$id = mysql_real_escape_string($id);
//switch players
$query = mysql_query("SELECT player1, player2 FROM game where id=$id");
$row = mysql_fetch_assoc($query);
//clear field
$result = mysql_query("UPDATE game set f1='0',f2='0',f3='0',f4='0', f5='0', f6='0', f7='0', f8='0', f9='0', turn='0', winner = '0', player1 = ".$row['player2'].", player2 = ".$row['player1']." where id=$id");
?>