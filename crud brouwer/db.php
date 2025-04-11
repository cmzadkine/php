<?php
$host = 'localhost'; // of IP van je server
$dbname = 'BierenDB';
$username = 'root'; // of je databasegebruikersnaam
$password = ''; // je wachtwoord als je dat hebt ingesteld

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Verbinding mislukt: " . $e->getMessage());
}
?>
