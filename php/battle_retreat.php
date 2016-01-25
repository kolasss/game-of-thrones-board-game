<?
if ($winner == $battle['defender']) {
    if ($kills <= 0) {
        //Robb choose enemy retreat area
        if ($battle['dcard'] == 'Robb') {
            mysql_query("UPDATE `battle` SET currentplayer = '".$battle['defender']."' WHERE `id` = $game_id");
        } else {//attacker return to starting area
            $result = mysql_query("SELECT attacker, `starting` FROM battle WHERE id=$game_id");
            $ainfo = mysql_fetch_assoc($result);

            $result = mysql_query("SELECT aunit1, aunit2, aunit3, aunit4 FROM battle WHERE id=$game_id");
            $aunits = mysql_fetch_assoc($result);
            rsort($aunits);
            if ($aunits[0] != '0') {
                //select info from starting zone
                $result = mysql_query("SELECT unit1, unit2, unit3 FROM $terr where `name` = '".$ainfo['starting']."'");
                $targetunits = mysql_fetch_assoc($result);

                if ($ainfo['attacker'] == 'Baratheon') {
                    $acontrol = 'B';
                } else if ($ainfo['attacker'] == 'Stark') {
                    $acontrol = 'S';
                } else if ($ainfo['attacker'] == 'Greyjoy') {
                    $acontrol = 'G';
                } else if ($ainfo['attacker'] == 'Tyrell') {
                    $acontrol = 'T';
                } else if ($ainfo['attacker'] == 'Lannister') {
                    $acontrol = 'L';
                } else if ($ainfo['attacker'] == 'Martell') {
                    $acontrol = 'M';
                }

                //update units in starting zone
                if ($targetunits['unit1'] == '0') {
                    mysql_query("UPDATE $terr SET unit1='$aunits[0]', unit2='$aunits[1]', unit3='$aunits[2]', unit4='$aunits[3]', control='$acontrol' WHERE name = '".$ainfo['starting']."'");
                } else if ($targetunits['unit2'] == '0') {
                    mysql_query("UPDATE $terr SET unit2='$aunits[0]', unit3='$aunits[1]', unit4='$aunits[2]' WHERE name = '".$ainfo['starting']."'");
                } else if ($targetunits['unit3'] == '0') {
                    mysql_query("UPDATE $terr SET unit3='$aunits[0]', unit4='$aunits[1]' WHERE name = '".$ainfo['starting']."'");
                } else {
                    mysql_query("UPDATE $terr SET unit4='$aunits[0]' WHERE name = '".$ainfo['starting']."'");
                };
            };
        };
    };
    //update target zone
    $result = mysql_query("SELECT target FROM battle WHERE id=$game_id");
    $dinfo = mysql_fetch_assoc($result);

    $result = mysql_query("SELECT dunit1, dunit2, dunit3, dunit4 FROM battle WHERE id=$game_id");
    $dunits = mysql_fetch_assoc($result);
    rsort($dunits);
    $result = mysql_query("SELECT garrison FROM battle WHERE id=$game_id");
    $garrison = mysql_fetch_assoc($result);
    if ($dunits[0] != '0' || $garrison['garrison'] != '0') {
        mysql_query("UPDATE $terr SET unit1='$dunits[0]', unit2='$dunits[1]', unit3='$dunits[2]', unit4='$dunits[3]' WHERE name = '".$dinfo['target']."'");
    } else {
        //select info from target zone
        $result = mysql_query("SELECT token, castle FROM $terr where `name` = '".$dinfo['target']."'");
        $tartoken = mysql_fetch_assoc($result);
        if ($tartoken['token'] == '0') {
            if ($dinfo['target'] == 'Winterfell') {
                mysql_query("UPDATE $terr SET unit1='0', unit2='0', unit3='0', unit4='0', control='S', garrison='0', token='0', prikaz='0' WHERE name = 'Winterfell'");
                if ($battle['defender'] != 'Stark') {
                    mysql_query("UPDATE $housetable SET `zamki` = zamki-1 WHERE name='".$battle['defender']."'");
                    mysql_query("UPDATE $housetable SET `zamki` = zamki+1 WHERE name='Stark'");
                }
            } else if ($dinfo['target'] == 'Pyke') {
                mysql_query("UPDATE $terr SET unit1='0', unit2='0', unit3='0', unit4='0', control='G', garrison='0', token='0', prikaz='0' WHERE name = 'Pyke'");
                if ($battle['defender'] != 'Greyjoy') {
                    mysql_query("UPDATE $housetable SET `zamki` = zamki-1 WHERE name='".$battle['defender']."'");
                    mysql_query("UPDATE $housetable SET `zamki` = zamki+1 WHERE name='Greyjoy'");
                }
            } else if ($dinfo['target'] == 'Dragonstone') {
                mysql_query("UPDATE $terr SET unit1='0', unit2='0', unit3='0', unit4='0', control='B', garrison='0', token='0', prikaz='0' WHERE name = 'Dragonstone'");
                if ($battle['defender'] != 'Baratheon') {
                    mysql_query("UPDATE $housetable SET `zamki` = zamki-1 WHERE name='".$battle['defender']."'");
                    mysql_query("UPDATE $housetable SET `zamki` = zamki+1 WHERE name='Baratheon'");
                }
            } else if ($dinfo['target'] == 'Lannisport') {
                mysql_query("UPDATE $terr SET unit1='0', unit2='0', unit3='0', unit4='0', control='L', garrison='0', token='0', prikaz='0' WHERE name = 'Lannisport'");
                if ($battle['defender'] != 'Lannister') {
                    mysql_query("UPDATE $housetable SET `zamki` = zamki-1 WHERE name='".$battle['defender']."'");
                    mysql_query("UPDATE $housetable SET `zamki` = zamki+1 WHERE name='Lannister'");
                }
            } else if ($dinfo['target'] == 'Highgarden') {
                mysql_query("UPDATE $terr SET unit1='0', unit2='0', unit3='0', unit4='0', control='T', garrison='0', token='0', prikaz='0' WHERE name = 'Highgarden'");
                if ($battle['defender'] != 'Tyrell') {
                    mysql_query("UPDATE $housetable SET `zamki` = zamki-1 WHERE name='".$battle['defender']."'");
                    mysql_query("UPDATE $housetable SET `zamki` = zamki+1 WHERE name='Tyrell'");
                }
            } else if ($dinfo['target'] == 'Sunspear') {
                mysql_query("UPDATE $terr SET unit1='0', unit2='0', unit3='0', unit4='0', control='M', garrison='0', token='0', prikaz='0' WHERE name = 'Sunspear'");
                if ($battle['defender'] != 'Martell') {
                    mysql_query("UPDATE $housetable SET `zamki` = zamki-1 WHERE name='".$battle['defender']."'");
                    mysql_query("UPDATE $housetable SET `zamki` = zamki+1 WHERE name='Martell'");
                }
            } else {
                mysql_query("UPDATE $terr SET unit1='0', unit2='0', unit3='0', unit4='0', control='0', garrison='0', token='0', prikaz='0' WHERE name = '".$dinfo['target']."'");
                if ($tartoken['castle'] > 0) {
                    mysql_query("UPDATE $housetable SET `zamki` = zamki-1 WHERE name='".$battle['defender']."'");
                }
            };
        };
    };
} else if ($winner == $battle['attacker']) {
    //Arianne prevent opponent move
    if ($battle['dcard'] == 'Arianne') {
        $result = mysql_query("SELECT attacker, `starting`, target FROM battle WHERE id=$game_id");
        $ainfo = mysql_fetch_assoc($result);

        $result = mysql_query("SELECT aunit1, aunit2, aunit3, aunit4 FROM battle WHERE id=$game_id");
        $aunits = mysql_fetch_assoc($result);
        rsort($aunits);

        //select info from starting zone
        $result = mysql_query("SELECT unit1, unit2, unit3 FROM $terr where `name` = '".$ainfo['starting']."'");
        $targetunits = mysql_fetch_assoc($result);

        if ($ainfo['attacker'] == 'Baratheon') {
            $acontrol = 'B';
        } else if ($ainfo['attacker'] == 'Stark') {
            $acontrol = 'S';
        } else if ($ainfo['attacker'] == 'Greyjoy') {
            $acontrol = 'G';
        } else if ($ainfo['attacker'] == 'Tyrell') {
            $acontrol = 'T';
        } else if ($ainfo['attacker'] == 'Lannister') {
            $acontrol = 'L';
        } else if ($ainfo['attacker'] == 'Martell') {
            $acontrol = 'M';
        }

        //update units in starting zone
        if ($targetunits['unit1'] == '0') {
            mysql_query("UPDATE $terr SET unit1='$aunits[0]', unit2='$aunits[1]', unit3='$aunits[2]', unit4='$aunits[3]', control='$acontrol' WHERE name = '".$ainfo['starting']."'");
        } else if ($targetunits['unit2'] == '0') {
            mysql_query("UPDATE $terr SET unit2='$aunits[0]', unit3='$aunits[1]', unit4='$aunits[2]' WHERE name = '".$ainfo['starting']."'");
        } else if ($targetunits['unit3'] == '0') {
            mysql_query("UPDATE $terr SET unit3='$aunits[0]', unit4='$aunits[1]' WHERE name = '".$ainfo['starting']."'");
        } else {
            mysql_query("UPDATE $terr SET unit4='$aunits[0]' WHERE name = '".$ainfo['starting']."'");
        }

        //update target zone
        //select info from target zone
        $result = mysql_query("SELECT token, castle FROM $terr where `name` = '".$ainfo['target']."'");
        $tartoken = mysql_fetch_assoc($result);
        if ($tartoken['token'] == '1') {
            mysql_query("UPDATE $housetable SET `tokob` = tokob-1 WHERE name='".$battle['defender']."'");
        };

        if ($ainfo['target'] == 'Winterfell') {
            mysql_query("UPDATE $terr SET unit1='0', unit2='0', unit3='0', unit4='0', control='S', garrison='0', token='0', prikaz='0' WHERE name = '".$ainfo['target']."'");
            if ($battle['defender'] != 'Stark') {
                mysql_query("UPDATE $housetable SET `zamki` = zamki-1 WHERE name='".$battle['defender']."'");
                mysql_query("UPDATE $housetable SET `zamki` = zamki+1 WHERE name='Stark'");
            }
        } else if ($ainfo['target'] == 'Pyke') {
            mysql_query("UPDATE $terr SET unit1='0', unit2='0', unit3='0', unit4='0', control='G', garrison='0', token='0', prikaz='0' WHERE name = '".$ainfo['target']."'");
            if ($battle['defender'] != 'Greyjoy') {
                mysql_query("UPDATE $housetable SET `zamki` = zamki-1 WHERE name='".$battle['defender']."'");
                mysql_query("UPDATE $housetable SET `zamki` = zamki+1 WHERE name='Greyjoy'");
            }
        } else if ($ainfo['target'] == 'Dragonstone') {
            mysql_query("UPDATE $terr SET unit1='0', unit2='0', unit3='0', unit4='0', control='B', garrison='0', token='0', prikaz='0' WHERE name = '".$ainfo['target']."'");
            if ($battle['defender'] != 'Baratheon') {
                mysql_query("UPDATE $housetable SET `zamki` = zamki-1 WHERE name='".$battle['defender']."'");
                mysql_query("UPDATE $housetable SET `zamki` = zamki+1 WHERE name='Baratheon'");
            }
        } else if ($ainfo['target'] == 'Lannisport') {
            mysql_query("UPDATE $terr SET unit1='0', unit2='0', unit3='0', unit4='0', control='L', garrison='0', token='0', prikaz='0' WHERE name = '".$ainfo['target']."'");
            if ($battle['defender'] != 'Lannister') {
                mysql_query("UPDATE $housetable SET `zamki` = zamki-1 WHERE name='".$battle['defender']."'");
                mysql_query("UPDATE $housetable SET `zamki` = zamki+1 WHERE name='Lannister'");
            }
        } else if ($ainfo['target'] == 'Highgarden') {
            mysql_query("UPDATE $terr SET unit1='0', unit2='0', unit3='0', unit4='0', control='T', garrison='0', token='0', prikaz='0' WHERE name = '".$ainfo['target']."'");
            if ($battle['defender'] != 'Tyrell') {
                mysql_query("UPDATE $housetable SET `zamki` = zamki-1 WHERE name='".$battle['defender']."'");
                mysql_query("UPDATE $housetable SET `zamki` = zamki+1 WHERE name='Tyrell'");
            }
        } else if ($ainfo['target'] == 'Sunspear') {
            mysql_query("UPDATE $terr SET unit1='0', unit2='0', unit3='0', unit4='0', control='M', garrison='0', token='0', prikaz='0' WHERE name = '".$ainfo['target']."'");
            if ($battle['defender'] != 'Martell') {
                mysql_query("UPDATE $housetable SET `zamki` = zamki-1 WHERE name='".$battle['defender']."'");
                mysql_query("UPDATE $housetable SET `zamki` = zamki+1 WHERE name='Martell'");
            }
        } else {
            mysql_query("UPDATE $terr SET unit1='0', unit2='0', unit3='0', unit4='0', control='0', garrison='0', token='0', prikaz='0' WHERE name = '".$ainfo['target']."'");
            if ($tartoken['castle'] > 0) {
                mysql_query("UPDATE $housetable SET `zamki` = zamki-1 WHERE name='".$battle['defender']."'");
            }
        };
    } else {//attacker capture target area
        $result = mysql_query("SELECT attacker, target FROM battle WHERE id=$game_id");
        $ainfo = mysql_fetch_assoc($result);

        $result = mysql_query("SELECT aunit1, aunit2, aunit3, aunit4 FROM battle WHERE id=$game_id");
        $aunits = mysql_fetch_assoc($result);
        rsort($aunits);
        if ($aunits[0] != '0') {
            if ($ainfo['attacker'] == 'Baratheon') {
                $acontrol = 'B';
            } else if ($ainfo['attacker'] == 'Stark') {
                $acontrol = 'S';
            } else if ($ainfo['attacker'] == 'Greyjoy') {
                $acontrol = 'G';
            } else if ($ainfo['attacker'] == 'Tyrell') {
                $acontrol = 'T';
            } else if ($ainfo['attacker'] == 'Lannister') {
                $acontrol = 'L';
            } else if ($ainfo['attacker'] == 'Martell') {
                $acontrol = 'M';
            };

            //select info from target zone
            $result = mysql_query("SELECT token, castle FROM $terr where `name` = '".$ainfo['target']."'");
            $tartoken = mysql_fetch_assoc($result);
            if ($tartoken['token'] == '1') {
                mysql_query("UPDATE $housetable SET `tokob` = tokob-1 WHERE name='".$battle['defender']."'");
            };
            if ($tartoken['castle'] > 0) {
                mysql_query("UPDATE $housetable SET `zamki` = zamki-1 WHERE name='".$battle['defender']."'");
                mysql_query("UPDATE $housetable SET `zamki` = zamki+1 WHERE name='".$battle['attacker']."'");
            };

            //update target zone
            mysql_query("UPDATE $terr SET unit1='$aunits[0]', unit2='$aunits[1]', unit3='$aunits[2]', unit4='$aunits[3]', control='$acontrol', garrison='0', token='0', prikaz='0' WHERE name = '".$ainfo['target']."'");
            //Loras attacker march order update
            if ($battle['acard'] == 'Loras') {
                $result = mysql_query("SELECT aorder FROM battle WHERE id=$game_id");
                $aorder = mysql_fetch_assoc($result);
                mysql_query("UPDATE prikaz='".$aorder['aorder']."' WHERE name = '".$ainfo['target']."'");
            };
        } else {
            //select info from target zone
            $result = mysql_query("SELECT token, castle FROM $terr where `name` = '".$ainfo['target']."'");
            $tartoken = mysql_fetch_assoc($result);
            if ($tartoken['token'] == '1') {
                mysql_query("UPDATE $housetable SET `tokob` = tokob-1 WHERE name='".$battle['defender']."'");
            };

            if ($ainfo['target'] == 'Winterfell') {
                mysql_query("UPDATE $terr SET unit1='0', unit2='0', unit3='0', unit4='0', control='S', garrison='0', token='0', prikaz='0' WHERE name = '".$ainfo['target']."'");
                if ($battle['defender'] != 'Stark') {
                    mysql_query("UPDATE $housetable SET `zamki` = zamki-1 WHERE name='".$battle['defender']."'");
                    mysql_query("UPDATE $housetable SET `zamki` = zamki+1 WHERE name='Stark'");
                }
            } else if ($ainfo['target'] == 'Pyke') {
                mysql_query("UPDATE $terr SET unit1='0', unit2='0', unit3='0', unit4='0', control='G', garrison='0', token='0', prikaz='0' WHERE name = '".$ainfo['target']."'");
                if ($battle['defender'] != 'Greyjoy') {
                    mysql_query("UPDATE $housetable SET `zamki` = zamki-1 WHERE name='".$battle['defender']."'");
                    mysql_query("UPDATE $housetable SET `zamki` = zamki+1 WHERE name='Greyjoy'");
                }
            } else if ($ainfo['target'] == 'Dragonstone') {
                mysql_query("UPDATE $terr SET unit1='0', unit2='0', unit3='0', unit4='0', control='B', garrison='0', token='0', prikaz='0' WHERE name = '".$ainfo['target']."'");
                if ($battle['defender'] != 'Baratheon') {
                    mysql_query("UPDATE $housetable SET `zamki` = zamki-1 WHERE name='".$battle['defender']."'");
                    mysql_query("UPDATE $housetable SET `zamki` = zamki+1 WHERE name='Baratheon'");
                }
            } else if ($ainfo['target'] == 'Lannisport') {
                mysql_query("UPDATE $terr SET unit1='0', unit2='0', unit3='0', unit4='0', control='L', garrison='0', token='0', prikaz='0' WHERE name = '".$ainfo['target']."'");
                if ($battle['defender'] != 'Lannister') {
                    mysql_query("UPDATE $housetable SET `zamki` = zamki-1 WHERE name='".$battle['defender']."'");
                    mysql_query("UPDATE $housetable SET `zamki` = zamki+1 WHERE name='Lannister'");
                }
            } else if ($ainfo['target'] == 'Highgarden') {
                mysql_query("UPDATE $terr SET unit1='0', unit2='0', unit3='0', unit4='0', control='T', garrison='0', token='0', prikaz='0' WHERE name = '".$ainfo['target']."'");
                if ($battle['defender'] != 'Tyrell') {
                    mysql_query("UPDATE $housetable SET `zamki` = zamki-1 WHERE name='".$battle['defender']."'");
                    mysql_query("UPDATE $housetable SET `zamki` = zamki+1 WHERE name='Tyrell'");
                }
            } else if ($ainfo['target'] == 'Sunspear') {
                mysql_query("UPDATE $terr SET unit1='0', unit2='0', unit3='0', unit4='0', control='M', garrison='0', token='0', prikaz='0' WHERE name = '".$ainfo['target']."'");
                if ($battle['defender'] != 'Martell') {
                    mysql_query("UPDATE $housetable SET `zamki` = zamki-1 WHERE name='".$battle['defender']."'");
                    mysql_query("UPDATE $housetable SET `zamki` = zamki+1 WHERE name='Martell'");
                }
            } else {
                mysql_query("UPDATE $terr SET unit1='0', unit2='0', unit3='0', unit4='0', control='0', garrison='0', token='0', prikaz='0' WHERE name = '".$ainfo['target']."'");
                if ($tartoken['castle'] > 0) {
                    mysql_query("UPDATE $housetable SET `zamki` = zamki-1 WHERE name='".$battle['defender']."'");
                }
            };
        };
    }
    if ($kills <= 0) {
        //Robb choose enemy retreat area
        if ($battle['acard'] == 'Robb') {
            mysql_query("UPDATE `battle` SET currentplayer = '".$battle['attacker']."' WHERE `id` = $game_id");
        } else {
            //defender retreat
            mysql_query("UPDATE `battle` SET currentplayer = '".$battle['defender']."' WHERE `id` = $game_id");
        }
    }
};
?>