<? include 'database.php';
$id = $_GET['id'];
$id = mysql_real_escape_string($id);

//получение данных игры
$result = mysql_query("SELECT turn, faza, currentplayer, throne1, throne2, throne3, throne4, throne5, throne6, WC1_1, WC1_2, WC1_3, WC1_4, WC1_5, WC1_6, WC1_7, WC1_8, WC1_9, WC1_10, WC2_1, WC2_2, WC2_3, WC2_4, WC2_5, WC2_6, WC2_7, WC2_8, WC2_9, WC2_10, WC3_1, WC3_2, WC3_3, WC3_4, WC3_5, WC3_6, WC3_7, WC3_8, WC3_9, WC3_10, WildPower, Blade FROM game where id=$id");
$row = mysql_fetch_assoc($result);

if ($row['faza'] == 0 && $row["WC1_".$row['turn']] == '1') {//Mustering
	$temp = $row['currentplayer']+1;
	$row['currentplayer'] = $row['throne'.$temp];
} else {$row['currentplayer'] = 'updating...';}

echo json_encode($row);

?>