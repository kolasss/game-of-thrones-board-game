<? include 'database.php';
//удлаить записи older then 1 day
mysql_query("DELETE FROM gamelist WHERE addtime<(NOW()-INTERVAL 1 DAY)");

//получить список
$query = mysql_query("SELECT * FROM gamelist");

while ($array = mysql_fetch_assoc($query))
{
    if ($array['Stark'] != '0') {
        $info = mysql_query("SELECT user_login FROM users WHERE user_id=".$array['Stark']);
        $Stark = mysql_fetch_assoc($info);
        $array['Stark'] = $Stark['user_login'];
    };
    if ($array['Greyjoy'] != '0') {
        $info = mysql_query("SELECT user_login FROM users WHERE user_id=".$array['Greyjoy']);
        $Greyjoy = mysql_fetch_assoc($info);
        $array['Greyjoy'] = $Greyjoy['user_login'];
    };
    if ($array['Lannister'] != '0') {
        $info = mysql_query("SELECT user_login FROM users WHERE user_id=".$array['Lannister']);
        $Lannister = mysql_fetch_assoc($info);
        $array['Lannister'] = $Lannister['user_login'];
    };
    if ($array['Martell'] != '0') {
        $info = mysql_query("SELECT user_login FROM users WHERE user_id=".$array['Martell']);
        $Martell = mysql_fetch_assoc($info);
        $array['Martell'] = $Martell['user_login'];
    };
    if ($array['Tyrell'] != '0') {
        $info = mysql_query("SELECT user_login FROM users WHERE user_id=".$array['Tyrell']);
        $Tyrell = mysql_fetch_assoc($info);
        $array['Tyrell'] = $Tyrell['user_login'];
    };
    if ($array['Baratheon'] != '0') {
        $info = mysql_query("SELECT user_login FROM users WHERE user_id=".$array['Baratheon']);
        $Baratheon = mysql_fetch_assoc($info);
        $array['Baratheon'] = $Baratheon['user_login'];
    };
    $row[$array['id']] = $array;
}
if (isset($row)) {echo json_encode ($row);} else {echo 0;}
?>