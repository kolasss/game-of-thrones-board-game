<?
//re-count CS
$result = mysql_query("SELECT attacker, defender, aorder, dorder, aunit1, aunit2, aunit3, aunit4, dunit1, dunit2, dunit3, dunit4, asup1, asup2, asup3, asup4, asup5, asup6, asup7, dsup1, dsup2, dsup3, dsup4, dsup5, dsup6, dsup7, garrison, castle, acard, dcard FROM battle WHERE id=$game_id");
$row = mysql_fetch_assoc($result);
mysql_query("UPDATE `battle` SET `aCS`='0', `dCS`='0' WHERE `id` = '$game_id'");

//Mace
if ($row['acard'] == 'Mace' && $row['dcard'] != 'Blackfish') {
    if ($row['dunit1'] == 'F1') {
        mysql_query("UPDATE `battle` SET `dunit1`='0' WHERE `id` = '$game_id'");
    } else if ($row['dunit2'] == 'F1') {
        mysql_query("UPDATE `battle` SET `dunit2`='0' WHERE `id` = '$game_id'");
    } else if ($row['dunit3'] == 'F1') {
        mysql_query("UPDATE `battle` SET `dunit3`='0' WHERE `id` = '$game_id'");
    } else if ($row['dunit4'] == 'F1') {
        mysql_query("UPDATE `battle` SET `dunit4`='0' WHERE `id` = '$game_id'");
    };
    $result = mysql_query("SELECT dunit1, dunit2, dunit3, dunit4 FROM battle WHERE id=$game_id");
    $dunits = mysql_fetch_assoc($result);
    rsort($dunits);
    mysql_query("UPDATE `battle` SET `dunit1`='$dunits[0]', `dunit2`='$dunits[1]', `dunit3`='$dunits[2]', `dunit4`='$dunits[3]' WHERE id=$game_id");
    $result = mysql_query("SELECT attacker, defender, aorder, dorder, aunit1, aunit2, aunit3, aunit4, dunit1, dunit2, dunit3, dunit4, asup1, asup2, asup3, asup4, asup5, asup6, asup7, dsup1, dsup2, dsup3, dsup4, dsup5, dsup6, dsup7, garrison, castle, acard, dcard FROM battle WHERE id=$game_id");
    $row = mysql_fetch_assoc($result);
} else if ($row['dcard'] == 'Mace' && $row['acard'] != 'Blackfish') {
    if ($row['aunit1'] == 'F1') {
        mysql_query("UPDATE `battle` SET `aunit1`='0' WHERE `id` = '$game_id'");
    } else if ($row['aunit2'] == 'F1') {
        mysql_query("UPDATE `battle` SET `aunit2`='0' WHERE `id` = '$game_id'");
    } else if ($row['aunit3'] == 'F1') {
        mysql_query("UPDATE `battle` SET `aunit3`='0' WHERE `id` = '$game_id'");
    } else if ($row['aunit4'] == 'F1') {
        mysql_query("UPDATE `battle` SET `aunit4`='0' WHERE `id` = '$game_id'");
    }
    $result = mysql_query("SELECT aunit1, aunit2, aunit3, aunit4 FROM battle WHERE id=$game_id");
    $aunits = mysql_fetch_assoc($result);
    rsort($aunits);
    mysql_query("UPDATE `battle` SET `aunit1`='$aunits[0]', `aunit2`='$aunits[1]', `aunit3`='$aunits[2]', `aunit4`='$aunits[3]' WHERE id=$game_id");
    $result = mysql_query("SELECT attacker, defender, aorder, dorder, aunit1, aunit2, aunit3, aunit4, dunit1, dunit2, dunit3, dunit4, asup1, asup2, asup3, asup4, asup5, asup6, asup7, dsup1, dsup2, dsup3, dsup4, dsup5, dsup6, dsup7, garrison, castle, acard, dcard FROM battle WHERE id=$game_id");
    $row = mysql_fetch_assoc($result);
}

//units power
for ($j=1; $j<5; $j++) {
    if ($row['aunit'.$j] != '0') {
        if ($row['aunit'.$j] == 'F1') {
            if ($row['acard'] == 'Kevan') {//kevan
                mysql_query("UPDATE `battle` SET `aCS`=aCS+2 WHERE `id` = '$game_id'");
            } else {
                mysql_query("UPDATE `battle` SET `aCS`=aCS+1 WHERE `id` = '$game_id'");
            }
        } else if ($row['aunit'.$j] == 'S1') {//salladhor
            if ($row['dcard'] == 'Salladhor' && ($row['dsup1'] != '0' || $row['dsup2'] != '0' || $row['dsup3'] != '0' || $row['dsup4'] != '0' || $row['dsup5'] != '0' || $row['dsup6'] != '0' || $row['dsup7'] != '0')) {
            } else if ($row['acard'] == 'Victarion') {//victarion
                mysql_query("UPDATE `battle` SET `aCS`=aCS+2 WHERE `id` = '$game_id'");
            } else {
                mysql_query("UPDATE `battle` SET `aCS`=aCS+1 WHERE `id` = '$game_id'");
            }
        } else if ($row['aunit'.$j] == 'K1') {
            mysql_query("UPDATE `battle` SET `aCS`=aCS+2 WHERE `id` = '$game_id'");
        } else if ($row['aunit'.$j] == 'E1' && $row['castle'] != '0') {
            mysql_query("UPDATE `battle` SET `aCS`=aCS+4 WHERE `id` = '$game_id'");
        };
    };
    if ($row['dunit'.$j] != '0') {
        if ($row['dunit'.$j] == 'F1') {
            mysql_query("UPDATE `battle` SET `dCS`=dCS+1 WHERE `id` = '$game_id'");
        } else if ($row['dunit'.$j] == 'S1') {//salladhor
            if ($row['acard'] == 'Salladhor' && ($row['asup1'] != '0' || $row['asup2'] != '0' || $row['asup3'] != '0' || $row['asup4'] != '0' || $row['asup5'] != '0' || $row['asup6'] != '0' || $row['asup7'] != '0')) {
            } else {
                mysql_query("UPDATE `battle` SET `dCS`=dCS+1 WHERE `id` = '$game_id'");
            }
        } else if ($row['dunit'.$j] == 'K1') {
            mysql_query("UPDATE `battle` SET `dCS`=dCS+2 WHERE `id` = '$game_id'");
        };
    };
}
//orders
if ($row['aorder'] == '1') {
    mysql_query("UPDATE `battle` SET `aCS`=aCS-1 WHERE `id` = '$game_id'");
} else if ($row['aorder'] == '7') {
    mysql_query("UPDATE `battle` SET `aCS`=aCS+1 WHERE `id` = '$game_id'");
}
if ($row['dorder'] == '3') {
    if ($row['dcard'] == 'Catelyn') {//catelyn
        mysql_query("UPDATE `battle` SET `dCS`=dCS+2 WHERE `id` = '$game_id'");
    } else {
        mysql_query("UPDATE `battle` SET `dCS`=dCS+1 WHERE `id` = '$game_id'");
    }
} else if ($row['dorder'] == '8') {
    if ($row['dcard'] == 'Catelyn') {//catelyn
        mysql_query("UPDATE `battle` SET `dCS`=dCS+4 WHERE `id` = '$game_id'");
    } else {
        mysql_query("UPDATE `battle` SET `dCS`=dCS+2 WHERE `id` = '$game_id'");
    }
}
//garrison
if ($row['garrison'] != '0') {
    mysql_query("UPDATE `battle` SET `dCS`=dCS+2 WHERE `id` = '$game_id'");
}

$terr = $_GET['terr'];
$terr = mysql_real_escape_string($terr);

//support units
for ($j=1; $j<8; $j++) {
    //attacking
    if ($row['asup'.$j] != '0') {
        $result2 = mysql_query("SELECT unit1, unit2, unit3, unit4, prikaz, control FROM $terr WHERE `name` = '".$row['asup'.$j]."'");
        $row2 = mysql_fetch_assoc($result2);
        //units
        for ($k=1; $k<5; $k++) {
            if ($row2['unit'.$k] != '0') {
                if ($row2['unit'.$k] == 'F1') {
                    if ($row['acard'] == 'Kevan' && $row2['control'] == 'L') {//kevan
                        mysql_query("UPDATE `battle` SET `aCS`=aCS+2 WHERE `id` = '$game_id'");
                    } else {
                        mysql_query("UPDATE `battle` SET `aCS`=aCS+1 WHERE `id` = '$game_id'");
                    }
                } else if ($row2['unit'.$k] == 'S1') {//salladhor
                    if ($row['dcard'] == 'Salladhor' && ($row['dsup1'] != '0' || $row['dsup2'] != '0' || $row['dsup3'] != '0' || $row['dsup4'] != '0' || $row['dsup5'] != '0' || $row['dsup6'] != '0' || $row['dsup7'] != '0')) {
                    } else if ($row['acard'] == 'Victarion' && $row2['control'] == 'G') {//victarion
                        mysql_query("UPDATE `battle` SET `aCS`=aCS+2 WHERE `id` = '$game_id'");
                    } else {
                        mysql_query("UPDATE `battle` SET `aCS`=aCS+1 WHERE `id` = '$game_id'");
                    }
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
    //defending
    if ($row['dsup'.$j] != '0') {
        $result2 = mysql_query("SELECT unit1, unit2, unit3, unit4, prikaz, control FROM $terr WHERE `name` = '".$row['dsup'.$j]."'");
        $row2 = mysql_fetch_assoc($result2);
        //units
        for ($k=1; $k<5; $k++) {
            if ($row2['unit'.$k] != '0') {
                if ($row2['unit'.$k] == 'F1') {
                    mysql_query("UPDATE `battle` SET `dCS`=dCS+1 WHERE `id` = '$game_id'");
                } else if ($row2['unit'.$k] == 'S1') {//salladhor
                    if ($row['acard'] == 'Salladhor' && ($row['asup1'] != '0' || $row['asup2'] != '0' || $row['asup3'] != '0' || $row['asup4'] != '0' || $row['asup5'] != '0' || $row['asup6'] != '0' || $row['asup7'] != '0')) {//my salladhor
                    } else if ($row['dcard'] == 'Salladhor' && ($row['dsup1'] != '0' || $row['dsup2'] != '0' || $row['dsup3'] != '0' || $row['dsup4'] != '0' || $row['dsup5'] != '0' || $row['dsup6'] != '0' || $row['dsup7'] != '0') && $row2['control'] != 'B') {
                    } else {
                        mysql_query("UPDATE `battle` SET `dCS`=dCS+1 WHERE `id` = '$game_id'");
                    }
                } else if ($row2['unit'.$k] == 'K1') {
                    mysql_query("UPDATE `battle` SET `dCS`=dCS+2 WHERE `id` = '$game_id'");
                };
            };
        }
        //order
        if ($row2['prikaz'] == '10') {
            mysql_query("UPDATE `battle` SET `dCS`=dCS+1 WHERE `id` = '$game_id'");
        }
    };
}//end of re-count CS

//plus generals power
//attacker
if ($row['attacker'] == 'Baratheon' && $row['dcard'] != 'Balon') {
    if ($row['acard'] == 'Salladhor' || $row['acard'] == 'Melissandre') {
        mysql_query("UPDATE `battle` SET `aCS`=aCS+1 WHERE `id` = '$game_id'");
    } else if ($row['acard'] == 'Brienne') {
        mysql_query("UPDATE `battle` SET `aCS`=aCS+2 WHERE `id` = '$game_id'");
    } else if ($row['acard'] == 'Davos') {
        //select Stannis' condition
        $housetable = $_GET['table'];
        $housetable = mysql_real_escape_string($housetable);
        $query = mysql_query("SELECT HC1 FROM $housetable WHERE `name` = 'Baratheon'");
        $stannis = mysql_fetch_assoc($query);
        if ($stannis['HC1'] == '1') {
            mysql_query("UPDATE `battle` SET `aCS`=aCS+2 WHERE `id` = '$game_id'");
        } else {
            mysql_query("UPDATE `battle` SET `aCS`=aCS+3 WHERE `id` = '$game_id'");
        }
    } else if ($row['acard'] == 'Renly') {
        mysql_query("UPDATE `battle` SET `aCS`=aCS+3 WHERE `id` = '$game_id'");
    } else if ($row['acard'] == 'Stannis') {
        //select throne positions
        $result = mysql_query("SELECT throne1, throne2, throne3, throne4, throne5, throne6 FROM game where id=$game_id");
        $game = mysql_fetch_assoc($result);
        for ($l=1; $l<7; $l++) {
            if ($game['throne'.$l] == $row['attacker']) {
                $athrone = $l;
            }
            if ($game['throne'.$l] == $row['defender']) {
                $dthrone = $l;
            }
        }
        if ($athrone < $dthrone) {
            mysql_query("UPDATE `battle` SET `aCS`=aCS+4 WHERE `id` = '$game_id'");
        } else {
            mysql_query("UPDATE `battle` SET `aCS`=aCS+5 WHERE `id` = '$game_id'");
        }
    }
} else if ($row['attacker'] == 'Baratheon' && $row['dcard'] == 'Balon') {
    if ($row['acard'] == 'Davos') {
        //select Stannis' condition
        $housetable = $_GET['table'];
        $housetable = mysql_real_escape_string($housetable);
        $query = mysql_query("SELECT HC1 FROM $housetable WHERE `name` = 'Baratheon'");
        $stannis = mysql_fetch_assoc($query);
        if ($stannis['HC1'] == '0') {
            mysql_query("UPDATE `battle` SET `aCS`=aCS+1 WHERE `id` = '$game_id'");
        };
    } else if ($row['acard'] == 'Stannis') {
        //select throne positions
        $result = mysql_query("SELECT throne1, throne2, throne3, throne4, throne5, throne6 FROM game where id=$game_id");
        $game = mysql_fetch_assoc($result);
        for ($l=1; $l<7; $l++) {
            if ($game['throne'.$l] == $row['attacker']) {
                $athrone = $l;
            }
            if ($game['throne'.$l] == $row['defender']) {
                $dthrone = $l;
            }
        }
        if ($athrone > $dthrone) {
            mysql_query("UPDATE `battle` SET `aCS`=aCS+1 WHERE `id` = '$game_id'");
        };
    }
} else if ($row['attacker'] == 'Lannister' && $row['dcard'] != 'Balon') {
    if ($row['acard'] == 'Kevan' || $row['acard'] == 'Tyrion') {
        mysql_query("UPDATE `battle` SET `aCS`=aCS+1 WHERE `id` = '$game_id'");
    } else if ($row['acard'] == 'Jaime' || $row['acard'] == 'Hound') {
        mysql_query("UPDATE `battle` SET `aCS`=aCS+2 WHERE `id` = '$game_id'");
    } else if ($row['acard'] == 'Clegan') {
        mysql_query("UPDATE `battle` SET `aCS`=aCS+3 WHERE `id` = '$game_id'");
    } else if ($row['acard'] == 'Tywin') {
        mysql_query("UPDATE `battle` SET `aCS`=aCS+4 WHERE `id` = '$game_id'");
    }
} else if ($row['attacker'] == 'Stark' && $row['dcard'] != 'Balon') {
    if ($row['acard'] == 'Blackfish' || $row['acard'] == 'Cassel') {
        mysql_query("UPDATE `battle` SET `aCS`=aCS+1 WHERE `id` = '$game_id'");
    } else if ($row['acard'] == 'Umber' || $row['acard'] == 'Bolton') {
        mysql_query("UPDATE `battle` SET `aCS`=aCS+2 WHERE `id` = '$game_id'");
    } else if ($row['acard'] == 'Robb') {
        mysql_query("UPDATE `battle` SET `aCS`=aCS+3 WHERE `id` = '$game_id'");
    } else if ($row['acard'] == 'Eddard') {
        mysql_query("UPDATE `battle` SET `aCS`=aCS+4 WHERE `id` = '$game_id'");
    }
} else if ($row['attacker'] == 'Tyrell' && $row['dcard'] != 'Balon') {
    if ($row['acard'] == 'Margeary' || $row['acard'] == 'Alester') {
        mysql_query("UPDATE `battle` SET `aCS`=aCS+1 WHERE `id` = '$game_id'");
    } else if ($row['acard'] == 'Randyll' || $row['acard'] == 'Garlan') {
        mysql_query("UPDATE `battle` SET `aCS`=aCS+2 WHERE `id` = '$game_id'");
    } else if ($row['acard'] == 'Loras') {
        mysql_query("UPDATE `battle` SET `aCS`=aCS+3 WHERE `id` = '$game_id'");
    } else if ($row['acard'] == 'Mace') {
        mysql_query("UPDATE `battle` SET `aCS`=aCS+4 WHERE `id` = '$game_id'");
    }
} else if ($row['attacker'] == 'Greyjoy') {
    if ($row['acard'] == 'Dagmar' || $row['acard'] == 'Asha') {
        mysql_query("UPDATE `battle` SET `aCS`=aCS+1 WHERE `id` = '$game_id'");
    } else if ($row['acard'] == 'Balon' || $row['acard'] == 'Theon') {
        mysql_query("UPDATE `battle` SET `aCS`=aCS+2 WHERE `id` = '$game_id'");
    } else if ($row['acard'] == 'Victarion') {
        mysql_query("UPDATE `battle` SET `aCS`=aCS+3 WHERE `id` = '$game_id'");
    } else if ($row['acard'] == 'Euron') {
        mysql_query("UPDATE `battle` SET `aCS`=aCS+4 WHERE `id` = '$game_id'");
    }
} else if ($row['attacker'] == 'Martell' && $row['dcard'] != 'Balon') {
    if ($row['acard'] == 'Arianne' || $row['acard'] == 'Nymeria') {
        mysql_query("UPDATE `battle` SET `aCS`=aCS+1 WHERE `id` = '$game_id'");
    } else if ($row['acard'] == 'Darkstar' || $row['acard'] == 'Obara') {
        mysql_query("UPDATE `battle` SET `aCS`=aCS+2 WHERE `id` = '$game_id'");
    } else if ($row['acard'] == 'Hotah') {
        mysql_query("UPDATE `battle` SET `aCS`=aCS+3 WHERE `id` = '$game_id'");
    } else if ($row['acard'] == 'Viper') {
        mysql_query("UPDATE `battle` SET `aCS`=aCS+4 WHERE `id` = '$game_id'");
    }
};

//defender
if ($row['defender'] == 'Baratheon' && $row['acard'] != 'Balon') {
    if ($row['dcard'] == 'Salladhor' || $row['dcard'] == 'Melissandre') {
        mysql_query("UPDATE `battle` SET `dCS`=dCS+1 WHERE `id` = '$game_id'");
    } else if ($row['dcard'] == 'Brienne') {
        mysql_query("UPDATE `battle` SET `dCS`=dCS+2 WHERE `id` = '$game_id'");
    } else if ($row['dcard'] == 'Davos') {
        //select Stannis' condition
        $housetable = $_GET['table'];
        $housetable = mysql_real_escape_string($housetable);
        $query = mysql_query("SELECT HC1 FROM $housetable WHERE `name` = 'Baratheon'");
        $stannis = mysql_fetch_assoc($query);
        if ($stannis['HC1'] == '1') {
            mysql_query("UPDATE `battle` SET `dCS`=dCS+2 WHERE `id` = '$game_id'");
        } else {
            mysql_query("UPDATE `battle` SET `dCS`=dCS+3 WHERE `id` = '$game_id'");
        }
    } else if ($row['dcard'] == 'Renly') {
        mysql_query("UPDATE `battle` SET `dCS`=dCS+3 WHERE `id` = '$game_id'");
    } else if ($row['dcard'] == 'Stannis') {
        //select throne positions
        $result = mysql_query("SELECT throne1, throne2, throne3, throne4, throne5, throne6 FROM game where id=$game_id");
        $game = mysql_fetch_assoc($result);
        for ($l=1; $l<7; $l++) {
            if ($game['throne'.$l] == $row['attacker']) {
                $athrone = $l;
            }
            if ($game['throne'.$l] == $row['defender']) {
                $dthrone = $l;
            }
        }
        if ($athrone > $dthrone) {
            mysql_query("UPDATE `battle` SET `dCS`=dCS+4 WHERE `id` = '$game_id'");
        } else {
            mysql_query("UPDATE `battle` SET `dCS`=dCS+5 WHERE `id` = '$game_id'");
        }
    }
} else if ($row['defender'] == 'Baratheon' && $row['acard'] == 'Balon') {
    if ($row['dcard'] == 'Davos') {
        //select Stannis' condition
        $housetable = $_GET['table'];
        $housetable = mysql_real_escape_string($housetable);
        $query = mysql_query("SELECT HC1 FROM $housetable WHERE `name` = 'Baratheon'");
        $stannis = mysql_fetch_assoc($query);
        if ($stannis['HC1'] == '0') {
            mysql_query("UPDATE `battle` SET `dCS`=dCS+1 WHERE `id` = '$game_id'");
        };
    } else if ($row['dcard'] == 'Stannis') {
        //select throne positions
        $result = mysql_query("SELECT throne1, throne2, throne3, throne4, throne5, throne6 FROM game where id=$game_id");
        $game = mysql_fetch_assoc($result);
        for ($l=1; $l<7; $l++) {
            if ($game['throne'.$l] == $row['attacker']) {
                $athrone = $l;
            }
            if ($game['throne'.$l] == $row['defender']) {
                $dthrone = $l;
            }
        }
        if ($athrone < $dthrone) {
            mysql_query("UPDATE `battle` SET `dCS`=dCS+1 WHERE `id` = '$game_id'");
        };
    }
} else if ($row['defender'] == 'Lannister' && $row['acard'] != 'Balon') {
    if ($row['dcard'] == 'Kevan' || $row['dcard'] == 'Tyrion') {
        mysql_query("UPDATE `battle` SET `dCS`=dCS+1 WHERE `id` = '$game_id'");
    } else if ($row['dcard'] == 'Jaime' || $row['dcard'] == 'Hound') {
        mysql_query("UPDATE `battle` SET `dCS`=dCS+2 WHERE `id` = '$game_id'");
    } else if ($row['dcard'] == 'Clegan') {
        mysql_query("UPDATE `battle` SET `dCS`=dCS+3 WHERE `id` = '$game_id'");
    } else if ($row['dcard'] == 'Tywin') {
        mysql_query("UPDATE `battle` SET `dCS`=dCS+4 WHERE `id` = '$game_id'");
    }
} else if ($row['defender'] == 'Stark' && $row['acard'] != 'Balon') {
    if ($row['dcard'] == 'Blackfish' || $row['dcard'] == 'Cassel') {
        mysql_query("UPDATE `battle` SET `dCS`=dCS+1 WHERE `id` = '$game_id'");
    } else if ($row['dcard'] == 'Umber' || $row['dcard'] == 'Bolton') {
        mysql_query("UPDATE `battle` SET `dCS`=dCS+2 WHERE `id` = '$game_id'");
    } else if ($row['dcard'] == 'Robb') {
        mysql_query("UPDATE `battle` SET `dCS`=dCS+3 WHERE `id` = '$game_id'");
    } else if ($row['dcard'] == 'Eddard') {
        mysql_query("UPDATE `battle` SET `dCS`=dCS+4 WHERE `id` = '$game_id'");
    }
} else if ($row['defender'] == 'Tyrell' && $row['acard'] != 'Balon') {
    if ($row['dcard'] == 'Margeary' || $row['dcard'] == 'Alester') {
        mysql_query("UPDATE `battle` SET `dCS`=dCS+1 WHERE `id` = '$game_id'");
    } else if ($row['dcard'] == 'Randyll' || $row['dcard'] == 'Garlan') {
        mysql_query("UPDATE `battle` SET `dCS`=dCS+2 WHERE `id` = '$game_id'");
    } else if ($row['dcard'] == 'Loras') {
        mysql_query("UPDATE `battle` SET `dCS`=dCS+3 WHERE `id` = '$game_id'");
    } else if ($row['dcard'] == 'Mace') {
        mysql_query("UPDATE `battle` SET `dCS`=dCS+4 WHERE `id` = '$game_id'");
    }
} else if ($row['defender'] == 'Greyjoy') {
    if ($row['dcard'] == 'Dagmar' || $row['dcard'] == 'Asha') {
        mysql_query("UPDATE `battle` SET `dCS`=dCS+1 WHERE `id` = '$game_id'");
    } else if ($row['dcard'] == 'Balon') {
        mysql_query("UPDATE `battle` SET `dCS`=dCS+2 WHERE `id` = '$game_id'");
    } else if ($row['dcard'] == 'Theon') {
        if ($row['castle'] != '0') {
            mysql_query("UPDATE `battle` SET `dCS`=dCS+3 WHERE `id` = '$game_id'");
        } else {
            mysql_query("UPDATE `battle` SET `dCS`=dCS+2 WHERE `id` = '$game_id'");
        }
    } else if ($row['dcard'] == 'Victarion') {
        mysql_query("UPDATE `battle` SET `dCS`=dCS+3 WHERE `id` = '$game_id'");
    } else if ($row['dcard'] == 'Euron') {
        mysql_query("UPDATE `battle` SET `dCS`=dCS+4 WHERE `id` = '$game_id'");
    }
} else if ($row['defender'] == 'Martell' && $row['acard'] != 'Balon') {
    if ($row['dcard'] == 'Arianne' || $row['dcard'] == 'Nymeria') {
        mysql_query("UPDATE `battle` SET `dCS`=dCS+1 WHERE `id` = '$game_id'");
    } else if ($row['dcard'] == 'Darkstar' || $row['dcard'] == 'Obara') {
        mysql_query("UPDATE `battle` SET `dCS`=dCS+2 WHERE `id` = '$game_id'");
    } else if ($row['dcard'] == 'Hotah') {
        mysql_query("UPDATE `battle` SET `dCS`=dCS+3 WHERE `id` = '$game_id'");
    } else if ($row['dcard'] == 'Viper') {
        mysql_query("UPDATE `battle` SET `dCS`=dCS+4 WHERE `id` = '$game_id'");
    }
} //end of defender

//Valyrian Steel Blade phase
mysql_query("UPDATE `battle` SET `1ready`=0 WHERE `id` = '$game_id'");
mysql_query("UPDATE `game` SET faza = 10 WHERE `id` = $game_id");

$result = mysql_query("SELECT fiefdom1, Blade FROM game where id=$game_id");
$fiefdom = mysql_fetch_assoc($result);
if ($fiefdom['Blade'] == '0') {
    if ($fiefdom['fiefdom1'] == $row['attacker']) {
        mysql_query("UPDATE `battle` SET currentplayer = '".$row['attacker']."' WHERE `id` = $game_id");
    } else if ($fiefdom['fiefdom1'] == $row['defender']) {
        mysql_query("UPDATE `battle` SET currentplayer = '".$row['defender']."' WHERE `id` = $game_id");
    }
};
?>