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

if ($curr['currentplayer'] < 5) {
    mysql_query("UPDATE `game` SET currentplayer=currentplayer+1 WHERE `id` = $game_id");
} else {
    //check the bids for even
    $result = mysql_query("SELECT name, bid FROM $house");

    while ($array = mysql_fetch_assoc($result))
    {
        $row2[$array['name']] = $array['bid'];
    };

    $row3 = array_count_values($row2);

    $even = 0;
    foreach ($row3 as $imya => $count) {
        if ($count > 1) {
            $even = 1;
            break;
        }
    };

    if ($even == 0) {//all bids are uniq
        $result = mysql_query("SELECT 1ready FROM battle WHERE id=$game_id");
        $track = mysql_fetch_assoc($result);
        //place houses in order of there bids
        asort($row2);
        $doma = array_keys($row2);

        if ($track['1ready'] == 0) {//throne
            mysql_query("UPDATE `game` SET throne1='$doma[5]', throne2='$doma[4]', throne3='$doma[3]', throne4='$doma[2]', throne5='$doma[1]', throne6='$doma[0]', currentplayer='0' WHERE `id` = $game_id");
            mysql_query("UPDATE `battle` SET 1ready='1' WHERE `id` = $game_id");
            //unready players and minus power tokens
            mysql_query("UPDATE `$house` SET `ready` = 0, tokih = tokih -".$row2['Stark']." WHERE `name` = 'Stark'");
            mysql_query("UPDATE `$house` SET `ready` = 0, tokih = tokih -".$row2['Baratheon']." WHERE `name` = 'Baratheon'");
            mysql_query("UPDATE `$house` SET `ready` = 0, tokih = tokih -".$row2['Greyjoy']." WHERE `name` = 'Greyjoy'");
            mysql_query("UPDATE `$house` SET `ready` = 0, tokih = tokih -".$row2['Lannister']." WHERE `name` = 'Lannister'");
            mysql_query("UPDATE `$house` SET `ready` = 0, tokih = tokih -".$row2['Martell']." WHERE `name` = 'Martell'");
            mysql_query("UPDATE `$house` SET `ready` = 0, tokih = tokih -".$row2['Tyrell']." WHERE `name` = 'Tyrell'");
        } else if ($track['1ready'] == 1) {//fiefdom
            mysql_query("UPDATE `game` SET fiefdom1='$doma[5]', fiefdom2='$doma[4]', fiefdom3='$doma[3]', fiefdom4='$doma[2]', fiefdom5='$doma[1]', fiefdom6='$doma[0]', currentplayer='0' WHERE `id` = $game_id");
            mysql_query("UPDATE `battle` SET 1ready='2' WHERE `id` = $game_id");
            //unready players
            mysql_query("UPDATE `$house` SET `ready` = 0, tokih = tokih -".$row2['Stark']." WHERE `name` = 'Stark'");
            mysql_query("UPDATE `$house` SET `ready` = 0, tokih = tokih -".$row2['Baratheon']." WHERE `name` = 'Baratheon'");
            mysql_query("UPDATE `$house` SET `ready` = 0, tokih = tokih -".$row2['Greyjoy']." WHERE `name` = 'Greyjoy'");
            mysql_query("UPDATE `$house` SET `ready` = 0, tokih = tokih -".$row2['Lannister']." WHERE `name` = 'Lannister'");
            mysql_query("UPDATE `$house` SET `ready` = 0, tokih = tokih -".$row2['Martell']." WHERE `name` = 'Martell'");
            mysql_query("UPDATE `$house` SET `ready` = 0, tokih = tokih -".$row2['Tyrell']." WHERE `name` = 'Tyrell'");
        } else if ($track['1ready'] == 2) {//court
            mysql_query("UPDATE `game` SET court1='$doma[5]', court2='$doma[4]', court3='$doma[3]', court4='$doma[2]', court5='$doma[1]', court6='$doma[0]', currentplayer='0' WHERE `id` = $game_id");
            //unready players
            mysql_query("UPDATE `$house` SET `ready` = 0, tokih = tokih -".$row2['Stark']." WHERE `name` = 'Stark'");
            mysql_query("UPDATE `$house` SET `ready` = 0, tokih = tokih -".$row2['Baratheon']." WHERE `name` = 'Baratheon'");
            mysql_query("UPDATE `$house` SET `ready` = 0, tokih = tokih -".$row2['Greyjoy']." WHERE `name` = 'Greyjoy'");
            mysql_query("UPDATE `$house` SET `ready` = 0, tokih = tokih -".$row2['Lannister']." WHERE `name` = 'Lannister'");
            mysql_query("UPDATE `$house` SET `ready` = 0, tokih = tokih -".$row2['Martell']." WHERE `name` = 'Martell'");
            mysql_query("UPDATE `$house` SET `ready` = 0, tokih = tokih -".$row2['Tyrell']." WHERE `name` = 'Tyrell'");

            mysql_query("UPDATE game SET faza=2 WHERE id = $game_id");

            $result = mysql_query("SELECT turn FROM game WHERE id = $game_id");
            $turn = mysql_fetch_assoc($result);
            
            $result = mysql_query("SELECT WC1_".$turn['turn'].", WC2_".$turn['turn'].", WC3_".$turn['turn']." FROM game WHERE id = $game_id");
            $WC = mysql_fetch_assoc($result);
            
            //Westeros Card #3
            if ($WC["WC3_".$turn['turn']] == '0' || $WC["WC3_".$turn['turn']] == '2' || $WC["WC3_".$turn['turn']] == '3' || $WC["WC3_".$turn['turn']] == '4' || $WC["WC3_".$turn['turn']] == '5') {//Passive Orders cannot be played
                mysql_query("UPDATE game SET faza=3 WHERE id = $game_id");
            };
        };
    } else {//some bids are even
        mysql_query("UPDATE `game` SET currentplayer=currentplayer+1 WHERE `id` = $game_id");
    };
};

?>