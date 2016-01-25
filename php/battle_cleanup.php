<?
//Clean Up Combat phase
mysql_query("UPDATE `game` SET faza = 13 WHERE `id` = $game_id");

//Select battle info
$result = mysql_query("SELECT attacker, defender, acard, dcard, winner, target FROM battle WHERE id = '$game_id'");
$row = mysql_fetch_assoc($result);
//Renly can upgrade FM to KN
if (($row['acard'] == 'Renly' || $row['dcard'] == 'Renly') && $row['winner'] == 'Baratheon') {
    mysql_query("UPDATE `battle` SET currentplayer = ".$row['winner']." WHERE `id` = $game_id");
} else {//cleanup
    $house = $_GET['house'];
    $house = mysql_real_escape_string($house);
    //discard attacker card
    if ($row['attacker'] == 'Baratheon') {
        if ($row['acard'] == 'Patchface') {
            mysql_query("UPDATE $house SET `HC7`=0 WHERE `name` = 'Baratheon'");
            $result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Baratheon'");
            $acards = mysql_fetch_assoc($result);
            if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
                mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Baratheon'");
            };
        } else if ($row['acard'] == 'Salladhor') {
            mysql_query("UPDATE $house SET `HC6`=0 WHERE `name` = 'Baratheon'");
            $result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Baratheon'");
            $acards = mysql_fetch_assoc($result);
            if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
                mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC7`=1,  WHERE `name` = 'Baratheon'");
            };
        } else if ($row['acard'] == 'Melissandre') {
            mysql_query("UPDATE $house SET `HC5`=0 WHERE `name` = 'Baratheon'");
            $result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Baratheon'");
            $acards = mysql_fetch_assoc($result);
            if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
                mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC7`=1, `HC6`=1,  WHERE `name` = 'Baratheon'");
            };
        } else if ($row['acard'] == 'Brienne') {
            mysql_query("UPDATE $house SET `HC4`=0 WHERE `name` = 'Baratheon'");
            $result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Baratheon'");
            $acards = mysql_fetch_assoc($result);
            if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
                mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC7`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Baratheon'");
            };
        } else if ($row['acard'] == 'Davos') {
            mysql_query("UPDATE $house SET `HC3`=0 WHERE `name` = 'Baratheon'");
            $result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Baratheon'");
            $acards = mysql_fetch_assoc($result);
            if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
                mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC7`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Baratheon'");
            };
        } else if ($row['acard'] == 'Renly') {
            mysql_query("UPDATE $house SET `HC2`=0 WHERE `name` = 'Baratheon'");
            $result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Baratheon'");
            $acards = mysql_fetch_assoc($result);
            if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
                mysql_query("UPDATE $house SET `HC1`=1, `HC7`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Baratheon'");
            };
        } else if ($row['acard'] == 'Stannis') {
            mysql_query("UPDATE $house SET `HC1`=0 WHERE `name` = 'Baratheon'");
            $result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Baratheon'");
            $acards = mysql_fetch_assoc($result);
            if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
                mysql_query("UPDATE $house SET `HC7`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Baratheon'");
            };
        }
    } else if ($row['attacker'] == 'Lannister') {
        if ($row['acard'] == 'Cersei') {
            mysql_query("UPDATE $house SET `HC7`=0 WHERE `name` = 'Lannister'");
            $result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Lannister'");
            $acards = mysql_fetch_assoc($result);
            if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
                mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Lannister'");
            };
        } else if ($row['acard'] == 'Kevan') {
            mysql_query("UPDATE $house SET `HC6`=0 WHERE `name` = 'Lannister'");
            $result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Lannister'");
            $acards = mysql_fetch_assoc($result);
            if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
                mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC7`=1,  WHERE `name` = 'Lannister'");
            };
        } else if ($row['acard'] == 'Tyrion') {
            mysql_query("UPDATE $house SET `HC5`=0 WHERE `name` = 'Lannister'");
            $result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Lannister'");
            $acards = mysql_fetch_assoc($result);
            if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
                mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC7`=1, `HC6`=1,  WHERE `name` = 'Lannister'");
            };
        } else if ($row['acard'] == 'Jaime') {
            mysql_query("UPDATE $house SET `HC4`=0 WHERE `name` = 'Lannister'");
            $result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Lannister'");
            $acards = mysql_fetch_assoc($result);
            if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
                mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC7`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Lannister'");
            };
        } else if ($row['acard'] == 'Hound') {
            mysql_query("UPDATE $house SET `HC3`=0 WHERE `name` = 'Lannister'");
            $result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Lannister'");
            $acards = mysql_fetch_assoc($result);
            if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
                mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC7`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Lannister'");
            };
        } else if ($row['acard'] == 'Clegan') {
            mysql_query("UPDATE $house SET `HC2`=0 WHERE `name` = 'Lannister'");
            $result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Lannister'");
            $acards = mysql_fetch_assoc($result);
            if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
                mysql_query("UPDATE $house SET `HC1`=1, `HC7`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Lannister'");
            };
        } else if ($row['acard'] == 'Tywin') {
            mysql_query("UPDATE $house SET `HC1`=0 WHERE `name` = 'Lannister'");
            $result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Lannister'");
            $acards = mysql_fetch_assoc($result);
            if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
                mysql_query("UPDATE $house SET `HC7`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Lannister'");
            };
        }
    } else if ($row['attacker'] == 'Stark') {
        if ($row['acard'] == 'Catelyn') {
            mysql_query("UPDATE $house SET `HC7`=0 WHERE `name` = 'Stark'");
            $result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Stark'");
            $acards = mysql_fetch_assoc($result);
            if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
                mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Stark'");
            };
        } else if ($row['acard'] == 'Blackfish') {
            mysql_query("UPDATE $house SET `HC6`=0 WHERE `name` = 'Stark'");
            $result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Stark'");
            $acards = mysql_fetch_assoc($result);
            if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
                mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC7`=1,  WHERE `name` = 'Stark'");
            };
        } else if ($row['acard'] == 'Cassel') {
            mysql_query("UPDATE $house SET `HC5`=0 WHERE `name` = 'Stark'");
            $result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Stark'");
            $acards = mysql_fetch_assoc($result);
            if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
                mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC7`=1, `HC6`=1,  WHERE `name` = 'Stark'");
            };
        } else if ($row['acard'] == 'Umber') {
            mysql_query("UPDATE $house SET `HC4`=0 WHERE `name` = 'Stark'");
            $result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Stark'");
            $acards = mysql_fetch_assoc($result);
            if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
                mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC7`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Stark'");
            };
        } else if ($row['acard'] == 'Bolton') {
            mysql_query("UPDATE $house SET `HC3`=0 WHERE `name` = 'Stark'");
            $result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Stark'");
            $acards = mysql_fetch_assoc($result);
            if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
                mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC7`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Stark'");
            };
        } else if ($row['acard'] == 'Robb') {
            mysql_query("UPDATE $house SET `HC2`=0 WHERE `name` = 'Stark'");
            $result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Stark'");
            $acards = mysql_fetch_assoc($result);
            if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
                mysql_query("UPDATE $house SET `HC1`=1, `HC7`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Stark'");
            };
        } else if ($row['acard'] == 'Eddard') {
            mysql_query("UPDATE $house SET `HC1`=0 WHERE `name` = 'Stark'");
            $result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Stark'");
            $acards = mysql_fetch_assoc($result);
            if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
                mysql_query("UPDATE $house SET `HC7`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Stark'");
            };
        }
    } else if ($row['attacker'] == 'Tyrell') {
        if ($row['acard'] == 'Queen') {
            mysql_query("UPDATE $house SET `HC7`=0 WHERE `name` = 'Tyrell'");
            $result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Tyrell'");
            $acards = mysql_fetch_assoc($result);
            if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
                mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Tyrell'");
            };
        } else if ($row['acard'] == 'Margeary') {
            mysql_query("UPDATE $house SET `HC6`=0 WHERE `name` = 'Tyrell'");
            $result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Tyrell'");
            $acards = mysql_fetch_assoc($result);
            if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
                mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC7`=1,  WHERE `name` = 'Tyrell'");
            };
        } else if ($row['acard'] == 'Alester') {
            mysql_query("UPDATE $house SET `HC5`=0 WHERE `name` = 'Tyrell'");
            $result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Tyrell'");
            $acards = mysql_fetch_assoc($result);
            if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
                mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC7`=1, `HC6`=1,  WHERE `name` = 'Tyrell'");
            };
        } else if ($row['acard'] == 'Randyll') {
            mysql_query("UPDATE $house SET `HC4`=0 WHERE `name` = 'Tyrell'");
            $result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Tyrell'");
            $acards = mysql_fetch_assoc($result);
            if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
                mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC7`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Tyrell'");
            };
        } else if ($row['acard'] == 'Garlan') {
            mysql_query("UPDATE $house SET `HC3`=0 WHERE `name` = 'Tyrell'");
            $result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Tyrell'");
            $acards = mysql_fetch_assoc($result);
            if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
                mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC7`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Tyrell'");
            };
        } else if ($row['acard'] == 'Loras') {
            mysql_query("UPDATE $house SET `HC2`=0 WHERE `name` = 'Tyrell'");
            $result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Tyrell'");
            $acards = mysql_fetch_assoc($result);
            if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
                mysql_query("UPDATE $house SET `HC1`=1, `HC7`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Tyrell'");
            };
        } else if ($row['acard'] == 'Mace') {
            mysql_query("UPDATE $house SET `HC1`=0 WHERE `name` = 'Tyrell'");
            $result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Tyrell'");
            $acards = mysql_fetch_assoc($result);
            if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
                mysql_query("UPDATE $house SET `HC7`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Tyrell'");
            };
        }
    } else if ($row['attacker'] == 'Greyjoy') {
        if ($row['acard'] == 'Aeron') {
            mysql_query("UPDATE $house SET `HC7`=0 WHERE `name` = 'Greyjoy'");
            $result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Greyjoy'");
            $acards = mysql_fetch_assoc($result);
            if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
                mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Greyjoy'");
            };
        } else if ($row['acard'] == 'Dagmar') {
            mysql_query("UPDATE $house SET `HC6`=0 WHERE `name` = 'Greyjoy'");
            $result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Greyjoy'");
            $acards = mysql_fetch_assoc($result);
            if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
                mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC7`=1,  WHERE `name` = 'Greyjoy'");
            };
        } else if ($row['acard'] == 'Asha') {
            mysql_query("UPDATE $house SET `HC5`=0 WHERE `name` = 'Greyjoy'");
            $result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Greyjoy'");
            $acards = mysql_fetch_assoc($result);
            if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
                mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC7`=1, `HC6`=1,  WHERE `name` = 'Greyjoy'");
            };
        } else if ($row['acard'] == 'Balon') {
            mysql_query("UPDATE $house SET `HC4`=0 WHERE `name` = 'Greyjoy'");
            $result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Greyjoy'");
            $acards = mysql_fetch_assoc($result);
            if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
                mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC7`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Greyjoy'");
            };
        } else if ($row['acard'] == 'Theon') {
            mysql_query("UPDATE $house SET `HC3`=0 WHERE `name` = 'Greyjoy'");
            $result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Greyjoy'");
            $acards = mysql_fetch_assoc($result);
            if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
                mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC7`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Greyjoy'");
            };
        } else if ($row['acard'] == 'Victarion') {
            mysql_query("UPDATE $house SET `HC2`=0 WHERE `name` = 'Greyjoy'");
            $result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Greyjoy'");
            $acards = mysql_fetch_assoc($result);
            if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
                mysql_query("UPDATE $house SET `HC1`=1, `HC7`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Greyjoy'");
            };
        } else if ($row['acard'] == 'Euron') {
            mysql_query("UPDATE $house SET `HC1`=0 WHERE `name` = 'Greyjoy'");
            $result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Greyjoy'");
            $acards = mysql_fetch_assoc($result);
            if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
                mysql_query("UPDATE $house SET `HC7`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Greyjoy'");
            };
        }
    } else if ($row['attacker'] == 'Martell') {
        if ($row['acard'] == 'Doran') {
            mysql_query("UPDATE $house SET `HC7`=0 WHERE `name` = 'Martell'");
            $result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Martell'");
            $acards = mysql_fetch_assoc($result);
            if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
                mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Martell'");
            };
        } else if ($row['acard'] == 'Arianne') {
            mysql_query("UPDATE $house SET `HC6`=0 WHERE `name` = 'Martell'");
            $result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Martell'");
            $acards = mysql_fetch_assoc($result);
            if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
                mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC7`=1,  WHERE `name` = 'Martell'");
            };
        } else if ($row['acard'] == 'Nymeria') {
            mysql_query("UPDATE $house SET `HC5`=0 WHERE `name` = 'Martell'");
            $result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Martell'");
            $acards = mysql_fetch_assoc($result);
            if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
                mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC7`=1, `HC6`=1,  WHERE `name` = 'Martell'");
            };
        } else if ($row['acard'] == 'Darkstar') {
            mysql_query("UPDATE $house SET `HC4`=0 WHERE `name` = 'Martell'");
            $result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Martell'");
            $acards = mysql_fetch_assoc($result);
            if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
                mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC7`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Martell'");
            };
        } else if ($row['acard'] == 'Obara') {
            mysql_query("UPDATE $house SET `HC3`=0 WHERE `name` = 'Martell'");
            $result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Martell'");
            $acards = mysql_fetch_assoc($result);
            if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
                mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC7`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Martell'");
            };
        } else if ($row['acard'] == 'Hotah') {
            mysql_query("UPDATE $house SET `HC2`=0 WHERE `name` = 'Martell'");
            $result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Martell'");
            $acards = mysql_fetch_assoc($result);
            if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
                mysql_query("UPDATE $house SET `HC1`=1, `HC7`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Martell'");
            };
        } else if ($row['acard'] == 'Viper') {
            mysql_query("UPDATE $house SET `HC1`=0 WHERE `name` = 'Martell'");
            $result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Martell'");
            $acards = mysql_fetch_assoc($result);
            if ($acards['HC1'] == 0 && $acards['HC2'] == 0 && $acards['HC3'] == 0 && $acards['HC4'] == 0 && $acards['HC5'] == 0 && $acards['HC6'] == 0 && $acards['HC7'] == 0) {
                mysql_query("UPDATE $house SET `HC7`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Martell'");
            };
        }
    };
    //discard defender card
    if ($row['defender'] == 'Baratheon') {
        if ($row['dcard'] == 'Patchface') {
            mysql_query("UPDATE $house SET `HC7`=0 WHERE `name` = 'Baratheon'");
            $result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Baratheon'");
            $dcards = mysql_fetch_assoc($result);
            if ($dcards['HC1'] == 0 && $dcards['HC2'] == 0 && $dcards['HC3'] == 0 && $dcards['HC4'] == 0 && $dcards['HC5'] == 0 && $dcards['HC6'] == 0 && $dcards['HC7'] == 0) {
                mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Baratheon'");
            };
        } else if ($row['dcard'] == 'Salladhor') {
            mysql_query("UPDATE $house SET `HC6`=0 WHERE `name` = 'Baratheon'");
            $result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Baratheon'");
            $dcards = mysql_fetch_assoc($result);
            if ($dcards['HC1'] == 0 && $dcards['HC2'] == 0 && $dcards['HC3'] == 0 && $dcards['HC4'] == 0 && $dcards['HC5'] == 0 && $dcards['HC6'] == 0 && $dcards['HC7'] == 0) {
                mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC7`=1,  WHERE `name` = 'Baratheon'");
            };
        } else if ($row['dcard'] == 'Melissandre') {
            mysql_query("UPDATE $house SET `HC5`=0 WHERE `name` = 'Baratheon'");
            $result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Baratheon'");
            $dcards = mysql_fetch_assoc($result);
            if ($dcards['HC1'] == 0 && $dcards['HC2'] == 0 && $dcards['HC3'] == 0 && $dcards['HC4'] == 0 && $dcards['HC5'] == 0 && $dcards['HC6'] == 0 && $dcards['HC7'] == 0) {
                mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC7`=1, `HC6`=1,  WHERE `name` = 'Baratheon'");
            };
        } else if ($row['dcard'] == 'Brienne') {
            mysql_query("UPDATE $house SET `HC4`=0 WHERE `name` = 'Baratheon'");
            $result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Baratheon'");
            $dcards = mysql_fetch_assoc($result);
            if ($dcards['HC1'] == 0 && $dcards['HC2'] == 0 && $dcards['HC3'] == 0 && $dcards['HC4'] == 0 && $dcards['HC5'] == 0 && $dcards['HC6'] == 0 && $dcards['HC7'] == 0) {
                mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC7`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Baratheon'");
            };
        } else if ($row['dcard'] == 'Davos') {
            mysql_query("UPDATE $house SET `HC3`=0 WHERE `name` = 'Baratheon'");
            $result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Baratheon'");
            $dcards = mysql_fetch_assoc($result);
            if ($dcards['HC1'] == 0 && $dcards['HC2'] == 0 && $dcards['HC3'] == 0 && $dcards['HC4'] == 0 && $dcards['HC5'] == 0 && $dcards['HC6'] == 0 && $dcards['HC7'] == 0) {
                mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC7`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Baratheon'");
            };
        } else if ($row['dcard'] == 'Renly') {
            mysql_query("UPDATE $house SET `HC2`=0 WHERE `name` = 'Baratheon'");
            $result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Baratheon'");
            $dcards = mysql_fetch_assoc($result);
            if ($dcards['HC1'] == 0 && $dcards['HC2'] == 0 && $dcards['HC3'] == 0 && $dcards['HC4'] == 0 && $dcards['HC5'] == 0 && $dcards['HC6'] == 0 && $dcards['HC7'] == 0) {
                mysql_query("UPDATE $house SET `HC1`=1, `HC7`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Baratheon'");
            };
        } else if ($row['dcard'] == 'Stannis') {
            mysql_query("UPDATE $house SET `HC1`=0 WHERE `name` = 'Baratheon'");
            $result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Baratheon'");
            $dcards = mysql_fetch_assoc($result);
            if ($dcards['HC1'] == 0 && $dcards['HC2'] == 0 && $dcards['HC3'] == 0 && $dcards['HC4'] == 0 && $dcards['HC5'] == 0 && $dcards['HC6'] == 0 && $dcards['HC7'] == 0) {
                mysql_query("UPDATE $house SET `HC7`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Baratheon'");
            };
        }
    } else if ($row['defender'] == 'Lannister') {
        if ($row['dcard'] == 'Cersei') {
            mysql_query("UPDATE $house SET `HC7`=0 WHERE `name` = 'Lannister'");
            $result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Lannister'");
            $dcards = mysql_fetch_assoc($result);
            if ($dcards['HC1'] == 0 && $dcards['HC2'] == 0 && $dcards['HC3'] == 0 && $dcards['HC4'] == 0 && $dcards['HC5'] == 0 && $dcards['HC6'] == 0 && $dcards['HC7'] == 0) {
                mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Lannister'");
            };
        } else if ($row['dcard'] == 'Kevan') {
            mysql_query("UPDATE $house SET `HC6`=0 WHERE `name` = 'Lannister'");
            $result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Lannister'");
            $dcards = mysql_fetch_assoc($result);
            if ($dcards['HC1'] == 0 && $dcards['HC2'] == 0 && $dcards['HC3'] == 0 && $dcards['HC4'] == 0 && $dcards['HC5'] == 0 && $dcards['HC6'] == 0 && $dcards['HC7'] == 0) {
                mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC7`=1,  WHERE `name` = 'Lannister'");
            };
        } else if ($row['dcard'] == 'Tyrion') {
            mysql_query("UPDATE $house SET `HC5`=0 WHERE `name` = 'Lannister'");
            $result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Lannister'");
            $dcards = mysql_fetch_assoc($result);
            if ($dcards['HC1'] == 0 && $dcards['HC2'] == 0 && $dcards['HC3'] == 0 && $dcards['HC4'] == 0 && $dcards['HC5'] == 0 && $dcards['HC6'] == 0 && $dcards['HC7'] == 0) {
                mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC7`=1, `HC6`=1,  WHERE `name` = 'Lannister'");
            };
        } else if ($row['dcard'] == 'Jaime') {
            mysql_query("UPDATE $house SET `HC4`=0 WHERE `name` = 'Lannister'");
            $result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Lannister'");
            $dcards = mysql_fetch_assoc($result);
            if ($dcards['HC1'] == 0 && $dcards['HC2'] == 0 && $dcards['HC3'] == 0 && $dcards['HC4'] == 0 && $dcards['HC5'] == 0 && $dcards['HC6'] == 0 && $dcards['HC7'] == 0) {
                mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC7`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Lannister'");
            };
        } else if ($row['dcard'] == 'Hound') {
            mysql_query("UPDATE $house SET `HC3`=0 WHERE `name` = 'Lannister'");
            $result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Lannister'");
            $dcards = mysql_fetch_assoc($result);
            if ($dcards['HC1'] == 0 && $dcards['HC2'] == 0 && $dcards['HC3'] == 0 && $dcards['HC4'] == 0 && $dcards['HC5'] == 0 && $dcards['HC6'] == 0 && $dcards['HC7'] == 0) {
                mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC7`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Lannister'");
            };
        } else if ($row['dcard'] == 'Clegan') {
            mysql_query("UPDATE $house SET `HC2`=0 WHERE `name` = 'Lannister'");
            $result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Lannister'");
            $dcards = mysql_fetch_assoc($result);
            if ($dcards['HC1'] == 0 && $dcards['HC2'] == 0 && $dcards['HC3'] == 0 && $dcards['HC4'] == 0 && $dcards['HC5'] == 0 && $dcards['HC6'] == 0 && $dcards['HC7'] == 0) {
                mysql_query("UPDATE $house SET `HC1`=1, `HC7`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Lannister'");
            };
        } else if ($row['dcard'] == 'Tywin') {
            mysql_query("UPDATE $house SET `HC1`=0 WHERE `name` = 'Lannister'");
            $result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Lannister'");
            $dcards = mysql_fetch_assoc($result);
            if ($dcards['HC1'] == 0 && $dcards['HC2'] == 0 && $dcards['HC3'] == 0 && $dcards['HC4'] == 0 && $dcards['HC5'] == 0 && $dcards['HC6'] == 0 && $dcards['HC7'] == 0) {
                mysql_query("UPDATE $house SET `HC7`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Lannister'");
            };
        }
    } else if ($row['defender'] == 'Stark') {
        if ($row['dcard'] == 'Catelyn') {
            mysql_query("UPDATE $house SET `HC7`=0 WHERE `name` = 'Stark'");
            $result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Stark'");
            $dcards = mysql_fetch_assoc($result);
            if ($dcards['HC1'] == 0 && $dcards['HC2'] == 0 && $dcards['HC3'] == 0 && $dcards['HC4'] == 0 && $dcards['HC5'] == 0 && $dcards['HC6'] == 0 && $dcards['HC7'] == 0) {
                mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Stark'");
            };
        } else if ($row['dcard'] == 'Blackfish') {
            mysql_query("UPDATE $house SET `HC6`=0 WHERE `name` = 'Stark'");
            $result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Stark'");
            $dcards = mysql_fetch_assoc($result);
            if ($dcards['HC1'] == 0 && $dcards['HC2'] == 0 && $dcards['HC3'] == 0 && $dcards['HC4'] == 0 && $dcards['HC5'] == 0 && $dcards['HC6'] == 0 && $dcards['HC7'] == 0) {
                mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC7`=1,  WHERE `name` = 'Stark'");
            };
        } else if ($row['dcard'] == 'Cassel') {
            mysql_query("UPDATE $house SET `HC5`=0 WHERE `name` = 'Stark'");
            $result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Stark'");
            $dcards = mysql_fetch_assoc($result);
            if ($dcards['HC1'] == 0 && $dcards['HC2'] == 0 && $dcards['HC3'] == 0 && $dcards['HC4'] == 0 && $dcards['HC5'] == 0 && $dcards['HC6'] == 0 && $dcards['HC7'] == 0) {
                mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC7`=1, `HC6`=1,  WHERE `name` = 'Stark'");
            };
        } else if ($row['dcard'] == 'Umber') {
            mysql_query("UPDATE $house SET `HC4`=0 WHERE `name` = 'Stark'");
            $result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Stark'");
            $dcards = mysql_fetch_assoc($result);
            if ($dcards['HC1'] == 0 && $dcards['HC2'] == 0 && $dcards['HC3'] == 0 && $dcards['HC4'] == 0 && $dcards['HC5'] == 0 && $dcards['HC6'] == 0 && $dcards['HC7'] == 0) {
                mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC7`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Stark'");
            };
        } else if ($row['dcard'] == 'Bolton') {
            mysql_query("UPDATE $house SET `HC3`=0 WHERE `name` = 'Stark'");
            $result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Stark'");
            $dcards = mysql_fetch_assoc($result);
            if ($dcards['HC1'] == 0 && $dcards['HC2'] == 0 && $dcards['HC3'] == 0 && $dcards['HC4'] == 0 && $dcards['HC5'] == 0 && $dcards['HC6'] == 0 && $dcards['HC7'] == 0) {
                mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC7`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Stark'");
            };
        } else if ($row['dcard'] == 'Robb') {
            mysql_query("UPDATE $house SET `HC2`=0 WHERE `name` = 'Stark'");
            $result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Stark'");
            $dcards = mysql_fetch_assoc($result);
            if ($dcards['HC1'] == 0 && $dcards['HC2'] == 0 && $dcards['HC3'] == 0 && $dcards['HC4'] == 0 && $dcards['HC5'] == 0 && $dcards['HC6'] == 0 && $dcards['HC7'] == 0) {
                mysql_query("UPDATE $house SET `HC1`=1, `HC7`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Stark'");
            };
        } else if ($row['dcard'] == 'Eddard') {
            mysql_query("UPDATE $house SET `HC1`=0 WHERE `name` = 'Stark'");
            $result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Stark'");
            $dcards = mysql_fetch_assoc($result);
            if ($dcards['HC1'] == 0 && $dcards['HC2'] == 0 && $dcards['HC3'] == 0 && $dcards['HC4'] == 0 && $dcards['HC5'] == 0 && $dcards['HC6'] == 0 && $dcards['HC7'] == 0) {
                mysql_query("UPDATE $house SET `HC7`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Stark'");
            };
        }
    } else if ($row['defender'] == 'Tyrell') {
        if ($row['dcard'] == 'Queen') {
            mysql_query("UPDATE $house SET `HC7`=0 WHERE `name` = 'Tyrell'");
            $result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Tyrell'");
            $dcards = mysql_fetch_assoc($result);
            if ($dcards['HC1'] == 0 && $dcards['HC2'] == 0 && $dcards['HC3'] == 0 && $dcards['HC4'] == 0 && $dcards['HC5'] == 0 && $dcards['HC6'] == 0 && $dcards['HC7'] == 0) {
                mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Tyrell'");
            };
        } else if ($row['dcard'] == 'Margeary') {
            mysql_query("UPDATE $house SET `HC6`=0 WHERE `name` = 'Tyrell'");
            $result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Tyrell'");
            $dcards = mysql_fetch_assoc($result);
            if ($dcards['HC1'] == 0 && $dcards['HC2'] == 0 && $dcards['HC3'] == 0 && $dcards['HC4'] == 0 && $dcards['HC5'] == 0 && $dcards['HC6'] == 0 && $dcards['HC7'] == 0) {
                mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC7`=1,  WHERE `name` = 'Tyrell'");
            };
        } else if ($row['dcard'] == 'Alester') {
            mysql_query("UPDATE $house SET `HC5`=0 WHERE `name` = 'Tyrell'");
            $result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Tyrell'");
            $dcards = mysql_fetch_assoc($result);
            if ($dcards['HC1'] == 0 && $dcards['HC2'] == 0 && $dcards['HC3'] == 0 && $dcards['HC4'] == 0 && $dcards['HC5'] == 0 && $dcards['HC6'] == 0 && $dcards['HC7'] == 0) {
                mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC7`=1, `HC6`=1,  WHERE `name` = 'Tyrell'");
            };
        } else if ($row['dcard'] == 'Randyll') {
            mysql_query("UPDATE $house SET `HC4`=0 WHERE `name` = 'Tyrell'");
            $result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Tyrell'");
            $dcards = mysql_fetch_assoc($result);
            if ($dcards['HC1'] == 0 && $dcards['HC2'] == 0 && $dcards['HC3'] == 0 && $dcards['HC4'] == 0 && $dcards['HC5'] == 0 && $dcards['HC6'] == 0 && $dcards['HC7'] == 0) {
                mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC7`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Tyrell'");
            };
        } else if ($row['dcard'] == 'Garlan') {
            mysql_query("UPDATE $house SET `HC3`=0 WHERE `name` = 'Tyrell'");
            $result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Tyrell'");
            $dcards = mysql_fetch_assoc($result);
            if ($dcards['HC1'] == 0 && $dcards['HC2'] == 0 && $dcards['HC3'] == 0 && $dcards['HC4'] == 0 && $dcards['HC5'] == 0 && $dcards['HC6'] == 0 && $dcards['HC7'] == 0) {
                mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC7`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Tyrell'");
            };
        } else if ($row['dcard'] == 'Loras') {
            mysql_query("UPDATE $house SET `HC2`=0 WHERE `name` = 'Tyrell'");
            $result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Tyrell'");
            $dcards = mysql_fetch_assoc($result);
            if ($dcards['HC1'] == 0 && $dcards['HC2'] == 0 && $dcards['HC3'] == 0 && $dcards['HC4'] == 0 && $dcards['HC5'] == 0 && $dcards['HC6'] == 0 && $dcards['HC7'] == 0) {
                mysql_query("UPDATE $house SET `HC1`=1, `HC7`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Tyrell'");
            };
        } else if ($row['dcard'] == 'Mace') {
            mysql_query("UPDATE $house SET `HC1`=0 WHERE `name` = 'Tyrell'");
            $result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Tyrell'");
            $dcards = mysql_fetch_assoc($result);
            if ($dcards['HC1'] == 0 && $dcards['HC2'] == 0 && $dcards['HC3'] == 0 && $dcards['HC4'] == 0 && $dcards['HC5'] == 0 && $dcards['HC6'] == 0 && $dcards['HC7'] == 0) {
                mysql_query("UPDATE $house SET `HC7`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Tyrell'");
            };
        }
    } else if ($row['defender'] == 'Greyjoy') {
        if ($row['dcard'] == 'Aeron') {
            mysql_query("UPDATE $house SET `HC7`=0 WHERE `name` = 'Greyjoy'");
            $result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Greyjoy'");
            $dcards = mysql_fetch_assoc($result);
            if ($dcards['HC1'] == 0 && $dcards['HC2'] == 0 && $dcards['HC3'] == 0 && $dcards['HC4'] == 0 && $dcards['HC5'] == 0 && $dcards['HC6'] == 0 && $dcards['HC7'] == 0) {
                mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Greyjoy'");
            };
        } else if ($row['dcard'] == 'Dagmar') {
            mysql_query("UPDATE $house SET `HC6`=0 WHERE `name` = 'Greyjoy'");
            $result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Greyjoy'");
            $dcards = mysql_fetch_assoc($result);
            if ($dcards['HC1'] == 0 && $dcards['HC2'] == 0 && $dcards['HC3'] == 0 && $dcards['HC4'] == 0 && $dcards['HC5'] == 0 && $dcards['HC6'] == 0 && $dcards['HC7'] == 0) {
                mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC7`=1,  WHERE `name` = 'Greyjoy'");
            };
        } else if ($row['dcard'] == 'Asha') {
            mysql_query("UPDATE $house SET `HC5`=0 WHERE `name` = 'Greyjoy'");
            $result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Greyjoy'");
            $dcards = mysql_fetch_assoc($result);
            if ($dcards['HC1'] == 0 && $dcards['HC2'] == 0 && $dcards['HC3'] == 0 && $dcards['HC4'] == 0 && $dcards['HC5'] == 0 && $dcards['HC6'] == 0 && $dcards['HC7'] == 0) {
                mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC7`=1, `HC6`=1,  WHERE `name` = 'Greyjoy'");
            };
        } else if ($row['dcard'] == 'Balon') {
            mysql_query("UPDATE $house SET `HC4`=0 WHERE `name` = 'Greyjoy'");
            $result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Greyjoy'");
            $dcards = mysql_fetch_assoc($result);
            if ($dcards['HC1'] == 0 && $dcards['HC2'] == 0 && $dcards['HC3'] == 0 && $dcards['HC4'] == 0 && $dcards['HC5'] == 0 && $dcards['HC6'] == 0 && $dcards['HC7'] == 0) {
                mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC7`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Greyjoy'");
            };
        } else if ($row['dcard'] == 'Theon') {
            mysql_query("UPDATE $house SET `HC3`=0 WHERE `name` = 'Greyjoy'");
            $result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Greyjoy'");
            $dcards = mysql_fetch_assoc($result);
            if ($dcards['HC1'] == 0 && $dcards['HC2'] == 0 && $dcards['HC3'] == 0 && $dcards['HC4'] == 0 && $dcards['HC5'] == 0 && $dcards['HC6'] == 0 && $dcards['HC7'] == 0) {
                mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC7`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Greyjoy'");
            };
        } else if ($row['dcard'] == 'Victarion') {
            mysql_query("UPDATE $house SET `HC2`=0 WHERE `name` = 'Greyjoy'");
            $result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Greyjoy'");
            $dcards = mysql_fetch_assoc($result);
            if ($dcards['HC1'] == 0 && $dcards['HC2'] == 0 && $dcards['HC3'] == 0 && $dcards['HC4'] == 0 && $dcards['HC5'] == 0 && $dcards['HC6'] == 0 && $dcards['HC7'] == 0) {
                mysql_query("UPDATE $house SET `HC1`=1, `HC7`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Greyjoy'");
            };
        } else if ($row['dcard'] == 'Euron') {
            mysql_query("UPDATE $house SET `HC1`=0 WHERE `name` = 'Greyjoy'");
            $result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Greyjoy'");
            $dcards = mysql_fetch_assoc($result);
            if ($dcards['HC1'] == 0 && $dcards['HC2'] == 0 && $dcards['HC3'] == 0 && $dcards['HC4'] == 0 && $dcards['HC5'] == 0 && $dcards['HC6'] == 0 && $dcards['HC7'] == 0) {
                mysql_query("UPDATE $house SET `HC7`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Greyjoy'");
            };
        }
    } else if ($row['defender'] == 'Martell') {
        if ($row['dcard'] == 'Doran') {
            mysql_query("UPDATE $house SET `HC7`=0 WHERE `name` = 'Martell'");
            $result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Martell'");
            $dcards = mysql_fetch_assoc($result);
            if ($dcards['HC1'] == 0 && $dcards['HC2'] == 0 && $dcards['HC3'] == 0 && $dcards['HC4'] == 0 && $dcards['HC5'] == 0 && $dcards['HC6'] == 0 && $dcards['HC7'] == 0) {
                mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Martell'");
            };
        } else if ($row['dcard'] == 'Arianne') {
            mysql_query("UPDATE $house SET `HC6`=0 WHERE `name` = 'Martell'");
            $result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Martell'");
            $dcards = mysql_fetch_assoc($result);
            if ($dcards['HC1'] == 0 && $dcards['HC2'] == 0 && $dcards['HC3'] == 0 && $dcards['HC4'] == 0 && $dcards['HC5'] == 0 && $dcards['HC6'] == 0 && $dcards['HC7'] == 0) {
                mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC7`=1,  WHERE `name` = 'Martell'");
            };
        } else if ($row['dcard'] == 'Nymeria') {
            mysql_query("UPDATE $house SET `HC5`=0 WHERE `name` = 'Martell'");
            $result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Martell'");
            $dcards = mysql_fetch_assoc($result);
            if ($dcards['HC1'] == 0 && $dcards['HC2'] == 0 && $dcards['HC3'] == 0 && $dcards['HC4'] == 0 && $dcards['HC5'] == 0 && $dcards['HC6'] == 0 && $dcards['HC7'] == 0) {
                mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC7`=1, `HC6`=1,  WHERE `name` = 'Martell'");
            };
        } else if ($row['dcard'] == 'Darkstar') {
            mysql_query("UPDATE $house SET `HC4`=0 WHERE `name` = 'Martell'");
            $result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Martell'");
            $dcards = mysql_fetch_assoc($result);
            if ($dcards['HC1'] == 0 && $dcards['HC2'] == 0 && $dcards['HC3'] == 0 && $dcards['HC4'] == 0 && $dcards['HC5'] == 0 && $dcards['HC6'] == 0 && $dcards['HC7'] == 0) {
                mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC7`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Martell'");
            };
        } else if ($row['dcard'] == 'Obara') {
            mysql_query("UPDATE $house SET `HC3`=0 WHERE `name` = 'Martell'");
            $result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Martell'");
            $dcards = mysql_fetch_assoc($result);
            if ($dcards['HC1'] == 0 && $dcards['HC2'] == 0 && $dcards['HC3'] == 0 && $dcards['HC4'] == 0 && $dcards['HC5'] == 0 && $dcards['HC6'] == 0 && $dcards['HC7'] == 0) {
                mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC7`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Martell'");
            };
        } else if ($row['dcard'] == 'Hotah') {
            mysql_query("UPDATE $house SET `HC2`=0 WHERE `name` = 'Martell'");
            $result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Martell'");
            $dcards = mysql_fetch_assoc($result);
            if ($dcards['HC1'] == 0 && $dcards['HC2'] == 0 && $dcards['HC3'] == 0 && $dcards['HC4'] == 0 && $dcards['HC5'] == 0 && $dcards['HC6'] == 0 && $dcards['HC7'] == 0) {
                mysql_query("UPDATE $house SET `HC1`=1, `HC7`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Martell'");
            };
        } else if ($row['dcard'] == 'Viper') {
            mysql_query("UPDATE $house SET `HC1`=0 WHERE `name` = 'Martell'");
            $result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = 'Martell'");
            $dcards = mysql_fetch_assoc($result);
            if ($dcards['HC1'] == 0 && $dcards['HC2'] == 0 && $dcards['HC3'] == 0 && $dcards['HC4'] == 0 && $dcards['HC5'] == 0 && $dcards['HC6'] == 0 && $dcards['HC7'] == 0) {
                mysql_query("UPDATE $house SET `HC7`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC6`=1,  WHERE `name` = 'Martell'");
            };
        }
    };

    //if loser have Roose Bolton
    if (($row['dcard'] == 'Bolton' || $row['acard'] == 'Bolton') && $row['winner'] != 'Stark') {
        mysql_query("UPDATE $house SET `HC1`=1, `HC2`=1, `HC3`=1, `HC4`=1, `HC5`=1, `HC6`=1, `HC7`=1 WHERE `name` = 'Stark'");
    };
    //Patchface
    if ($row['acard'] == 'Patchface') {
        mysql_query("UPDATE `battle` SET currentplayer = 'Baratheon' WHERE `id` = $game_id");
    } else if ($row['dcard'] == 'Patchface') {
        mysql_query("UPDATE `battle` SET currentplayer = 'Baratheon' WHERE `id` = $game_id");
    } else {
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
    };
};//end of cleanup
?>