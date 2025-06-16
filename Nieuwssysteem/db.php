<?php
$host = 'localhost';
$db = 'nieuws_site';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connectie mislukt: " . $conn->connect_error);
}
?>
