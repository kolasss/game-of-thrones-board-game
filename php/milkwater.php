<? include 'database.php';
$game_id = $_GET['id'];
$game_id = mysql_real_escape_string($game_id);
$house = $_GET['house'];
$house = mysql_real_escape_string($house);
$hero = $_GET['hero'];
$hero = mysql_real_escape_string($hero);

//discard current card
if ($hero == 'Eddard') {
    mysql_query("UPDATE $house SET `HC1`=0 WHERE `name` = 'Stark'");
} else if ($hero == 'Robb') {
    mysql_query("UPDATE $house SET `HC2`=0 WHERE `name` = 'Stark'");
} else if ($hero == 'Bolton') {
    mysql_query("UPDATE $house SET `HC3`=0 WHERE `name` = 'Stark'");
} else if ($hero == 'Umber') {
    mysql_query("UPDATE $house SET `HC4`=0 WHERE `name` = 'Stark'");
} else if ($hero == 'Cassel') {
    mysql_query("UPDATE $house SET `HC5`=0 WHERE `name` = 'Stark'");
} else if ($hero == 'Blackfish') {
    mysql_query("UPDATE $house SET `HC6`=0 WHERE `name` = 'Stark'");
} else if ($hero == 'Catelyn') {
    mysql_query("UPDATE $house SET `HC7`=0 WHERE `name` = 'Stark'");
} else
    if ($hero == 'Euron') {
        mysql_query("UPDATE $house SET `HC1`=0 WHERE `name` = 'Greyjoy'");
    } else if ($hero == 'Victarion') {
        mysql_query("UPDATE $house SET `HC2`=0 WHERE `name` = 'Greyjoy'");
    } else if ($hero == 'Theon') {
        mysql_query("UPDATE $house SET `HC3`=0 WHERE `name` = 'Greyjoy'");
    } else if ($hero == 'Balon') {
        mysql_query("UPDATE $house SET `HC4`=0 WHERE `name` = 'Greyjoy'");
    } else if ($hero == 'Asha') {
        mysql_query("UPDATE $house SET `HC5`=0 WHERE `name` = 'Greyjoy'");
    } else if ($hero == 'Dagmar') {
        mysql_query("UPDATE $house SET `HC6`=0 WHERE `name` = 'Greyjoy'");
    } else if ($hero == 'Aeron') {
        mysql_query("UPDATE $house SET `HC7`=0 WHERE `name` = 'Greyjoy'");
    } else
        if ($hero == 'Tywin') {
            mysql_query("UPDATE $house SET `HC1`=0 WHERE `name` = 'Lannister'");
        } else if ($hero == 'Clegan') {
            mysql_query("UPDATE $house SET `HC2`=0 WHERE `name` = 'Lannister'");
        } else if ($hero == 'Hound') {
            mysql_query("UPDATE $house SET `HC3`=0 WHERE `name` = 'Lannister'");
        } else if ($hero == 'Jaime') {
            mysql_query("UPDATE $house SET `HC4`=0 WHERE `name` = 'Lannister'");
        } else if ($hero == 'Tyrion') {
            mysql_query("UPDATE $house SET `HC5`=0 WHERE `name` = 'Lannister'");
        } else if ($hero == 'Kevan') {
            mysql_query("UPDATE $house SET `HC6`=0 WHERE `name` = 'Lannister'");
        } else if ($hero == 'Cersei') {
            mysql_query("UPDATE $house SET `HC7`=0 WHERE `name` = 'Lannister'");
        } else
            if ($hero == 'Mace') {
                mysql_query("UPDATE $house SET `HC1`=0 WHERE `name` = 'Tyrell'");
            } else if ($hero == 'Loras') {
                mysql_query("UPDATE $house SET `HC2`=0 WHERE `name` = 'Tyrell'");
            } else if ($hero == 'Garlan') {
                mysql_query("UPDATE $house SET `HC3`=0 WHERE `name` = 'Tyrell'");
            } else if ($hero == 'Randyll') {
                mysql_query("UPDATE $house SET `HC4`=0 WHERE `name` = 'Tyrell'");
            } else if ($hero == 'Alester') {
                mysql_query("UPDATE $house SET `HC5`=0 WHERE `name` = 'Tyrell'");
            } else if ($hero == 'Margeary') {
                mysql_query("UPDATE $house SET `HC6`=0 WHERE `name` = 'Tyrell'");
            } else if ($hero == 'Queen') {
                mysql_query("UPDATE $house SET `HC7`=0 WHERE `name` = 'Tyrell'");
            } else
                if ($hero == 'Viper') {
                    mysql_query("UPDATE $house SET `HC1`=0 WHERE `name` = 'Martell'");
                } else if ($hero == 'Hotah') {
                    mysql_query("UPDATE $house SET `HC2`=0 WHERE `name` = 'Martell'");
                } else if ($hero == 'Obara') {
                    mysql_query("UPDATE $house SET `HC3`=0 WHERE `name` = 'Martell'");
                } else if ($hero == 'Darkstar') {
                    mysql_query("UPDATE $house SET `HC4`=0 WHERE `name` = 'Martell'");
                } else if ($hero == 'Nymeria') {
                    mysql_query("UPDATE $house SET `HC5`=0 WHERE `name` = 'Martell'");
                } else if ($hero == 'Arianne') {
                    mysql_query("UPDATE $house SET `HC6`=0 WHERE `name` = 'Martell'");
                } else if ($hero == 'Doran') {
                    mysql_query("UPDATE $house SET `HC7`=0 WHERE `name` = 'Martell'");
                } else
                    if ($hero == 'Stannis') {
                        mysql_query("UPDATE $house SET `HC1`=0 WHERE `name` = 'Baratheon'");
                    } else if ($hero == 'Renly') {
                        mysql_query("UPDATE $house SET `HC2`=0 WHERE `name` = 'Baratheon'");
                    } else if ($hero == 'Davos') {
                        mysql_query("UPDATE $house SET `HC3`=0 WHERE `name` = 'Baratheon'");
                    } else if ($hero == 'Brienne') {
                        mysql_query("UPDATE $house SET `HC4`=0 WHERE `name` = 'Baratheon'");
                    } else if ($hero == 'Melissandre') {
                        mysql_query("UPDATE $house SET `HC5`=0 WHERE `name` = 'Baratheon'");
                    } else if ($hero == 'Salladhor') {
                        mysql_query("UPDATE $house SET `HC6`=0 WHERE `name` = 'Baratheon'");
                    } else if ($hero == 'Patchface') {
                        mysql_query("UPDATE $house SET `HC7`=0 WHERE `name` = 'Baratheon'");
                    };

$result = mysql_query("SELECT currentplayer FROM game WHERE id=$game_id");
$curr = mysql_fetch_assoc($result);

if ($curr['currentplayer'] < 5) {
    mysql_query("UPDATE `game` SET currentplayer=currentplayer+1 WHERE `id` = $game_id");
} else {
    $result = mysql_query("SELECT WildPower FROM game WHERE id = $game_id");
    $WP = mysql_fetch_assoc($result);

    $WPower = $WP['WildPower'] - 2;
    if ($WPower < 0) {$WPower = 0;};

    mysql_query("UPDATE `game` SET currentplayer='0', WildPower='$WPower', WildCard1=WildCard2, WildCard2=WildCard3, WildCard3=WildCard4, WildCard4=WildCard5, WildCard5=WildCard6, WildCard6=WildCard7, WildCard7=WildCard8, WildCard8=WildCard9 WHERE `id` = $game_id");

    include 'end_wild.php';
}

?>