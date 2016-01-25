<? include 'database.php';
$house = $_GET['house'];
$house = mysql_real_escape_string($house);
$myhouse = $_GET['myhouse'];
$myhouse = mysql_real_escape_string($myhouse);
$game_id = $_GET['id'];
$game_id = mysql_real_escape_string($game_id);
$mybid = $_GET['bid'];
$mybid = mysql_real_escape_string($mybid);

mysql_query("UPDATE `$house` SET `ready` = '1', `bid` = '$mybid' WHERE `name` = '$myhouse'");

$result = mysql_query("SELECT currentplayer FROM game WHERE id=$game_id");
$curr = mysql_fetch_assoc($result);

if ($curr['currentplayer'] < 4) {
    mysql_query("UPDATE `game` SET currentplayer=currentplayer+1 WHERE `id` = $game_id");
} else {//reveal Wildling card phase
    //select winner of previous Wildlings attack
    $result = mysql_query("SELECT defender FROM battle WHERE id=$game_id");
    $prev = mysql_fetch_assoc($result);
    $defender = $prev['defender'];

    //if some bids are even
    $result = mysql_query("SELECT name, bid FROM $house");

    while ($array = mysql_fetch_assoc($result))
    {
        if ($array['name'] != $defender) {
            $row2[$array['name']] = $array['bid'];
        };
    };

    $row3 = array_count_values($row2);

    $faza = 19;
    foreach ($row3 as $imya => $count) {
        if ($count > 1) {
            $faza = 18;
            break;
        };
    };

    mysql_query("UPDATE `game` SET currentplayer=0, faza='$faza' WHERE `id` = $game_id");
    //backup current faza
    mysql_query("UPDATE `battle` SET dsup1=0, dsup2=0, dsup3=0, dsup4=0, dsup5=0, asup1=0, asup2=0, asup3=0, asup4=0, asup5=0, winner=0 WHERE `id` = $game_id");
    mysql_query("UPDATE `game` SET WildPower=3, WildCard1=WildCard2, WildCard2=WildCard3, WildCard3=WildCard4, WildCard4=WildCard5, WildCard5=WildCard6, WildCard6=WildCard7, WildCard7=WildCard8, WildCard8=WildCard9 WHERE `id` = $game_id");

    if ($faza == 19) {//consequences of WA
        //place houses in order of there bids
        asort($row2);
        $doma = array_keys($row2);
        mysql_query("UPDATE `battle` SET dsup1='$doma[4]', dsup2='$doma[3]', dsup3='$doma[2]', dsup4='$doma[1]', dsup5='$doma[0]' WHERE `id` = $game_id");

        $bid1 = $doma[4];
        $bid2 = $doma[3];
        $bid3 = $doma[2];
        $bid4 = $doma[1];
        $bid5 = $doma[0];

        //determine winner
        $result = mysql_query("SELECT WildPower, WildCard1 FROM game WHERE id = $game_id");
        $WP = mysql_fetch_assoc($result);

        $result = mysql_query("SELECT name, bid FROM $house");

        while ($array = mysql_fetch_assoc($result))
        {
            $row2[$array['name']] = $array['bid'];
        };

        if ($defender == 'Stark') {
            $HP = $row2['Baratheon'] + $row2['Greyjoy'] + $row2['Lannister'] + $row2['Martell'] + $row2['Tyrell'];
        } else if ($defender == 'Baratheon') {
            $HP = $row2['Stark'] + $row2['Greyjoy'] + $row2['Lannister'] + $row2['Martell'] + $row2['Tyrell'];
        } else if ($defender == 'Greyjoy') {
            $HP = $row2['Baratheon'] + $row2['Stark'] + $row2['Lannister'] + $row2['Martell'] + $row2['Tyrell'];
        } else if ($defender == 'Lannister') {
            $HP = $row2['Baratheon'] + $row2['Greyjoy'] + $row2['Stark'] + $row2['Martell'] + $row2['Tyrell'];
        } else if ($defender == 'Martell') {
            $HP = $row2['Baratheon'] + $row2['Greyjoy'] + $row2['Lannister'] + $row2['Stark'] + $row2['Tyrell'];
        } else if ($defender == 'Tyrell') {
            $HP = $row2['Baratheon'] + $row2['Greyjoy'] + $row2['Lannister'] + $row2['Martell'] + $row2['Stark'];
        };

        if ($HP >= 6) {
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

        mysql_query("UPDATE `battle` SET asup1='$bids[0]', asup2='$bids[1]', asup3='$bids[2]', asup4='$bids[3]', asup5='$bids[4]' WHERE `id` = $game_id");

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
            } else if ($WP['WildCard1'] == 8) {//Massing on the Milkwater
                mysql_query("UPDATE $house SET HC1=1, HC2=1, HC3=1, HC4=1, HC5=1, HC6=1, HC7=1 WHERE `name` = '$bid1'");
                mysql_query("UPDATE `game` SET WildPower=0, WildCard1=WildCard2, WildCard2=WildCard3, WildCard3=WildCard4, WildCard4=WildCard5, WildCard5=WildCard6, WildCard6=WildCard7, WildCard7=WildCard8, WildCard8=WildCard9 WHERE `id` = $game_id");

                include 'end_wild.php';
            }
        } else {//winner == Wildlings
            if ($WP['WildCard1'] == 1) {//Silence at the Wall
                mysql_query("UPDATE `game` SET WildPower=1, WildCard1=WildCard2, WildCard2=WildCard3, WildCard3=WildCard4, WildCard4=WildCard5, WildCard5=WildCard6, WildCard6=WildCard7, WildCard7=WildCard8, WildCard8=WildCard9 WHERE `id` = $game_id");

                include 'end_wild.php';
            } else if ($WP['WildCard1'] == 5) {//Rattleshirts Raiders
                $result = mysql_query("SELECT name, bochki FROM $house");
                while ($array = mysql_fetch_assoc($result))
                {
                    $bochki[$array['name']] = $array['bochki'];
                };
                //lowest bidder
                if (($bochki['$bid5']-2) < 0 ) {
                    mysql_query("UPDATE $house SET bochki = 0 WHERE `name` = '$bid5'");
                } else {
                    mysql_query("UPDATE $house SET bochki = bochki-2 WHERE `name` = '$bid5'");
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
                mysql_query("UPDATE `game` SET WildPower=1, WildCard1=WildCard2, WildCard2=WildCard3, WildCard3=WildCard4, WildCard4=WildCard5, WildCard5=WildCard6, WildCard6=WildCard7, WildCard7=WildCard8, WildCard8=WildCard9 WHERE `id` = $game_id");

                include 'end_wild.php';
            } else if ($WP['WildCard1'] == 7) {//Skinchanger Scout
                $result = mysql_query("SELECT name, tokih FROM $house");
                while ($array = mysql_fetch_assoc($result))
                {
                    $tokih[$array['name']] = $array['tokih'];
                };

                //lowest bidder
                mysql_query("UPDATE $house SET tokih = 0 WHERE `name` = '$bid5'");

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
                mysql_query("UPDATE `game` SET WildPower=1, WildCard1=WildCard2, WildCard2=WildCard3, WildCard3=WildCard4, WildCard4=WildCard5, WildCard5=WildCard6, WildCard6=WildCard7, WildCard7=WildCard8, WildCard8=WildCard9 WHERE `id` = $game_id");

                include 'end_wild.php';
            } else if ($WP['WildCard1'] == 4) {//A King Beyond the Wall for lowest bidder
                $result = mysql_query("SELECT court1, court2, court3, court4, court5, court6, throne1, throne2, throne3, throne4, throne5, throne6, fiefdom1, fiefdom2, fiefdom3, fiefdom4, fiefdom5, fiefdom6 FROM game WHERE id=$game_id");
                $game = mysql_fetch_assoc($result);

                if ($game['court1'] == $bid5) {
                    mysql_query("UPDATE game SET `court1`='".$game['court2']."', `court2`='".$game['court3']."', `court3`='".$game['court4']."', `court4`='".$game['court5']."', `court5`='".$game['court6']."', `court6`='".$game['court1']."' WHERE id=$game_id");
                } else if ($game['court2'] == $bid5) {
                    mysql_query("UPDATE game SET `court2`='".$game['court3']."', `court3`='".$game['court4']."', `court4`='".$game['court5']."', `court5`='".$game['court6']."', `court6`='".$game['court2']."' WHERE id=$game_id");
                } else if ($game['court3'] == $bid5) {
                    mysql_query("UPDATE game SET `court3`='".$game['court4']."', `court4`='".$game['court5']."', `court5`='".$game['court6']."', `court6`='".$game['court3']."' WHERE id=$game_id");
                } else if ($game['court4'] == $bid5) {
                    mysql_query("UPDATE game SET `court4`='".$game['court5']."', `court5`='".$game['court6']."', `court6`='".$game['court4']."' WHERE id=$game_id");
                } else if ($game['court5'] == $bid5) {
                    mysql_query("UPDATE game SET `court5`='".$game['court6']."', `court6`='".$game['court5']."' WHERE id=$game_id");
                };

                if ($game['throne1'] == $bid5) {
                    mysql_query("UPDATE game SET `throne1`='".$game['throne2']."', `throne2`='".$game['throne3']."', `throne3`='".$game['throne4']."', `throne4`='".$game['throne5']."', `throne5`='".$game['throne6']."', `throne6`='".$game['throne1']."' WHERE id=$game_id");
                } else if ($game['throne2'] == $bid5) {
                    mysql_query("UPDATE game SET `throne2`='".$game['throne3']."', `throne3`='".$game['throne4']."', `throne4`='".$game['throne5']."', `throne5`='".$game['throne6']."', `throne6`='".$game['throne2']."' WHERE id=$game_id");
                } else if ($game['throne3'] == $bid5) {
                    mysql_query("UPDATE game SET `throne3`='".$game['throne4']."', `throne4`='".$game['throne5']."', `throne5`='".$game['throne6']."', `throne6`='".$game['throne3']."' WHERE id=$game_id");
                } else if ($game['throne4'] == $bid5) {
                    mysql_query("UPDATE game SET `throne4`='".$game['throne5']."', `throne5`='".$game['throne6']."', `throne6`='".$game['throne4']."' WHERE id=$game_id");
                } else if ($game['throne5'] == $bid5) {
                    mysql_query("UPDATE game SET `throne5`='".$game['throne6']."', `throne6`='".$game['throne5']."' WHERE id=$game_id");
                };

                if ($game['fiefdom1'] == $bid5) {
                    mysql_query("UPDATE game SET `fiefdom1`='".$game['fiefdom2']."', `fiefdom2`='".$game['fiefdom3']."', `fiefdom3`='".$game['fiefdom4']."', `fiefdom4`='".$game['fiefdom5']."', `fiefdom5`='".$game['fiefdom6']."', `fiefdom6`='".$game['fiefdom1']."' WHERE id=$game_id");
                } else if ($game['fiefdom2'] == $bid5) {
                    mysql_query("UPDATE game SET `fiefdom2`='".$game['fiefdom3']."', `fiefdom3`='".$game['fiefdom4']."', `fiefdom4`='".$game['fiefdom5']."', `fiefdom5`='".$game['fiefdom6']."', `fiefdom6`='".$game['fiefdom2']."' WHERE id=$game_id");
                } else if ($game['fiefdom3'] == $bid5) {
                    mysql_query("UPDATE game SET `fiefdom3`='".$game['fiefdom4']."', `fiefdom4`='".$game['fiefdom5']."', `fiefdom5`='".$game['fiefdom6']."', `fiefdom6`='".$game['fiefdom3']."' WHERE id=$game_id");
                } else if ($game['fiefdom4'] == $bid5) {
                    mysql_query("UPDATE game SET `fiefdom4`='".$game['fiefdom5']."', `fiefdom5`='".$game['fiefdom6']."', `fiefdom6`='".$game['fiefdom4']."' WHERE id=$game_id");
                } else if ($game['fiefdom5'] == $bid5) {
                    mysql_query("UPDATE game SET `fiefdom5`='".$game['fiefdom6']."', `fiefdom6`='".$game['fiefdom5']."' WHERE id=$game_id");
                };

                mysql_query("UPDATE `game` SET currentplayer = 1 WHERE `id` = $game_id");
            } else if ($WP['WildCard1'] == 8) {//Massing on the Milkwater for lowest bidder
                $result = mysql_query("SELECT HC1, HC2, HC3, HC4, HC5, HC6, HC7 FROM $house WHERE `name` = '$bid5'");
                $bid6HC = mysql_fetch_assoc($result);

                $sum = $bid6HC['HC1'] + $bid6HC['HC2'] + $bid6HC['HC3'] + $bid6HC['HC4'] + $bid6HC['HC5'] + $bid6HC['HC6'] + $bid6HC['HC7'];
                if ($sum > 1) {
                    if ($bid6HC['HC1'] == 1) {
                        mysql_query("UPDATE $house SET HC1=0 WHERE `name` = '$bid5'");
                    } else if ($bid6HC['HC2'] == 1) {
                        mysql_query("UPDATE $house SET HC2=0 WHERE `name` = '$bid5'");
                    } else if ($bid6HC['HC3'] == 1 || $bid6HC['HC4'] == 1) {
                        mysql_query("UPDATE $house SET HC3=0, HC4=0 WHERE `name` = '$bid5'");
                    } else if ($bid6HC['HC5'] == 1 || $bid6HC['HC6'] == 1) {
                        mysql_query("UPDATE $house SET HC5=0, HC6=0 WHERE `name` = '$bid5'");
                    };
                };
                mysql_query("UPDATE `game` SET currentplayer = 1 WHERE `id` = $game_id");
            };
        };
    };

};
?>