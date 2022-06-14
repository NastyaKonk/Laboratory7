<?php 
header('Content-Type: text/xml; charset=UTF-8');
header('Cache-Control: no-cache, must-revalidate');
include('connect.php');
$sql = "SELECT name, balance FROM client WHERE balance < 0";
$sth = $dbh->prepare($sql);
$sth->execute();
$timetable = $sth->fetchAll(PDO::FETCH_NUM);
echo '<?xml version="1.0" encoding="utf-8" ?>';
echo "<root>";
foreach($timetable as $row)
{
    $Client = $row[0];
    $Balance = $row[1];
    print "<row><Client>$Client</Client> <Balance>$Balance</Balance></row>";
}
echo "</root>";
?>