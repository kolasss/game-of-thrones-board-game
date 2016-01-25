<? include 'database.php';
$game_id = $_GET['id'];
$game_id = mysql_real_escape_string($game_id);
$zone1 = $_GET['zone1'];
$zone1 = mysql_real_escape_string($zone1);
$zone1sup = $_GET[$zone1];
$zone1sup = mysql_real_escape_string($zone1sup);

if ($zone1sup != '0') {
	//select info from battle
	$result = mysql_query("SELECT asup1, asup2, asup3, asup4, asup5, asup6, asup7 FROM battle where `id` = '$game_id'");
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
		$result = mysql_query("SELECT asup1, asup2, asup3, asup4, asup5, asup6, asup7 FROM battle where `id` = '$game_id'");
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

$result = mysql_query("SELECT currentplayer, target, attacker FROM battle where id=$game_id");
$row2 = mysql_fetch_assoc($result);

if ($row2['attacker'] == 'Baratheon') {
	$acontrol = 'B';
} else if ($row2['attacker'] == 'Stark') {
	$acontrol = 'S';
} else if ($row2['attacker'] == 'Greyjoy') {
	$acontrol = 'G';
} else if ($row2['attacker'] == 'Tyrell') {
	$acontrol = 'T';
} else if ($row2['attacker'] == 'Lannister') {
	$acontrol = 'L';
} else if ($row2['attacker'] == 'Martell') {
	$acontrol = 'M';
};

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
	if (($array2['prikaz'] == 5 || $array2['prikaz'] == 10) && ($targetmap[$array2['name']] == 1 || $targetmap[$array2['name']] == 2)) {
		if ($array2['control'] != $acontrol) {
			$orders[$array2['control']]++;
		}
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
		attackresult();
		break;
	}
}

//count up CS
function attackresult() {
	global $game_id, $terr;
	
	$result = mysql_query("SELECT aorder, aunit1, aunit2, aunit3, aunit4, asup1, asup2, asup3, asup4, asup5, asup6, asup7, garrison, castle, attacker, target, `starting` FROM battle WHERE id=$game_id");
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
	};
	//orders
	if ($row['aorder'] == '1') {
		mysql_query("UPDATE `battle` SET `aCS`=aCS-1 WHERE `id` = '$game_id'");
	} else if ($row['aorder'] == '7') {
		mysql_query("UPDATE `battle` SET `aCS`=aCS+1 WHERE `id` = '$game_id'");
	}
	
	//garrison
	if ($row['garrison'] == '7') {
		mysql_query("UPDATE `battle` SET `dCS`=dCS+6 WHERE `id` = '$game_id'");
	} else if ($row['garrison'] == '8') {
		mysql_query("UPDATE `battle` SET `dCS`=dCS+5 WHERE `id` = '$game_id'");
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
	};
	
	//determine winner
	$result = mysql_query("SELECT aCS, dCS FROM battle WHERE id=$game_id");
	$battle = mysql_fetch_assoc($result);
	
	if ($battle['aCS'] >= $battle['dCS']) {//attacker win
		
		if ($row['attacker'] == 'Baratheon') {
			$acontrol = 'B';
		} else if ($row['attacker'] == 'Stark') {
			$acontrol = 'S';
		} else if ($row['attacker'] == 'Greyjoy') {
			$acontrol = 'G';
		} else if ($row['attacker'] == 'Tyrell') {
			$acontrol = 'T';
		} else if ($row['attacker'] == 'Lannister') {
			$acontrol = 'L';
		} else if ($row['attacker'] == 'Martell') {
			$acontrol = 'M';
		};
		
		//update target zone
		mysql_query("UPDATE $terr SET unit1='".$row['aunit1']."', unit2='".$row['aunit2']."', unit3='".$row['aunit3']."', unit4='".$row['aunit4']."', control='$acontrol', garrison='0' WHERE name = '".$row['target']."'");
		
	} else {//attacker lose
		
		//select info from starting zone
		$result = mysql_query("SELECT unit1, unit2, unit3 FROM $terr where `name` = '".$row['starting']."'");
		$targetunits = mysql_fetch_assoc($result);
		
		if ($row['attacker'] == 'Baratheon') {
			$acontrol = 'B';
		} else if ($row['attacker'] == 'Stark') {
			$acontrol = 'S';
		} else if ($row['attacker'] == 'Greyjoy') {
			$acontrol = 'G';
		} else if ($row['attacker'] == 'Tyrell') {
			$acontrol = 'T';
		} else if ($row['attacker'] == 'Lannister') {
			$acontrol = 'L';
		} else if ($row['attacker'] == 'Martell') {
			$acontrol = 'M';
		};
		
		//update units in starting zone
		if ($targetunits['unit1'] == '0') {
			mysql_query("UPDATE $terr SET unit1='".$row['aunit1']."', unit2='".$row['aunit2']."', unit3='".$row['aunit3']."', unit4='".$row['aunit4']."', control='$acontrol' WHERE name = '".$row['starting']."'");
		} else if ($targetunits['unit2'] == '0') {
			mysql_query("UPDATE $terr SET unit2='".$row['aunit1']."', unit3='".$row['aunit2']."', unit4='".$row['aunit3']."' WHERE name = '".$row['starting']."'");
		} else if ($targetunits['unit3'] == '0') {
			mysql_query("UPDATE $terr SET unit3='".$row['aunit1']."', unit4='".$row['aunit2']."' WHERE name = '".$row['starting']."'");
		} else {
			mysql_query("UPDATE $terr SET unit4='".$row['aunit1']."' WHERE name = '".$row['starting']."'");
		};
		
	};
	//prepare next phase
	mysql_query("UPDATE `game` SET faza=6 WHERE `id` = $game_id");
	$_GET['table'] = $terr;
	include_once 'march_next.php';
};

?>