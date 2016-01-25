<? include 'database.php';
$user_id = $_GET['user_id'];
$user_id = mysql_real_escape_string($user_id);
$game_id = $_GET['game_id'];
$game_id = mysql_real_escape_string($game_id);
$myhouse = $_GET['myhouse'];
$myhouse = mysql_real_escape_string($myhouse);

//get game_id of last game
$query = mysql_query("SELECT lastgame FROM users WHERE user_id = $user_id");
$user = mysql_fetch_assoc($query);

if($user['lastgame'] != '0') {
    $query = mysql_query("SELECT Stark, Greyjoy, Lannister, Martell, Tyrell, Baratheon, win FROM game WHERE id = ".$user['lastgame']);
    $lastgame = mysql_fetch_assoc($query);

    //delete player from previous game and publish that game in gamelist
    if ($lastgame['win'] == '0') {
        if ($lastgame['Stark'] == $user_id) {
            mysql_query("UPDATE game SET Stark=0 WHERE id=".$user['lastgame']);

            $result = mysql_query("SELECT id FROM gamelist WHERE game=".$user['lastgame']);
            if (mysql_num_rows($result) != '0') {
                mysql_query("UPDATE gamelist SET Stark=0 WHERE game=".$user['lastgame']);
            } else {
                mysql_query("INSERT INTO gamelist SET game=".$user['lastgame'].", Stark=0, Greyjoy=".$lastgame['Greyjoy'].", Lannister=".$lastgame['Lannister'].", Martell=".$lastgame['Martell'].", Tyrell=".$lastgame['Tyrell'].", Baratheon=".$lastgame['Baratheon']);
            };
        } else if ($lastgame['Greyjoy'] == $user_id) {
            mysql_query("UPDATE game SET Greyjoy=0 WHERE id=".$user['lastgame']);

            $result = mysql_query("SELECT id FROM gamelist WHERE game=".$user['lastgame']);
            if (mysql_num_rows($result) != '0') {
                mysql_query("UPDATE gamelist SET Greyjoy=0 WHERE game=".$user['lastgame']);
            } else {
                mysql_query("INSERT INTO gamelist SET game=".$user['lastgame'].", Stark=".$lastgame['Stark'].", Greyjoy=0, Lannister=".$lastgame['Lannister'].", Martell=".$lastgame['Martell'].", Tyrell=".$lastgame['Tyrell'].", Baratheon=".$lastgame['Baratheon']);
            };
        } else if ($lastgame['Lannister'] == $user_id) {
            mysql_query("UPDATE game SET Lannister=0 WHERE id=".$user['lastgame']);

            $result = mysql_query("SELECT id FROM gamelist WHERE game=".$user['lastgame']);
            if (mysql_num_rows($result) != '0') {
                mysql_query("UPDATE gamelist SET Lannister=0 WHERE game=".$user['lastgame']);
            } else {
                mysql_query("INSERT INTO gamelist SET game=".$user['lastgame'].", Stark=".$lastgame['Stark'].", Greyjoy=".$lastgame['Greyjoy'].", Lannister=0, Martell=".$lastgame['Martell'].", Tyrell=".$lastgame['Tyrell'].", Baratheon=".$lastgame['Baratheon']);
            };
        } else if ($lastgame['Martell'] == $user_id) {
            mysql_query("UPDATE game SET Martell=0 WHERE id=".$user['lastgame']);

            $result = mysql_query("SELECT id FROM gamelist WHERE game=".$user['lastgame']);
            if (mysql_num_rows($result) != '0') {
                mysql_query("UPDATE gamelist SET Martell=0 WHERE game=".$user['lastgame']);
            } else {
                mysql_query("INSERT INTO gamelist SET game=".$user['lastgame'].", Stark=".$lastgame['Stark'].", Greyjoy=".$lastgame['Greyjoy'].", Lannister=".$lastgame['Lannister'].", Martell=0, Tyrell=".$lastgame['Tyrell'].", Baratheon=".$lastgame['Baratheon']);
            };
        } else if ($lastgame['Tyrell'] == $user_id) {
            mysql_query("UPDATE game SET Tyrell=0 WHERE id=".$user['lastgame']);

            $result = mysql_query("SELECT id FROM gamelist WHERE game=".$user['lastgame']);
            if (mysql_num_rows($result) != '0') {
                mysql_query("UPDATE gamelist SET Tyrell=0 WHERE game=".$user['lastgame']);
            } else {
                mysql_query("INSERT INTO gamelist SET game=".$user['lastgame'].", Stark=".$lastgame['Stark'].", Greyjoy=".$lastgame['Greyjoy'].", Lannister=".$lastgame['Lannister'].", Martell=".$lastgame['Martell'].", Tyrell=0, Baratheon=".$lastgame['Baratheon']);
            };
        } else if ($lastgame['Baratheon'] == $user_id) {
            mysql_query("UPDATE game SET Baratheon=0 WHERE id=".$user['lastgame']);

            $result = mysql_query("SELECT id FROM gamelist WHERE game=".$user['lastgame']);
            if (mysql_num_rows($result) != '0') {
                mysql_query("UPDATE gamelist SET Baratheon=0 WHERE game=".$user['lastgame']);
            } else {
                mysql_query("INSERT INTO gamelist SET game=".$user['lastgame'].", Stark=".$lastgame['Stark'].", Greyjoy=".$lastgame['Greyjoy'].", Lannister=".$lastgame['Lannister'].", Martell=".$lastgame['Martell'].", Tyrell=".$lastgame['Tyrell'].", Baratheon=0");
            };
        };
    }
};

//запись id игрока в новую игру
mysql_query("UPDATE game SET $myhouse=$user_id WHERE id=$game_id");

//обновление записи игрока
mysql_query("UPDATE users SET lastgame=$game_id WHERE user_id=$user_id");

//обновление списка игр
$result = mysql_query("SELECT Stark, Greyjoy, Lannister, Martell, Tyrell, Baratheon FROM gamelist WHERE game=$game_id");
$list = mysql_fetch_assoc($result);

if ($myhouse == 'Stark') {
    if ($list['Greyjoy'] != '0' && $list['Lannister'] != '0' && $list['Martell'] != '0' && $list['Tyrell'] != '0' && $list['Baratheon'] != '0') {
        mysql_query("DELETE FROM gamelist WHERE game=$game_id");
    } else {
        mysql_query("UPDATE gamelist SET Stark=$user_id WHERE game=$game_id");
    };
} else if ($myhouse == 'Greyjoy') {
    if ($list['Stark'] != '0' && $list['Lannister'] != '0' && $list['Martell'] != '0' && $list['Tyrell'] != '0' && $list['Baratheon'] != '0') {
        mysql_query("DELETE FROM gamelist WHERE game=$game_id");
    } else {
        mysql_query("UPDATE gamelist SET Greyjoy=$user_id WHERE game=$game_id");
    };
} else if ($myhouse == 'Lannister') {
    if ($list['Greyjoy'] != '0' && $list['Stark'] != '0' && $list['Martell'] != '0' && $list['Tyrell'] != '0' && $list['Baratheon'] != '0') {
        mysql_query("DELETE FROM gamelist WHERE game=$game_id");
    } else {
        mysql_query("UPDATE gamelist SET Lannister=$user_id WHERE game=$game_id");
    };
} else if ($myhouse == 'Martell') {
    if ($list['Greyjoy'] != '0' && $list['Lannister'] != '0' && $list['Stark'] != '0' && $list['Tyrell'] != '0' && $list['Baratheon'] != '0') {
        mysql_query("DELETE FROM gamelist WHERE game=$game_id");
    } else {
        mysql_query("UPDATE gamelist SET Martell=$user_id WHERE game=$game_id");
    };
} else if ($myhouse == 'Tyrell') {
    if ($list['Greyjoy'] != '0' && $list['Lannister'] != '0' && $list['Martell'] != '0' && $list['Stark'] != '0' && $list['Baratheon'] != '0') {
        mysql_query("DELETE FROM gamelist WHERE game=$game_id");
    } else {
        mysql_query("UPDATE gamelist SET Tyrell=$user_id WHERE game=$game_id");
    };
} else if ($myhouse == 'Baratheon') {
    if ($list['Greyjoy'] != '0' && $list['Lannister'] != '0' && $list['Martell'] != '0' && $list['Tyrell'] != '0' && $list['Stark'] != '0') {
        mysql_query("DELETE FROM gamelist WHERE game=$game_id");
    } else {
        mysql_query("UPDATE gamelist SET Baratheon=$user_id WHERE game=$game_id");
    };
};

?>