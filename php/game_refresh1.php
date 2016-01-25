<? include 'database.php';
$id = $_GET['id'];
$id = mysql_real_escape_string($id);

//получение данных игры
$result = mysql_query("SELECT faza, house, currentplayer, throne1, throne2, throne3, throne4, throne5, throne6, fiefdom1, fiefdom2, fiefdom3, fiefdom4, fiefdom5, fiefdom6, court1, court2, court3, court4, court5, court6, WC2_1, WC2_2, WC2_3, WC2_4, WC2_5, WC2_6, WC2_7, WC2_8, WC2_9, WC2_10 FROM game WHERE id=$id");
$row = mysql_fetch_assoc($result);

$result = mysql_query("SELECT 1ready FROM battle where id=$id");
$row2 = mysql_fetch_assoc($result);

$row = $row + $row2;

if ($row['currentplayer'] == 6) {
    $result = mysql_query("SELECT name, bid FROM ".$row['house']);

    while ($array = mysql_fetch_assoc($result))
    {
        $row2[$array['name']] = $array['bid'];
    };

    $row = $row + $row2;
}

echo json_encode($row);
?>