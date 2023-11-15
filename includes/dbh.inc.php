<?php

$host = "localhost";
$dbname = "myFirstSQLdatabase";
$dbUsername = "root";
$dbPassword = "";

try
{
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $dbUsername, $dbPassword); 
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

catch(PDOException $e)
{
    die("Connection failed: " . $e -> getMessage());
}
?>