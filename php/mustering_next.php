﻿<? include 'database.php';
$game_id = $_GET['id'];
$game_id = mysql_real_escape_string($game_id);

//next mustering player
$result = mysql_query("SELECT currentplayer, turn, terr FROM game where id=$game_id");
$curr = mysql_fetch_assoc($result);

if ($curr['currentplayer'] < 5) {
	mysql_query("UPDATE game SET currentplayer = currentplayer+1 WHERE id = $game_id");
} else {
	//WC2 phase
	$result = mysql_query("SELECT WC2_".$curr['turn'].", WC3_".$curr['turn']." FROM game WHERE id = $game_id");
	$WC = mysql_fetch_assoc($result);
	
	mysql_query("UPDATE game SET faza=1, currentplayer='0' WHERE id = $game_id");
	mysql_query("UPDATE ".$curr['terr']." SET mustered = 0");
    
    //Westeros Card #2
    if ($WC["WC2_".$curr['turn']] == '3') {//Last days of Summer
        mysql_query("UPDATE game SET faza=2 WHERE id = $game_id");
        //Westeros Card #3
        if ($WC["WC3_".$curr['turn']] == '0' || $WC["WC3_".$curr['turn']] == '2' || $WC["WC3_".$curr['turn']] == '3' || $WC["WC3_".$curr['turn']] == '4' || $WC["WC3_".$curr['turn']] == '5') {//Orders cannot be played
            mysql_query("UPDATE game SET faza=3 WHERE id = $game_id");
        };
    } else if ($WC["WC2_".$curr['turn']] == '2') {//Game of Thrones
        $result = mysql_query("SELECT house FROM game WHERE id = $game_id");
        $house = mysql_fetch_assoc($result);

        $Stok = 0;
        $Btok = 0;
        $Gtok = 0;
        $Ltok = 0;
        $Mtok = 0;
        $Ttok = 0;

        $result = mysql_query("SELECT control, power FROM $terr");

        while ($array = mysql_fetch_assoc($result))
        {
            if ($array['control'] == 'S') {
                $Stok += $array['power'];
            } else if ($array['control'] == 'B') {
                $Btok += $array['power'];
            } else if ($array['control'] == 'G') {
                $Gtok += $array['power'];
            } else if ($array['control'] == 'L') {
                $Ltok += $array['power'];
            } else if ($array['control'] == 'T') {
                $Ttok += $array['power'];
            } else if ($array['control'] == 'M') {
                $Mtok += $array['power'];
            };
        };

        $result = mysql_query("SELECT name, tokih, tokob FROM ".$house['house']);
        while ($array = mysql_fetch_assoc($result))
        {
            $tokens[$array['name']] = $array;
        };

        while (($tokens['Stark']['tokih'] + $tokens['Stark']['tokob'] + $Stok) > 20) {
            $Stok--;
        }
        mysql_query("UPDATE ".$house['house']." SET tokih = tokih+$Stok WHERE name = 'Stark'");
        while (($tokens['Baratheon']['tokih'] + $tokens['Baratheon']['tokob'] + $Btok) > 20) {
            $Btok--;
        }
        mysql_query("UPDATE ".$house['house']." SET tokih = tokih+$Btok WHERE name = 'Baratheon'");
        while (($tokens['Greyjoy']['tokih'] + $tokens['Greyjoy']['tokob'] + $Gtok) > 20) {
            $Gtok--;
        }
        mysql_query("UPDATE ".$house['house']." SET tokih = tokih+$Gtok WHERE name = 'Greyjoy'");
        while (($tokens['Lannister']['tokih'] + $tokens['Lannister']['tokob'] + $Ltok) > 20) {
            $Ltok--;
        }
        mysql_query("UPDATE ".$house['house']." SET tokih = tokih+$Ltok WHERE name = 'Lannister'");
        while (($tokens['Martell']['tokih'] + $tokens['Martell']['tokob'] + $Mtok) > 20) {
            $Mtok--;
        }
        mysql_query("UPDATE ".$house['house']." SET tokih = tokih+$Mtok WHERE name = 'Martell'");
        while (($tokens['Tyrell']['tokih'] + $tokens['Tyrell']['tokob'] + $Ttok) > 20) {
            $Ttok--;
        }
        mysql_query("UPDATE ".$house['house']." SET tokih = tokih+$Ttok WHERE name = 'Tyrell'");

        mysql_query("UPDATE game SET faza=2 WHERE id = $game_id");
        //Westeros Card #3
        if ($WC["WC3_".$curr['turn']] == '0' || $WC["WC3_".$curr['turn']] == '2' || $WC["WC3_".$curr['turn']] == '3' || $WC["WC3_".$curr['turn']] == '4' || $WC["WC3_".$curr['turn']] == '5') {//Passive Orders cannot be played
            mysql_query("UPDATE game SET faza=3 WHERE id = $game_id");
        };
    } else if ($WC["WC2_".$curr['turn']] == '0') {//Clash of Kings
        mysql_query("UPDATE `battle` SET 1ready='0' WHERE `id` = $game_id");
    };
};

?>