﻿<? include 'database.php';
$terr = $_GET['terr'];
$terr = mysql_real_escape_string($terr);
$game_id = $_GET['id'];
$game_id = mysql_real_escape_string($game_id);
$housetable = $_GET['house'];
$housetable = mysql_real_escape_string($housetable);


mysql_query("UPDATE `battle` SET currentplayer = '0' WHERE `id` = $game_id");

//получение данных игры
$result = mysql_query("SELECT attacker, defender, acard, dcard, winner FROM battle WHERE id=$game_id");
$battle = mysql_fetch_assoc($result);

//casualties
//if attacker win
if ($battle['winner'] == $battle['attacker']) {
	//swords
	$swords = 0;
	if ($battle['acard'] == 'Brienne' || $battle['acard'] == 'Melissandre' || $battle['acard'] == 'Jaime' || $battle['acard'] == 'Umber' || $battle['acard'] == 'Euron' || $battle['acard'] == 'Dagmar' || $battle['acard'] == 'Randyll' || $battle['acard'] == 'Obara' || $battle['acard'] == 'Darkstar' || $battle['acard'] == 'Nymeria') {
		$swords = 1;
	} else if ($battle['acard'] == 'Eddard' || $battle['acard'] == 'Garlan' || $battle['acard'] == 'Viper') {
		$swords = 2;
	} else if ($battle['acard'] == 'Clegan') {
		$swords = 3;
	} else if ($battle['acard'] == 'Davos') {
		//select Stannis' condition
		$query = mysql_query("SELECT HC1 FROM $housetable WHERE `name` = 'Baratheon'");
		$stannis = mysql_fetch_assoc($query);
		if ($stannis['HC1'] == '0') {
			$swords = 1;
		}
	} else if ($battle['acard'] == 'Asha') {
		$result = mysql_query("SELECT asup1, asup2, asup3, asup4, asup5, asup6, asup7 FROM battle WHERE id=$game_id");
		$asup = mysql_fetch_assoc($result);
		if ($asup['asup1'] == '0' && $asup['asup2'] == '0' && $asup['asup3'] == '0' && $asup['asup4'] == '0' && $asup['asup5'] == '0' && $asup['asup6'] == '0' && $asup['asup7'] == '0') {
			$swords = 2;
		}
	};
	//forts
	$forts = 0;
	if ($battle['dcard'] == 'Brienne' || $battle['dcard'] == 'Dagmar' || $battle['dcard'] == 'Alester' || $battle['dcard'] == 'Margeary' || $battle['dcard'] == 'Viper' || $battle['dcard'] == 'Hotah' || $battle['dcard'] == 'Nymeria') {
		$forts = 1;
	} else if ($battle['dcard'] == 'Hound' || $battle['dcard'] == 'Cassel') {
		$forts = 2;
	} else if ($battle['dcard'] == 'Blackfish') {
		$forts = 6;
	} else if ($battle['dcard'] == 'Asha') {
		$result = mysql_query("SELECT dsup1, dsup2, dsup3, dsup4, dsup5, dsup6, dsup7 FROM battle WHERE id=$game_id");
		$dsup = mysql_fetch_assoc($result);
		if ($dsup['dsup1'] == '0' && $dsup['dsup2'] == '0' && $dsup['dsup3'] == '0' && $dsup['dsup4'] == '0' && $dsup['dsup5'] == '0' && $dsup['dsup6'] == '0' && $dsup['dsup7'] == '0') {
			$forts = 1;
		}
	};
} else
//if defender win
if ($battle['winner'] == $battle['defender']) {
	//swords
	$swords = 0;
	if ($battle['dcard'] == 'Brienne' || $battle['dcard'] == 'Melissandre' || $battle['dcard'] == 'Jaime' || $battle['dcard'] == 'Umber' || $battle['dcard'] == 'Euron' || $battle['dcard'] == 'Dagmar' || $battle['dcard'] == 'Randyll' || $battle['dcard'] == 'Obara' || $battle['dcard'] == 'Darkstar') {
		$swords = 1;
	} else if ($battle['dcard'] == 'Eddard' || $battle['dcard'] == 'Garlan' || $battle['dcard'] == 'Viper') {
		$swords = 2;
	} else if ($battle['dcard'] == 'Clegan') {
		$swords = 3;
	} else if ($battle['dcard'] == 'Davos') {
		//select Stannis' condition
		$query = mysql_query("SELECT HC1 FROM $housetable WHERE `name` = 'Baratheon'");
		$stannis = mysql_fetch_assoc($query);
		if ($stannis['HC1'] == '0') {
			$swords = 1;
		}
	} else if ($battle['dcard'] == 'Asha') {
		$result = mysql_query("SELECT dsup1, dsup2, dsup3, dsup4, dsup5, dsup6, dsup7 FROM battle WHERE id=$game_id");
		$dsup = mysql_fetch_assoc($result);
		if ($dsup['dsup1'] == '0' && $dsup['dsup2'] == '0' && $dsup['dsup3'] == '0' && $dsup['dsup4'] == '0' && $dsup['dsup5'] == '0' && $dsup['dsup6'] == '0' && $dsup['dsup7'] == '0') {
			$swords = 2;
		}
	} else if ($battle['dcard'] == 'Theon') {
		$result = mysql_query("SELECT castle FROM battle WHERE id=$game_id");
		$castle = mysql_fetch_assoc($result);
		if ($castle['castle'] > 0) {
			$swords = 1;
		}
	};
	//forts
	$forts = 0;
	if ($battle['acard'] == 'Brienne' || $battle['acard'] == 'Dagmar' || $battle['acard'] == 'Alester' || $battle['acard'] == 'Margeary' || $battle['acard'] == 'Viper' || $battle['acard'] == 'Hotah') {
		$forts = 1;
	} else if ($battle['acard'] == 'Hound' || $battle['acard'] == 'Cassel') {
		$forts = 2;
	} else if ($battle['acard'] == 'Blackfish') {
		$forts = 6;
	} else if ($battle['acard'] == 'Asha') {
		$result = mysql_query("SELECT asup1, asup2, asup3, asup4, asup5, asup6, asup7 FROM battle WHERE id=$game_id");
		$asup = mysql_fetch_assoc($result);
		if ($asup['asup1'] == '0' && $asup['asup2'] == '0' && $asup['asup3'] == '0' && $asup['asup4'] == '0' && $asup['asup5'] == '0' && $asup['asup6'] == '0' && $asup['asup7'] == '0') {
			$forts = 1;
		}
	};
};

$kills = $swords - $forts;
if ($kills > 0) {
	//attacker win
	if ($battle['winner'] == $battle['attacker']) {
		$result = mysql_query("SELECT dunit1, dunit2, dunit3, dunit4 FROM battle WHERE id=$game_id");
		$dunits = mysql_fetch_assoc($result);
		for ($i=1; $i<5; $i++) {
			if ($dunits['dunit'.$i] == 'F0') {
				mysql_query("UPDATE battle SET dunit".$i." = '0' WHERE id = $game_id");
			} else if ($dunits['dunit'.$i] == 'K0') {
				mysql_query("UPDATE battle SET dunit".$i." = '0' WHERE id = $game_id");
			} else if ($dunits['dunit'.$i] == 'S0') {
				mysql_query("UPDATE battle SET dunit".$i." = '0' WHERE id = $game_id");
			} else if ($dunits['dunit'.$i] == 'E1') {
				mysql_query("UPDATE battle SET dunit".$i." = '0' WHERE id = $game_id");
			} else if ($dunits['dunit'.$i] == 'F1') {
				mysql_query("UPDATE battle SET dunit".$i." = 'F0' WHERE id = $game_id");
			} else if ($dunits['dunit'.$i] == 'K1') {
				mysql_query("UPDATE battle SET dunit".$i." = 'K0' WHERE id = $game_id");
			} else if ($dunits['dunit'.$i] == 'S1') {
				mysql_query("UPDATE battle SET dunit".$i." = 'S0' WHERE id = $game_id");
			}
		}
		$result = mysql_query("SELECT dunit1, dunit2, dunit3, dunit4 FROM battle WHERE id=$game_id");
		$dunits = mysql_fetch_assoc($result);
		$units = 0;
		for ($i=1; $i<5; $i++) {
			if ($dunits['dunit'.$i] != '0') {
				$$units++;
			}
		}
		if ($units>$kills) {
			mysql_query("UPDATE battle SET currentplayer = '".$battle['defender']."', 1ready=$kills WHERE id = $game_id");
		} else {
			mysql_query("UPDATE battle SET dunit1 = '0', dunit2 = '0', dunit3 = '0', dunit4 = '0' WHERE id = $game_id");
			retreatphase();
		};
	//defender win
	} else {
		$result = mysql_query("SELECT aunit1, aunit2, aunit3, aunit4 FROM battle WHERE id=$game_id");
		$aunits = mysql_fetch_assoc($result);
		for ($i=1; $i<5; $i++) {
			if ($aunits['aunit'.$i] == 'E1') {
				mysql_query("UPDATE battle SET aunit".$i." = '0' WHERE id = $game_id");
			} else if ($aunits['aunit'.$i] == 'F1') {
				mysql_query("UPDATE battle SET aunit".$i." = 'F0' WHERE id = $game_id");
			} else if ($aunits['aunit'.$i] == 'K1') {
				mysql_query("UPDATE battle SET aunit".$i." = 'K0' WHERE id = $game_id");
			} else if ($aunits['aunit'.$i] == 'S1') {
				mysql_query("UPDATE battle SET aunit".$i." = 'S0' WHERE id = $game_id");
			};
		}
		$result = mysql_query("SELECT aunit1, aunit2, aunit3, aunit4 FROM battle WHERE id=$game_id");
		$aunits = mysql_fetch_assoc($result);
		$units = 0;
		for ($i=1; $i<5; $i++) {
			if ($aunits['aunit'.$i] != '0') {
				$units++;
			}
		}
		if ($units>$kills) {
			mysql_query("UPDATE battle SET currentplayer = '".$battle['attacker']."', 1ready=$kills WHERE id = $game_id");
		} else {
			mysql_query("UPDATE battle SET aunit1 = '0', aunit2 = '0', aunit3 = '0', aunit4 = '0' WHERE id = $game_id");
			retreatphase();
		};
	}
} else {
	retreatphase();
};

//Retreat phase
function retreatphase() {
	global $game_id, $battle, $kills, $housetable;
	mysql_query("UPDATE `game` SET faza = 12 WHERE `id` = $game_id");
	$terr = $_GET['terr'];
	$terr = mysql_real_escape_string($terr);

    include 'battle_retreat.php';

	//next phase
	$result = mysql_query("SELECT currentplayer FROM battle WHERE id=$game_id");
	$curr = mysql_fetch_assoc($result);
	if ($curr['currentplayer'] == '0') {
        include 'battle_cleanup.php';
	}
}

?>