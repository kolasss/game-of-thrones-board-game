﻿<? include 'database.php';
$game_id = $_GET['id'];
$game_id = mysql_real_escape_string($game_id);

$array = array(0, 1, 1, 1, 2, 2, 2, 3, 3, 4);
shuffle($array);

mysql_query("UPDATE game SET WC1_1 = '".$array[0]."', WC1_2 = '".$array[1]."', WC1_3 = '".$array[2]."', WC1_4 = '".$array[3]."', WC1_5 = '".$array[4]."', WC1_6 = '".$array[5]."', WC1_7 = '".$array[6]."', WC1_8 = '".$array[7]."', WC1_9 = '".$array[8]."', WC1_10 = '".$array[9]."' WHERE id = $game_id");


$result = mysql_query("SELECT turn FROM game where id=$game_id");
$turn = mysql_fetch_assoc($result);

$result = mysql_query("SELECT WC1_".$turn['turn'].", WC2_".$turn['turn'].", WC3_".$turn['turn']." FROM game WHERE id = $game_id");
$WC = mysql_fetch_assoc($result);

//Westeros Card #1
if ($WC["WC1_".$turn['turn']] == '0') {//Last days of Summer
    mysql_query("UPDATE game SET faza=1 WHERE id = $game_id");
    //Westeros Card #2
    if ($WC["WC2_".$turn['turn']] == '3') {//Last days of Summer
        mysql_query("UPDATE game SET faza=2 WHERE id = $game_id");
        //Westeros Card #3
        if ($WC["WC3_".$turn['turn']] == '0' || $WC["WC3_".$turn['turn']] == '2' || $WC["WC3_".$turn['turn']] == '3' || $WC["WC3_".$turn['turn']] == '4' || $WC["WC3_".$turn['turn']] == '5') {//Orders cannot be played
            mysql_query("UPDATE game SET faza=3 WHERE id = $game_id");
        };
    } else if ($WC["WC2_".$turn['turn']] == '2') {//Game of Thrones
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
        if ($WC["WC3_".$turn['turn']] == '0' || $WC["WC3_".$turn['turn']] == '2' || $WC["WC3_".$turn['turn']] == '3' || $WC["WC3_".$turn['turn']] == '4' || $WC["WC3_".$turn['turn']] == '5') {//Passive Orders cannot be played
            mysql_query("UPDATE game SET faza=3 WHERE id = $game_id");
        };
    } else if ($WC["WC2_".$turn['turn']] == '0') {//Clash of Kings
        mysql_query("UPDATE `battle` SET 1ready='0' WHERE `id` = $game_id");
    };
} else if ($WC["WC1_".$turn['turn']] == '2') {//Supply
    $result = mysql_query("SELECT house, terr FROM game WHERE id = $game_id");
    $house = mysql_fetch_assoc($result);

    $Ssup = 0;
    $Bsup = 0;
    $Gsup = 0;
    $Lsup = 0;
    $Msup = 0;
    $Tsup = 0;

    $result = mysql_query("SELECT control, supply FROM ".$house['terr']);

    while ($array = mysql_fetch_assoc($result))
    {
        if ($array['control'] == 'S') {
            $Ssup += $array['supply'];
        } else if ($array['control'] == 'B') {
            $Bsup += $array['supply'];
        } else if ($array['control'] == 'G') {
            $Gsup += $array['supply'];
        } else if ($array['control'] == 'L') {
            $Lsup += $array['supply'];
        } else if ($array['control'] == 'T') {
            $Tsup += $array['supply'];
        } else if ($array['control'] == 'M') {
            $Msup += $array['supply'];
        };
    };

    mysql_query("UPDATE ".$house['house']." SET bochki = '$Ssup' WHERE name = 'Stark'");
    mysql_query("UPDATE ".$house['house']." SET bochki = '$Bsup' WHERE name = 'Baratheon'");
    mysql_query("UPDATE ".$house['house']." SET bochki = '$Gsup' WHERE name = 'Greyjoy'");
    mysql_query("UPDATE ".$house['house']." SET bochki = '$Lsup' WHERE name = 'Lannister'");
    mysql_query("UPDATE ".$house['house']." SET bochki = '$Msup' WHERE name = 'Martell'");
    mysql_query("UPDATE ".$house['house']." SET bochki = '$Tsup' WHERE name = 'Tyrell'");
};

?>