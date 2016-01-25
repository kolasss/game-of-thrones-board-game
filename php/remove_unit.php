<? include 'database.php';
$terr = $_GET['terr'];
$terr = mysql_real_escape_string($terr);
$target = $_GET['target'];
$target = mysql_real_escape_string($target);
$targetunit = $_GET['targetunit'];
$targetunit = mysql_real_escape_string($targetunit);
$housetable = $_GET['house'];
$housetable = mysql_real_escape_string($housetable);

//update units in target zone
mysql_query("UPDATE $terr SET $targetunit='0' WHERE name = '$target'");

$result = mysql_query("SELECT unit1, unit2, unit3, unit4 FROM $terr WHERE name = '$target'");
$units = mysql_fetch_assoc($result);
rsort($units);
mysql_query("UPDATE $terr SET unit1='$units[0]', unit2='$units[1]', unit3='$units[2]', unit4='$units[3]' WHERE `name` = '$target'");

$result = mysql_query("SELECT unit1, unit2, unit3, unit4, garrison, token, control, castle FROM $terr WHERE name = '$target'");
$units = mysql_fetch_assoc($result);

echo json_encode($units);

if ($units['unit1'] == '0' && $units['garrison'] == '0' && $units['token'] == '0') {
    if ($target == 'Winterfell') {
        if ($units['control'] != 'S') {
            mysql_query("UPDATE $terr SET control='S' WHERE name = 'Winterfell'");
            mysql_query("UPDATE $housetable SET `zamki` = zamki+1 WHERE name='Stark'");
            if ($units['control'] == 'G') {
                mysql_query("UPDATE $housetable SET `zamki` = zamki-1 WHERE name='Greyjoy'");
            } else if ($units['control'] == 'L') {
                mysql_query("UPDATE $housetable SET `zamki` = zamki-1 WHERE name='Lannister'");
            } else if ($units['control'] == 'B') {
                mysql_query("UPDATE $housetable SET `zamki` = zamki-1 WHERE name='Baratheon'");
            } else if ($units['control'] == 'T') {
                mysql_query("UPDATE $housetable SET `zamki` = zamki-1 WHERE name='Tyrell'");
            } else if ($units['control'] == 'M') {
                mysql_query("UPDATE $housetable SET `zamki` = zamki-1 WHERE name='Martell'");
            };
        }
    } else if ($target == 'Pyke') {
        if ($units['control'] != 'G') {
            mysql_query("UPDATE $terr SET control='G' WHERE name = 'Pyke'");
            mysql_query("UPDATE $housetable SET `zamki` = zamki+1 WHERE name='Greyjoy'");
            if ($units['control'] == 'S') {
                mysql_query("UPDATE $housetable SET `zamki` = zamki-1 WHERE name='Stark'");
            } else if ($units['control'] == 'L') {
                mysql_query("UPDATE $housetable SET `zamki` = zamki-1 WHERE name='Lannister'");
            } else if ($units['control'] == 'B') {
                mysql_query("UPDATE $housetable SET `zamki` = zamki-1 WHERE name='Baratheon'");
            } else if ($units['control'] == 'T') {
                mysql_query("UPDATE $housetable SET `zamki` = zamki-1 WHERE name='Tyrell'");
            } else if ($units['control'] == 'M') {
                mysql_query("UPDATE $housetable SET `zamki` = zamki-1 WHERE name='Martell'");
            };
        }
    } else if ($target == 'Dragonstone') {
        if ($units['control'] != 'B') {
            mysql_query("UPDATE $terr SET control='B' WHERE name = 'Dragonstone'");
            mysql_query("UPDATE $housetable SET `zamki` = zamki+1 WHERE name='Baratheon'");
            if ($units['control'] == 'G') {
                mysql_query("UPDATE $housetable SET `zamki` = zamki-1 WHERE name='Greyjoy'");
            } else if ($units['control'] == 'L') {
                mysql_query("UPDATE $housetable SET `zamki` = zamki-1 WHERE name='Lannister'");
            } else if ($units['control'] == 'S') {
                mysql_query("UPDATE $housetable SET `zamki` = zamki-1 WHERE name='Stark'");
            } else if ($units['control'] == 'T') {
                mysql_query("UPDATE $housetable SET `zamki` = zamki-1 WHERE name='Tyrell'");
            } else if ($units['control'] == 'M') {
                mysql_query("UPDATE $housetable SET `zamki` = zamki-1 WHERE name='Martell'");
            };
        }
    } else if ($target == 'Lannisport') {
        if ($units['control'] != 'L') {
            mysql_query("UPDATE $terr SET control='L' WHERE name = 'Lannisport'");
            mysql_query("UPDATE $housetable SET `zamki` = zamki+1 WHERE name='Lannister'");
            if ($units['control'] == 'G') {
                mysql_query("UPDATE $housetable SET `zamki` = zamki-1 WHERE name='Greyjoy'");
            } else if ($units['control'] == 'S') {
                mysql_query("UPDATE $housetable SET `zamki` = zamki-1 WHERE name='Stark'");
            } else if ($units['control'] == 'B') {
                mysql_query("UPDATE $housetable SET `zamki` = zamki-1 WHERE name='Baratheon'");
            } else if ($units['control'] == 'T') {
                mysql_query("UPDATE $housetable SET `zamki` = zamki-1 WHERE name='Tyrell'");
            } else if ($units['control'] == 'M') {
                mysql_query("UPDATE $housetable SET `zamki` = zamki-1 WHERE name='Martell'");
            };
        }
    } else if ($target == 'Highgarden') {
        if ($units['control'] != 'T') {
            mysql_query("UPDATE $terr SET control='T' WHERE name = 'Highgarden'");
            mysql_query("UPDATE $housetable SET `zamki` = zamki+1 WHERE name='Tyrell'");
            if ($units['control'] == 'G') {
                mysql_query("UPDATE $housetable SET `zamki` = zamki-1 WHERE name='Greyjoy'");
            } else if ($units['control'] == 'L') {
                mysql_query("UPDATE $housetable SET `zamki` = zamki-1 WHERE name='Lannister'");
            } else if ($units['control'] == 'B') {
                mysql_query("UPDATE $housetable SET `zamki` = zamki-1 WHERE name='Baratheon'");
            } else if ($units['control'] == 'S') {
                mysql_query("UPDATE $housetable SET `zamki` = zamki-1 WHERE name='Stark'");
            } else if ($units['control'] == 'M') {
                mysql_query("UPDATE $housetable SET `zamki` = zamki-1 WHERE name='Martell'");
            };
        }
    } else if ($target == 'Sunspear') {
        if ($units['control'] != 'M') {
            mysql_query("UPDATE $terr SET control='M' WHERE name = 'Sunspear'");
            mysql_query("UPDATE $housetable SET `zamki` = zamki+1 WHERE name='Martell'");
            if ($units['control'] == 'G') {
                mysql_query("UPDATE $housetable SET `zamki` = zamki-1 WHERE name='Greyjoy'");
            } else if ($units['control'] == 'L') {
                mysql_query("UPDATE $housetable SET `zamki` = zamki-1 WHERE name='Lannister'");
            } else if ($units['control'] == 'B') {
                mysql_query("UPDATE $housetable SET `zamki` = zamki-1 WHERE name='Baratheon'");
            } else if ($units['control'] == 'T') {
                mysql_query("UPDATE $housetable SET `zamki` = zamki-1 WHERE name='Tyrell'");
            } else if ($units['control'] == 'S') {
                mysql_query("UPDATE $housetable SET `zamki` = zamki-1 WHERE name='Stark'");
            };
        }
    } else {
        mysql_query("UPDATE $terr SET control = '0' WHERE `name` = '$target'");
        if ($units['castle'] > 0) {
            if ($units['control'] == 'G') {
                mysql_query("UPDATE $housetable SET `zamki` = zamki-1 WHERE name='Greyjoy'");
            } else if ($units['control'] == 'L') {
                mysql_query("UPDATE $housetable SET `zamki` = zamki-1 WHERE name='Lannister'");
            } else if ($units['control'] == 'B') {
                mysql_query("UPDATE $housetable SET `zamki` = zamki-1 WHERE name='Baratheon'");
            } else if ($units['control'] == 'T') {
                mysql_query("UPDATE $housetable SET `zamki` = zamki-1 WHERE name='Tyrell'");
            } else if ($units['control'] == 'S') {
                mysql_query("UPDATE $housetable SET `zamki` = zamki-1 WHERE name='Stark'");
            } else if ($units['control'] == 'M') {
                mysql_query("UPDATE $housetable SET `zamki` = zamki-1 WHERE name='Martell'");
            };
        }
    };
}