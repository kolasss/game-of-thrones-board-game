<? include 'database.php';

//remove orders
mysql_query("UPDATE $terr SET prikaz = 0");

//units not routed
$result = mysql_query("SELECT name, unit1, unit2, unit3, unit4 FROM $terr");		  

while ($array = mysql_fetch_assoc($result))
{
	for ($i=1; $i<5; $i++) {
		if ($array['unit'.$i] == 'F0') {
			mysql_query("UPDATE $terr SET unit".$i." = 'F1' WHERE name = '".$array['name']."'");
		} else if ($array['unit'.$i] == 'K0') {
			mysql_query("UPDATE $terr SET unit".$i." = 'K1' WHERE name = '".$array['name']."'");
		} else if ($array['unit'.$i] == 'S0') {
			mysql_query("UPDATE $terr SET unit".$i." = 'S1' WHERE name = '".$array['name']."'");
		};
	};
};

//next turn
$result = mysql_query("SELECT turn FROM game WHERE id = $game_id");
$turn = mysql_fetch_assoc($result);

if ($turn['turn'] < 9) {
	mysql_query("UPDATE game SET turn=turn+1, Blade = 0, faza = 0, currentplayer = 0 WHERE id = $game_id");
	
	//plus Wildling Power
	$result = mysql_query("SELECT WC1_".($turn['turn']+1).", WC2_".($turn['turn']+1).", WC3_".($turn['turn']+1)." FROM game WHERE id = $game_id");
	$WC = mysql_fetch_assoc($result);
	if ($WC["WC1_".($turn['turn']+1)] == '0' || $WC["WC1_".($turn['turn']+1)] == '3') {
		mysql_query("UPDATE game SET WildPower=WildPower+1 WHERE id = $game_id");
	};
	if ($WC["WC2_".($turn['turn']+1)] == '1' || $WC["WC2_".($turn['turn']+1)] == '3') {
		mysql_query("UPDATE game SET WildPower=WildPower+1 WHERE id = $game_id");
	};
	if ($WC["WC3_".($turn['turn']+1)] == '0' || $WC["WC3_".($turn['turn']+1)] == '2' || $WC["WC3_".($turn['turn']+1)] == '3' || $WC["WC3_".($turn['turn']+1)] == '4' || $WC["WC3_".($turn['turn']+1)] == '5') {
		mysql_query("UPDATE game SET WildPower=WildPower+1 WHERE id = $game_id");
	};
	
	$result = mysql_query("SELECT WildPower FROM game WHERE id = $game_id");
	$WP = mysql_fetch_assoc($result);
	
	//Wildling Attack
	if ($WP['WildPower'] > 6) {
		mysql_query("UPDATE game SET WildPower=6 WHERE id = $game_id");
	} else if ($WP['WildPower'] < 6) {
		//Westeros Card #1
		if ($WC["WC1_".($turn['turn']+1)] == '0') {//Last days of Summer
			mysql_query("UPDATE game SET faza=1 WHERE id = $game_id");
			//Westeros Card #2
			if ($WC["WC2_".($turn['turn']+1)] == '3') {//Last days of Summer
				mysql_query("UPDATE game SET faza=2 WHERE id = $game_id");
				//Westeros Card #3
				if ($WC["WC3_".($turn['turn']+1)] == '0' || $WC["WC3_".($turn['turn']+1)] == '2' || $WC["WC3_".($turn['turn']+1)] == '3' || $WC["WC3_".($turn['turn']+1)] == '4' || $WC["WC3_".($turn['turn']+1)] == '5') {//Orders cannot be played
					mysql_query("UPDATE game SET faza=3 WHERE id = $game_id");
				};
			} else if ($WC["WC2_".($turn['turn']+1)] == '2') {//Game of Thrones
                $result = mysql_query("SELECT house FROM game WHERE id = $game_id");
                $house = mysql_fetch_assoc($result);

                $Stok = 0;
                $Btok = 0;
                $Gtok = 0;
                $Ltok = 0;
                $Mtok = 0;
                $Ttok = 0;

                $result = mysql_query("SELECT control, power FROM $terr");

                while ($array = mysql_fetch_assoc($result))
                {
                    if ($array['control'] == 'S') {
                        $Stok += $array['power'];
                    } else if ($array['control'] == 'B') {
                        $Btok += $array['power'];
                    } else if ($array['control'] == 'G') {
                        $Gtok += $array['power'];
                    } else if ($array['control'] == 'L') {
                        $Ltok += $array['power'];
                    } else if ($array['control'] == 'T') {
                        $Ttok += $array['power'];
                    } else if ($array['control'] == 'M') {
                        $Mtok += $array['power'];
                    };
                };

                $result = mysql_query("SELECT name, tokih, tokob FROM ".$house['house']);
                while ($array = mysql_fetch_assoc($result))
                {
                    $tokens[$array['name']] = $array;
                };

                while (($tokens['Stark']['tokih'] + $tokens['Stark']['tokob'] + $Stok) > 20) {
                    $Stok--;
                }
                mysql_query("UPDATE ".$house['house']." SET tokih = tokih+$Stok WHERE name = 'Stark'");
                while (($tokens['Baratheon']['tokih'] + $tokens['Baratheon']['tokob'] + $Btok) > 20) {
                    $Btok--;
                }
                mysql_query("UPDATE ".$house['house']." SET tokih = tokih+$Btok WHERE name = 'Baratheon'");
                while (($tokens['Greyjoy']['tokih'] + $tokens['Greyjoy']['tokob'] + $Gtok) > 20) {
                    $Gtok--;
                }
                mysql_query("UPDATE ".$house['house']." SET tokih = tokih+$Gtok WHERE name = 'Greyjoy'");
                while (($tokens['Lannister']['tokih'] + $tokens['Lannister']['tokob'] + $Ltok) > 20) {
                    $Ltok--;
                }
                mysql_query("UPDATE ".$house['house']." SET tokih = tokih+$Ltok WHERE name = 'Lannister'");
                while (($tokens['Martell']['tokih'] + $tokens['Martell']['tokob'] + $Mtok) > 20) {
                    $Mtok--;
                }
                mysql_query("UPDATE ".$house['house']." SET tokih = tokih+$Mtok WHERE name = 'Martell'");
                while (($tokens['Tyrell']['tokih'] + $tokens['Tyrell']['tokob'] + $Ttok) > 20) {
                    $Ttok--;
                }
                mysql_query("UPDATE ".$house['house']." SET tokih = tokih+$Ttok WHERE name = 'Tyrell'");

                mysql_query("UPDATE game SET faza=2 WHERE id = $game_id");
                //Westeros Card #3
                if ($WC["WC3_".($turn['turn']+1)] == '0' || $WC["WC3_".($turn['turn']+1)] == '2' || $WC["WC3_".($turn['turn']+1)] == '3' || $WC["WC3_".($turn['turn']+1)] == '4' || $WC["WC3_".($turn['turn']+1)] == '5') {//Passive Orders cannot be played
                    mysql_query("UPDATE game SET faza=3 WHERE id = $game_id");
                };
            } else if ($WC["WC2_".($turn['turn']+1)] == '0') {//Clash of Kings
                mysql_query("UPDATE `battle` SET 1ready='0' WHERE `id` = $game_id");
            };
		} else if ($WC["WC1_".($turn['turn']+1)] == '2') {//Supply
            $result = mysql_query("SELECT house FROM game WHERE id = $game_id");
            $house = mysql_fetch_assoc($result);

            $Ssup = 0;
            $Bsup = 0;
            $Gsup = 0;
            $Lsup = 0;
            $Msup = 0;
            $Tsup = 0;

            $result = mysql_query("SELECT control, supply FROM $terr");

            while ($array = mysql_fetch_assoc($result))
            {
                if ($array['control'] == 'S') {
                    $Ssup += $array['supply'];
                } else if ($array['control'] == 'B') {
                    $Bsup += $array['supply'];
                } else if ($array['control'] == 'G') {
                    $Gsup += $array['supply'];
                } else if ($array['control'] == 'L') {
                    $Lsup += $array['supply'];
                } else if ($array['control'] == 'T') {
                    $Tsup += $array['supply'];
                } else if ($array['control'] == 'M') {
                    $Msup += $array['supply'];
                };
            };

            mysql_query("UPDATE ".$house['house']." SET bochki = '$Ssup' WHERE name = 'Stark'");
            mysql_query("UPDATE ".$house['house']." SET bochki = '$Bsup' WHERE name = 'Baratheon'");
            mysql_query("UPDATE ".$house['house']." SET bochki = '$Gsup' WHERE name = 'Greyjoy'");
            mysql_query("UPDATE ".$house['house']." SET bochki = '$Lsup' WHERE name = 'Lannister'");
            mysql_query("UPDATE ".$house['house']." SET bochki = '$Msup' WHERE name = 'Martell'");
            mysql_query("UPDATE ".$house['house']." SET bochki = '$Tsup' WHERE name = 'Tyrell'");
        };
	};

} else {
	endgame($game_id);
};

?>