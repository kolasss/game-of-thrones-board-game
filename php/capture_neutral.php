<? include 'database.php';
$terr = $_GET['table'];
$terr = mysql_real_escape_string($terr);
$game_id = $_GET['id'];
$game_id = mysql_real_escape_string($game_id);
$starting = $_GET['starting'];
$starting = mysql_real_escape_string($starting);
$target = $_GET['target'];
$target = mysql_real_escape_string($target);
$unit1 = $_GET['unit1'];
$unit1 = mysql_real_escape_string($unit1);
$unit2 = $_GET['unit2'];
$unit2 = mysql_real_escape_string($unit2);
$unit3 = $_GET['unit3'];
$unit3 = mysql_real_escape_string($unit3);
$unit4 = $_GET['unit4'];
$unit4 = mysql_real_escape_string($unit4);
$aorder = $_GET['order'];
$aorder = mysql_real_escape_string($aorder);

//select info from target zone
$result = mysql_query("SELECT garrison, castle FROM $terr where `name` = '$target'");
$targetinfo = mysql_fetch_assoc($result);

//select info from starting zone
$result = mysql_query("SELECT $unit1, $unit2, $unit3, $unit4, control FROM $terr where `name` = '$starting'");
$startinginfo = mysql_fetch_assoc($result);
$startinginfo['0'] = 0;

//update units in starting zone
mysql_query("UPDATE `$terr` SET `$unit1`='0' WHERE `name` = '$starting'");
mysql_query("UPDATE `$terr` SET `$unit2`='0' WHERE `name` = '$starting'");
mysql_query("UPDATE `$terr` SET `$unit3`='0' WHERE `name` = '$starting'");
mysql_query("UPDATE `$terr` SET `$unit4`='0' WHERE `name` = '$starting'");

//sorting units in starting zone
$result = mysql_query("SELECT unit1, unit2, unit3, unit4 FROM $terr where `name` = '$starting'");
$startingunits = mysql_fetch_assoc($result);
rsort($startingunits);
if ($startingunits[0] != '0') {
	mysql_query("UPDATE `$terr` SET `unit1`='$startingunits[0]', `unit2`='$startingunits[1]', `unit3`='$startingunits[2]', `unit4`='$startingunits[3]' WHERE `name` = '$starting'");
};

//attacker name
if ($startinginfo['control'] == 'G') {
	$attacker = 'Greyjoy';
} else if ($startinginfo['control'] == 'S') {
	$attacker = 'Stark';
} else if ($startinginfo['control'] == 'B') {
	$attacker = 'Baratheon';
} else if ($startinginfo['control'] == 'L') {
	$attacker = 'Lannister';
} else if ($startinginfo['control'] == 'T') {
	$attacker = 'Tyrell';
} else if ($startinginfo['control'] == 'M') {
	$attacker = 'Martell';
}

//attack neutral phase
mysql_query("UPDATE `game` SET faza=15 WHERE `id` = $game_id");
//update battle table
mysql_query("UPDATE `battle` SET `starting`='$starting', `target`='$target', `attacker`='$attacker', `defender`='neutral', `aorder`='$aorder', `dorder`='0', `aunit1`='$startinginfo[$unit1]', `aunit2`='$startinginfo[$unit2]', `aunit3`='$startinginfo[$unit3]', `aunit4`='$startinginfo[$unit4]', `dunit1`='0', `dunit2`='0', `dunit3`='0', `dunit4`='0', `garrison`='".$targetinfo['garrison']."', `castle`='".$targetinfo['castle']."', `asup1`='0', `asup2`='0', `asup3`='0', `asup4`='0', `asup5`='0', `asup6`='0', `asup7`='0', `dsup1`='0', `dsup2`='0', `dsup3`='0', `dsup4`='0', `dsup5`='0', `dsup6`='0', `dsup7`='0', `aCS`='0', `dCS`='0', `acard`='0', `dcard`='0', `winner`='0', `currentplayer`='0' WHERE `id` = '$game_id'");

//prepare call support phase
$result = mysql_query("SELECT throne1, throne2, throne3, throne4, throne5, throne6 FROM game where id=$game_id");
$row = mysql_fetch_assoc($result);

$result = mysql_query("SELECT * FROM `karta` where `id` = '$target'");
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

$i = 1;
while ($array2 = mysql_fetch_assoc($result2))
{
	if (($array2['prikaz'] == 5 || $array2['prikaz'] == 10) && ($targetmap[$array2['name']] == 1 || $targetmap[$array2['name']] == 2)) {
		if ($array2['control'] == $startinginfo['control']) {
			mysql_query("UPDATE `battle` SET `asup".$i."`='".$array2['name']."' WHERE `id` = '$game_id'");
			$i++;
		} else {
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

if ($orders2[$row['throne1']] == 0) {
	mysql_query("UPDATE `battle` SET currentplayer = currentplayer+1 WHERE `id` = $game_id");
	if ($orders2[$row['throne2']] == 0) {
		mysql_query("UPDATE `battle` SET currentplayer = currentplayer+1 WHERE `id` = $game_id");
		if ($orders2[$row['throne3']] == 0) {
			mysql_query("UPDATE `battle` SET currentplayer = currentplayer+1 WHERE `id` = $game_id");
			if ($orders2[$row['throne4']] == 0) {
				mysql_query("UPDATE `battle` SET currentplayer = currentplayer+1 WHERE `id` = $game_id");
				if ($orders2[$row['throne5']] == 0) {
					mysql_query("UPDATE `battle` SET currentplayer = currentplayer+1 WHERE `id` = $game_id");
					if ($orders2[$row['throne6']] == 0) {
						attackresult();
					}
				}
			}
		}
	}
};

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
	if ($row['garrison'] != '7') {
		mysql_query("UPDATE `battle` SET `dCS`=dCS+6 WHERE `id` = '$game_id'");
	} else if ($row['garrison'] != '8') {
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
	include_once 'march_next.php';
};
?>