<?php
$host = 'localhost';
$db = 'ziekmeldsysteem';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
} catch (PDOException $e) {
    die("Verbinding mislukt: " . $e->getMessage());
}
?>
