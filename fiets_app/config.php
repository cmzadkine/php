<?php
// config.php
$host = 'localhost';
$dbname = 'fietsen_app';
$username = 'root';  // Pas aan als je andere inloggegevens hebt
$password = '';      // Pas aan als je een wachtwoord hebt

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
