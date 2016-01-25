<? include 'database.php';
$query = mysql_query("select * from karta");
 
while ($result = mysql_fetch_assoc($query)) {
$row[$result['id']] = $result;
}
echo json_encode($row);
