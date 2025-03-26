<?php
$host = "localhost"; // Of je servernaam
$dbname = "studenten_login";
$username = "root"; // Standaard in XAMPP/WAMP
$password = ""; // Geen wachtwoord in XAMPP/WAMP

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Databaseverbinding mislukt: " . $e->getMessage());
}
?>
