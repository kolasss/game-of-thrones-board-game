<? include 'database.php';
$game_id = $_GET['id'];
$game_id = mysql_real_escape_string($game_id);
$house = $_GET['house'];
$house = mysql_real_escape_string($house);
$hero = $_GET['hero'];
$hero = mysql_real_escape_string($hero);

//make current card available for choose
if ($hero == 'Eddard') {
    mysql_query("UPDATE $house SET `HC1`=1 WHERE `name` = 'Stark'");
} else if ($hero == 'Robb') {
    mysql_query("UPDATE $house SET `HC2`=1 WHERE `name` = 'Stark'");
} else if ($hero == 'Bolton') {
    mysql_query("UPDATE $house SET `HC3`=1 WHERE `name` = 'Stark'");
} else if ($hero == 'Umber') {
    mysql_query("UPDATE $house SET `HC4`=1 WHERE `name` = 'Stark'");
} else if ($hero == 'Cassel') {
    mysql_query("UPDATE $house SET `HC5`=1 WHERE `name` = 'Stark'");
} else if ($hero == 'Blackfish') {
    mysql_query("UPDATE $house SET `HC6`=1 WHERE `name` = 'Stark'");
} else if ($hero == 'Catelyn') {
    mysql_query("UPDATE $house SET `HC7`=1 WHERE `name` = 'Stark'");
} else
    if ($hero == 'Euron') {
        mysql_query("UPDATE $house SET `HC1`=1 WHERE `name` = 'Greyjoy'");
    } else if ($hero == 'Victarion') {
        mysql_query("UPDATE $house SET `HC2`=1 WHERE `name` = 'Greyjoy'");
    } else if ($hero == 'Theon') {
        mysql_query("UPDATE $house SET `HC3`=1 WHERE `name` = 'Greyjoy'");
    } else if ($hero == 'Balon') {
        mysql_query("UPDATE $house SET `HC4`=1 WHERE `name` = 'Greyjoy'");
    } else if ($hero == 'Asha') {
        mysql_query("UPDATE $house SET `HC5`=1 WHERE `name` = 'Greyjoy'");
    } else if ($hero == 'Dagmar') {
        mysql_query("UPDATE $house SET `HC6`=1 WHERE `name` = 'Greyjoy'");
    } else if ($hero == 'Aeron') {
        mysql_query("UPDATE $house SET `HC7`=1 WHERE `name` = 'Greyjoy'");
    } else
        if ($hero == 'Tywin') {
            mysql_query("UPDATE $house SET `HC1`=1 WHERE `name` = 'Lannister'");
        } else if ($hero == 'Clegan') {
            mysql_query("UPDATE $house SET `HC2`=1 WHERE `name` = 'Lannister'");
        } else if ($hero == 'Hound') {
            mysql_query("UPDATE $house SET `HC3`=1 WHERE `name` = 'Lannister'");
        } else if ($hero == 'Jaime') {
            mysql_query("UPDATE $house SET `HC4`=1 WHERE `name` = 'Lannister'");
        } else if ($hero == 'Tyrion') {
            mysql_query("UPDATE $house SET `HC5`=1 WHERE `name` = 'Lannister'");
        } else if ($hero == 'Kevan') {
            mysql_query("UPDATE $house SET `HC6`=1 WHERE `name` = 'Lannister'");
        } else if ($hero == 'Cersei') {
            mysql_query("UPDATE $house SET `HC7`=1 WHERE `name` = 'Lannister'");
        } else
            if ($hero == 'Mace') {
                mysql_query("UPDATE $house SET `HC1`=1 WHERE `name` = 'Tyrell'");
            } else if ($hero == 'Loras') {
                mysql_query("UPDATE $house SET `HC2`=1 WHERE `name` = 'Tyrell'");
            } else if ($hero == 'Garlan') {
                mysql_query("UPDATE $house SET `HC3`=1 WHERE `name` = 'Tyrell'");
            } else if ($hero == 'Randyll') {
                mysql_query("UPDATE $house SET `HC4`=1 WHERE `name` = 'Tyrell'");
            } else if ($hero == 'Alester') {
                mysql_query("UPDATE $house SET `HC5`=1 WHERE `name` = 'Tyrell'");
            } else if ($hero == 'Margeary') {
                mysql_query("UPDATE $house SET `HC6`=1 WHERE `name` = 'Tyrell'");
            } else if ($hero == 'Queen') {
                mysql_query("UPDATE $house SET `HC7`=1 WHERE `name` = 'Tyrell'");
            } else
                if ($hero == 'Viper') {
                    mysql_query("UPDATE $house SET `HC1`=1 WHERE `name` = 'Martell'");
                } else if ($hero == 'Hotah') {
                    mysql_query("UPDATE $house SET `HC2`=1 WHERE `name` = 'Martell'");
                } else if ($hero == 'Obara') {
                    mysql_query("UPDATE $house SET `HC3`=1 WHERE `name` = 'Martell'");
                } else if ($hero == 'Darkstar') {
                    mysql_query("UPDATE $house SET `HC4`=1 WHERE `name` = 'Martell'");
                } else if ($hero == 'Nymeria') {
                    mysql_query("UPDATE $house SET `HC5`=1 WHERE `name` = 'Martell'");
                } else if ($hero == 'Arianne') {
                    mysql_query("UPDATE $house SET `HC6`=1 WHERE `name` = 'Martell'");
                } else if ($hero == 'Doran') {
                    mysql_query("UPDATE $house SET `HC7`=1 WHERE `name` = 'Martell'");
                } else
                    if ($hero == 'Stannis') {
                        mysql_query("UPDATE $house SET `HC1`=1 WHERE `name` = 'Baratheon'");
                    } else if ($hero == 'Renly') {
                        mysql_query("UPDATE $house SET `HC2`=1 WHERE `name` = 'Baratheon'");
                    } else if ($hero == 'Davos') {
                        mysql_query("UPDATE $house SET `HC3`=1 WHERE `name` = 'Baratheon'");
                    } else if ($hero == 'Brienne') {
                        mysql_query("UPDATE $house SET `HC4`=1 WHERE `name` = 'Baratheon'");
                    } else if ($hero == 'Melissandre') {
                        mysql_query("UPDATE $house SET `HC5`=1 WHERE `name` = 'Baratheon'");
                    } else if ($hero == 'Salladhor') {
                        mysql_query("UPDATE $house SET `HC6`=1 WHERE `name` = 'Baratheon'");
                    } else if ($hero == 'Patchface') {
                        mysql_query("UPDATE $house SET `HC7`=1 WHERE `name` = 'Baratheon'");
                    };

mysql_query("UPDATE `game` SET WildPower=0, WildCard1=WildCard2, WildCard2=WildCard3, WildCard3=WildCard4, WildCard4=WildCard5, WildCard5=WildCard6, WildCard6=WildCard7, WildCard7=WildCard8, WildCard8=WildCard9 WHERE `id` = $game_id");

include 'end_wild.php';

?>