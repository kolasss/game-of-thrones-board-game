<? include 'database.php';
$game_id = $_GET['id'];
$game_id = mysql_real_escape_string($game_id);
$house = $_GET['house'];
$house = mysql_real_escape_string($house);

//получение данных игры
$result = mysql_query("SELECT acard, dcard, attacker, defender FROM battle where id=$game_id");
$row = mysql_fetch_assoc($result);

//if Tyrion attacker
if ($row['acard'] == 'Tyrion') {
	//make current card not available for choose
	if ($row['defender'] == 'Stark') {
		if ($row['dcard'] == 'Eddard') {
			mysql_query("UPDATE $house SET `HC1`=2 WHERE `name` = 'Stark'");
		} else
		if ($row['dcard'] == 'Robb') {
			mysql_query("UPDATE $house SET `HC2`=2 WHERE `name` = 'Stark'");
		} else
		if ($row['dcard'] == 'Bolton') {
			mysql_query("UPDATE $house SET `HC3`=2 WHERE `name` = 'Stark'");
		} else
		if ($row['dcard'] == 'Umber') {
			mysql_query("UPDATE $house SET `HC4`=2 WHERE `name` = 'Stark'");
		} else
		if ($row['dcard'] == 'Cassel') {
			mysql_query("UPDATE $house SET `HC5`=2 WHERE `name` = 'Stark'");
		} else
		if ($row['dcard'] == 'Blackfish') {
			mysql_query("UPDATE $house SET `HC6`=2 WHERE `name` = 'Stark'");
		} else
		if ($row['dcard'] == 'Catelyn') {
			mysql_query("UPDATE $house SET `HC7`=2 WHERE `name` = 'Stark'");
		};
	} else if ($row['defender'] == 'Greyjoy') {
		if ($row['dcard'] == 'Euron') {
			mysql_query("UPDATE $house SET `HC1`=2 WHERE `name` = 'Greyjoy'");
		} else
		if ($row['dcard'] == 'Victarion') {
			mysql_query("UPDATE $house SET `HC2`=2 WHERE `name` = 'Greyjoy'");
		} else
		if ($row['dcard'] == 'Theon') {
			mysql_query("UPDATE $house SET `HC3`=2 WHERE `name` = 'Greyjoy'");
		} else
		if ($row['dcard'] == 'Balon') {
			mysql_query("UPDATE $house SET `HC4`=2 WHERE `name` = 'Greyjoy'");
		} else
		if ($row['dcard'] == 'Asha') {
			mysql_query("UPDATE $house SET `HC5`=2 WHERE `name` = 'Greyjoy'");
		} else
		if ($row['dcard'] == 'Dagmar') {
			mysql_query("UPDATE $house SET `HC6`=2 WHERE `name` = 'Greyjoy'");
		} else
		if ($row['dcard'] == 'Aeron') {
			mysql_query("UPDATE $house SET `HC7`=2 WHERE `name` = 'Greyjoy'");
		};
	} else if ($row['defender'] == 'Baratheon') {
		if ($row['dcard'] == 'Stannis') {
			mysql_query("UPDATE $house SET `HC1`=2 WHERE `name` = 'Baratheon'");
		} else
		if ($row['dcard'] == 'Renly') {
			mysql_query("UPDATE $house SET `HC2`=2 WHERE `name` = 'Baratheon'");
		} else
		if ($row['dcard'] == 'Davos') {
			mysql_query("UPDATE $house SET `HC3`=2 WHERE `name` = 'Baratheon'");
		} else
		if ($row['dcard'] == 'Brienne') {
			mysql_query("UPDATE $house SET `HC4`=2 WHERE `name` = 'Baratheon'");
		} else
		if ($row['dcard'] == 'Melissandre') {
			mysql_query("UPDATE $house SET `HC5`=2 WHERE `name` = 'Baratheon'");
		} else
		if ($row['dcard'] == 'Salladhor') {
			mysql_query("UPDATE $house SET `HC6`=2 WHERE `name` = 'Baratheon'");
		} else
		if ($row['dcard'] == 'Patchface') {
			mysql_query("UPDATE $house SET `HC7`=2 WHERE `name` = 'Baratheon'");
		};
	} else if ($row['defender'] == 'Tyrell') {
		if ($row['dcard'] == 'Mace') {
			mysql_query("UPDATE $house SET `HC1`=2 WHERE `name` = 'Tyrell'");
		} else
		if ($row['dcard'] == 'Loras') {
			mysql_query("UPDATE $house SET `HC2`=2 WHERE `name` = 'Tyrell'");
		} else
		if ($row['dcard'] == 'Garlan') {
			mysql_query("UPDATE $house SET `HC3`=2 WHERE `name` = 'Tyrell'");
		} else
		if ($row['dcard'] == 'Randyll') {
			mysql_query("UPDATE $house SET `HC4`=2 WHERE `name` = 'Tyrell'");
		} else
		if ($row['dcard'] == 'Alester') {
			mysql_query("UPDATE $house SET `HC5`=2 WHERE `name` = 'Tyrell'");
		} else
		if ($row['dcard'] == 'Margeary') {
			mysql_query("UPDATE $house SET `HC6`=2 WHERE `name` = 'Tyrell'");
		} else
		if ($row['dcard'] == 'Queen') {
			mysql_query("UPDATE $house SET `HC7`=2 WHERE `name` = 'Tyrell'");
		};
	}  else if ($row['defender'] == 'Martell') {
		if ($row['dcard'] == 'Viper') {
			mysql_query("UPDATE $house SET `HC1`=2 WHERE `name` = 'Martell'");
		} else
		if ($row['dcard'] == 'Hotah') {
			mysql_query("UPDATE $house SET `HC2`=2 WHERE `name` = 'Martell'");
		} else
		if ($row['dcard'] == 'Obara') {
			mysql_query("UPDATE $house SET `HC3`=2 WHERE `name` = 'Martell'");
		} else
		if ($row['dcard'] == 'Darkstar') {
			mysql_query("UPDATE $house SET `HC4`=2 WHERE `name` = 'Martell'");
		} else
		if ($row['dcard'] == 'Nymeria') {
			mysql_query("UPDATE $house SET `HC5`=2 WHERE `name` = 'Martell'");
		} else
		if ($row['dcard'] == 'Arianne') {
			mysql_query("UPDATE $house SET `HC6`=2 WHERE `name` = 'Martell'");
		} else
		if ($row['dcard'] == 'Doran') {
			mysql_query("UPDATE $house SET `HC7`=2 WHERE `name` = 'Martell'");
		};
	}
	//nullify curent card
	mysql_query("UPDATE `battle` SET `dcard`=0, `1ready`=1ready+1, currentplayer = '".$row['defender']."' WHERE `id` = '$game_id'");
} else

//if Tyrion defender
if ($row['dcard'] == 'Tyrion') {
	//make current card not available for choose
	if ($row['attacker'] == 'Stark') {
		if ($row['acard'] == 'Eddard') {
			mysql_query("UPDATE $house SET `HC1`=2 WHERE `name` = 'Stark'");
		} else
		if ($row['acard'] == 'Robb') {
			mysql_query("UPDATE $house SET `HC2`=2 WHERE `name` = 'Stark'");
		} else
		if ($row['acard'] == 'Bolton') {
			mysql_query("UPDATE $house SET `HC3`=2 WHERE `name` = 'Stark'");
		} else
		if ($row['acard'] == 'Umber') {
			mysql_query("UPDATE $house SET `HC4`=2 WHERE `name` = 'Stark'");
		} else
		if ($row['acard'] == 'Cassel') {
			mysql_query("UPDATE $house SET `HC5`=2 WHERE `name` = 'Stark'");
		} else
		if ($row['acard'] == 'Blackfish') {
			mysql_query("UPDATE $house SET `HC6`=2 WHERE `name` = 'Stark'");
		} else
		if ($row['acard'] == 'Catelyn') {
			mysql_query("UPDATE $house SET `HC7`=2 WHERE `name` = 'Stark'");
		};
	} else if ($row['attacker'] == 'Greyjoy') {
		if ($row['acard'] == 'Euron') {
			mysql_query("UPDATE $house SET `HC1`=2 WHERE `name` = 'Greyjoy'");
		} else
		if ($row['acard'] == 'Victarion') {
			mysql_query("UPDATE $house SET `HC2`=2 WHERE `name` = 'Greyjoy'");
		} else
		if ($row['acard'] == 'Theon') {
			mysql_query("UPDATE $house SET `HC3`=2 WHERE `name` = 'Greyjoy'");
		} else
		if ($row['acard'] == 'Balon') {
			mysql_query("UPDATE $house SET `HC4`=2 WHERE `name` = 'Greyjoy'");
		} else
		if ($row['acard'] == 'Asha') {
			mysql_query("UPDATE $house SET `HC5`=2 WHERE `name` = 'Greyjoy'");
		} else
		if ($row['acard'] == 'Dagmar') {
			mysql_query("UPDATE $house SET `HC6`=2 WHERE `name` = 'Greyjoy'");
		} else
		if ($row['acard'] == 'Aeron') {
			mysql_query("UPDATE $house SET `HC7`=2 WHERE `name` = 'Greyjoy'");
		};
	} else if ($row['attacker'] == 'Baratheon') {
		if ($row['acard'] == 'Stannis') {
			mysql_query("UPDATE $house SET `HC1`=2 WHERE `name` = 'Baratheon'");
		} else
		if ($row['acard'] == 'Renly') {
			mysql_query("UPDATE $house SET `HC2`=2 WHERE `name` = 'Baratheon'");
		} else
		if ($row['acard'] == 'Davos') {
			mysql_query("UPDATE $house SET `HC3`=2 WHERE `name` = 'Baratheon'");
		} else
		if ($row['acard'] == 'Brienne') {
			mysql_query("UPDATE $house SET `HC4`=2 WHERE `name` = 'Baratheon'");
		} else
		if ($row['acard'] == 'Melissandre') {
			mysql_query("UPDATE $house SET `HC5`=2 WHERE `name` = 'Baratheon'");
		} else
		if ($row['acard'] == 'Salladhor') {
			mysql_query("UPDATE $house SET `HC6`=2 WHERE `name` = 'Baratheon'");
		} else
		if ($row['acard'] == 'Patchface') {
			mysql_query("UPDATE $house SET `HC7`=2 WHERE `name` = 'Baratheon'");
		};
	} else if ($row['attacker'] == 'Tyrell') {
		if ($row['acard'] == 'Mace') {
			mysql_query("UPDATE $house SET `HC1`=2 WHERE `name` = 'Tyrell'");
		} else
		if ($row['acard'] == 'Loras') {
			mysql_query("UPDATE $house SET `HC2`=2 WHERE `name` = 'Tyrell'");
		} else
		if ($row['acard'] == 'Garlan') {
			mysql_query("UPDATE $house SET `HC3`=2 WHERE `name` = 'Tyrell'");
		} else
		if ($row['acard'] == 'Randyll') {
			mysql_query("UPDATE $house SET `HC4`=2 WHERE `name` = 'Tyrell'");
		} else
		if ($row['acard'] == 'Alester') {
			mysql_query("UPDATE $house SET `HC5`=2 WHERE `name` = 'Tyrell'");
		} else
		if ($row['acard'] == 'Margeary') {
			mysql_query("UPDATE $house SET `HC6`=2 WHERE `name` = 'Tyrell'");
		} else
		if ($row['acard'] == 'Queen') {
			mysql_query("UPDATE $house SET `HC7`=2 WHERE `name` = 'Tyrell'");
		};
	}  else if ($row['attacker'] == 'Martell') {
		if ($row['acard'] == 'Viper') {
			mysql_query("UPDATE $house SET `HC1`=2 WHERE `name` = 'Martell'");
		} else
		if ($row['acard'] == 'Hotah') {
			mysql_query("UPDATE $house SET `HC2`=2 WHERE `name` = 'Martell'");
		} else
		if ($row['acard'] == 'Obara') {
			mysql_query("UPDATE $house SET `HC3`=2 WHERE `name` = 'Martell'");
		} else
		if ($row['acard'] == 'Darkstar') {
			mysql_query("UPDATE $house SET `HC4`=2 WHERE `name` = 'Martell'");
		} else
		if ($row['acard'] == 'Nymeria') {
			mysql_query("UPDATE $house SET `HC5`=2 WHERE `name` = 'Martell'");
		} else
		if ($row['acard'] == 'Arianne') {
			mysql_query("UPDATE $house SET `HC6`=2 WHERE `name` = 'Martell'");
		} else
		if ($row['acard'] == 'Doran') {
			mysql_query("UPDATE $house SET `HC7`=2 WHERE `name` = 'Martell'");
		};
	}
	//nullify curent card
	mysql_query("UPDATE `battle` SET `acard`=0, `1ready`=1ready+1, currentplayer = '".$row['attacker']."' WHERE `id` = '$game_id'");
}

?>