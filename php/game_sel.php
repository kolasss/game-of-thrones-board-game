<? include 'database.php';
$id = $_GET['id'];
$id = mysql_real_escape_string($id);

//получение данных игры
$result = mysql_query("SELECT * FROM game where id=$id");
$row = mysql_fetch_assoc($result);

if ($row['Stark'] != '0') {
    $info = mysql_query("SELECT user_login FROM users WHERE user_id=".$row['Stark']);
    $Stark = mysql_fetch_assoc($info);
    $row['Stark'] = $Stark['user_login'];
};
if ($row['Greyjoy'] != '0') {
    $info = mysql_query("SELECT user_login FROM users WHERE user_id=".$row['Greyjoy']);
    $Greyjoy = mysql_fetch_assoc($info);
    $row['Greyjoy'] = $Greyjoy['user_login'];
};
if ($row['Lannister'] != '0') {
    $info = mysql_query("SELECT user_login FROM users WHERE user_id=".$row['Lannister']);
    $Lannister = mysql_fetch_assoc($info);
    $row['Lannister'] = $Lannister['user_login'];
};
if ($row['Martell'] != '0') {
    $info = mysql_query("SELECT user_login FROM users WHERE user_id=".$row['Martell']);
    $Martell = mysql_fetch_assoc($info);
    $row['Martell'] = $Martell['user_login'];
};
if ($row['Tyrell'] != '0') {
    $info = mysql_query("SELECT user_login FROM users WHERE user_id=".$row['Tyrell']);
    $Tyrell = mysql_fetch_assoc($info);
    $row['Tyrell'] = $Tyrell['user_login'];
};
if ($row['Baratheon'] != '0') {
    $info = mysql_query("SELECT user_login FROM users WHERE user_id=".$row['Baratheon']);
    $Baratheon = mysql_fetch_assoc($info);
    $row['Baratheon'] = $Baratheon['user_login'];
};

echo json_encode($row);
?>