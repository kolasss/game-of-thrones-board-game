<? include 'database.php';
$game_id = $_GET['id'];
$game_id = mysql_real_escape_string($game_id);
$terr = $_GET['table'];
$terr = mysql_real_escape_string($terr);

$result = mysql_query("SELECT faza FROM game WHERE id=$game_id");
$array = mysql_fetch_assoc($result);

if ($array['faza'] == 4) {
	mysql_query("UPDATE `game` SET faza=5 WHERE `id` = $game_id");
	
	//prepare raid phase
	$result = mysql_query("SELECT throne1, throne2, throne3, throne4, throne5, throne6 FROM game where id=$game_id");
	$row = mysql_fetch_assoc($result);
	
	$orders = array(
		'G' => 0,
		'B' => 0,
		'L' => 0,
		'S' => 0,
		'T' => 0,
		'M' => 0,
	);
	$result2 = mysql_query("SELECT name, control, prikaz FROM $terr");		  
	$i=0;
	while ($array2 = mysql_fetch_assoc($result2))
	{
		if ($array2['prikaz'] == 4 || $array2['prikaz'] == 9) {
			$orders[$array2['control']]++; 
		}
		$i++;
	};
	$orders2 = array(
		'Greyjoy' => $orders['G'],
		'Baratheon' => $orders['B'],
		'Lannister' => $orders['L'],
		'Stark' => $orders['S'],
		'Tyrell' => $orders['T'],
		'Martell' => $orders['M'],
	);
	
	if ($orders2[$row['throne1']] == 0) {
		mysql_query("UPDATE `game` SET currentplayer = currentplayer+1 WHERE `id` = $game_id");
		if ($orders2[$row['throne2']] == 0) {
			mysql_query("UPDATE `game` SET currentplayer = currentplayer+1 WHERE `id` = $game_id");
			if ($orders2[$row['throne3']] == 0) {
				mysql_query("UPDATE `game` SET currentplayer = currentplayer+1 WHERE `id` = $game_id");
				if ($orders2[$row['throne4']] == 0) {
					mysql_query("UPDATE `game` SET currentplayer = currentplayer+1 WHERE `id` = $game_id");
					if ($orders2[$row['throne5']] == 0) {
						mysql_query("UPDATE `game` SET currentplayer = currentplayer+1 WHERE `id` = $game_id");
						if ($orders2[$row['throne6']] == 0) {
							mysql_query("UPDATE `game` SET faza = 6, currentplayer = 0 WHERE `id` = $game_id");
							
						}
					}
				}
			}
		}
	}
	

	
}

?>