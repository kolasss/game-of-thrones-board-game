<? include 'database.php';
$terr = $_GET['terr'];
$terr = mysql_real_escape_string($terr);
$target = $_GET['target'];
$target = mysql_real_escape_string($target);
$housetable = $_GET['house'];
$housetable = mysql_real_escape_string($housetable);

//update units in target zone, control, castle
mysql_query("UPDATE $terr SET unit1=0, unit2=0, unit3=0 WHERE name = '$target'");

$result = mysql_query("SELECT garrison, token FROM $terr WHERE name = '$target'");
$units = mysql_fetch_assoc($result);

if ($units['garrison'] == '0' && $units['token'] == '0') {
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