<?php
$host = "localhost"; // Pas dit aan indien nodig
$dbname = "gastenboek"; // Pas de naam van je database aan
$username = "root"; // Pas de databasegebruiker aan
$password = ""; // Pas het wachtwoord aan als nodig

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Verbinding mislukt: " . $e->getMessage());
}
?>
