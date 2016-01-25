<? include 'database.php';
$game_id = $_GET['id'];
$game_id = mysql_real_escape_string($game_id);
$zone1 = $_GET['zone1'];
$zone1 = mysql_real_escape_string($zone1);
$zone1sup = $_GET[$zone1];
$zone1sup = mysql_real_escape_string($zone1sup);

if ($zone1sup != '0') {
	//select info from battle
	$result = mysql_query("SELECT asup1, asup2, asup3, asup4, asup5, asup6, asup7, dsup1, dsup2, dsup3, dsup4, dsup5, dsup6, dsup7 FROM battle where `id` = '$game_id'");
	$battleinfo = mysql_fetch_assoc($result);
	//find clear field in DB
	for ($i=1; $i<8; $i++) {
		if ($battleinfo[$zone1sup.'sup'.$i] == '0') {
			mysql_query("UPDATE `battle` SET `".$zone1sup.'sup'.$i."`='$zone1' WHERE `id` = '$game_id'");
			break;
		};
	}
}

//function update DB
function updatezone($zone, $game_id) {
	$zone2 = $_GET[$zone];
	$zone2 = mysql_real_escape_string($zone2);
	$zone2sup = $_GET[$zone2];
	$zone2sup = mysql_real_escape_string($zone2sup);
	if ($zone2sup != '0') {
		$result = mysql_query("SELECT asup1, asup2, asup3, asup4, asup5, asup6, asup7, dsup1, dsup2, dsup3, dsup4, dsup5, dsup6, dsup7 FROM battle where `id` = '$game_id'");
		$battleinfo = mysql_fetch_assoc($result);
		
		for ($i=1; $i<8; $i++) {
			if ($battleinfo[$zone2sup.'sup'.$i] == '0') {
				mysql_query("UPDATE `battle` SET `".$zone2sup.'sup'.$i."`='$zone2' WHERE `id` = '$game_id'");
				break;
			};
		}
	}
}
//checking and updating
if (isset($_GET['zone2'])) {
	updatezone('zone2', $game_id);
	if (isset($_GET['zone3'])) {
		updatezone('zone3', $game_id);
		if (isset($_GET['zone4'])) {
			updatezone('zone4', $game_id);
			if (isset($_GET['zone5'])) {
				updatezone('zone5', $game_id);
				if (isset($_GET['zone6'])) {
					updatezone('zone6', $game_id);
					if (isset($_GET['zone7'])) {
						updatezone('zone7', $game_id);
					}
				}
			}
		}
	}
}




//prepare call support phase
mysql_query("UPDATE `battle` SET currentplayer = currentplayer+1 WHERE `id` = $game_id");

$result = mysql_query("SELECT throne1, throne2, throne3, throne4, throne5, throne6, terr FROM game where id=$game_id");
$row = mysql_fetch_assoc($result);
$terr = $row['terr'];

$result = mysql_query("SELECT currentplayer, target FROM battle where id=$game_id");
$row2 = mysql_fetch_assoc($result);

$result = mysql_query("SELECT * FROM `karta` where `id` = '".$row2['target']."'");
$targetmap = mysql_fetch_assoc($result);

$orders = array(
	'G' => 0,
	'B' => 0,
	'L' => 0,
	'S' => 0,
	'T' => 0,
	'M' => 0,
);
$result2 = mysql_query("SELECT name, control, prikaz FROM $terr");		  

while ($array2 = mysql_fetch_assoc($result2))
{
	if (($array2['prikaz'] == 5 || $array2['prikaz'] == 10) && ($targetmap[$array2['name']] == 1 || $targetmap[$array2['name']] == 2 || $targetmap[$array2['name']] == 5)) {
		$orders[$array2['control']]++; 
	}
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
	$temp = $row2['currentplayer']+$i;
	if ($temp < 7) {
		if ($orders2[$row['throne'.$temp]] == 0) {
			mysql_query("UPDATE `battle` SET currentplayer = currentplayer+1 WHERE `id` = $game_id");
		} else {break;}
	} else {
		mysql_query("UPDATE `game` SET faza = 8 WHERE `id` = $game_id");
		mysql_query("UPDATE `battle` SET currentplayer = 0 WHERE `id` = $game_id");
		
		//count up CS
		$result = mysql_query("SELECT aorder, dorder, aunit1, aunit2, aunit3, aunit4, dunit1, dunit2, dunit3, dunit4, asup1, asup2, asup3, asup4, asup5, asup6, asup7, dsup1, dsup2, dsup3, dsup4, dsup5, dsup6, dsup7, garrison, castle FROM battle WHERE id=$game_id");
		$row = mysql_fetch_assoc($result);
		//units power
		for ($j=1; $j<5; $j++) {
			if ($row['aunit'.$j] != '0') {
				if ($row['aunit'.$j] == 'F1' || $row['aunit'.$j] == 'S1') {
					mysql_query("UPDATE `battle` SET `aCS`=aCS+1 WHERE `id` = '$game_id'");
				} else if ($row['aunit'.$j] == 'K1') {
					mysql_query("UPDATE `battle` SET `aCS`=aCS+2 WHERE `id` = '$game_id'");
				} else if ($row['aunit'.$j] == 'E1' && $row['castle'] != '0') {
					mysql_query("UPDATE `battle` SET `aCS`=aCS+4 WHERE `id` = '$game_id'");
				};
			};
			if ($row['dunit'.$j] != '0') {
				if ($row['dunit'.$j] == 'F1' || $row['dunit'.$j] == 'S1') {
					mysql_query("UPDATE `battle` SET `dCS`=dCS+1 WHERE `id` = '$game_id'");
				} else if ($row['dunit'.$j] == 'K1') {
					mysql_query("UPDATE `battle` SET `dCS`=dCS+2 WHERE `id` = '$game_id'");
				};			
			};
		}
		//orders
		if ($row['aorder'] == '1') {
			mysql_query("UPDATE `battle` SET `aCS`=aCS-1 WHERE `id` = '$game_id'");
		} else if ($row['aorder'] == '7') {
			mysql_query("UPDATE `battle` SET `aCS`=aCS+1 WHERE `id` = '$game_id'");
		}
		if ($row['dorder'] == '3') {
			mysql_query("UPDATE `battle` SET `dCS`=dCS+1 WHERE `id` = '$game_id'");
		} else if ($row['dorder'] == '8') {
			mysql_query("UPDATE `battle` SET `dCS`=dCS+2 WHERE `id` = '$game_id'");
		}
		//garrison
		if ($row['garrison'] != '0') {
			mysql_query("UPDATE `battle` SET `dCS`=dCS+2 WHERE `id` = '$game_id'");
		}
		//support units
		for ($j=1; $j<8; $j++) {
			//attacking
			if ($row['asup'.$j] != '0') {
				$result2 = mysql_query("SELECT unit1, unit2, unit3, unit4, prikaz FROM $terr WHERE `name` = '".$row['asup'.$j]."'");
				$row2 = mysql_fetch_assoc($result2);
				//units
				for ($k=1; $k<5; $k++) {
					if ($row2['unit'.$k] != '0') {
						if ($row2['unit'.$k] == 'F1' || $row2['unit'.$k] == 'S1') {
							mysql_query("UPDATE `battle` SET `aCS`=aCS+1 WHERE `id` = '$game_id'");
						} else if ($row2['unit'.$k] == 'K1') {
							mysql_query("UPDATE `battle` SET `aCS`=aCS+2 WHERE `id` = '$game_id'");
						} else if ($row2['unit'.$k] == 'E1' && $row['castle'] != '0') {
							mysql_query("UPDATE `battle` SET `aCS`=aCS+4 WHERE `id` = '$game_id'");
						};
					};
				}
				//order
				if ($row2['prikaz'] == '10') {
					mysql_query("UPDATE `battle` SET `aCS`=aCS+1 WHERE `id` = '$game_id'");
				}
			};
			//defending
			if ($row['dsup'.$j] != '0') {
				$result2 = mysql_query("SELECT unit1, unit2, unit3, unit4, prikaz FROM $terr WHERE `name` = '".$row['dsup'.$j]."'");
				$row2 = mysql_fetch_assoc($result2);
				//units
				for ($k=1; $k<5; $k++) {
					if ($row2['unit'.$k] != '0') {
						if ($row2['unit'.$k] == 'F1' || $row2['unit'.$k] == 'S1') {
							mysql_query("UPDATE `battle` SET `dCS`=dCS+1 WHERE `id` = '$game_id'");
						} else if ($row2['unit'.$k] == 'K1') {
							mysql_query("UPDATE `battle` SET `dCS`=dCS+2 WHERE `id` = '$game_id'");
						};
					};
				}
				//order
				if ($row2['prikaz'] == '10') {
					mysql_query("UPDATE `battle` SET `dCS`=dCS+1 WHERE `id` = '$game_id'");
				}
			};
		}
		
		break;
	}
}



?>