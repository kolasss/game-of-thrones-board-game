<? include 'database.php';
$house = $_GET['house'];
$house = mysql_real_escape_string($house);
$game_id = $_GET['id'];
$game_id = mysql_real_escape_string($game_id);
$bid1 = $_GET['bid1'];
$bid1 = mysql_real_escape_string($bid1);
$bid2 = $_GET['bid2'];
$bid2 = mysql_real_escape_string($bid2);
$bid3 = $_GET['bid3'];
$bid3 = mysql_real_escape_string($bid3);
$bid4 = $_GET['bid4'];
$bid4 = mysql_real_escape_string($bid4);
$bid5 = $_GET['bid5'];
$bid5 = mysql_real_escape_string($bid5);
$bid6 = $_GET['bid6'];
$bid6 = mysql_real_escape_string($bid6);

mysql_query("UPDATE `game` SET faza=17 WHERE `id` = $game_id");

//place houses in order of there bids
mysql_query("UPDATE `battle` SET dsup1='$bid1', dsup2='$bid2', dsup3='$bid3', dsup4='$bid4', dsup5='$bid5', dsup6='$bid6' WHERE `id` = $game_id");

//determine winner
$result = mysql_query("SELECT WildPower, WildCard1 FROM game WHERE id = $game_id");
$WP = mysql_fetch_assoc($result);

$result = mysql_query("SELECT name, bid FROM $house");

while ($array = mysql_fetch_assoc($result))
{
    $row2[$array['name']] = $array['bid'];
};

$HP = $row2['Stark'] + $row2['Baratheon'] + $row2['Greyjoy'] + $row2['Lannister'] + $row2['Martell'] + $row2['Tyrell'];

if ($HP >= $WP['WildPower']*2) {
    mysql_query("UPDATE `battle` SET winner='Watch' WHERE `id` = $game_id");
    $winner = 'Watch';
} else {
    mysql_query("UPDATE `battle` SET winner='Wildlings' WHERE `id` = $game_id");
    $winner = 'Wildlings';
};

//minus power tokens
mysql_query("UPDATE `$house` SET `ready` = 0, tokih = tokih -".$row2['Stark']." WHERE `name` = 'Stark'");
mysql_query("UPDATE `$house` SET `ready` = 0, tokih = tokih -".$row2['Baratheon']." WHERE `name` = 'Baratheon'");
mysql_query("UPDATE `$house` SET `ready` = 0, tokih = tokih -".$row2['Greyjoy']." WHERE `name` = 'Greyjoy'");
mysql_query("UPDATE `$house` SET `ready` = 0, tokih = tokih -".$row2['Lannister']." WHERE `name` = 'Lannister'");
mysql_query("UPDATE `$house` SET `ready` = 0, tokih = tokih -".$row2['Martell']." WHERE `name` = 'Martell'");
mysql_query("UPDATE `$house` SET `ready` = 0, tokih = tokih -".$row2['Tyrell']." WHERE `name` = 'Tyrell'");

$bids[0] = $row2[$bid1];
$bids[1] = $row2[$bid2];
$bids[2] = $row2[$bid3];
$bids[3] = $row2[$bid4];
$bids[4] = $row2[$bid5];
$bids[5] = $row2[$bid6];

mysql_query("UPDATE `battle` SET asup1='$bids[0]', asup2='$bids[1]', asup3='$bids[2]', asup4='$bids[3]', asup5='$bids[4]', asup6='$bids[5]' WHERE `id` = $game_id");

//consequences of WA
if ($winner == 'Watch') {
    if ($WP['WildCard1'] == 1) {//Silence at the Wall
        mysql_query("UPDATE `game` SET WildPower=0, WildCard1=WildCard2, WildCard2=WildCard3, WildCard3=WildCard4, WildCard4=WildCard5, WildCard5=WildCard6, WildCard6=WildCard7, WildCard7=WildCard8, WildCard8=WildCard9 WHERE `id` = $game_id");

        include 'end_wild.php';
    } else if ($WP['WildCard1'] == 5) {//Rattleshirts Raiders
        $result = mysql_query("SELECT bochki FROM $house WHERE `name` = '$bid1'");
        $bochka = mysql_fetch_assoc($result);
        if ($bochka['bochki'] < 6) {
            mysql_query("UPDATE $house SET bochki = bochki+1 WHERE `name` = '$bid1'");
        }
        mysql_query("UPDATE `game` SET WildPower=0, WildCard1=WildCard2, WildCard2=WildCard3, WildCard3=WildCard4, WildCard4=WildCard5, WildCard5=WildCard6, WildCard6=WildCard7, WildCard7=WildCard8, WildCard8=WildCard9 WHERE `id` = $game_id");

        include 'end_wild.php';
    } else if ($WP['WildCard1'] == 7) {//Skinchanger Scout
        mysql_query("UPDATE $house SET tokih = tokih +".$row2[$bid1]." WHERE `name` = '$bid1'");
        mysql_query("UPDATE `game` SET WildPower=0, WildCard1=WildCard2, WildCard2=WildCard3, WildCard3=WildCard4, WildCard4=WildCard5, WildCard5=WildCard6, WildCard6=WildCard7, WildCard7=WildCard8, WildCard8=WildCard9 WHERE `id` = $game_id");

        include 'end_wild.php';
    } else if ($WP['WildCard1'] == 6) {//Preemptive Raid
        mysql_query("UPDATE `battle` SET defender='$bid1' WHERE `id` = $game_id");

    } else if ($WP['WildCard1'] == 8) {//Massing on the Milkwater
        mysql_query("UPDATE $house SET HC1=1, HC2=1, HC3=1, HC4=1, HC5=1, HC6=1, HC7=1 WHERE `name` = '$bid1'");
        mysql_query("UPDATE `game` SET WildPower=0, WildCard1=WildCard2, WildCard2=WildCard3, WildCard3=WildCard4, WildCard4=WildCard5, WildCard5=WildCard6, WildCard6=WildCard7, WildCard7=WildCard8, WildCard8=WildCard9 WHERE `id` = $game_id");

        include 'end_wild.php';
    }
} else {//winner == Wildlings
    if ($WP['WildCard1'] == 1) {//Silence at the Wall
        $WPower = $WP['WildPower'] - 2;
        if ($WPower < 0) {$WPower = 0;};

        mysql_query("UPDATE `game` SET WildPower='$WPower', WildCard1=WildCard2, WildCard2=WildCard3, WildCard3=WildCard4, WildCard4=WildCard5, WildCard5=WildCard6, WildCard6=WildCard7, WildCard7=WildCard8, WildCard8=WildCard9 WHERE `id` = $game_id");

        include 'end_wild.php';
    } else if ($WP['WildCard1'] == 5) {//Rattleshirts Raiders
        $result = mysql_query("SELECT name, bochki FROM $house");
        while ($array = mysql_fetch_assoc($result))
        {
            $bochki[$array['name']] = $array['bochki'];
        };
        //lowest bidder
        if (($bochki['$bid6']-2) < 0 ) {
            mysql_query("UPDATE $house SET bochki = 0 WHERE `name` = '$bid6'");
        } else {
            mysql_query("UPDATE $house SET bochki = bochki-2 WHERE `name` = '$bid6'");
        };
        //everyone else
        if (($bochki['$bid1']-1) < 0 ) {
            mysql_query("UPDATE $house SET bochki = 0 WHERE `name` = '$bid1'");
        } else {
            mysql_query("UPDATE $house SET bochki = bochki-1 WHERE `name` = '$bid1'");
        };
        if (($bochki['$bid2']-1) < 0 ) {
            mysql_query("UPDATE $house SET bochki = 0 WHERE `name` = '$bid2'");
        } else {
            mysql_query("UPDATE $house SET bochki = bochki-1 WHERE `name` = '$bid2'");
        };
        if (($bochki['$bid3']-1) < 0 ) {
            mysql_query("UPDATE $house SET bochki = 0 WHERE `name` = '$bid3'");
        } else {
            mysql_query("UPDATE $house SET bochki = bochki-1 WHERE `name` = '$bid3'");
        };
        if (($bochki['$bid4']-1) < 0 ) {
            mysql_query("UPDATE $house SET bochki = 0 WHERE `name` = '$bid4'");
        } else {
            mysql_query("UPDATE $house SET bochki = bochki-1 WHERE `name` = '$bid4'");
        };
        if (($bochki['$bid5']-1) < 0 ) {
            mysql_query("UPDATE $house SET bochki = 0 WHERE `name` = '$bid5'");
        } else {
            mysql_query("UPDATE $house SET bochki = bochki-1 WHERE `name` = '$bid5'");
        };
        $WPower = $WP['WildPower'] - 2;
        if ($WPower < 0) {$WPower = 0;};

        mysql_query("UPDATE `game` SET WildPower='$WPower', WildCard1=WildCard2, WildCard2=WildCard3, WildCard3=WildCard4, WildCard4=WildCard5, WildCard5=WildCard6, WildCard6=WildCard7, WildCard7=WildCard8, WildCard8=WildCard9 WHERE `id` = $game_id");

        include 'end_wild.php';
    } else if ($WP['WildCard1'] == 7) {//Skinchanger Scout
        $result = mysql_query("SELECT name, tokih FROM $house");
        while ($array = mysql_fetch_assoc($result))
        {
            $tokih[$array['name']] = $array['tokih'];
        };

        //lowest bidder
        mysql_query("UPDATE $house SET tokih = 0 WHERE `name` = '$bid6'");

        //everyone else
        if (($tokih['$bid1']-2) < 0 ) {
            mysql_query("UPDATE $house SET tokih = 0 WHERE `name` = '$bid1'");
        } else {
            mysql_query("UPDATE $house SET tokih = tokih-2 WHERE `name` = '$bid1'");
        };
        if (($tokih['$bid2']-2) < 0 ) {
            mysql_query("UPDATE $house SET tokih = 0 WHERE `name` = '$bid2'");
        } else {
            mysql_query("UPDATE $house SET tokih = tokih-2 WHERE `name` = '$bid2'");
        };
        if (($tokih['$bid3']-2) < 0 ) {
            mysql_query("UPDATE $house SET tokih = 0 WHERE `name` = '$bid3'");
        } else {
            mysql_query("UPDATE $house SET tokih = tokih-2 WHERE `name` = '$bid3'");
        };
        if (($tokih['$bid4']-2) < 0 ) {
            mysql_query("UPDATE $house SET tokih = 0 WHERE `name` = '$bid4'");
        } else {
            mysql_query("UPDATE $house SET tokih = tokih-2 WHERE `name` = '$bid4'");
        };
        if (($tokih['$bid5']-2) < 0 ) {
            mysql_query("UPDATE $house SET tokih = 0 WHERE `name` = '$bid5'");
        } else {
            mysql_query("UPDATE $house SET tokih = tokih-2 WHERE `name` = '$bid5'");
        };
        $WPower = $WP['WildPower'] - 2;
        if ($WPower < 0) {$WPower = 0;};

        mysql_query("UPDATE `game` SET WildPower='$WPower', WildCard1=WildCard2, WildCard2=WildCard3, WildCard3=WildCard4, WildCard4=WildCard5, WildCard5=WildCard6, WildCard6=WildCard7, WildCard7=WildCard8, WildCard8=WildCard9 WHERE `id` = $game_id");

        include 'end_wild.php';
    } else if ($WP['WildCard1'] == 4) {//A King Beyond the Wall for lowest bidder
        $result = mysql_query("SELECT court1, court2, court3, court4, court5, court6, throne1, throne2, throne3, throne4, throne5, throne6, fiefdom1, fiefdom2, fiefdom3, fiefdom4, fiefdom5, fiefdom6 FROM game WHERE id=$game_id");
        $game = mysql_fetch_assoc($result);

        if ($game['court1'] == $bid6) {
            mysql_query("UPDATE game SET `court1`='".$game['court2']."', `court2`='".$game['court3']."', `court3`='".$game['court4']."', `court4`='".$game['court5']."', `court5`='".$game['court6']."', `court6`='".$game['court1']."' WHERE id=$game_id");
        } else if ($game['court2'] == $bid6) {
            mysql_query("UPDATE game SET `court2`='".$game['court3']."', `court3`='".$game['court4']."', `court4`='".$game['court5']."', `court5`='".$game['court6']."', `court6`='".$game['court2']."' WHERE id=$game_id");
        } else if ($game['court3'] == $bid6) {
            mysql_query("UPDATE game SET `court3`='".$game['court4']."', `court4`='".$game['court5']."', `court5`='".$game['court6']."', `court6`='".$game['court3']."' WHERE id=$game_id");
        } else if ($game['court4'] == $bid6) {
            mysql_query("UPDATE game SET `court4`='".$game['court5']."', `court5`='".$game['court6']."', `court6`='".$game['court4']."' WHERE id=$game_id");
        } else if ($game['court5'] == $bid6) {
            mysql_query("UPDATE game SET `court5`='".$game['court6']."', `court6`='".$game['court5']."' WHERE id=$game_id");
        };

        if ($game['throne1'] == $bid6) {
            mysql_query("UPDATE game SET `throne1`='".$game['throne2']."', `throne2`='".$game['throne3']."', `throne3`='".$game['throne4']."', `throne4`='".$game['throne5']."', `throne5`='".$game['throne6']."', `throne6`='".$game['throne1']."' WHERE id=$game_id");
        } else if ($game['throne2'] == $bid6) {
            mysql_query("UPDATE game SET `throne2`='".$game['throne3']."', `throne3`='".$game['throne4']."', `throne4`='".$game['throne5']."', `throne5`='".$game['throne6']."', `throne6`='".$game['throne2']."' WHERE id=$game_id");
        } else if ($game['throne3'] == $bid6) {
            mysql_query("UPDATE game SET `throne3`='".$game['throne4']."', `throne4`='".$game['throne5']."', `throne5`='".$game['throne6']."', `throne6`='".$game['throne3']."' WHERE id=$game_id");
        } else if ($game['throne4'] == $bid6) {
            mysql_query("UPDATE game SET `throne4`='".$game['throne5']."', `throne5`='".$game['throne6']."', `throne6`='".$game['throne4']."' WHERE id=$game_id");
        } else if ($game['throne5'] == $bid6) {
            mysql_query("UPDATE game SET `throne5`='".$game['throne6']."', `throne6`='".$game['throne5']."' WHERE id=$game_id");
        };

        if ($game['fiefdom1'] == $bid6) {
            mysql_query("UPDATE game SET `fiefdom1`='".$game['fiefdom2']."', `fiefdom2`='".$game['fiefdom3']."', `fiefdom3`='".$game['fiefdom4']."', `fiefdom4`='".$game['fiefdom5']."', `fiefdom5`='".$game['fiefdom6']."', `fiefdom6`='".$game['fiefdom1']."' WHERE id=$game_id");
        } else if ($game['fiefdom2'] == $bid6) {
            mysql_query("UPDATE game SET `fiefdom2`='".$game['fiefdom3']."', `fiefdom3`='".$game['fiefdom4']."', `fiefdom4`='".$game['fiefdom5']."', `fiefdom5`='".$game['fiefdom6']."', `fiefdom6`='".$game['fiefdom2']."' WHERE id=$game_id");
        } else if ($game['fiefdom3'] == $bid6) {
            mysql_query("UPDATE game SET `fiefdom3`='".$game['fiefdom4']."', `fiefdom4`='".$game['fiefdom5']."', `fiefdom5`='".$game['fiefdom6']."', `fiefdom6`='".$game['fiefdom3']."' WHERE id=$game_id");
        } else if ($game['fiefdom4'] == $bid6) {
            mysql_query("UPDATE game SET `fiefdom4`='".$game['fiefdom5']."', `fiefdom5`='".$game['fiefdom6']."', `fiefdom6`='".$game['fiefdom4']."' WHERE id=$game_id");
        } else if ($game['fiefdom5'] == $bid6) {
            mysql_query("UPDATE game SET `fiefdom5`='".$game['fiefdom6']."', `fiefdom6`='".$game['fiefdom5']."' WHERE id=$game_id");
        };

        mysql_query("UPDATE `game` SET currentplayer = 1 WHERE `id` = $game_id");
    } else if ($WP['WildCard1'] == 8) {//Massing on the Milkwater for lowest bidder
        $result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = '$bid6'");
        $bid6HC = mysql_fetch_assoc($result);

        $sum = $bid6HC['HC1'] + $bid6HC['HC2'] + $bid6HC['HC3'] + $bid6HC['HC4'] + $bid6HC['HC5'] + $bid6HC['HC6'] + $bid6HC['HC7'];
        if ($sum > 1) {
            if ($bid6HC['HC1'] == 1) {
                mysql_query("UPDATE $house SET HC1=0 WHERE `name` = '$bid6'");
            } else if ($bid6HC['HC2'] == 1) {
                mysql_query("UPDATE $house SET HC2=0 WHERE `name` = '$bid6'");
            } else if ($bid6HC['HC3'] == 1 || $bid6HC['HC4'] == 1) {
                mysql_query("UPDATE $house SET HC3=0, HC4=0 WHERE `name` = '$bid6'");
            } else if ($bid6HC['HC5'] == 1 || $bid6HC['HC6'] == 1) {
                mysql_query("UPDATE $house SET HC5=0, HC6=0 WHERE `name` = '$bid6'");
            };
        };
        mysql_query("UPDATE `game` SET currentplayer = 1 WHERE `id` = $game_id");
    };
};

?>