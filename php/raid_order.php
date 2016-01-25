<? include 'database.php';
$terr = $_GET['table'];
$terr = mysql_real_escape_string($terr);
$game_id = $_GET['id'];
$game_id = mysql_real_escape_string($game_id);
$starting = $_GET['starting'];
$starting = mysql_real_escape_string($starting);
$target = $_GET['target'];
$target = mysql_real_escape_string($target);

mysql_query("UPDATE `$terr` SET `prikaz` = '0' WHERE `name` = '$starting' OR `name` = '$target'");
mysql_query("UPDATE `game` SET currentplayer = currentplayer+1 WHERE `id` = $game_id");


//prepare raid phase
$result = mysql_query("SELECT currentplayer, throne1, throne2, throne3, throne4, throne5, throne6 FROM game where id=$game_id");
$row = mysql_fetch_assoc($result);

$orders = array(
	'G' => 0,
	'B' => 0,
	'L' => 0,
	'S' => 0,
	'T' => 0,
	'M' => 0,
);
$result = mysql_query("SELECT name, control, prikaz FROM $terr");		  
$i=0;
while ($array = mysql_fetch_assoc($result))
{
	if ($array['prikaz'] == 4 || $array['prikaz'] == 9) {
		$orders[$array['control']]++; 
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

for ($i=1; $i<8; $i++) {
	if ($i == 7) {
		mysql_query("UPDATE `game` SET faza=6, currentplayer=0 WHERE `id` = $game_id");
		findmarchphase($game_id, $terr);
		break;
	}
	$temp = $row['currentplayer']+$i;
	if ($temp < 7) {
		if ($orders2[$row['throne'.$temp]] == 0) {
			mysql_query("UPDATE `game` SET currentplayer = currentplayer+1 WHERE `id` = $game_id");
		} else {break;}
	} else {
		$temp = $row['currentplayer']+$i-6;
		if ($temp == 1) {
			mysql_query("UPDATE `game` SET currentplayer = 0 WHERE `id` = $game_id");
		}
		if ($orders2[$row['throne'.$temp]] == 0) {
			mysql_query("UPDATE `game` SET currentplayer = currentplayer+1 WHERE `id` = $game_id");
		} else {break;}
	}
}

//prepare march phase
function findmarchphase($game_id, $terr) {
	
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
		if ($array2['prikaz'] == 1 || $array2['prikaz'] == 2 || $array2['prikaz'] == 7) {
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
							mysql_query("UPDATE `game` SET faza = 14, currentplayer = 0 WHERE `id` = $game_id");
							findconsolidatephase($game_id, $terr);
						}
					}
				}
			}
		}
	}
};

//prepare consolidate power phase
function findconsolidatephase($game_id, $terr) {
	
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
		if ($array2['prikaz'] == 6 || $array2['prikaz'] == 11) {
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
							/*mysql_query("UPDATE `game` SET turn = turn+1, faza = 0, currentplayer = 0 WHERE `id` = $game_id");*/
							cleanup($game_id, $terr);
						}
					}
				}
			}
		}
	}
};

function cleanup($game_id, $terr) {
	include 'cleanup.php';
};
?>