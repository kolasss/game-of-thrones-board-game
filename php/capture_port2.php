<? include 'database.php';
$terr = $_GET['table'];
$terr = mysql_real_escape_string($terr);
$target = $_GET['target'];
$target = mysql_real_escape_string($target);
$unit1 = $_GET['unit1'];
$unit1 = mysql_real_escape_string($unit1);
$unit2 = $_GET['unit2'];
$unit2 = mysql_real_escape_string($unit2);
$unit3 = $_GET['unit3'];
$unit3 = mysql_real_escape_string($unit3);
$unit4 = $_GET['unit4'];
$unit4 = mysql_real_escape_string($unit4);
$mycontrol = $_GET['control'];
$mycontrol = mysql_real_escape_string($mycontrol);
$game_id = $_GET['id'];
$game_id = mysql_real_escape_string($game_id);


//select info from target zone
$result = mysql_query("SELECT unit1, unit2, unit3, unit4 FROM $terr where `name` = '$target'");
$targetunits = mysql_fetch_assoc($result);
$targetunits[0] = 0;

//update units in target zone
mysql_query("UPDATE `$terr` SET `unit1`='$targetunits[$unit1]', `unit2`='$targetunits[$unit2]', `unit3`='$targetunits[$unit3]', `unit4`='$targetunits[$unit4]', `control`='$mycontrol', prikaz='0' WHERE `name` = '$target'");


//prepare next phase
mysql_query("UPDATE `game` SET faza=6 WHERE `id` = $game_id");
$_GET['table'] = $terr;
include 'march_next.php';