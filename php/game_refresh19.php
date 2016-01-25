<? include 'database.php';
$id = $_GET['id'];
$id = mysql_real_escape_string($id);
$house = $_GET['house'];
$house = mysql_real_escape_string($house);

//получение данных игры
$result = mysql_query("SELECT faza, WildCard1, currentplayer FROM game WHERE id=$id");
$row = mysql_fetch_assoc($result);

$result = mysql_query("SELECT defender, dsup1, dsup2, dsup3, dsup4, dsup5, winner, asup1, asup2, asup3, asup4, asup5 FROM battle WHERE id=$id");
$row2 = mysql_fetch_assoc($result);
$row2 = $row2 + $row;

if ($row['currentplayer'] > 0) {
    $result = mysql_query("SELECT throne1, throne2, throne3, throne4, throne5, throne6 FROM game WHERE id=$id");
    $throne = mysql_fetch_assoc($result);

    if ($row2['dsup5'] == $throne['throne1']) {
        if ($row2['defender'] == $throne['throne2']) {
            if ($row['currentplayer'] == 1) {
                $row2['currentplayer'] = $throne['throne3'];
            } else if ($row['currentplayer'] == 2) {
                $row2['currentplayer'] = $throne['throne4'];
            } else if ($row['currentplayer'] == 3) {
                $row2['currentplayer'] = $throne['throne5'];
            } else if ($row['currentplayer'] == 4) {
                $row2['currentplayer'] = $throne['throne6'];
            };
        } else if ($row2['defender'] == $throne['throne3']) {
            if ($row['currentplayer'] == 1) {
                $row2['currentplayer'] = $throne['throne2'];
            } else if ($row['currentplayer'] == 2) {
                $row2['currentplayer'] = $throne['throne4'];
            } else if ($row['currentplayer'] == 3) {
                $row2['currentplayer'] = $throne['throne5'];
            } else if ($row['currentplayer'] == 4) {
                $row2['currentplayer'] = $throne['throne6'];
            };
        } else if ($row2['defender'] == $throne['throne4']) {
            if ($row['currentplayer'] == 1) {
                $row2['currentplayer'] = $throne['throne2'];
            } else if ($row['currentplayer'] == 2) {
                $row2['currentplayer'] = $throne['throne3'];
            } else if ($row['currentplayer'] == 3) {
                $row2['currentplayer'] = $throne['throne5'];
            } else if ($row['currentplayer'] == 4) {
                $row2['currentplayer'] = $throne['throne6'];
            };
        } else if ($row2['defender'] == $throne['throne5']) {
            if ($row['currentplayer'] == 1) {
                $row2['currentplayer'] = $throne['throne2'];
            } else if ($row['currentplayer'] == 2) {
                $row2['currentplayer'] = $throne['throne3'];
            } else if ($row['currentplayer'] == 3) {
                $row2['currentplayer'] = $throne['throne4'];
            } else if ($row['currentplayer'] == 4) {
                $row2['currentplayer'] = $throne['throne6'];
            };
        } else if ($row2['defender'] == $throne['throne6']) {
            if ($row['currentplayer'] == 1) {
                $row2['currentplayer'] = $throne['throne2'];
            } else if ($row['currentplayer'] == 2) {
                $row2['currentplayer'] = $throne['throne3'];
            } else if ($row['currentplayer'] == 3) {
                $row2['currentplayer'] = $throne['throne4'];
            } else if ($row['currentplayer'] == 4) {
                $row2['currentplayer'] = $throne['throne5'];
            };
        };

    } else if ($row2['dsup5'] == $throne['throne2']) {
        if ($row2['defender'] == $throne['throne1']) {
            if ($row['currentplayer'] == 1) {
                $row2['currentplayer'] = $throne['throne3'];
            } else if ($row['currentplayer'] == 2) {
                $row2['currentplayer'] = $throne['throne4'];
            } else if ($row['currentplayer'] == 3) {
                $row2['currentplayer'] = $throne['throne5'];
            } else if ($row['currentplayer'] == 4) {
                $row2['currentplayer'] = $throne['throne6'];
            };
        } else if ($row2['defender'] == $throne['throne3']) {
            if ($row['currentplayer'] == 1) {
                $row2['currentplayer'] = $throne['throne1'];
            } else if ($row['currentplayer'] == 2) {
                $row2['currentplayer'] = $throne['throne4'];
            } else if ($row['currentplayer'] == 3) {
                $row2['currentplayer'] = $throne['throne5'];
            } else if ($row['currentplayer'] == 4) {
                $row2['currentplayer'] = $throne['throne6'];
            };
        } else if ($row2['defender'] == $throne['throne4']) {
            if ($row['currentplayer'] == 1) {
                $row2['currentplayer'] = $throne['throne1'];
            } else if ($row['currentplayer'] == 2) {
                $row2['currentplayer'] = $throne['throne3'];
            } else if ($row['currentplayer'] == 3) {
                $row2['currentplayer'] = $throne['throne5'];
            } else if ($row['currentplayer'] == 4) {
                $row2['currentplayer'] = $throne['throne6'];
            };
        } else if ($row2['defender'] == $throne['throne5']) {
            if ($row['currentplayer'] == 1) {
                $row2['currentplayer'] = $throne['throne1'];
            } else if ($row['currentplayer'] == 2) {
                $row2['currentplayer'] = $throne['throne3'];
            } else if ($row['currentplayer'] == 3) {
                $row2['currentplayer'] = $throne['throne4'];
            } else if ($row['currentplayer'] == 4) {
                $row2['currentplayer'] = $throne['throne6'];
            };
        } else if ($row2['defender'] == $throne['throne6']) {
            if ($row['currentplayer'] == 1) {
                $row2['currentplayer'] = $throne['throne1'];
            } else if ($row['currentplayer'] == 2) {
                $row2['currentplayer'] = $throne['throne3'];
            } else if ($row['currentplayer'] == 3) {
                $row2['currentplayer'] = $throne['throne4'];
            } else if ($row['currentplayer'] == 4) {
                $row2['currentplayer'] = $throne['throne5'];
            };
        };

    } else if ($row2['dsup5'] == $throne['throne3']) {
        if ($row2['defender'] == $throne['throne1']) {
            if ($row['currentplayer'] == 1) {
                $row2['currentplayer'] = $throne['throne2'];
            } else if ($row['currentplayer'] == 2) {
                $row2['currentplayer'] = $throne['throne4'];
            } else if ($row['currentplayer'] == 3) {
                $row2['currentplayer'] = $throne['throne5'];
            } else if ($row['currentplayer'] == 4) {
                $row2['currentplayer'] = $throne['throne6'];
            };
        } else if ($row2['defender'] == $throne['throne2']) {
            if ($row['currentplayer'] == 1) {
                $row2['currentplayer'] = $throne['throne1'];
            } else if ($row['currentplayer'] == 2) {
                $row2['currentplayer'] = $throne['throne4'];
            } else if ($row['currentplayer'] == 3) {
                $row2['currentplayer'] = $throne['throne5'];
            } else if ($row['currentplayer'] == 4) {
                $row2['currentplayer'] = $throne['throne6'];
            };
        } else if ($row2['defender'] == $throne['throne4']) {
            if ($row['currentplayer'] == 1) {
                $row2['currentplayer'] = $throne['throne1'];
            } else if ($row['currentplayer'] == 2) {
                $row2['currentplayer'] = $throne['throne2'];
            } else if ($row['currentplayer'] == 3) {
                $row2['currentplayer'] = $throne['throne5'];
            } else if ($row['currentplayer'] == 4) {
                $row2['currentplayer'] = $throne['throne6'];
            };
        } else if ($row2['defender'] == $throne['throne5']) {
            if ($row['currentplayer'] == 1) {
                $row2['currentplayer'] = $throne['throne1'];
            } else if ($row['currentplayer'] == 2) {
                $row2['currentplayer'] = $throne['throne2'];
            } else if ($row['currentplayer'] == 3) {
                $row2['currentplayer'] = $throne['throne4'];
            } else if ($row['currentplayer'] == 4) {
                $row2['currentplayer'] = $throne['throne6'];
            };
        } else if ($row2['defender'] == $throne['throne6']) {
            if ($row['currentplayer'] == 1) {
                $row2['currentplayer'] = $throne['throne1'];
            } else if ($row['currentplayer'] == 2) {
                $row2['currentplayer'] = $throne['throne2'];
            } else if ($row['currentplayer'] == 3) {
                $row2['currentplayer'] = $throne['throne4'];
            } else if ($row['currentplayer'] == 4) {
                $row2['currentplayer'] = $throne['throne5'];
            };
        };

    } else if ($row2['dsup5'] == $throne['throne4']) {
        if ($row2['defender'] == $throne['throne1']) {
            if ($row['currentplayer'] == 1) {
                $row2['currentplayer'] = $throne['throne2'];
            } else if ($row['currentplayer'] == 2) {
                $row2['currentplayer'] = $throne['throne3'];
            } else if ($row['currentplayer'] == 3) {
                $row2['currentplayer'] = $throne['throne5'];
            } else if ($row['currentplayer'] == 4) {
                $row2['currentplayer'] = $throne['throne6'];
            };
        } else if ($row2['defender'] == $throne['throne2']) {
            if ($row['currentplayer'] == 1) {
                $row2['currentplayer'] = $throne['throne1'];
            } else if ($row['currentplayer'] == 2) {
                $row2['currentplayer'] = $throne['throne3'];
            } else if ($row['currentplayer'] == 3) {
                $row2['currentplayer'] = $throne['throne5'];
            } else if ($row['currentplayer'] == 4) {
                $row2['currentplayer'] = $throne['throne6'];
            };
        } else if ($row2['defender'] == $throne['throne3']) {
            if ($row['currentplayer'] == 1) {
                $row2['currentplayer'] = $throne['throne1'];
            } else if ($row['currentplayer'] == 2) {
                $row2['currentplayer'] = $throne['throne2'];
            } else if ($row['currentplayer'] == 3) {
                $row2['currentplayer'] = $throne['throne5'];
            } else if ($row['currentplayer'] == 4) {
                $row2['currentplayer'] = $throne['throne6'];
            };
        } else if ($row2['defender'] == $throne['throne5']) {
            if ($row['currentplayer'] == 1) {
                $row2['currentplayer'] = $throne['throne1'];
            } else if ($row['currentplayer'] == 2) {
                $row2['currentplayer'] = $throne['throne2'];
            } else if ($row['currentplayer'] == 3) {
                $row2['currentplayer'] = $throne['throne3'];
            } else if ($row['currentplayer'] == 4) {
                $row2['currentplayer'] = $throne['throne6'];
            };
        } else if ($row2['defender'] == $throne['throne6']) {
            if ($row['currentplayer'] == 1) {
                $row2['currentplayer'] = $throne['throne1'];
            } else if ($row['currentplayer'] == 2) {
                $row2['currentplayer'] = $throne['throne2'];
            } else if ($row['currentplayer'] == 3) {
                $row2['currentplayer'] = $throne['throne3'];
            } else if ($row['currentplayer'] == 4) {
                $row2['currentplayer'] = $throne['throne5'];
            };
        };

    } else if ($row2['dsup5'] == $throne['throne5']) {
        if ($row2['defender'] == $throne['throne1']) {
            if ($row['currentplayer'] == 1) {
                $row2['currentplayer'] = $throne['throne2'];
            } else if ($row['currentplayer'] == 2) {
                $row2['currentplayer'] = $throne['throne3'];
            } else if ($row['currentplayer'] == 3) {
                $row2['currentplayer'] = $throne['throne4'];
            } else if ($row['currentplayer'] == 4) {
                $row2['currentplayer'] = $throne['throne6'];
            };
        } else if ($row2['defender'] == $throne['throne2']) {
            if ($row['currentplayer'] == 1) {
                $row2['currentplayer'] = $throne['throne1'];
            } else if ($row['currentplayer'] == 2) {
                $row2['currentplayer'] = $throne['throne3'];
            } else if ($row['currentplayer'] == 3) {
                $row2['currentplayer'] = $throne['throne4'];
            } else if ($row['currentplayer'] == 4) {
                $row2['currentplayer'] = $throne['throne6'];
            };
        } else if ($row2['defender'] == $throne['throne3']) {
            if ($row['currentplayer'] == 1) {
                $row2['currentplayer'] = $throne['throne1'];
            } else if ($row['currentplayer'] == 2) {
                $row2['currentplayer'] = $throne['throne2'];
            } else if ($row['currentplayer'] == 3) {
                $row2['currentplayer'] = $throne['throne4'];
            } else if ($row['currentplayer'] == 4) {
                $row2['currentplayer'] = $throne['throne6'];
            };
        } else if ($row2['defender'] == $throne['throne4']) {
            if ($row['currentplayer'] == 1) {
                $row2['currentplayer'] = $throne['throne1'];
            } else if ($row['currentplayer'] == 2) {
                $row2['currentplayer'] = $throne['throne2'];
            } else if ($row['currentplayer'] == 3) {
                $row2['currentplayer'] = $throne['throne3'];
            } else if ($row['currentplayer'] == 4) {
                $row2['currentplayer'] = $throne['throne6'];
            };
        } else if ($row2['defender'] == $throne['throne6']) {
            if ($row['currentplayer'] == 1) {
                $row2['currentplayer'] = $throne['throne1'];
            } else if ($row['currentplayer'] == 2) {
                $row2['currentplayer'] = $throne['throne2'];
            } else if ($row['currentplayer'] == 3) {
                $row2['currentplayer'] = $throne['throne3'];
            } else if ($row['currentplayer'] == 4) {
                $row2['currentplayer'] = $throne['throne4'];
            };
        };

    } else if ($row2['dsup5'] == $throne['throne6']) {
        if ($row2['defender'] == $throne['throne1']) {
            if ($row['currentplayer'] == 1) {
                $row2['currentplayer'] = $throne['throne2'];
            } else if ($row['currentplayer'] == 2) {
                $row2['currentplayer'] = $throne['throne3'];
            } else if ($row['currentplayer'] == 3) {
                $row2['currentplayer'] = $throne['throne4'];
            } else if ($row['currentplayer'] == 4) {
                $row2['currentplayer'] = $throne['throne5'];
            };
        } else if ($row2['defender'] == $throne['throne2']) {
            if ($row['currentplayer'] == 1) {
                $row2['currentplayer'] = $throne['throne1'];
            } else if ($row['currentplayer'] == 2) {
                $row2['currentplayer'] = $throne['throne3'];
            } else if ($row['currentplayer'] == 3) {
                $row2['currentplayer'] = $throne['throne4'];
            } else if ($row['currentplayer'] == 4) {
                $row2['currentplayer'] = $throne['throne5'];
            };
        } else if ($row2['defender'] == $throne['throne3']) {
            if ($row['currentplayer'] == 1) {
                $row2['currentplayer'] = $throne['throne1'];
            } else if ($row['currentplayer'] == 2) {
                $row2['currentplayer'] = $throne['throne2'];
            } else if ($row['currentplayer'] == 3) {
                $row2['currentplayer'] = $throne['throne4'];
            } else if ($row['currentplayer'] == 4) {
                $row2['currentplayer'] = $throne['throne5'];
            };
        } else if ($row2['defender'] == $throne['throne4']) {
            if ($row['currentplayer'] == 1) {
                $row2['currentplayer'] = $throne['throne1'];
            } else if ($row['currentplayer'] == 2) {
                $row2['currentplayer'] = $throne['throne2'];
            } else if ($row['currentplayer'] == 3) {
                $row2['currentplayer'] = $throne['throne3'];
            } else if ($row['currentplayer'] == 4) {
                $row2['currentplayer'] = $throne['throne5'];
            };
        } else if ($row2['defender'] == $throne['throne5']) {
            if ($row['currentplayer'] == 1) {
                $row2['currentplayer'] = $throne['throne1'];
            } else if ($row['currentplayer'] == 2) {
                $row2['currentplayer'] = $throne['throne2'];
            } else if ($row['currentplayer'] == 3) {
                $row2['currentplayer'] = $throne['throne3'];
            } else if ($row['currentplayer'] == 4) {
                $row2['currentplayer'] = $throne['throne4'];
            };
        };
    };
};

if ($row['WildCard1'] == 4) {
    $result = mysql_query("SELECT court1, court2, court3, court4, court5, court6, throne1, throne2, throne3, throne4, throne5, throne6, fiefdom1, fiefdom2, fiefdom3, fiefdom4, fiefdom5, fiefdom6 FROM game WHERE id=$id");
    $game = mysql_fetch_assoc($result);
    $row2 = $row2 + $game;
};

echo json_encode($row2);
?>