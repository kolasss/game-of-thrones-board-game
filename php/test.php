<? include 'database.php';
$game_id = $_GET['id'];
$game_id = mysql_real_escape_string($game_id);
$house = $_GET['house'];
$house = mysql_real_escape_string($house);
$terr = $_GET['terr'];
$terr = mysql_real_escape_string($terr);

//randomize wc1 cards
$WC1 = array(0, 1, 1, 1, 2, 2, 2, 3, 3, 4);
shuffle($WC1);

//randomize wc2 cards
$WC2 = array(0, 0, 0, 1, 1, 2, 2, 2, 3, 4);
shuffle($WC2);

//randomize wc3 cards
$WC3 = array(0, 1, 1, 2, 3, 4, 5, 6, 6, 6);
shuffle($WC3);

//randomize wc1 cards
$Wild = array(0, 1, 2, 3, 4, 5, 6, 7, 8);
shuffle($Wild);

//create new row in table game
mysql_query("INSERT INTO `game` (`terr`, `house`, `WC1_1`, `WC1_2`, `WC1_3`, `WC1_4`, `WC1_5`, `WC1_6`, `WC1_7`, `WC1_8`, `WC1_9`, `WC1_10`, `WC2_1`, `WC2_2`, `WC2_3`, `WC2_4`, `WC2_5`, `WC2_6`, `WC2_7`, `WC2_8`, `WC2_9`, `WC2_10`, `WC3_1`, `WC3_2`, `WC3_3`, `WC3_4`, `WC3_5`, `WC3_6`, `WC3_7`, `WC3_8`, `WC3_9`, `WC3_10`, `WildCard1`, `WildCard2`, `WildCard3`, `WildCard4`, `WildCard5`, `WildCard6`, `WildCard7`, `WildCard8`, `WildCard9`) VALUES
('0', '0', '$WC1[0]', '$WC1[1]', '$WC1[2]', '$WC1[3]', '$WC1[4]', '$WC1[5]', '$WC1[6]', '$WC1[7]', '$WC1[8]', '$WC1[9]', '$WC2[0]', '$WC2[1]', '$WC2[2]', '$WC2[3]', '$WC2[4]', '$WC2[5]', '$WC2[6]', '$WC2[7]', '$WC2[8]', '$WC2[9]', '$WC3[0]', '$WC3[1]', '$WC3[2]', '$WC3[3]', '$WC3[4]', '$WC3[5]', '$WC3[6]', '$WC3[7]', '$WC3[8]', '$WC3[9]', '$Wild[0]', '$Wild[1]', '$Wild[2]', '$Wild[3]', '$Wild[4]', '$Wild[5]', '$Wild[6]', '$Wild[7]', '$Wild[8]');
");

$game_id = mysql_insert_id();
//create names for terr and house tables
$terr = "terr".$game_id;
$house = "house".$game_id;
print $terr;
print $house;


//create house table
mysql_query("CREATE TABLE IF NOT EXISTS $house (
    `name` varchar(9) NOT NULL,
  `tokih` int(2) NOT NULL DEFAULT '5',
  `tokob` int(2) NOT NULL DEFAULT '0',
  `zamki` int(1) NOT NULL,
  `bochki` int(1) NOT NULL,
  `HC1` tinyint(1) NOT NULL DEFAULT '1',
  `HC2` tinyint(1) NOT NULL DEFAULT '1',
  `HC3` tinyint(1) NOT NULL DEFAULT '1',
  `HC4` tinyint(1) NOT NULL DEFAULT '1',
  `HC5` tinyint(1) NOT NULL DEFAULT '1',
  `HC6` tinyint(1) NOT NULL DEFAULT '1',
  `HC7` tinyint(1) NOT NULL DEFAULT '1',
  `ready` tinyint(1) NOT NULL DEFAULT '0',
  `bid` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;");

mysql_query("INSERT INTO $house (`name`, `tokih`, `tokob`, `zamki`, `bochki`, `HC1`, `HC2`, `HC3`, `HC4`, `HC5`, `HC6`, `HC7`, `ready`, `bid`) VALUES
('Baratheon', 5, 0, 1, 2, 1, 1, 1, 1, 1, 1, 1, 0, 0),
('Greyjoy', 5, 0, 1, 2, 1, 1, 1, 1, 1, 1, 1, 0, 0),
('Lannister', 5, 0, 1, 2, 1, 1, 1, 1, 1, 1, 1, 0, 0),
('Martell', 5, 0, 1, 2, 1, 1, 1, 1, 1, 1, 1, 0, 0),
('Stark', 5, 0, 2, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0),
('Tyrell', 5, 0, 1, 2, 1, 1, 1, 1, 1, 1, 1, 0, 0);");

//create terr table
mysql_query("CREATE TABLE IF NOT EXISTS $terr (
    `name` varchar(20) NOT NULL,
  `control` varchar(1) NOT NULL DEFAULT '0',
  `unit1` varchar(2) NOT NULL DEFAULT '0',
  `unit2` varchar(2) NOT NULL DEFAULT '0',
  `unit3` varchar(2) NOT NULL DEFAULT '0',
  `unit4` varchar(2) NOT NULL DEFAULT '0',
  `garrison` int(2) NOT NULL DEFAULT '0',
  `token` tinyint(1) NOT NULL DEFAULT '0',
  `prikaz` int(2) NOT NULL DEFAULT '0',
  `supply` int(1) NOT NULL DEFAULT '0',
  `power` int(1) NOT NULL DEFAULT '0',
  `castle` int(1) NOT NULL DEFAULT '0',
  `mustered` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;");

mysql_query("INSERT INTO $terr (`name`, `control`, `unit1`, `unit2`, `unit3`, `unit4`, `garrison`, `token`, `prikaz`, `supply`, `power`, `castle`, `mustered`) VALUES
('Arbor', '0', '0', '0', '0', '0', 0, 0, 0, 0, 1, 0, 0),
('BayofIce', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('Blackwater', '0', '0', '0', '0', '0', 0, 0, 0, 2, 0, 0, 0),
('BlackwaterBay', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('Boneway', '0', '0', '0', '0', '0', 0, 0, 0, 0, 1, 0, 0),
('CastleBlack', '0', '0', '0', '0', '0', 0, 0, 0, 0, 1, 0, 0),
('CrackclawPoint', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 1, 0),
('DornishMarches', 'T', 'F1', '0', '0', '0', 0, 0, 0, 0, 1, 0, 0),
('Dragonstone', 'B', 'F1', 'K1', '0', '0', 4, 0, 0, 1, 1, 2, 0),
('DragonstonePort', 'B', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('EastSummerSea', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('Eyrie', '1', '0', '0', '0', '0', 7, 0, 0, 1, 1, 1, 0),
('Fingers', '0', '0', '0', '0', '0', 0, 0, 0, 1, 0, 0, 0),
('FlintsFinger', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 1, 0),
('GoldenSound', 'L', 'S1', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('GreywaterWatch', 'G', 'F1', '0', '0', '0', 0, 0, 0, 1, 0, 0, 0),
('Harrenhal', '0', '0', '0', '0', '0', 0, 0, 0, 0, 1, 1, 0),
('Highgarden', 'T', 'F1', 'K1', '0', '0', 5, 0, 0, 2, 0, 2, 0),
('IronmansBay', 'G', 'S1', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('Karhold', '0', '0', '0', '0', '0', 0, 0, 0, 0, 1, 0, 0),
('KingsLanding', '1', '0', '0', '0', '0', 8, 0, 0, 0, 2, 2, 0),
('Kingswood', 'B', 'F1', '0', '0', '0', 0, 0, 0, 1, 1, 0, 0),
('Lannisport', 'L', 'F1', 'K1', '0', '0', 3, 0, 0, 2, 0, 2, 0),
('LannisportPort', 'L', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('MoatCailin', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 1, 0),
('MountainsOfMoon', '0', '0', '0', '0', '0', 0, 0, 0, 1, 0, 0, 0),
('NarrowSea', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('Oldtown', '0', '0', '0', '0', '0', 0, 0, 0, 0, 2, 0, 0),
('OldtownPort', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('PrincesPass', '0', '0', '0', '0', '0', 0, 0, 0, 1, 1, 0, 0),
('Pyke', 'G', 'F1', 'K1', '0', '0', 2, 0, 0, 1, 1, 2, 0),
('PykePort', 'G', 'S1', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('Reach', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 1, 0),
('RedwyneStraghts', 'T', 'S1', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('Riverrun', '0', '0', '0', '0', '0', 0, 0, 0, 1, 1, 2, 0),
('SaltShore', 'M', 'F1', '0', '0', '0', 0, 0, 0, 1, 0, 0, 0),
('Seagard', '0', '0', '0', '0', '0', 0, 0, 0, 1, 1, 2, 0),
('SeaOfDorne', 'M', 'S1', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('SearoadMarches', '0', '0', '0', '0', '0', 0, 0, 0, 1, 0, 0, 0),
('ShipbreakerBay', 'B', 'S1', 'S1', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('ShiveringSea', 'S', 'S1', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('Starfall', '0', '0', '0', '0', '0', 0, 0, 0, 1, 0, 1, 0),
('StoneySept', 'L', 'F1', '0', '0', '0', 0, 0, 0, 0, 1, 0, 0),
('StonyShore', '0', '0', '0', '0', '0', 0, 0, 0, 1, 0, 0, 0),
('StormsEnd', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 1, 0),
('StormsEndPort', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('SunsetSea', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('Sunspear', 'M', 'F1', 'K1', '0', '0', 6, 0, 0, 1, 1, 2, 0),
('SunspearPort', 'M', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('ThreeTowers', '0', '0', '0', '0', '0', 0, 0, 0, 1, 0, 0, 0),
('Twins', '0', '0', '0', '0', '0', 0, 0, 0, 0, 1, 0, 0),
('WestSummerSea', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('WhiteHarbor', 'S', 'F1', '0', '0', '0', 0, 0, 0, 0, 0, 1, 0),
('WhiteHarborPort', 'S', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('WidowsWatch', '0', '0', '0', '0', '0', 0, 0, 0, 1, 0, 0, 0),
('Winterfell', 'S', 'K1', 'F1', '0', '0', 1, 0, 0, 1, 1, 2, 0),
('WinterfellPort', 'S', '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0),
('Yronwood', '0', '0', '0', '0', '0', 0, 0, 0, 0, 0, 1, 0);");

mysql_query("UPDATE game SET terr='$terr', house='$house' WHERE id=$game_id");

//create new row in battle table
mysql_query("INSERT INTO `battle` (`id`) VALUES
('$game_id');");

?>