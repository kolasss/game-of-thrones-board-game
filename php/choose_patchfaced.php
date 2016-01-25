<? include 'database.php';
$terr = $_GET['terr'];
$terr = mysql_real_escape_string($terr);
$game_id = $_GET['id'];
$game_id = mysql_real_escape_string($game_id);
$house = $_GET['house'];
$house = mysql_real_escape_string($house);
$hero = $_GET['hero'];
$hero = mysql_real_escape_string($hero);

mysql_query("UPDATE `battle` SET currentplayer = '0' WHERE `id` = $game_id");

//получение данных игры
$result = mysql_query("SELECT acard, dcard, attacker, defender, target FROM battle where id=$game_id");
$row = mysql_fetch_assoc($result);

//if Patchface attacker
if ($row['acard'] == 'Patchface') {
	//make current card not available for choose
	if ($row['defender'] == 'Stark') {
		if ($hero == 'Eddard') {
			mysql_query("UPDATE $house SET `HC1`=0 WHERE `name` = 'Stark'");
			$result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Stark'");
			$acards = mysql_fetch_assoc($result);
			if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
				mysql_query("UPDATE $house SET `HC7`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Stark'");
			};
		} else
		if ($hero == 'Robb') {
			mysql_query("UPDATE $house SET `HC2`=0 WHERE `name` = 'Stark'");
			$result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Stark'");
			$acards = mysql_fetch_assoc($result);
			if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
				mysql_query("UPDATE $house SET `HC1`=1, `HC7`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Stark'");
			};
		} else
		if ($hero == 'Bolton') {
			mysql_query("UPDATE $house SET `HC3`=0 WHERE `name` = 'Stark'");
			$result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Stark'");
			$acards = mysql_fetch_assoc($result);
			if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
				mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC7`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Stark'");
			};
		} else
		if ($hero == 'Umber') {
			mysql_query("UPDATE $house SET `HC4`=0 WHERE `name` = 'Stark'");
			$result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Stark'");
			$acards = mysql_fetch_assoc($result);
			if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
				mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC7`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Stark'");
			};
		} else
		if ($hero == 'Cassel') {
			mysql_query("UPDATE $house SET `HC5`=0 WHERE `name` = 'Stark'");
			$result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Stark'");
			$acards = mysql_fetch_assoc($result);
			if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
				mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC7`=1, `HC6`=1,  WHERE `name` = 'Stark'");
			};
		} else
		if ($hero == 'Blackfish') {
			mysql_query("UPDATE $house SET `HC6`=0 WHERE `name` = 'Stark'");
			$result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Stark'");
			$acards = mysql_fetch_assoc($result);
			if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
				mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC7`=1,  WHERE `name` = 'Stark'");
			};
		} else
		if ($hero == 'Catelyn') {
			mysql_query("UPDATE $house SET `HC7`=0 WHERE `name` = 'Stark'");
			$result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Stark'");
			$acards = mysql_fetch_assoc($result);
			if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
				mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Stark'");
			};
		};
	} else if ($row['defender'] == 'Greyjoy') {
		if ($hero == 'Euron') {
			mysql_query("UPDATE $house SET `HC1`=0 WHERE `name` = 'Greyjoy'");
			$result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Greyjoy'");
			$acards = mysql_fetch_assoc($result);
			if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
				mysql_query("UPDATE $house SET `HC7`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Greyjoy'");
			};
		} else
		if ($hero == 'Victarion') {
			mysql_query("UPDATE $house SET `HC2`=0 WHERE `name` = 'Greyjoy'");
			$result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Greyjoy'");
			$acards = mysql_fetch_assoc($result);
			if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
				mysql_query("UPDATE $house SET `HC1`=1, `HC7`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Greyjoy'");
			};
		} else
		if ($hero == 'Theon') {
			mysql_query("UPDATE $house SET `HC3`=0 WHERE `name` = 'Greyjoy'");
			$result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Greyjoy'");
			$acards = mysql_fetch_assoc($result);
			if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
				mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC7`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Greyjoy'");
			};
		} else
		if ($hero == 'Balon') {
			mysql_query("UPDATE $house SET `HC4`=0 WHERE `name` = 'Greyjoy'");
			$result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Greyjoy'");
			$acards = mysql_fetch_assoc($result);
			if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
				mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC7`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Greyjoy'");
			};
		} else
		if ($hero == 'Asha') {
			mysql_query("UPDATE $house SET `HC5`=0 WHERE `name` = 'Greyjoy'");
			$result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Greyjoy'");
			$acards = mysql_fetch_assoc($result);
			if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
				mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC7`=1, `HC6`=1,  WHERE `name` = 'Greyjoy'");
			};
		} else
		if ($hero == 'Dagmar') {
			mysql_query("UPDATE $house SET `HC6`=0 WHERE `name` = 'Greyjoy'");
			$result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Greyjoy'");
			$acards = mysql_fetch_assoc($result);
			if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
				mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC7`=1,  WHERE `name` = 'Greyjoy'");
			};
		} else
		if ($hero == 'Aeron') {
			mysql_query("UPDATE $house SET `HC7`=0 WHERE `name` = 'Greyjoy'");
			$result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Greyjoy'");
			$acards = mysql_fetch_assoc($result);
			if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
				mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Greyjoy'");
			};
		};
	} else if ($row['defender'] == 'Lannister') {
		if ($hero == 'Tywin') {
			mysql_query("UPDATE $house SET `HC1`=0 WHERE `name` = 'Lannister'");
			$result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Lannister'");
			$acards = mysql_fetch_assoc($result);
			if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
				mysql_query("UPDATE $house SET `HC7`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Lannister'");
			};
		} else
		if ($hero == 'Clegan') {
			mysql_query("UPDATE $house SET `HC2`=0 WHERE `name` = 'Lannister'");
			$result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Lannister'");
			$acards = mysql_fetch_assoc($result);
			if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
				mysql_query("UPDATE $house SET `HC1`=1, `HC7`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Lannister'");
			};
		} else
		if ($hero == 'Hound') {
			mysql_query("UPDATE $house SET `HC3`=0 WHERE `name` = 'Lannister'");
			$result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Lannister'");
			$acards = mysql_fetch_assoc($result);
			if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
				mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC7`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Lannister'");
			};
		} else
		if ($hero == 'Jaime') {
			mysql_query("UPDATE $house SET `HC4`=0 WHERE `name` = 'Lannister'");
			$result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Lannister'");
			$acards = mysql_fetch_assoc($result);
			if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
				mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC7`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Lannister'");
			};
		} else
		if ($hero == 'Tyrion') {
			mysql_query("UPDATE $house SET `HC5`=0 WHERE `name` = 'Lannister'");
			$result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Lannister'");
			$acards = mysql_fetch_assoc($result);
			if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
				mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC7`=1, `HC6`=1,  WHERE `name` = 'Lannister'");
			};
		} else
		if ($hero == 'Kevan') {
			mysql_query("UPDATE $house SET `HC6`=0 WHERE `name` = 'Lannister'");
			$result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Lannister'");
			$acards = mysql_fetch_assoc($result);
			if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
				mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC7`=1,  WHERE `name` = 'Lannister'");
			};
		} else
		if ($hero == 'Cersei') {
			mysql_query("UPDATE $house SET `HC7`=0 WHERE `name` = 'Lannister'");
			$result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Lannister'");
			$acards = mysql_fetch_assoc($result);
			if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
				mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Lannister'");
			};
		};
	} else if ($row['defender'] == 'Tyrell') {
		if ($hero == 'Mace') {
			mysql_query("UPDATE $house SET `HC1`=0 WHERE `name` = 'Tyrell'");
			$result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Tyrell'");
			$acards = mysql_fetch_assoc($result);
			if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
				mysql_query("UPDATE $house SET `HC7`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Tyrell'");
			};
		} else
		if ($hero == 'Loras') {
			mysql_query("UPDATE $house SET `HC2`=0 WHERE `name` = 'Tyrell'");
			$result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Tyrell'");
			$acards = mysql_fetch_assoc($result);
			if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
				mysql_query("UPDATE $house SET `HC1`=1, `HC7`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Tyrell'");
			};
		} else
		if ($hero == 'Garlan') {
			mysql_query("UPDATE $house SET `HC3`=0 WHERE `name` = 'Tyrell'");
			$result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Tyrell'");
			$acards = mysql_fetch_assoc($result);
			if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
				mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC7`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Tyrell'");
			};
		} else
		if ($hero == 'Randyll') {
			mysql_query("UPDATE $house SET `HC4`=0 WHERE `name` = 'Tyrell'");
			$result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Tyrell'");
			$acards = mysql_fetch_assoc($result);
			if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
				mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC7`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Tyrell'");
			};
		} else
		if ($hero == 'Alester') {
			mysql_query("UPDATE $house SET `HC5`=0 WHERE `name` = 'Tyrell'");
			$result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Tyrell'");
			$acards = mysql_fetch_assoc($result);
			if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
				mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC7`=1, `HC6`=1,  WHERE `name` = 'Tyrell'");
			};
		} else
		if ($hero == 'Margeary') {
			mysql_query("UPDATE $house SET `HC6`=0 WHERE `name` = 'Tyrell'");
			$result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Tyrell'");
			$acards = mysql_fetch_assoc($result);
			if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
				mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC7`=1,  WHERE `name` = 'Tyrell'");
			};
		} else
		if ($hero == 'Queen') {
			mysql_query("UPDATE $house SET `HC7`=0 WHERE `name` = 'Tyrell'");
			$result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Tyrell'");
			$acards = mysql_fetch_assoc($result);
			if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
				mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Tyrell'");
			};
		};
	}  else if ($row['defender'] == 'Martell') {
		if ($hero == 'Viper') {
			mysql_query("UPDATE $house SET `HC1`=0 WHERE `name` = 'Martell'");
			$result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Martell'");
			$acards = mysql_fetch_assoc($result);
			if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
				mysql_query("UPDATE $house SET `HC7`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Martell'");
			};
		} else
		if ($hero == 'Hotah') {
			mysql_query("UPDATE $house SET `HC2`=0 WHERE `name` = 'Martell'");
			$result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Martell'");
			$acards = mysql_fetch_assoc($result);
			if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
				mysql_query("UPDATE $house SET `HC1`=1, `HC7`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Martell'");
			};
		} else
		if ($hero == 'Obara') {
			mysql_query("UPDATE $house SET `HC3`=0 WHERE `name` = 'Martell'");
			$result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Martell'");
			$acards = mysql_fetch_assoc($result);
			if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
				mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC7`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Martell'");
			};
		} else
		if ($hero == 'Darkstar') {
			mysql_query("UPDATE $house SET `HC4`=0 WHERE `name` = 'Martell'");
			$result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Martell'");
			$acards = mysql_fetch_assoc($result);
			if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
				mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC7`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Martell'");
			};
		} else
		if ($hero == 'Nymeria') {
			mysql_query("UPDATE $house SET `HC5`=0 WHERE `name` = 'Martell'");
			$result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Martell'");
			$acards = mysql_fetch_assoc($result);
			if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
				mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC7`=1, `HC6`=1,  WHERE `name` = 'Martell'");
			};
		} else
		if ($hero == 'Arianne') {
			mysql_query("UPDATE $house SET `HC6`=0 WHERE `name` = 'Martell'");
			$result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Martell'");
			$acards = mysql_fetch_assoc($result);
			if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
				mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC7`=1,  WHERE `name` = 'Martell'");
			};
		} else
		if ($hero == 'Doran') {
			mysql_query("UPDATE $house SET `HC7`=0 WHERE `name` = 'Martell'");
			$result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Martell'");
			$acards = mysql_fetch_assoc($result);
			if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
				mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Martell'");
			};
		};
	}
} else
//if Patchface defender
if ($row['dcard'] == 'Patchface') {
	//make current card not available for choose
	if ($row['attacker'] == 'Stark') {
		if ($hero == 'Eddard') {
			mysql_query("UPDATE $house SET `HC1`=0 WHERE `name` = 'Stark'");
			$result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Stark'");
			$acards = mysql_fetch_assoc($result);
			if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
				mysql_query("UPDATE $house SET `HC7`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Stark'");
			};
		} else
		if ($hero == 'Robb') {
			mysql_query("UPDATE $house SET `HC2`=0 WHERE `name` = 'Stark'");
			$result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Stark'");
			$acards = mysql_fetch_assoc($result);
			if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
				mysql_query("UPDATE $house SET `HC1`=1, `HC7`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Stark'");
			};
		} else
		if ($hero == 'Bolton') {
			mysql_query("UPDATE $house SET `HC3`=0 WHERE `name` = 'Stark'");
			$result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Stark'");
			$acards = mysql_fetch_assoc($result);
			if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
				mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC7`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Stark'");
			};
		} else
		if ($hero == 'Umber') {
			mysql_query("UPDATE $house SET `HC4`=0 WHERE `name` = 'Stark'");
			$result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Stark'");
			$acards = mysql_fetch_assoc($result);
			if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
				mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC7`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Stark'");
			};
		} else
		if ($hero == 'Cassel') {
			mysql_query("UPDATE $house SET `HC5`=0 WHERE `name` = 'Stark'");
			$result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Stark'");
			$acards = mysql_fetch_assoc($result);
			if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
				mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC7`=1, `HC6`=1,  WHERE `name` = 'Stark'");
			};
		} else
		if ($hero == 'Blackfish') {
			mysql_query("UPDATE $house SET `HC6`=0 WHERE `name` = 'Stark'");
			$result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Stark'");
			$acards = mysql_fetch_assoc($result);
			if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
				mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC7`=1,  WHERE `name` = 'Stark'");
			};
		} else
		if ($hero == 'Catelyn') {
			mysql_query("UPDATE $house SET `HC7`=0 WHERE `name` = 'Stark'");
			$result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Stark'");
			$acards = mysql_fetch_assoc($result);
			if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
				mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Stark'");
			};
		};
	} else if ($row['attacker'] == 'Greyjoy') {
		if ($hero == 'Euron') {
			mysql_query("UPDATE $house SET `HC1`=0 WHERE `name` = 'Greyjoy'");
			$result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Greyjoy'");
			$acards = mysql_fetch_assoc($result);
			if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
				mysql_query("UPDATE $house SET `HC7`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Greyjoy'");
			};
		} else
		if ($hero == 'Victarion') {
			mysql_query("UPDATE $house SET `HC2`=0 WHERE `name` = 'Greyjoy'");
			$result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Greyjoy'");
			$acards = mysql_fetch_assoc($result);
			if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
				mysql_query("UPDATE $house SET `HC1`=1, `HC7`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Greyjoy'");
			};
		} else
		if ($hero == 'Theon') {
			mysql_query("UPDATE $house SET `HC3`=0 WHERE `name` = 'Greyjoy'");
			$result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Greyjoy'");
			$acards = mysql_fetch_assoc($result);
			if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
				mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC7`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Greyjoy'");
			};
		} else
		if ($hero == 'Balon') {
			mysql_query("UPDATE $house SET `HC4`=0 WHERE `name` = 'Greyjoy'");
			$result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Greyjoy'");
			$acards = mysql_fetch_assoc($result);
			if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
				mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC7`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Greyjoy'");
			};
		} else
		if ($hero == 'Asha') {
			mysql_query("UPDATE $house SET `HC5`=0 WHERE `name` = 'Greyjoy'");
			$result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Greyjoy'");
			$acards = mysql_fetch_assoc($result);
			if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
				mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC7`=1, `HC6`=1,  WHERE `name` = 'Greyjoy'");
			};
		} else
		if ($hero == 'Dagmar') {
			mysql_query("UPDATE $house SET `HC6`=0 WHERE `name` = 'Greyjoy'");
			$result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Greyjoy'");
			$acards = mysql_fetch_assoc($result);
			if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
				mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC7`=1,  WHERE `name` = 'Greyjoy'");
			};
		} else
		if ($hero == 'Aeron') {
			mysql_query("UPDATE $house SET `HC7`=0 WHERE `name` = 'Greyjoy'");
			$result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Greyjoy'");
			$acards = mysql_fetch_assoc($result);
			if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
				mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Greyjoy'");
			};
		};
	} else if ($row['attacker'] == 'Lannister') {
		if ($hero == 'Tywin') {
			mysql_query("UPDATE $house SET `HC1`=0 WHERE `name` = 'Lannister'");
			$result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Lannister'");
			$acards = mysql_fetch_assoc($result);
			if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
				mysql_query("UPDATE $house SET `HC7`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Lannister'");
			};
		} else
		if ($hero == 'Clegan') {
			mysql_query("UPDATE $house SET `HC2`=0 WHERE `name` = 'Lannister'");
			$result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Lannister'");
			$acards = mysql_fetch_assoc($result);
			if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
				mysql_query("UPDATE $house SET `HC1`=1, `HC7`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Lannister'");
			};
		} else
		if ($hero == 'Hound') {
			mysql_query("UPDATE $house SET `HC3`=0 WHERE `name` = 'Lannister'");
			$result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Lannister'");
			$acards = mysql_fetch_assoc($result);
			if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
				mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC7`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Lannister'");
			};
		} else
		if ($hero == 'Jaime') {
			mysql_query("UPDATE $house SET `HC4`=0 WHERE `name` = 'Lannister'");
			$result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Lannister'");
			$acards = mysql_fetch_assoc($result);
			if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
				mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC7`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Lannister'");
			};
		} else
		if ($hero == 'Tyrion') {
			mysql_query("UPDATE $house SET `HC5`=0 WHERE `name` = 'Lannister'");
			$result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Lannister'");
			$acards = mysql_fetch_assoc($result);
			if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
				mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC7`=1, `HC6`=1,  WHERE `name` = 'Lannister'");
			};
		} else
		if ($hero == 'Kevan') {
			mysql_query("UPDATE $house SET `HC6`=0 WHERE `name` = 'Lannister'");
			$result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Lannister'");
			$acards = mysql_fetch_assoc($result);
			if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
				mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC7`=1,  WHERE `name` = 'Lannister'");
			};
		} else
		if ($hero == 'Cersei') {
			mysql_query("UPDATE $house SET `HC7`=0 WHERE `name` = 'Lannister'");
			$result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Lannister'");
			$acards = mysql_fetch_assoc($result);
			if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
				mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Lannister'");
			};
		};
	} else if ($row['attacker'] == 'Tyrell') {
		if ($hero == 'Mace') {
			mysql_query("UPDATE $house SET `HC1`=0 WHERE `name` = 'Tyrell'");
			$result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Tyrell'");
			$acards = mysql_fetch_assoc($result);
			if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
				mysql_query("UPDATE $house SET `HC7`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Tyrell'");
			};
		} else
		if ($hero == 'Loras') {
			mysql_query("UPDATE $house SET `HC2`=0 WHERE `name` = 'Tyrell'");
			$result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Tyrell'");
			$acards = mysql_fetch_assoc($result);
			if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
				mysql_query("UPDATE $house SET `HC1`=1, `HC7`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Tyrell'");
			};
		} else
		if ($hero == 'Garlan') {
			mysql_query("UPDATE $house SET `HC3`=0 WHERE `name` = 'Tyrell'");
			$result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Tyrell'");
			$acards = mysql_fetch_assoc($result);
			if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
				mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC7`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Tyrell'");
			};
		} else
		if ($hero == 'Randyll') {
			mysql_query("UPDATE $house SET `HC4`=0 WHERE `name` = 'Tyrell'");
			$result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Tyrell'");
			$acards = mysql_fetch_assoc($result);
			if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
				mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC7`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Tyrell'");
			};
		} else
		if ($hero == 'Alester') {
			mysql_query("UPDATE $house SET `HC5`=0 WHERE `name` = 'Tyrell'");
			$result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Tyrell'");
			$acards = mysql_fetch_assoc($result);
			if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
				mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC7`=1, `HC6`=1,  WHERE `name` = 'Tyrell'");
			};
		} else
		if ($hero == 'Margeary') {
			mysql_query("UPDATE $house SET `HC6`=0 WHERE `name` = 'Tyrell'");
			$result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Tyrell'");
			$acards = mysql_fetch_assoc($result);
			if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
				mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC7`=1,  WHERE `name` = 'Tyrell'");
			};
		} else
		if ($hero == 'Queen') {
			mysql_query("UPDATE $house SET `HC7`=0 WHERE `name` = 'Tyrell'");
			$result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Tyrell'");
			$acards = mysql_fetch_assoc($result);
			if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
				mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Tyrell'");
			};
		};
	}  else if ($row['attacker'] == 'Martell') {
		if ($hero == 'Viper') {
			mysql_query("UPDATE $house SET `HC1`=0 WHERE `name` = 'Martell'");
			$result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Martell'");
			$acards = mysql_fetch_assoc($result);
			if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
				mysql_query("UPDATE $house SET `HC7`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Martell'");
			};
		} else
		if ($hero == 'Hotah') {
			mysql_query("UPDATE $house SET `HC2`=0 WHERE `name` = 'Martell'");
			$result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Martell'");
			$acards = mysql_fetch_assoc($result);
			if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
				mysql_query("UPDATE $house SET `HC1`=1, `HC7`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Martell'");
			};
		} else
		if ($hero == 'Obara') {
			mysql_query("UPDATE $house SET `HC3`=0 WHERE `name` = 'Martell'");
			$result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Martell'");
			$acards = mysql_fetch_assoc($result);
			if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
				mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC7`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Martell'");
			};
		} else
		if ($hero == 'Darkstar') {
			mysql_query("UPDATE $house SET `HC4`=0 WHERE `name` = 'Martell'");
			$result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Martell'");
			$acards = mysql_fetch_assoc($result);
			if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
				mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC7`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Martell'");
			};
		} else
		if ($hero == 'Nymeria') {
			mysql_query("UPDATE $house SET `HC5`=0 WHERE `name` = 'Martell'");
			$result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Martell'");
			$acards = mysql_fetch_assoc($result);
			if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
				mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC7`=1, `HC6`=1,  WHERE `name` = 'Martell'");
			};
		} else
		if ($hero == 'Arianne') {
			mysql_query("UPDATE $house SET `HC6`=0 WHERE `name` = 'Martell'");
			$result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Martell'");
			$acards = mysql_fetch_assoc($result);
			if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
				mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC7`=1,  WHERE `name` = 'Martell'");
			};
		} else
		if ($hero == 'Doran') {
			mysql_query("UPDATE $house SET `HC7`=0 WHERE `name` = 'Martell'");
			$result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Martell'");
			$acards = mysql_fetch_assoc($result);
			if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
				mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Martell'");
			};
		};
	}
}


//control port
$port = $row['target']."Port";
$result = mysql_query("SELECT unit1, control FROM $terr WHERE `name` = '$port'");
if (mysql_num_rows($result) != '0') {
    $portunit = mysql_fetch_assoc($result);

    $result = mysql_query("SELECT control FROM $terr WHERE `name` = '".$row['target']."'");
    $targetcontrol = mysql_fetch_assoc($result);

    if ($portunit['control'] != $targetcontrol['control']) {
        if ($portunit['unit1'] != '0') {
            if ($targetcontrol['control'] == 'B') {
                $controlport = 'Baratheon';
            } else if ($targetcontrol['control'] == 'S') {
                $controlport = 'Stark';
            } else if ($targetcontrol['control'] == 'G') {
                $controlport = 'Greyjoy';
            } else if ($targetcontrol['control'] == 'T') {
                $controlport = 'Tyrell';
            } else if ($targetcontrol['control'] == 'L') {
                $controlport = 'Lannister';
            } else if ($targetcontrol['control'] == 'M') {
                $controlport = 'Martell';
            };

            mysql_query("UPDATE `battle` SET currentplayer = '".$controlport."', 1ready = 1 WHERE `id` = $game_id");
        } else {
            mysql_query("UPDATE $terr SET `control`='".$targetcontrol['control']."' WHERE `name` = '$port'");
            //prepare next phase
            mysql_query("UPDATE `game` SET faza=6 WHERE `id` = $game_id");
            $_GET['table'] = $terr;
            include 'march_next.php';
        };
    } else {
        //prepare next phase
        mysql_query("UPDATE `game` SET faza=6 WHERE `id` = $game_id");
        $_GET['table'] = $terr;
        include 'march_next.php';
    };

} else {//no port
    //prepare next phase
    mysql_query("UPDATE `game` SET faza=6 WHERE `id` = $game_id");
    $_GET['table'] = $terr;
    include 'march_next.php';
};

?>