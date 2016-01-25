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

//get the influence track
$result = mysql_query("SELECT 1ready FROM battle WHERE id=$game_id");
$track = mysql_fetch_assoc($result);

//get the bids
$result = mysql_query("SELECT name, bid FROM $house");

while ($array = mysql_fetch_assoc($result))
{
    $row2[$array['name']] = $array['bid'];
};

if ($track['1ready'] == 0) {//throne
    mysql_query("UPDATE `game` SET throne1='$bid1', throne2='$bid2', throne3='$bid3', throne4='$bid4', throne5='$bid5', throne6='$bid6', currentplayer='0' WHERE `id` = $game_id");
    mysql_query("UPDATE `battle` SET 1ready='1' WHERE `id` = $game_id");
    //unready players and minus power tokens
    mysql_query("UPDATE `$house` SET `ready` = 0, tokih = tokih -".$row2['Stark']." WHERE `name` = 'Stark'");
    mysql_query("UPDATE `$house` SET `ready` = 0, tokih = tokih -".$row2['Baratheon']." WHERE `name` = 'Baratheon'");
    mysql_query("UPDATE `$house` SET `ready` = 0, tokih = tokih -".$row2['Greyjoy']." WHERE `name` = 'Greyjoy'");
    mysql_query("UPDATE `$house` SET `ready` = 0, tokih = tokih -".$row2['Lannister']." WHERE `name` = 'Lannister'");
    mysql_query("UPDATE `$house` SET `ready` = 0, tokih = tokih -".$row2['Martell']." WHERE `name` = 'Martell'");
    mysql_query("UPDATE `$house` SET `ready` = 0, tokih = tokih -".$row2['Tyrell']." WHERE `name` = 'Tyrell'");
} else if ($track['1ready'] == 1) {//fiefdom
    mysql_query("UPDATE `game` SET fiefdom1='$bid1', fiefdom2='$bid2', fiefdom3='$bid3', fiefdom4='$bid4', fiefdom5='$bid5', fiefdom6='$bid6', currentplayer='0' WHERE `id` = $game_id");
    mysql_query("UPDATE `battle` SET 1ready='2' WHERE `id` = $game_id");
    //unready players
    mysql_query("UPDATE `$house` SET `ready` = 0, tokih = tokih -".$row2['Stark']." WHERE `name` = 'Stark'");
    mysql_query("UPDATE `$house` SET `ready` = 0, tokih = tokih -".$row2['Baratheon']." WHERE `name` = 'Baratheon'");
    mysql_query("UPDATE `$house` SET `ready` = 0, tokih = tokih -".$row2['Greyjoy']." WHERE `name` = 'Greyjoy'");
    mysql_query("UPDATE `$house` SET `ready` = 0, tokih = tokih -".$row2['Lannister']." WHERE `name` = 'Lannister'");
    mysql_query("UPDATE `$house` SET `ready` = 0, tokih = tokih -".$row2['Martell']." WHERE `name` = 'Martell'");
    mysql_query("UPDATE `$house` SET `ready` = 0, tokih = tokih -".$row2['Tyrell']." WHERE `name` = 'Tyrell'");
} else if ($track['1ready'] == 2) {//court
    mysql_query("UPDATE `game` SET court1='$bid1', court2='$bid2', court3='$bid3', court4='$bid4', court5='$bid5', court6='$bid6', currentplayer='0' WHERE `id` = $game_id");
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

?>