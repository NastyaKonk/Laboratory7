<?php
error_reporting(E_ALL);
$db_driver = "mysql";
$host = "localhost";
$database = "trafic";
$dsn = "$db_driver:host=$host;dbname=$database";
$username = "root";
$password = "";
try
{
    $dbh = new PDO ($dsn, $username, $password);
}
catch (PDOException $e)
{
    echo "Error!: " . $e ->getMessage() . "<br>";
    die();
}
?>